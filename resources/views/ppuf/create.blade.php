@extends('layout.index')

@section('title', 'Form PPUF | APERKAT')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Form PPUF</h6>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('ppuf.store') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-12 col-lg-8 mb-3">
                                <label for="role_id">Unit Pengaju</label>
                                <select
                                    class="w-100 border rounded selectpicker @error('role_id') is-invalid @enderror"
                                    id="role_id" name="role_id" data-live-search="true" required>
                                    <option>Pilih Unit Pengaju</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('role_id') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="ppuf_number">Nomor PPUF</label>
                                <input type="number" class="form-control @error('ppuf_number') is-invalid @enderror"
                                    id="ppuf_number" name="ppuf_number" required value="{{ old('ppuf_number') }}">
                                @error('ppuf_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="iku1_id">IKU 1</label>
                                <select class="custom-select w-100 border rounded @error('iku1_id') is-invalid @enderror"
                                    id="iku1_id" name="iku1_id" data-live-search="true" required>
                                    <option>Pilih IKU</option>
                                    @foreach ($ikus['iku1'] as $iku)
                                        <option value="{{ $iku->id }}"
                                            {{ old('iku1_id') == $iku->id ? 'selected' : '' }}>
                                            {{ $iku->iku }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('iku1_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="iku2_id">IKU 2</label>
                                <select class="custom-select w-100 border rounded @error('iku2_id') is-invalid @enderror"
                                    id="iku2_id" name="iku2_id" data-live-search="true" required>
                                    <option>Pilih IKU</option>
                                    @foreach ($ikus['iku2'] as $iku)
                                        <option value="{{ $iku->id }}"
                                            {{ old('iku2_id') == $iku->id ? 'selected' : '' }}
                                            data-chained="{{ $iku->parent_id }}">
                                            {{ $iku->iku }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('iku2_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="iku3_id">IKU 3</label>
                                <select class="custom-select w-100 border rounded @error('iku3_id') is-invalid @enderror"
                                    id="iku3_id" name="iku3_id" data-live-search="true" required>
                                    <option>Pilih IKU</option>
                                    @foreach ($ikus['iku3'] as $iku)
                                        <option value="{{ $iku->id }}"
                                            {{ old('iku3_id') == $iku->id ? 'selected' : '' }}
                                            data-chained="{{ $iku->parent_id }}">
                                            {{ $iku->iku }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('iku3_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="program_name">Nama Program</label>
                                <input type="text" class="form-control @error('program_name') is-invalid @enderror"
                                    id="program_name" name="program_name" required value="{{ old('program_name') }}">
                                @error('program_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="description">Deskripsi</label>
                                <textarea rows="5" class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="activity_type">Jenis Program</label>
                                <select
                                    class="w-100 border rounded selectpicker @error('activity_type') is-invalid @enderror"
                                    id="activity_type" name="activity_type" data-live-search="true" required>
                                    <option>Pilih Jenis Program</option>
                                    @foreach ($program_types as $program_type)
                                        <option value="{{ $program_type }}"
                                            {{ old('activity_type') == $program_type ? 'selected' : '' }}>
                                            {{ ucfirst($program_type) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('activity_type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="execution_location">Tempat Pelaksanaan</label>
                                <input type="text"
                                    class="form-control @error('execution_location') is-invalid @enderror"
                                    id="execution_location" name="execution_location" required
                                    value="{{ old('execution_location') }}">
                                @error('execution_location')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="execution_time">Waktu Pelaksanaan</label>
                                <select
                                    class="w-100 border rounded selectpicker @error('execution_time') is-invalid @enderror"
                                    id="execution_time" name="execution_time" data-live-search="true" required>
                                    <option>Pilih Waktu</option>
                                    @foreach ($activity_dates as $activity_date)
                                        <option value="{{ $activity_date }}"
                                            {{ old('execution_time') == $activity_date ? 'selected' : '' }}>
                                            {{ ucfirst($activity_date) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('execution_time')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="detail">Detail (Optional)</label>
                                <textarea rows="4" class="form-control @error('detail') is-invalid @enderror" id="detail" name="detail">{{ old('detail') }}</textarea>
                                @error('detail')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="planned_expenditure">RAB</label>
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
                        <div>
                            <button type="submit" class="btn btn-primary float-right ">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var rupiah = document.getElementById('planned_expenditure');
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
@endsection

@section('scriptjs')
    <script src="/sb-admin-2/vendor/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="/sb-admin-2/vendor/jquery-select-chained/jquery.chained.js" type="text/javascript" charset="utf-8">
    </script>
    <script type="text/javascript" charset="utf-8">
        $(function() {
            $('.selectpicker').selectpicker()
            $("#iku2_id").chained("#iku1_id");
            $("#iku3_id").chained("#iku2_id");
        });
    </script>
@endsection
