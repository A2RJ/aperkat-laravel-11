<?php

namespace App\Http\Controllers\Ppuf;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ppuf\ImportRequest;
use App\Http\Requests\Ppuf\PpufRequest;
use App\Models\Ppuf;
use App\Models\Role;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
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
                'execution_location',
                'execution_time',
                ], 'LIKE', '%apa%');
        })
            ->paginate();
        return view('ppuf.index', compact('ppufs'));
    }

    public function create()
    {
        $users = Role::query()->get(['id', 'role as name']);
        $ikus = Ppuf::iku();
        $program_types = Ppuf::$program_types;
        $activity_dates = Ppuf::$activity_dates;
        return view('ppuf.create', compact('users', 'ikus', 'program_types', 'activity_dates'));
    }

    public function store(PpufRequest $request)
    {
        $form = $request->safe()->only([
            'role_id',
            'ppuf_number',
            'iku1_id',
            'iku2_id',
            'iku3_id',
            'activity_type',
            'program_name',
            'description',
            'execution_location',
            'execution_time',
            'planned_expenditure',
            'detail'
        ]);
        Ppuf::create($form);
        return redirect()->route('ppuf.index')->with('success', 'Berhasil menambahkan PPUF');
    }

    public function show(Ppuf $ppuf)
    {
        //
    }

    public function edit(Ppuf $ppuf)
    {
        $users = Role::query()->get(['id', 'role as name']);
        $ikus = Ppuf::iku();
        $program_types = Ppuf::$program_types;
        $activity_dates = Ppuf::$activity_dates;
        return view('ppuf.edit', compact('ppuf', 'users', 'ikus', 'program_types', 'activity_dates'));
    }

    public function update(PpufRequest $request, Ppuf $ppuf)
    {
        $form = $request->safe()->only([
            'role_id',
            'ppuf_number',
            'iku1_id',
            'iku2_id',
            'iku3_id',
            'activity_type',
            'program_name',
            'description',
            'execution_location',
            'execution_time',
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

    public function import(ImportRequest $request)
    {

        try {
            $data = (new FastExcel())->import($request->file('file'))->map(function ($item) {
                return [
                    'unit_kerja' => $item['Unit Kerja'],
                    'unit_pengaju' => $item['Unit Pengaju'],
                    'nomor_ppuf' => $item['Nomor PPUF'],
                    'indikator_kinerja_utama' => $item['Indikator Kinerja Utama'],
                    'jenis_kegiatan' => $item['Jenis Kegiatan'],
                    'nama_program' => $item['Nama Program'],
                    'deskripsi' => $item['Deskripsi'],
                    'tempat_pelaksanaan' => $item['Tempat Pelaksanaan'],
                    'waktu_pelaksanaan' => $item['Waktu Pelaksanaan'],
                    'rab' => $item['RAB'],
                    'keterangan' => $item['Keterangan (Opsional)'],
                ];
            });

            return response()->json(['data' => $data]);
        } catch (\Exception $th) {
            throw $th;
        }
    }

    public function deleteSelected(Request $request)
    {
    }
}
