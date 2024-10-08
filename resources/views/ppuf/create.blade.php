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
                            <div class="col-12 col-lg-6 mb-3">
                                <label for="role_id">Unit Pengaju</label>
                                <select class="w-100 border rounded selectpicker @error('role_id') is-invalid @enderror"
                                    id="role_id" name="role_id" data-live-search="true" required>
                                    <option>Pilih Unit Pengaju</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ old('role_id') == $role->id ? 'selected' : '' }}>
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
                            <div class="col-12 col-lg-6 mb-3">
                                <label for="ppuf_number">Nomor PPUF</label>
                                <input type="number" class="form-control @error('ppuf_number') is-invalid @enderror"
                                    id="ppuf_number" name="ppuf_number" required value="{{ old('ppuf_number') }}">
                                @error('ppuf_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <label for="period">Tahun Perode (Misal: 2024)</label>
                                <input type="number" class="form-control @error('period') is-invalid @enderror"
                                    id="period" name="period" required value="{{ old('period') }}">
                                @error('period')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <label for="program_name">Nama Program</label>
                               <textarea class="form-control @error('program_name') is-invalid @enderror" id="program_name" name="program_name"
                                    required>{{ old('program_name') }}</textarea>
                                @error('program_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <label for="iku">Indikator Kinerja Utama</label>
                               <textarea class="form-control @error('iku') is-invalid @enderror" id="iku" name="iku"
                                    required>{{ old('iku') }}</textarea>
                                @error('iku')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="description">Deskripsi</label>
                                <textarea rows="5" class="form-control @error('description') is-invalid @enderror" id="description"
                                    name="description" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="place">Tempat Pelaksanaan</label>
                                <input type="text" class="form-control @error('place') is-invalid @enderror"
                                    id="place" name="place" required
                                    value="{{ old('place') }}">
                                @error('place')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="date">Waktu Pelaksanaan</label>
                                <select
                                    class="w-100 border rounded selectpicker @error('date') is-invalid @enderror"
                                    id="date" name="date" data-live-search="true" required>
                                    <option>Pilih Waktu</option>
                                    @foreach ($activity_dates as $activity_date)
                                        <option value="{{ $activity_date }}"
                                            {{ old('date') == $activity_date ? 'selected' : '' }}>
                                            {{ ucfirst($activity_date) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('date')
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
                            <div class="col-12 mb-3">
                                <label for="detail">Keterangan Tambahan (Optional)</label>
                                <textarea rows="4" class="form-control @error('detail') is-invalid @enderror" id="detail" name="detail">{{ old('detail') }}</textarea>
                                @error('detail')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="budget">RAB</label>
                                <input type="text"
                                    class="form-control @error('budget') is-invalid @enderror"
                                    id="budget" name="budget" required
                                    value="{{ old('budget') }}">
                                @error('budget')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('ppuf.index') }}" class="btn btn-dark ">Cancel</a>
                            <button type="submit" class="btn btn-primary float-right ">Save</button>
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
