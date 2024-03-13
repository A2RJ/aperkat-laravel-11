<?php

namespace App\Http\Controllers\Ppuf;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ppuf\ImportRequest;
use App\Http\Requests\Ppuf\PpufRequest;
use App\Models\Ppuf;
use App\Models\Role;
use Exception;
use Illuminate\Database\Query\Builder;
use Rap2hpoutre\FastExcel\FastExcel;
use Validator;

class PpufController extends Controller
{
    public function index()
    {
        $keyword = request('keyword', NULL);
        $ppufs = Ppuf::query()
            ->when($keyword, function (Builder $query) {
                $query
            ->whereAny([
                'ppuf_number',
                'activity_type',
                'program_name',
                'description',
                'location',
                'date',
                ], 'LIKE', '%apa%');
        })
            ->paginate();
        return view('ppuf.index', compact('ppufs'));
    }

    public function create()
    {
        $roles = Role::query()->get(['id', 'role as name']);
        $ikus = Ppuf::iku();
        $program_types = Ppuf::$program_types;
        $activity_dates = Ppuf::$activity_dates;
        return view('ppuf.create', compact('roles', 'ikus', 'program_types', 'activity_dates'));
    }

    public function store(PpufRequest $request)
    {
        $form = $request->safe()->only([
            'role_id',
            'ppuf_number',
            'iku',
            'activity_type',
            'program_name',
            'description',
            'location',
            'date',
            'planned_expenditure',
            'detail'
        ]);
        Ppuf::create($form);
        return redirect()->route('ppuf.index')->with('success', 'Berhasil menambahkan PPUF');
    }

    public function edit(Ppuf $ppuf)
    {
        $roles = Role::query()->get(['id', 'role as name']);
        $ikus = Ppuf::iku();
        $program_types = Ppuf::$program_types;
        $activity_dates = Ppuf::$activity_dates;
        return view('ppuf.edit', compact('ppuf', 'roles', 'ikus', 'program_types', 'activity_dates'));
    }

    public function update(PpufRequest $request, Ppuf $ppuf)
    {
        $form = $request->safe()->only([
            'role_id',
            'ppuf_number',
            'iku',
            'activity_type',
            'program_name',
            'description',
            'location',
            'date',
            'planned_expenditure',
            'detail'
        ]);
        $ppuf->update($form);
        return redirect()->route('ppuf.index')->with('success', 'Berhasil mengubah PPUF');
    }

    public function destroy(Ppuf $ppuf)
    {
        $ppuf->delete();
        return redirect()->route('ppuf.index')->with('success', 'Berhasil hapus PPUF');
    }

    public function importForm()
    {
        $roles = Role::query()->get(['id', 'role as name']);
        return view('ppuf.import', compact('roles'));
    }

    public function preview(ImportRequest $request)
    {
        try {
            $data = (new FastExcel())->import($request->file('file'))->map(function ($item, $index) {
                $index = $index + 1;
                $ppuf_number = $item['Nomor PPUF'];
                if (!$ppuf_number) {
                    throw new Exception("Nomor PPUF tidak boleh kosong pada baris ke " . $index);
                }
                $iku = $item['Indikator Kinerja Utama'];
                if (!$iku) {
                    throw new Exception("Indikator Kinerja Utama tidak boleh kosong pada baris ke " . $index);
                }
                $activity_type = $item['Jenis Kegiatan'];
                if (!$activity_type) {
                    throw new Exception("Jenis Kegiatan tidak boleh kosong pada baris ke " . $index);
                }
                if (!in_array(strtolower($activity_type), ['program', 'pengadaan', 'pemeliharaan', 'pengembangan'])) {
                    throw new Exception("Jenis Kegiatan tidak valid pada baris ke " . $index);
                }
                $program_name = $item['Nama Program'];
                if (!$program_name) {
                    throw new Exception("Nama Program tidak boleh kosong pada baris ke " . $index);
                }
                $deskripsi = $item['Deskripsi'];
                if (!$deskripsi) {
                    throw new Exception("Deskripsi tidak boleh kosong pada baris ke " . $index);
                }
                $location = $item['Tempat Pelaksanaan'];
                if (!$location) {
                    throw new Exception("Tempat Pelaksanaan tidak boleh kosong pada baris ke " . $index);
                }
                $date = $item['Waktu Pelaksanaan'];
                if (!$date) {
                    throw new Exception("Waktu Pelaksanaan tidak boleh kosong pada baris ke " . $index);
                }
                if (!in_array(strtolower($date), ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'])) {
                    throw new Exception("Waktu Pelaksanaan tidak valid pada baris ke " . $index);
                }
                $rab = $item['RAB'];
                if (!$rab) {
                    throw new Exception("RAB tidak boleh kosong pada baris ke " . $index);
                }

                return [
                    'role_id' => $item['Unit Pengaju'],
                    'ppuf_number' => $ppuf_number,
                    'iku' => $iku,
                    'activity_type' => $activity_type,
                    'program_name' => $program_name,
                    'description' => $deskripsi,
                    'location' => $location,
                    'date' => $date,
                    'planned_expenditure' => $rab,
                    'detail' => $item['Keterangan (Opsional)'],
                ];
            });

            return response()->json($data);
        } catch (Exception $th) {
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }

    public function import()
    {
    }
    public function export()
    {
    }
}
