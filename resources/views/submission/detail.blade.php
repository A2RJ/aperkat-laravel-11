@extends('layout.index')

@section('title', 'Detail Pengajuan PPUF | APERKAT')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Status Pengajuan</h6>
                </div>

                {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
                <div class="card-body p-4 flex justify-center">
                    <ol class="items-center sm:flex">
                        @foreach ($statuses as $status)
                            <li class="relative mb-6 sm:mb-0">
                                <div class="flex items-center">
                                    <div
                                        class="z-10 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-blue-100 ring-0 ring-white sm:ring-8 dark:bg-blue-900 dark:ring-gray-900">
                                        @if ($status['status'] && $status['status']['status'])
                                            <svg class="h-10 w-10 text-green-800 dark:text-green-300"
                                                xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor" fill-rule="evenodd"
                                                    d="M12 21a9 9 0 0 0 7.51-13.961l-7.155 7.95a2 2 0 0 1-2.687.262L6.4 12.8a1 1 0 0 1 1.2-1.6l3.268 2.451l7.346-8.161A9 9 0 1 0 12 21"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        @else
                                            <svg class="h-10 w-10 text-blue-800 dark:text-blue-300"
                                                xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M12 2A10 10 0 1 0 22 12A10 10 0 0 0 12 2Zm0 18a8 8 0 1 1 8-8A8 8 0 0 1 12 20Z"
                                                    opacity=".5" />
                                                <path fill="currentColor" d="M20 12h2A10 10 0 0 0 12 2V4A8 8 0 0 1 20 12Z">
                                                    <animateTransform attributeName="transform" dur="1s"
                                                        from="0 12 12" repeatCount="indefinite" to="360 12 12"
                                                        type="rotate" />
                                                </path>
                                            </svg>
                                        @endif
                                    </div>
                                    @if (!$loop->last)
                                        <div class="hidden h-0.5 w-full bg-gray-200 sm:flex dark:bg-gray-700"></div>
                                    @endif
                                </div>
                                <div class="mt-3 sm:pe-8">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        {{ $status['role'] }}
                                    </h3>
                                    <p class="mb-2 block text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
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
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8 mt-4 ">
            <div class="card shadow">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Form Pengajuan</h6>
                </div>

                <div class="card-body p-4">
                    <div class="form-row">
                        <div class="col-12 col-lg-2 mb-3">
                            <label for="ppuf_id">Nomor PPUF</label>
                            <input type="text" class="form-control" value="{{ $submission->ppuf->ppuf_number }}">
                        </div>
                        <div class="col-12 col-lg-4 mb-3">
                            <label for="ppuf_name">Nama Kegiatan</label>
                            <input type="text" class="form-control" value="{{ $submission->ppuf->program_name }}">
                        </div>
                        <div class="col-12 col-lg-3 mb-3">
                            <label for="rab">RAB Kegiatan</label>
                            <input type="text" class="form-control" value="{{ $submission->ppuf->budget }}">
                        </div>
                        <div class="col-12 col-lg-3 mb-3">
                            <label for="activity_type">Jenis Kegiatan</label>
                            <input type="text" class="form-control" value="{{ $submission->ppuf->activity_type }}">
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
                        <div class="col-12 col-lg-3 mb-3">
                            <label for="iku3_id">IKU 3</label>
                            <textarea rows="3" class="form-control" value="">{{ $submission->iku3->iku }}</textarea>
                        </div>
                        <div class="col-12 col-lg-4 mb-3">
                            <label for="vendor">Vendor</label>
                            <input type="text" class="form-control" value="{{ $submission->vendor }}">
                        </div>
                        <div class="col-12 col-lg-3 mb-3">
                            <label for="place">Tempat Pelaksanaan</label>
                            <input type="text" class="form-control" value="{{ $submission->place }}">
                        </div>
                        <div class="col-12 col-lg-2 mb-3">
                            <label for="date">Waktu Pelaksanaan</label>
                            <input type="text" class="form-control" value="{{ $submission->date }}">
                        </div>
                        <div class="col-12 col-lg-3 mb-3">
                            <label for="budget">RAB</label>
                            <input type="text" class="form-control" value="{{ $submission->budget }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 mt-4 ">
            <div class="row">
                <div class="col-12 ">
                    <div class="card shadow">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Lampiran</h6>
                        </div>

                        <div class="card-body p-4">
                            <div class="mb-4">
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-download fa-sm text-white-50"></i> Print TOR
                                </a>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-download fa-sm text-white-50"></i> Template laporan keuangan
                                </a>
                            </div>

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
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-4 ">
                    <div class="card shadow">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Pengajuan</h6>
                        </div>

                        <div class="card-body p-4">
                            <ol class="relative border-s border-gray-200 dark:border-gray-700">
                                @foreach ($submission->status as $status)
                                    <li class="mb-10 ms-4">
                                        <div
                                            class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                                        </div>
                                        <time
                                            class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $status->created_at }}</time>
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            {{ $status->role->role }}</h3>
                                        <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
                                            {{ $status->message }}.</p>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
