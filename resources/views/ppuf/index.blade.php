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
                    @if (auth()->user()->wr2() || auth()->user()->superAdmin())
                        <a class="btn btn-sm btn-primary " href="{{ route('ppuf.create') }}">
                            <i class="fas fa-plus fa-sm text-white-50"></i>
                            Add PPUF
                        </a>
                        <a class="btn btn-sm btn-primary " href="{{ route('ppuf.import') }}">
                            <i class="fas fa-upload fa-sm text-white-50"></i> Import PPUF
                        </a>
                    @endif
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

                <div class="mb-4">
                    <form action="{{ url()->current() }}" method="get">
                        <div class="row">
                            <div class="col-sm ">
                                <input class="form-control " type="number" id="year" name="year"
                                    value="{{ request('year') }}" placeholder="Tahun Periode" />
                            </div>
                            <div class="col-sm ">
                                <input class="form-control " type="text" id="keyword" name="keyword"
                                    value="{{ request('keyword') }}" placeholder="Keyword">
                            </div>
                            <div class="col-sm">
                                <button class="btn bg-primary btn-primary px-4" type="submit">Filter</button>
                                <a href="{{ url()->current() }}"><button class="btn bg-warning btn-warning px-4"
                                        type="button">Clear</button></a>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Card Body -->
                <div class="table-responsive ">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Unit Kerja</th>
                                <th scope="col">Unit Pengaju</th>
                                <th scope="col">Nomor PPUF</th>
                                <th scope="col">Periode</th>
                                <th scope="col">Status Pengajuan</th>
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
                                    <td>{{ $ppuf->period }}</td>
                                    <td class="{{$ppuf->submissions->count() ? 'text-success ' : 'text-warning ' }}">
                                        {{ $ppuf->submissions->count() ? 'Telah Diajukan' : 'Belum Diajukan' }}</td>
                                    <td>{{ ucfirst($ppuf->activity_type) }}</td>
                                    <td>{{ $ppuf->program_name }}</td>
                                    <td>{{ $ppuf->place }}, {{ $ppuf->date }}</td>
                                    <td>{{ $ppuf->budget_idr }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-sm btn-success mr-1 mb-1"
                                                href="{{ route('ppuf.edit', $ppuf->id) }}" target="_blank">
                                                <i class="fas fa-fw fa-edit"></i>
                                            </a>
                                            @if (auth()->user()->wr2() || auth()->user()->superAdmin())
                                                <form action="{{ route('ppuf.destroy', $ppuf->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger bg-danger "
                                                        onclick="return confirm('Are you sure you want to delete this item?')">
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
                        {{ $ppufs->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection