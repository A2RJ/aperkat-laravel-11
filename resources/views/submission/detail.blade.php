@extends('layout.index')

@section('title', 'Detail Pengajuan PPUF | APERKAT')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Status Pengajuan</h6>
            </div>

            <div class="card-body">
                <div class="tw-flex tw-justify-center tw-overflow-scroll no-scrollbar">
                    <ol class="sm:tw-flex">
                        @foreach ($statuses as $status)
                        <li class="tw-relative tw-mb-6 sm:tw-mb-0">
                            <div class="tw-flex tw-items-center">
                                <div class="tw-z-10 tw-flex tw-h-6 tw-w-6 tw-shrink-0 tw-items-center tw-justify-center tw-rounded-full tw-bg-blue-100 tw-ring-0 tw-ring-white sm:tw-ring-8">
                                    @if ($status['status'] && $status['status']['status'])
                                    <svg class="tw-h-10 tw-w-10 tw-text-green-800" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                        <path fill="currentColor" fill-rule="evenodd" d="M12 21a9 9 0 0 0 7.51-13.961l-7.155 7.95a2 2 0 0 1-2.687.262L6.4 12.8a1 1 0 0 1 1.2-1.6l3.268 2.451l7.346-8.161A9 9 0 1 0 12 21" clip-rule="evenodd" />
                                    </svg>
                                    @else
                                    <svg class="tw-h-10 tw-w-10 tw-text-blue-800 " xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M12 2A10 10 0 1 0 22 12A10 10 0 0 0 12 2Zm0 18a8 8 0 1 1 8-8A8 8 0 0 1 12 20Z" opacity=".5" />
                                        <path fill="currentColor" d="M20 12h2A10 10 0 0 0 12 2V4A8 8 0 0 1 20 12Z">
                                            <animateTransform attributeName="transform" dur="1s" from="0 12 12" repeatCount="indefinite" to="360 12 12" type="rotate" />
                                        </path>
                                    </svg>
                                    @endif
                                </div>
                                <div class="tw-hidden tw-h-0.5 tw-w-full tw-bg-gray-200 sm:tw-flex ">
                                </div>
                            </div>
                            <div class="tw-mt-3 sm:tw-pe-8">
                                <h3 class="tw-text-lg tw-font-semibold tw-text-gray-900 ">
                                    {{ $status['role'] }}
                                </h3>
                                <p class="tw-mb-2 tw-block tw-text-sm tw-font-normal tw-leading-none tw-text-gray-400 ">
                                    @if ($loop->first)
                                    Telah Diajukan
                                    @elseif ($status['status'] && $status['status']['status'])
                                    Telah Disetujui
                                    @else
                                    Menunggu Persetujuan
                                    @endif
                                </p>
                            </div>
                        </li>
                        @endforeach
                        <li class="tw-relative tw-mb-6 sm:tw-mb-0">
                            <div class="tw-flex tw-items-center">
                                <div class="tw-z-10 tw-flex tw-h-6 tw-w-6 tw-shrink-0 tw-items-center tw-justify-center tw-rounded-full tw-bg-blue-100 tw-ring-0 tw-ring-white sm:tw-ring-8">
                                    @if ($submission->is_done)
                                    <svg class="tw-h-10 tw-w-10 tw-text-green-800" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                        <path fill="currentColor" fill-rule="evenodd" d="M12 21a9 9 0 0 0 7.51-13.961l-7.155 7.95a2 2 0 0 1-2.687.262L6.4 12.8a1 1 0 0 1 1.2-1.6l3.268 2.451l7.346-8.161A9 9 0 1 0 12 21" clip-rule="evenodd" />
                                    </svg>
                                    @else
                                    <svg class="tw-h-10 tw-w-10 tw-text-blue-800 " xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M12 2A10 10 0 1 0 22 12A10 10 0 0 0 12 2Zm0 18a8 8 0 1 1 8-8A8 8 0 0 1 12 20Z" opacity=".5" />
                                        <path fill="currentColor" d="M20 12h2A10 10 0 0 0 12 2V4A8 8 0 0 1 20 12Z">
                                            <animateTransform attributeName="transform" dur="1s" from="0 12 12" repeatCount="indefinite" to="360 12 12" type="rotate" />
                                        </path>
                                    </svg>
                                    @endif
                                </div>
                            </div>
                            <div class="tw-mt-3 sm:tw-pe-8">
                                <h3 class="tw-text-lg tw-font-semibold tw-text-gray-900 ">
                                    Selesai
                                </h3>
                                <p class="tw-mb-2 tw-block tw-text-sm tw-font-normal tw-leading-none tw-text-gray-400 ">
                                    @if ($submission->is_done)
                                    Selesai
                                    @else
                                    Menunggu Persetujuan
                                    @endif
                                </p>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    @if ($approve)
    <div class="col-12 mt-4 d-block  d-lg-none">
        <div class="card shadow">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Aksi</h6>
            </div>

            <div class="card-body p-4">
                <form id="submissionForm" action="{{ route('submission.action', ['submission' => $submission->id]) }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <textarea id="note" name="note" class="form-control" required placeholder="Tambahkan catatan untuk pengajuan ini"></textarea>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <input id="actionInput" type="hidden" name="action" value="">
                            <button id="revisiButton" type="button" class="btn btn-sm bg-danger btn-danger mr-2">Revisi</button>
                            <button id="terimaButton" type="button" class="btn btn-sm bg-primary btn-primary {{ auth()->user()->dirKeuangan() ? 'd-none' : '' }}">Terima Pengajuan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    @if ($submission->is_disbursement_complete && !$submission->is_done && $author)
    <div class="col-12 mt-4 d-block  d-lg-none ">
        <div class="card shadow">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Aksi</h6>
            </div>

            <div class="card-body p-4">
                <form action="{{ route('submission.upload-lpj', ['submission' => $submission->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <input type="file" id="file" name="file" class="form-control" required />
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-sm bg-primary btn-primary">Upload LPJ
                                Kegiatan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    <div class="col-12 col-lg-8 mt-4 ">
        <div class="card shadow">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Form Pengajuan</h6>
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

                <div class="form-row">
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="ppuf_id">Nomor PPUF</label>
                        <input type="text" class="form-control" value="{{ $submission->ppuf->ppuf_number }}">
                    </div>
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="ppuf_name">Nama Kegiatan</label>
                        <input type="text" class="form-control" value="{{ $submission->ppuf->program_name }}">
                    </div>
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="rab">RAB Kegiatan</label>
                        <input type="text" class="form-control" value="{{ $submission->ppuf->budget }}">
                    </div>
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="activity_type">Jenis Kegiatan</label>
                        <input type="text" class="form-control" value="{{ $submission->ppuf->activity_type }}">
                    </div>
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="place">Tempat Pelaksanaan</label>
                        <input type="text" class="form-control" value="{{ $submission->place }}">
                    </div>
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="date">Waktu Pelaksanaan</label>
                        <input type="text" class="form-control" value="{{ $submission->ppuf->date }}">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="background">Latar Belakang</label>
                        <textarea rows="4" class="form-control" value="">{{ $submission->background }}</textarea>
                    </div>
                    <div class="col-12 col-lg-4  mb-3">
                        <label for="speaker">Pemateri</label>
                        <textarea rows="3" class="form-control" value="">{{ $submission->speaker }}</textarea>
                    </div>
                    <div class="col-12 col-lg-4  mb-3">
                        <label for="participant">Peserta</label>
                        <textarea rows="3" class="form-control" value="">{{ $submission->participant }}</textarea>
                    </div>
                    <div class="col-12 col-lg-4  mb-3">
                        <label for="rundown">Rundown</label>
                        <textarea rows="3" class="form-control" value="">{{ $submission->rundown }}</textarea>
                    </div>
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="iku1_id">IKU 1</label>
                        <textarea rows="3" class="form-control" value="">{{ $submission->iku1->iku }}</textarea>
                    </div>
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="iku2_id">IKU 2</label>
                        <textarea rows="3" class="form-control" value="">{{ $submission->iku2->iku }}</textarea>
                    </div>
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="iku3_id">IKU 3</label>
                        <textarea rows="3" class="form-control" value="">{{ $submission->iku3->iku }}</textarea>
                    </div>
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="vendor">Vendor</label>
                        <input type="text" class="form-control" value="{{ $submission->vendor }}">
                    </div>
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="budget">RAB Diajukan</label>
                        <input type="text" class="form-control" value="{{ $submission->budget }}">
                    </div>
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="budget">RAB Disetujui</label>
                        <input type="text" class="form-control" value="{{ $submission->approved_budget }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="rab">Detail RAB</label>
                        <div id="rabs-container">
                            @foreach ($submission->budget_detail as $index => $row)
                            <div class="row mb-1 rab-{{ $index }} rab">
                                <div class="col-sm mb-1">
                                    <input type="text" class="form-control" id="item" name="rab[{{ $index }}][item]" placeholder="Item" value="{{ $row['item'] }}">
                                </div>
                                <div class="col-sm mb-1">
                                    <input type="number" class="form-control" id="qty" name="rab[{{ $index }}][qty]" placeholder="Qty" value="{{ $row['qty'] }}">
                                </div>
                                <div class="col-sm mb-1">
                                    <input type="number" class="form-control" id="harga_satuan" name="rab[{{ $index }}][harga_satuan]" placeholder="Harga Satuan" value="{{ $row['harga_satuan'] }}">
                                </div>
                                <div class="col-sm mb-1">
                                    <input type="number" class="form-control" id="total" name="rab[{{ $index }}][total]" placeholder="Total" value="{{ $row['total'] }}" readonly>
                                </div>
                                <div class="col-sm mb-1">
                                    <input type="text" class="form-control" id="detail" name="rab[{{ $index }}][detail]" placeholder="Detail" value="{{ $row['detail'] }}">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4 mt-4 ">
        <div class="row">
            @if ($approve)
            <div class="col-12 d-none d-lg-block">
                <div class="card shadow">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Aksi</h6>
                    </div>

                    <div class="card-body p-4">
                        <form id="submissionForm" action="{{ route('submission.action', ['submission' => $submission->id]) }}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="col-12 mb-3">
                                    <textarea id="note" name="note" class="form-control" required placeholder="Tambahkan catatan untuk pengajuan ini"></textarea>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <input id="actionInput" type="hidden" name="action" value="">
                                    <button id="revisiButton" type="button" class="btn btn-sm bg-danger btn-danger mr-2">Revisi</button>
                                    <button id="terimaButton" type="button" class="btn btn-sm bg-primary btn-primary {{ auth()->user()->dirKeuangan() ? 'd-none' : '' }}">Terima Pengajuan</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            @endif
            @if ($submission->is_disbursement_complete && !$submission->is_done && $author)
            <div class="col-12 mb-4 d-none d-lg-block ">
                <div class="card shadow">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Aksi</h6>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('submission.upload-lpj', ['submission' => $submission->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-12 mb-3">
                                    <input type="file" id="file" name="file" class="form-control" required />
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-sm bg-primary btn-primary">Upload LPJ
                                        Kegiatan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-12 ">
                <div class="card shadow mt-4 ">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Lampiran</h6>
                    </div>

                    <div class="card-body p-4">
                        <div class="mb-4">
                            <a href="{{ route('submission.print', $submission->id) }}" target="_blank" class="btn btn-sm btn-primary mt-1">
                                <i class="fas fa-download fa-sm text-white-50"></i> Print TOR
                            </a>
                            <a href="/laporan-keuangan.docx" target="_blank" class="btn btn-sm btn-primary mt-1">
                                <i class="fas fa-download fa-sm text-white-50"></i> Template LPJ
                            </a>
                            @if ($submission->report_file)
                            <a href="{{ route('submission.download-lpj', $submission->id) }}" class="btn btn-sm btn-primary mt-1">
                                <i class="fas fa-download fa-sm text-white-50"></i> File LPJ
                                {{ $submission->ppuf->author->role }}
                            </a>
                            @endif
                            @foreach ($submission->disbursements as $disbursement)
                            <a href="{{ route('pencairan.show', $disbursement->id) }}" class="btn btn-sm btn-primary mt-1">
                                <i class="fas fa-download fa-sm text-white-50"></i> Bukti Pencairan {{ $loop->index + 1 }} ({{ $disbursement->budget }})
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4 ">
                <div class="card shadow">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Detail Pengajuan</h6>
                    </div>

                    <div class="card-body p-4 tw-max-h-[50vh] tw-overflow-y-auto">
                        <ol class="tw-relative tw-border-s tw-border-gray-200">
                            @foreach ($submission->status as $status)
                            <li class="tw-mb-10 tw-ms-4">
                                <div class="tw-absolute tw-w-3 tw-h-3 tw-bg-gray-200 tw-rounded-full tw-mt-1.5 tw--start-1.5 tw-border tw-border-white ">
                                </div>
                                <time class="tw-mb-1 tw-text-sm tw-font-normal tw-leading-none tw-text-gray-400 ">{{ $status->created_at }}</time>
                                <h3 class="tw-text-lg tw-font-semibold tw-text-gray-900 {{ $status->status ? 'text-success ': 'text-warning ' }}">
                                    {{ $status->role->role }}
                                </h3>
                                <p class="tw-mb-4 tw-text-base tw-font-normal tw-text-gray-500">
                                    {{ $status->message }}.
                                </p>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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