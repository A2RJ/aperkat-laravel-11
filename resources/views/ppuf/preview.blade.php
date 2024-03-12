@extends('layout.index')

@section('title', 'Import PPUF | APERKAT')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Import PPUF</h6>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('ppuf.post-import') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="role_id">Unit Pengaju</label>
                            <select id="role_id" class="form-control" name="role_id">
                                <option>Text</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="excel">File PPUF</label>
                            <input id="excel" class="form-control" type="file" name="file">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary float-right ">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
