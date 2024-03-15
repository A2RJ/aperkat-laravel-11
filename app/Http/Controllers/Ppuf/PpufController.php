<?php

namespace App\Http\Controllers\Ppuf;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ppuf\ImportRequest;
use App\Http\Requests\Ppuf\PpufRequest;
use App\Models\Ppuf;
use App\Models\Role;
use Crypt;
use Exception;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Query\Builder;
use Rap2hpoutre\FastExcel\FastExcel;

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
                'place',
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
            'place',
            'date',
            'budget',
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
            'place',
            'date',
            'budget',
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
            $role_id = $request->role_id;
            $role = Role::query()->find($role_id);
            $ppufs = (new FastExcel())->import($request->file('file'))->map(function ($item, $index) use ($role_id) {
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
                $place = $item['Tempat Pelaksanaan'];
                if (!$place) {
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
                    'role_id' => $role_id,
                    'ppuf_number' => $ppuf_number,
                    'iku' => $iku,
                    'activity_type' => $activity_type,
                    'program_name' => $program_name,
                    'description' => $deskripsi,
                    'place' => $place,
                    'date' => $date,
                    'budget' => $rab,
                    'detail' => $item['Keterangan (Opsional)'],
                ];
            });

            $ppufs = collect($ppufs)->uniqueStrict('ppuf_number');
            $token = Crypt::encrypt($ppufs);
            $ppufs = $ppufs->map(function ($item) use ($role) {
                return array_merge($item, [
                    'role' => $role->parent?->role,
                    'parent' => $role->role,
                ]);
            });
            return view('ppuf.preview', compact('ppufs', 'token'));
        } catch (Exception $th) {
            return redirect()->back()->with('failed', $th->getMessage())->withInput();
        }
    }

    public function import()
    {
        try {
            $token = request('token', NULL);
            $form = Crypt::decrypt($token);
            Ppuf::query()->insert(collect($form)->toArray());
            return redirect()->route('ppuf.index')->with('success', 'Berhasil menambahkan PPUF');
        } catch (DecryptException $e) {
            throw $e;
        };
    }
    public function export()
    {
    }
}
