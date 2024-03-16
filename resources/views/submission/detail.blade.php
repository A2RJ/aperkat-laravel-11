@extends('layout.index')

@section('title', 'Detail Pengajuan PPUF | APERKAT')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Status Pengajuan</h6>
                </div>

                <div class="card-body p-4 flex justify-center">
                    <ol class="items-center sm:flex">

                        <li class="relative mb-6 sm:mb-0">
                            <div class="flex items-center">
                                <div
                                    class="z-10 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-blue-100 ring-0 ring-white sm:ring-8 dark:bg-blue-900 dark:ring-gray-900">
                                    <svg class="h-10 w-10 text-green-800 dark:text-green-300" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor" fill-rule="evenodd"
                                            d="M12 21a9 9 0 0 0 7.51-13.961l-7.155 7.95a2 2 0 0 1-2.687.262L6.4 12.8a1 1 0 0 1 1.2-1.6l3.268 2.451l7.346-8.161A9 9 0 1 0 12 21"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="hidden h-0.5 w-full bg-gray-200 sm:flex dark:bg-gray-700"></div>
                            </div>
                            <div class="mt-3 sm:pe-8">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Flowbite Library v1.0.0</h3>
                                <time
                                    class="mb-2 block text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Telah
                                    Disetujui</time>
                            </div>
                        </li>
                        <li class="relative mb-6 sm:mb-0">
                            <div class="flex items-center">
                                <div
                                    class="z-10 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-blue-100 ring-0 ring-white sm:ring-8 dark:bg-blue-900 dark:ring-gray-900">
                                    <svg class="h-10 w-10 text-blue-800 dark:text-blue-300"
                                        xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12 2A10 10 0 1 0 22 12A10 10 0 0 0 12 2Zm0 18a8 8 0 1 1 8-8A8 8 0 0 1 12 20Z"
                                            opacity=".5" />
                                        <path fill="currentColor" d="M20 12h2A10 10 0 0 0 12 2V4A8 8 0 0 1 20 12Z">
                                            <animateTransform attributeName="transform" dur="1s" from="0 12 12"
                                                repeatCount="indefinite" to="360 12 12" type="rotate" />
                                        </path>
                                    </svg>
                                </div>
                                <div class="hidden h-0.5 w-full bg-gray-200 sm:flex dark:bg-gray-700"></div>
                            </div>
                            <div class="mt-3 sm:pe-8">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Flowbite Library v1.2.0</h3>
                                <time
                                    class="mb-2 block text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Menunggu
                                    Persetujuan</time>
                            </div>
                        </li>
                        <li class="relative mb-6 sm:mb-0">
                            <div class="flex items-center">
                                <div
                                    class="z-10 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-blue-100 ring-0 ring-white sm:ring-8 dark:bg-blue-900 dark:ring-gray-900">
                                    <svg class="h-10 w-10 text-blue-800 dark:text-blue-300"
                                        xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12 2A10 10 0 1 0 22 12A10 10 0 0 0 12 2Zm0 18a8 8 0 1 1 8-8A8 8 0 0 1 12 20Z"
                                            opacity=".5" />
                                        <path fill="currentColor" d="M20 12h2A10 10 0 0 0 12 2V4A8 8 0 0 1 20 12Z">
                                            <animateTransform attributeName="transform" dur="1s" from="0 12 12"
                                                repeatCount="indefinite" to="360 12 12" type="rotate" />
                                        </path>
                                    </svg>
                                </div>
                                <div class="hidden h-0.5 w-full bg-gray-200 sm:flex dark:bg-gray-700"></div>
                            </div>
                            <div class="mt-3 sm:pe-8">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Flowbite Library v1.3.0</h3>
                                <time
                                    class="mb-2 block text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Menunggu
                                    Persetujuan</time>
                            </div>
                        </li>
                        <li class="relative mb-6 sm:mb-0">
                            <div class="flex items-center">
                                <div
                                    class="z-10 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-blue-100 ring-0 ring-white sm:ring-8 dark:bg-blue-900 dark:ring-gray-900">
                                    <svg class="h-10 w-10 text-blue-800 dark:text-blue-300"
                                        xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12 2A10 10 0 1 0 22 12A10 10 0 0 0 12 2Zm0 18a8 8 0 1 1 8-8A8 8 0 0 1 12 20Z"
                                            opacity=".5" />
                                        <path fill="currentColor" d="M20 12h2A10 10 0 0 0 12 2V4A8 8 0 0 1 20 12Z">
                                            <animateTransform attributeName="transform" dur="1s" from="0 12 12"
                                                repeatCount="indefinite" to="360 12 12" type="rotate" />
                                        </path>
                                    </svg>
                                </div>
                                <div class="hidden h-0.5 w-full bg-gray-200 sm:flex dark:bg-gray-700"></div>
                            </div>
                            <div class="mt-3 sm:pe-8">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Flowbite Library v1.2.0</h3>
                                <time
                                    class="mb-2 block text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Menunggu
                                    Persetujuan</time>
                            </div>
                        </li>
                        <li class="relative mb-6 sm:mb-0">
                            <div class="flex items-center">
                                <div
                                    class="z-10 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-blue-100 ring-0 ring-white sm:ring-8 dark:bg-blue-900 dark:ring-gray-900">
                                    <svg class="h-10 w-10 text-blue-800 dark:text-blue-300"
                                        xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12 2A10 10 0 1 0 22 12A10 10 0 0 0 12 2Zm0 18a8 8 0 1 1 8-8A8 8 0 0 1 12 20Z"
                                            opacity=".5" />
                                        <path fill="currentColor" d="M20 12h2A10 10 0 0 0 12 2V4A8 8 0 0 1 20 12Z">
                                            <animateTransform attributeName="transform" dur="1s" from="0 12 12"
                                                repeatCount="indefinite" to="360 12 12" type="rotate" />
                                        </path>
                                    </svg>
                                </div>
                                <div class="hidden h-0.5 w-full bg-gray-200 sm:flex dark:bg-gray-700"></div>
                            </div>
                            <div class="mt-3 sm:pe-8">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Flowbite Library v1.3.0</h3>
                                <time
                                    class="mb-2 block text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Menunggu
                                    Persetujuan</time>
                            </div>
                        </li>
                        <li class="relative mb-6 sm:mb-0">
                            <div class="flex items-center">
                                <div
                                    class="z-10 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-blue-100 ring-0 ring-white sm:ring-8 dark:bg-blue-900 dark:ring-gray-900">
                                    <svg class="h-10 w-10 text-blue-800 dark:text-blue-300"
                                        xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12 2A10 10 0 1 0 22 12A10 10 0 0 0 12 2Zm0 18a8 8 0 1 1 8-8A8 8 0 0 1 12 20Z"
                                            opacity=".5" />
                                        <path fill="currentColor" d="M20 12h2A10 10 0 0 0 12 2V4A8 8 0 0 1 20 12Z">
                                            <animateTransform attributeName="transform" dur="1s" from="0 12 12"
                                                repeatCount="indefinite" to="360 12 12" type="rotate" />
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-3 sm:pe-8">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Flowbite Library v1.3.0</h3>
                                <time
                                    class="mb-2 block text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Menunggu
                                    Persetujuan</time>
                            </div>
                        </li>
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
                    Lorem, ipsum.
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
                            Lorem, ipsum.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
