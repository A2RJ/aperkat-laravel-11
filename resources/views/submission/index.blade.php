@extends('layout.index')

@section('title', 'Daftar Pengajuan PPUF | APERKAT')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pengajuan</h6>
            </div>

            <div class="card-body p-4">
                <a href="{{ route('submission.create') }}" class="btn btn-sm bg-primary btn-primary mb-4 ">Tambah Pengajuan</a>

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
                                <th scope="col">RAB</th>
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
                                <td>{{ substr($submission->ppuf->program_name, 0, 50) }}</td>
                                <td>{{ substr($submission->background, 0, 50) }}</td>
                                <td>{{ ucfirst($submission->place) }}, {{ ucfirst($submission->ppuf->date) }}</td>
                                <td>{{ $submission->budget }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-sm btn-success mr-1 mb-1" href="{{ route('submission.show', $submission->id) }}" target="_blank">
                                            <i class="fas fa-fw fa-info"></i>
                                        </a>

                                        @if ($submission->ppuf->author->id == Auth::user()->strictRole->id)
                                        @if ($submission->status->last()->status == 0 && $submission->status->last()->role_id != 2)
                                        <a class="btn btn-sm btn-success mr-1 mb-1" href="{{ route('submission.edit', $submission->id) }}" target="_blank">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </a>
                                        @endif
                                        <form action="{{ route('submission.destroy', $submission->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger bg-danger " onclick="return confirm('Are you sure you want to delete this item?')">
                                                <i class="fas fa-fw fa-trash"></i>
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
@endsection