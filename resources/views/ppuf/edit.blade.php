@extends('layout.index')

@section('title', 'Form Edit PPUF | APERKAT')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit PPUF</h6>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('ppuf.store') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="work_unit">Work Unit</label>
                                <input type="text" class="form-control @error('work_unit') is-invalid @enderror"
                                    id="work_unit" name="work_unit" required value="{{ old('work_unit') }}" disabled>
                                @error('work_unit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="requesting_unit">Requesting Unit</label>
                                <input type="text" class="form-control @error('requesting_unit') is-invalid @enderror"
                                    id="requesting_unit" name="requesting_unit" required
                                    value="{{ old('requesting_unit') }}" disabled>
                                @error('requesting_unit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="ppuf_number">PPUF Number</label>
                                <input type="text" class="form-control @error('ppuf_number') is-invalid @enderror"
                                    id="ppuf_number" name="ppuf_number" required value="{{ old('ppuf_number') }}">
                                @error('ppuf_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="iku">IKU</label>
                                <input type="text" class="form-control @error('iku') is-invalid @enderror" id="iku"
                                    name="iku" required value="{{ old('iku') }}">
                                @error('iku')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="iku">IKU</label>
                                <input type="text" class="form-control @error('iku') is-invalid @enderror" id="iku"
                                    name="iku" required value="{{ old('iku') }}">
                                @error('iku')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="iku">IKU</label>
                                <input type="text" class="form-control @error('iku') is-invalid @enderror" id="iku"
                                    name="iku" required value="{{ old('iku') }}">
                                @error('iku')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="program_name">Program Name</label>
                                <input type="text" class="form-control @error('program_name') is-invalid @enderror"
                                    id="program_name" name="program_name" required value="{{ old('program_name') }}">
                                @error('program_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6 col-lg-4 mb-3">
                                <label for="activity_type">Activity Type</label>
                                <input type="text" class="form-control @error('activity_type') is-invalid @enderror"
                                    id="activity_type" name="activity_type" required value="{{ old('activity_type') }}">
                                @error('activity_type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6 col-lg-4 mb-3">
                                <label for="execution_location">Execution Location</label>
                                <input type="text" class="form-control @error('execution_location') is-invalid @enderror"
                                    id="execution_location" name="execution_location" required
                                    value="{{ old('execution_location') }}">
                                @error('execution_location')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6 col-lg-4 mb-3">
                                <label for="execution_time">Execution Time</label>
                                <input type="text" class="form-control @error('execution_time') is-invalid @enderror"
                                    id="execution_time" name="execution_time" required value="{{ old('execution_time') }}">
                                @error('execution_time')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="detail">Detail (Optional)</label>
                                <textarea class="form-control @error('detail') is-invalid @enderror" id="detail" name="detail" required>{{ old('detail') }}</textarea>
                                @error('detail')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="planned_expenditure">Planned Expenditure</label>
                                <input type="text"
                                    class="form-control @error('planned_expenditure') is-invalid @enderror"
                                    id="planned_expenditure" name="planned_expenditure" required
                                    value="{{ old('planned_expenditure') }}">
                                @error('planned_expenditure')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
