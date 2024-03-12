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
        //         'role_id' => 'required|exists:users,id',
        //         'ppuf_number' => 'required',
        //         'iku' => 'required|exists:iku1,id',
        //         'activity_type' => 'required|in:program,pengadaan,perawatan,pengembangan',
        //         'program_name' => 'required',
        //         'description' => 'required',
        //         'location' => 'required',
        //         'date' => 'required|in:januari,februari,maret,april,mei,juni,juli,agustus,september,oktober,november,desember',
        //         'planned_expenditure' => 'required',
        //         'detail' => 'nullable',
        try {
            $data = (new FastExcel())->import($request->file('file'))->mapWithKeys(function ($item, $index) {
                $ppuf_number = $item['Nomor PPUF'];
                if (!$ppuf_number) {
                    throw new Exception("Nomor PPUF tidak boleh kosong");
                }
                $validator = Validator::make($item, [
                    'Nomor PPUF' => 'required',
                    'Indikator Kinerja Utama' => 'required|exists:iku1,id',
                    'Jenis Kegiatan' => 'required|in:program,pengadaan,perawatan,pengembangan',
                    'Nama Program' => 'required',
                    'Deskripsi' => 'required',
                    'Tempat Pelaksanaan' => 'required',
                    'Waktu Pelaksanaan' => 'required|in:januari,februari,maret,april,mei,juni,juli,agustus,september,oktober,november,desember',
                    'RAB' => 'required',
                    'Keterangan (Opsional)' => 'nullable',
                ], []);
                if ($validator->fails()) {
                    $messages = $validator->errors()->all();
                    throw new Exception(implode(', ', $messages) . implode($item) . " pada baris ke" . $index);
                }
                return [
                    'role_id' => $item['Unit Pengaju'],
                    'ppuf_number' => $ppuf_number,
                    'iku' => $item['Indikator Kinerja Utama'],
                    'activity_type' => $item['Jenis Kegiatan'],
                    'program_name' => $item['Nama Program'],
                    'description' => $item['Deskripsi'],
                    'location' => $item['Tempat Pelaksanaan'],
                    'date' => $item['Waktu Pelaksanaan'],
                    'planned_expenditure' => $item['RAB'],
                    'detail' => $item['Keterangan (Opsional)'],
                ];
            });



            return response()->json(['data' => $data]);
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
