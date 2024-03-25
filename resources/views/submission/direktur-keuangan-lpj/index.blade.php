@extends('layout.index')

@section('title', 'Daftar Pengajuan PPUF | APERKAT')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pengajuan Sub Divisi</h6>
            </div>

            <div class="card-body p-4">
                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}.
                </div>
                @endif

                @if (session()->has('failed'))
                <div class="alert alert-danger">
                    {{ session()->get('failed') }}.
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="mb-4">
                    <form action="{{ url()->current() }}" method="get">
                        <div class="row">
                            <div class="col-sm">
                                <select id="status" class="form-control" name="status">
                                    <option value="">Pilih Status</option>
                                    <option value="need approve" {{ request('status', false) == 'need approve' ? 'selected' : '' }}>
                                        Menunggu Persetujuan
                                    </option>
                                    <option value="progress" {{ request('status', false) == 'progress' ? 'selected' : '' }}>
                                        Sedang Diproses</option>
                                    <option value="done" {{ request('status', false) == 'done' ? 'selected' : '' }}>
                                        Selesai
                                    </option>
                                </select>
                            </div>
                            <div class="col-sm ">
                                <input class="form-control " type="date" id="start" name="start" value="{{ request('start') }}" />
                            </div>
                            <div class="col-sm ">
                                <input class="form-control " type="date" id="end" name="end" value="{{ request('end') }}" />
                            </div>
                            <div class="col-sm ">
                                <input class="form-control " type="text" id="keyword" name="keyword" value="{{ request('keyword') }}">
                            </div>
                            <div class="col-sm">
                                <button class="btn bg-primary btn-primary px-4" type="submit">Filter</button>
                                <a href="{{ url()->current() }}"><button class="btn bg-warning btn-warning px-4" type="button">Clear</button></a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Unit Pengaju</th>
                                <th scope="col">Nomor PPUF</th>
                                <th scope="col">Nama Kegiatan</th>
                                <th scope="col">Latar Belakang</th>
                                <th scope="col">Tempat dan Waktu</th>
                                <th scope="col">RAB Diajukan</th>
                                <th scope="col">RAB Disetujui</th>
                                <th scope="col">Periode Pencairan</th>
                                <th scope="col">Bukti Pencairan</th>
                                <th scope="col">File LPJ</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($submissions as $submission)
                            <tr>
                                <th scope="row">{{ $loop->iteration + $submissions->firstItem() - 1 }}</th>
                                <td>{{ $submission->ppuf->author->role }}</td>
                                <td>{{ $submission->ppuf->ppuf_number }}</td>
                                <td>{{ $submission->ppuf->program_name }}</td>
                                <td>{{ $submission->background }}</td>
                                <td>{{ $submission->place }}, {{ $submission->date }}</td>
                                <td>{{ $submission->budget }}</td>
                                <td>{{ $submission->approved_budget }}</td>
                                <td>{{ $submission->period?->period }}</td>
                                <td>
                                    <ul class="tw-list-disc ml-3 ">
                                        @foreach ($submission->disbursements as $disbursement)
                                        <li>
                                            <a href="{{ route('pencairan.show', $disbursement->id) }}" target="_blank">
                                                {{ $disbursement->budget }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    @if ($submission->report_file)
                                    <u>
                                        <a class="text-primary" href="{{ route('submission.download-lpj', $submission->id) }}" target="_blank">
                                            File LPJ
                                        </a>
                                    </u>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-sm btn-info  mr-1 mb-1" href="{{ route('submission.show', $submission->id) }}">
                                            <i class="fas fa-fw fa-info"></i>
                                        </a>
                                        @if ($submission->role_id == $roleId)
                                        <a class="btn btn-sm btn-primary mr-1 mb-1" href="#" data-toggle="modal" data-target="#editModal{{ $submission->id }}">
                                            <i class="fas fa-fw fa-check"></i>
                                        </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-right ">
                        {{ $submissions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($submissions as $submission)
<div class="modal fade" id="editModal{{ $submission->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form LPJ {{ $submission->ppuf->author->role }} -
                    {{ $submission->ppuf->ppuf_number }}
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="submissionForm" action="{{ route('submission.aksi-lpj', ['submission' => $submission->id]) }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <textarea id="note" name="note" class="form-control" required placeholder="Tambahkan catatan untuk pengajuan ini"></textarea>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <input id="actionInput" type="hidden" name="action" value="">
                            <button id="revisiButton" type="button" class="btn btn-sm bg-danger btn-danger mr-2">Revisi</button>
                            <button id="terimaButton" type="button" class="btn btn-sm bg-primary btn-primary">Terima Pengajuan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var forms = document.querySelectorAll('#submissionForm');

        forms.forEach(function(form) {
            form.querySelector('#revisiButton').addEventListener('click', function() {
                form.querySelector('#actionInput').value = 'revisi';
                form.submit();
            });

            form.querySelector('#terimaButton').addEventListener('click', function() {
                form.querySelector('#actionInput').value = 'terima';
                form.submit();
            });
        });
    });
</script>
@endsection