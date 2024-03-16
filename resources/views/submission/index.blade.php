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
                    <div class="mb-4">
                        <a class="btn btn-sm btn-primary " href="{{ route('submission.create') }}">
                            <i class="fas fa-plus fa-sm text-white-50"></i>
                            Tambah Pengajuan
                        </a>
                        <a href="#" class="btn btn-sm btn-primary">
                            <i class="fas fa-download fa-sm text-white-50"></i> Export PPUF
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
                                    <th scope="col">RAB</th>
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
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-success mr-1 mb-1"
                                                    href="{{ route('submission.edit', $submission->id) }}">
                                                    <i class="fas fa-fw fa-edit"></i>
                                                </a>
                                                <a class="btn btn-success mr-1 mb-1"
                                                    href="{{ route('submission.show', $submission->id) }}">
                                                    <i class="fas fa-fw fa-info"></i>
                                                </a>

                                                <form action="{{ route('submission.destroy', $submission->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this item?')">
                                                        <i class="fas fa-fw fa-trash"></i>
                                                    </button>
                                                </form>
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
