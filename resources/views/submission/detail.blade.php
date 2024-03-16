@extends('layout.index')

@section('title', 'Detail Pengajuan PPUF | APERKAT')

@section('content')
    <style>
        .timeline-steps {
            display: flex;
            justify-content: center;
            flex-wrap: wrap
        }

        .timeline-steps .timeline-step {
            align-items: center;
            display: flex;
            flex-direction: column;
            position: relative;
            margin: 1rem
        }

        @media (min-width:768px) {
            .timeline-steps .timeline-step:not(:last-child):after {
                content: "";
                display: block;
                border-top: .25rem dotted #3b82f6;
                width: 3.46rem;
                position: absolute;
                left: 7.5rem;
                top: .3125rem
            }

            .timeline-steps .timeline-step:not(:first-child):before {
                content: "";
                display: block;
                border-top: .25rem dotted #3b82f6;
                width: 3.8125rem;
                position: absolute;
                right: 7.5rem;
                top: .3125rem
            }
        }

        .timeline-steps .timeline-content {
            width: 10rem;
            text-align: center
        }

        .timeline-steps .timeline-content .inner-circle {
            border-radius: 1.5rem;
            height: 1rem;
            width: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #3b82f6
        }

        .timeline-steps .timeline-content .inner-circle:before {
            content: "";
            background-color: #3b82f6;
            display: inline-block;
            height: 3rem;
            width: 3rem;
            min-width: 3rem;
            border-radius: 6.25rem;
            opacity: .5
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Status Pengajuan</h6>
                </div>

                <div class="card-body p-4">
                    <div class="row">
                        <div class="col">
                            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                <div class="timeline-step">
                                    <div class="timeline-content" data-toggle="popover" data-trigger="hover"
                                        data-placement="top" title=""
                                        data-content="And here's some amazing content. It's very engaging. Right?"
                                        data-original-title="2003">
                                        <div class="inner-circle"></div>
                                        <p class="h6 mt-3 mb-1">Disetujui</p>
                                        <p class="h6 text-muted mb-0 mb-lg-0">Favland Founded</p>
                                    </div>
                                </div>
                                <div class="timeline-step">
                                    <div class="timeline-content" data-toggle="popover" data-trigger="hover"
                                        data-placement="top" title=""
                                        data-content="And here's some amazing content. It's very engaging. Right?"
                                        data-original-title="2004">
                                        <div class="inner-circle"></div>
                                        <p class="h6 mt-3 mb-1">Menunggu Persetujuan</p>
                                        <p class="h6 text-muted mb-0 mb-lg-0">Launched Trello</p>
                                    </div>
                                </div>
                                <div class="timeline-step">
                                    <div class="timeline-content" data-toggle="popover" data-trigger="hover"
                                        data-placement="top" title=""
                                        data-content="And here's some amazing content. It's very engaging. Right?"
                                        data-original-title="2005">
                                        <div class="inner-circle"></div>
                                        <p class="h6 mt-3 mb-1">2005</p>
                                        <p class="h6 text-muted mb-0 mb-lg-0">Launched Messanger</p>
                                    </div>
                                </div>
                                <div class="timeline-step">
                                    <div class="timeline-content" data-toggle="popover" data-trigger="hover"
                                        data-placement="top" title=""
                                        data-content="And here's some amazing content. It's very engaging. Right?"
                                        data-original-title="2010">
                                        <div class="inner-circle"></div>
                                        <p class="h6 mt-3 mb-1">2010</p>
                                        <p class="h6 text-muted mb-0 mb-lg-0">Open New Branch</p>
                                    </div>
                                </div>
                                <div class="timeline-step mb-0">
                                    <div class="timeline-content" data-toggle="popover" data-trigger="hover"
                                        data-placement="top" title=""
                                        data-content="And here's some amazing content. It's very engaging. Right?"
                                        data-original-title="2020">
                                        <div class="inner-circle"></div>
                                        <p class="h6 mt-3 mb-1">2020</p>
                                        <p class="h6 text-muted mb-0 mb-lg-0">In Fortune 500</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
