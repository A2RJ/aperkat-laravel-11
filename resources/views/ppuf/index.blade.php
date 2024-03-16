@extends('layout.index')

@section('title', 'PPUF | APERKAT')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">PPUF</h6>
                </div>

                <div class="card-body">
                    <div class="mb-4">
                        <a class="btn btn-sm btn-primary " href="{{ route('ppuf.create') }}">
                            <i class="fas fa-plus fa-sm text-white-50"></i>
                            Add PPUF
                        </a>
                        <a class="btn btn-sm btn-primary " href="{{ route('ppuf.import') }}">
                            <i class="fas fa-upload fa-sm text-white-50"></i> Import PPUF
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

                    <!-- Card Body -->
                    <div class="table-responsive ">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Unit Kerja</th>
                                    <th scope="col">Unit Pengaju</th>
                                    <th scope="col">Nomor PPUF</th>
                                    <th scope="col">Jenis Program</th>
                                    <th scope="col">Nama Program</th>
                                    <th scope="col">Tempat & Waktu</th>
                                    <th scope="col">RAB</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ppufs as $ppuf)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration + $ppufs->firstItem() - 1 }}</th>
                                        <td>{{ $ppuf->author->parent?->role }}</td>
                                        <td>{{ $ppuf->author->role }}</td>
                                        <td>{{ $ppuf->ppuf_number }}</td>
                                        <td>{{ ucfirst($ppuf->activity_type) }}</td>
                                        <td>{{ $ppuf->program_name }}</td>
                                        <td>{{ $ppuf->place }}, {{ $ppuf->date }}</td>
                                        <td>{{ $ppuf->budget }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-success mr-1 mb-1"
                                                    href="{{ route('ppuf.edit', $ppuf->id) }}">
                                                    <i class="fas fa-fw fa-edit"></i>
                                                </a>

                                                <form action="{{ route('ppuf.destroy', $ppuf->id) }}" method="POST">
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
                            {{ $ppufs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
