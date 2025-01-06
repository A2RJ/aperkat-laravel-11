@extends('layout.index')

@section('title', 'Periode Pencairan | APERKAT')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Periode Pencairan</h6>
            </div>

            <div class="card-body">
                <a class="btn btn-sm btn-primary mb-4" href="#" data-toggle="modal" data-target="#addModal">
                    Tambah Periode
                </a>

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}.
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        An error occurred with that action, please try again.
                    </div>
                @endif

                <!-- Card Body -->
                <div class="table-responsive ">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Periode</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($periods as $period)
                                <tr>
                                    <th scope="row">{{ $loop->iteration + $periods->firstItem() - 1 }}</th>
                                    <td>{{ $period->period }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-sm btn-success mr-1 mb-1" href="#" data-toggle="modal"
                                                data-target="#editModal{{ $period->id }}">
                                                <i class="fas fa-fw fa-edit"></i>
                                            </a>

                                            <form action="{{ route('disbursement-period.destroy', $period->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger bg-danger "
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
                        {{ $periods->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>

            <!-- Add Modal-->
            <div class="modal fade" id="addModal" tabindex="-1" period="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" period="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Periode Pencairan</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('disbursement-period.store') }}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="col-12 mb-3">
                                        <label for="period">Periode</label>
                                        <input type="text" class="form-control @error('period') is-invalid @enderror"
                                            id="period" name="period" required>
                                        @error('period')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-sm bg-secondary btn-secondary" type="button"
                                        data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-sm bg-primary btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Edit modal --}}
            @foreach ($periods as $period)
                <div class="modal fade" id="editModal{{ $period->id }}" tabindex="-1" period="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" period="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Periode Pencairan</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form
                                    action="{{ route('disbursement-period.update', ['disbursement_period' => $period->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="col-12 mb-3">
                                            <label for="period">period</label>
                                            <input type="text" class="form-control @error('period') is-invalid @enderror"
                                                id="period" name="period" required value="{{ $period->period }}">
                                            @error('period')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-sm bg-secondary btn-secondary" type="button"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-sm bg-primary btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection