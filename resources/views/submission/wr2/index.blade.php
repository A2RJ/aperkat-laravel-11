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

                <div id="successMessage" class="alert alert-success" style="display: none;">
                    Pengajuan pada periode terpilih berhasil diterima. Halaman akan dimuat ulang dalam <span id="countdown"></span>.
                </div>

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
                                <input class="form-control " type="text" id="keyword" name="keyword" value="{{ request('keyword') }}" placeholder="Keyword">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-sm">
                                <select class="w-100 border rounded selectpicker" id="period" name="period" data-live-search="true">
                                    <option value="">Pilih Periode</option>
                                    @foreach ($periods as $period)
                                    <option value="{{ $period->id }}" {{ request('period') == $period->id ? 'selected' : '' }}>{{ $period->period }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if (request('period') && request('status') == 'need approve')
                            <div class="col-sm">
                                <button id="approveSubmission" class="btn bg-success btn-success">Terima pengajuan</button>
                            </div>
                            @endif
                            <div class="col-sm">
                                <button class="btn bg-primary btn-primary " type="submit">Filter</button>
                                <a href="{{ url()->current() }}"><button class="btn bg-warning btn-warning" type="button">Clear</button></a>
                            </div>
                            <div class="col-sm">
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
                                <th scope="col">RAB diajukan</th>
                                <th scope="col">RAB disetujui</th>
                                <th scope="col">Periode</th>
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
                                    <div class="d-flex">
                                        <a class="btn btn-sm btn-success mr-1 mb-1" href="{{ route('submission.show', $submission->id) }}" target="_blank">
                                            <i class="fas fa-fw fa-info"></i>
                                        </a>
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
@endsection

@section('scriptjs')
<script src="/sb-admin-2/vendor/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" charset="utf-8">
    $(function() {
        $('.selectpicker').selectpicker()

        $('#approveSubmission').click(function(e) {
            e.preventDefault();
            var period = "{{ request('period') }}";

            if (!period) {
                return;
            }

            $.ajax({
                url: "{{ route('submission.wr2.approve', ['period' => ':period']) }}".replace(':period', period),
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#successMessage').show();

                    var secondsLeft = 5; // Set countdown awal 5 detik
                    updateCountdown(secondsLeft); // Tampilkan countdown awal

                    // Jalankan countdown
                    var countdownInterval = setInterval(function() {
                        secondsLeft--; // Kurangi detik yang tersisa
                        updateCountdown(secondsLeft); // Tampilkan countdown yang diperbarui

                        // Jika waktu countdown habis, reload halaman
                        if (secondsLeft <= 0) {
                            clearInterval(countdownInterval); // Hentikan countdown
                            location.reload(); // Reload halaman
                        }
                    }, 1000);
                },
                error: (xhr, status, error) => console.error(error)
            });
        });

        function updateCountdown(seconds) {
            // Tampilkan countdown di elemen dengan id "countdown"
            document.getElementById("countdown").innerHTML = seconds + " detik";
        }
    });
</script>
@endsection