<?php

namespace App\Http\Controllers\Ppuf;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ppuf\ImportRequest;
use App\Http\Requests\Ppuf\PpufRequest;
use App\Models\Ppuf;
use App\Models\User;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class PpufController extends Controller
{
    public function index()
    {
        $ppufs = Ppuf::query()
            ->whereAny([
                'ppuf_number',
                'activity_type',
                'program_name',
                'description',
                'execution_location',
                'execution_time',
            ], 'LIKE', '%apa%')
            ->with('author')
            ->paginate();
        return view('ppuf.index', compact('ppufs'));
    }

    public function create()
    {
        $users = User::query()->get(['id', 'name']);
        $iku1 = [];
        $iku2 = [];
        $iku3 = [];
        $program_types = ['program', 'pengadaan', 'perawatan', 'pengembangan'];
        $activity_dates = ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'];
        return view('ppuf.create', compact('users', 'iku1', 'iku2', 'iku3', 'program_types', 'activity_dates'));
    }

    public function store(PpufRequest $request)
    {
        //
    }

    public function show(Ppuf $ppuf)
    {
        //
    }

    public function edit(Ppuf $ppuf)
    {
        //
    }

    public function update(PpufRequest $request, Ppuf $ppuf)
    {
        //
    }

    public function destroy(Ppuf $ppuf)
    {
        //
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
