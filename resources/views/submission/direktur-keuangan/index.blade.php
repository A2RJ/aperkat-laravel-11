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
                                <input class="form-control " type="text" id="keyword" name="keyword" value="{{ request('keyword') }}" placeholder="Keyword">
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
                                <th scope="col">Status Pengajuan</th>
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
                                <td class="{{$submission->status->last()->status ? 'text-success ': 'text-warning ' }}">
                                    @if ($submission->status->last()->message == 'LPJ telah disetujui')
                                    Selesai
                                    @else
                                    {{ $submission->status->last()->role->role }}: {{ substr($submission->status->last()->message, 0, 10) }}...
                                    @endif
                                </td>
                                <td>{{ $submission->ppuf->ppuf_number }}</td>
                                <td>{{ $submission->ppuf->program_name }}</td>
                                <td>{{ ucfirst($submission->ppuf->date) }}</td>
                                <td>{{ $submission->background }}</td>
                                <td>{{ ucfirst($submission->place) }}, {{ ucfirst($submission->ppuf->date) }}</td>
                                <td>{{ $submission->budget }}</td>
                                <td>{{ $submission->approved_budget }}</td>
                                <td>{{ $submission->period?->period }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-sm btn-success mr-1 mb-1" href="{{ route('submission.show', $submission->id) }}" target="_blank">
                                            <i class="fas fa-fw fa-info"></i>
                                        </a>
                                        @if (!$submission->disbursement_period_id)
                                        @if ($submission->role_id == $roleId || $submission->role_id == 5)
                                        <a class="btn btn-sm btn-warning  mr-1 mb-1" href="#" data-toggle="modal" data-target="#editModal{{ $submission->id }}">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </a>
                                        @endif
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


{{-- Edit modal --}}
@foreach ($submissions as $submission)
<div class="modal fade" id="editModal{{ $submission->id }}" tabindex="-1" period="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" period="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Periode Pencairan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('submission.period', ['submission' => $submission->id]) }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <label for="submission_id">Detail PPUF</label>
                            <input type="text" class="form-control" id="submission_id" name="submission_id" value="{{ $submission->ppuf->author->role }} - {{ $submission->ppuf->ppuf_number }} - {{ $submission->budget }}" disabled>
                        </div>

                        <div class="col-12 mb-3 d-flex flex-column">
                            <label for="period_id">Periode</label>
                            <select class="w-100 border rounded selectpicker @error('period_id') is-invalid @enderror" id="period_id" name="period_id" data-live-search="true" required>
                                <option value="">Pilih Periode</option>
                                @foreach ($periods as $period)
                                <option value="{{ $period->id }}">{{ $period->period }}</option>
                                @endforeach
                            </select>
                            @error('period_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label for="approved_budget">RAB disetujui</label>
                            <input type="text" class="form-control @error('approved_budget') is-invalid @enderror" id="approved_budget" name="approved_budget" required value="{{ old('approved_budget', $submission->budget) }}">
                            @error('approved_budget')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-between text-white ">
                        <button class="btn btn-sm bg-secondary btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm bg-primary btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var rupiahElements = document.querySelectorAll('#approved_budget');

        rupiahElements.forEach(function(element) {
            element.addEventListener('keyup', function(e) {
                element.value = formatRupiah(this.value, 'Rp. ');
            });
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    });
</script>

@endsection

@section('scriptjs')
<script src="/sb-admin-2/vendor/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" charset="utf-8">
    $(function() {
        $('.selectpicker').selectpicker()
    });
</script>
@endsection