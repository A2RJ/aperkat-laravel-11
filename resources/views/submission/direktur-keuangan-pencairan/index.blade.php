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
                                <th scope="col">RAB Diajukan</th>
                                <th scope="col">RAB Disetujui</th>
                                <th scope="col">Periode Pencairan</th>
                                <th scope="col">Bukti Pencairan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($submissions as $submission)
                            <tr>
                                <th scope="row">{{ $loop->iteration + $submissions->firstItem() - 1 }}</th>
                                <td>{{ $submission->ppuf->author->role }}</td>
                                <td class="{{$submission->status->last()->status ? 'text-success ': 'text-warning ' }}">
                                    @if ($submission->status->last()->message == 'LPJ Kegiatan telah disetujui')
                                    Selesai
                                    @else
                                    {{ $submission->status->last()->role->role }}: {{ substr($submission->status->last()->message, 0, 10) }}...
                                    @endif
                                </td>
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
                                            @if (!$submission->is_disbursement_complete)
                                            <form action="{{ route('pencairan.destroy', $disbursement->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-danger " onclick="return confirm('Are you sure you want to delete this item?')">
                                                    <u> Hapus</u>
                                                </button>
                                            </form>
                                            @endif
                                        </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-sm btn-info  mr-1 mb-1" href="{{ route('submission.show', $submission->id) }}" target="_blank">
                                            <i class="fas fa-fw fa-info"></i>
                                        </a>
                                        @if ($submission->role_id == $roleId)
                                        <a class="btn btn-sm btn-primary mr-1 mb-1" href="#" data-toggle="modal" data-target="#editModal{{ $submission->id }}">
                                            <i class="fas fa-fw fa-upload"></i>
                                        </a>
                                        @endif
                                        @if ($submission->disbursements && count($submission->disbursements) && !$submission->is_disbursement_complete)
                                        <form action="{{ route('pencairan.update', $disbursement->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm bg-success btn-success mr-1 mb-1" onclick="return confirm('Anda telah selesai upload pencairan?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="m9.55 15.15l8.475-8.475q.3-.3.713-.3t.712.3q.3.3.3.713t-.3.712l-9.2 9.2q-.3.3-.7.3t-.7-.3L4.55 13q-.3-.3-.288-.712t.313-.713q.3-.3.713-.3t.712.3z" />
                                                </svg>
                                            </button>
                                        </form>
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
                <h5 class="modal-title" id="exampleModalLabel">Form Pencairan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pencairan.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <input type="hidden" name="submission_id" value="{{ $submission->id }}">
                        <div class="col-12 mb-3">
                            <label for="budget">Jumlah Pencairan</label>
                            <input type="text" class="form-control @error('budget') is-invalid @enderror" id="budget" name="budget" required>
                            @error('budget')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3 d-flex flex-column">
                            <label for="file">User</label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file" required>
                            @error('file')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-sm bg-secondary btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm bg-primary btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var rupiah = document.getElementById('budget');
    rupiah.addEventListener('keyup', function(e) {
        rupiah.value = formatRupiah(this.value, 'Rp. ');
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
</script>
@endforeach
@endsection