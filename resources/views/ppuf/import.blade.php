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

                    <form action="{{ route('ppuf.preview') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group  mb-3">
                            <label for="role_id">Unit Pengaju</label>
                            <select class="w-100 border rounded selectpicker @error('role_id') is-invalid @enderror"
                                id="role_id" name="role_id" data-live-search="true" required>
                                <option>Pilih Unit Pengaju</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file">File PPUF</label>
                            <input id="file" class="form-control  @error('file') is-invalid @enderror" type="file"
                                name="file">
                            @error('file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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

@section('scriptjs')
    <script src="/sb-admin-2/vendor/bootstrap-select/bootstrap-select.min.js"></script>
    </script>
    <script type="text/javascript" charset="utf-8">
        $(function() {
            $('.selectpicker').selectpicker()
        });
    </script>
@endsection
