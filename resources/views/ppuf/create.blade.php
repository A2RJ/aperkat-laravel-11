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
                                <label for="requesting_unit">Unit Pengaju</label>
                                <select
                                    class="w-100 border rounded selectpicker @error('requesting_unit') is-invalid @enderror"
                                    id="requesting_unit" name="requesting_unit" data-live-search="true" required>
                                    <option>Pilih Unit Pengaju</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('requesting_unit') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('requesting_unit')
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
                                <label for="iku">IKU 1</label>
                                <select class="w-100 border rounded selectpicker @error('iku_1') is-invalid @enderror"
                                    id="iku_1" name="iku_1" data-live-search="true" required>
                                    <option>Pilih IKU</option>
                                    @foreach ($iku1 as $iku)
                                        <option value="{{ $iku->id }}"
                                            {{ old('iku_1') == $iku->id ? 'selected' : '' }}>
                                            {{ $iku->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('iku_1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="iku">IKU 2</label>
                                <select class="w-100 border rounded selectpicker @error('iku_2') is-invalid @enderror"
                                    id="iku_2" name="iku_2" data-live-search="true" required>
                                    <option>Pilih IKU</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('iku_2') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('iku_2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="iku">IKU 3</label>
                                <select class="w-100 border rounded selectpicker @error('iku_3') is-invalid @enderror"
                                    id="iku_3" name="iku_3" data-live-search="true" required>
                                    <option>Pilih IKU</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('iku_3') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('iku_3')
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
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ old('description') }}</textarea>
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
                                <input type="text" class="form-control @error('execution_location') is-invalid @enderror"
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
    <select id="mark" name="mark">
        <option value="">--</option>
        <option value="bmw">BMW</option>
        <option value="audi">Audi</option>
    </select>
    <select id="series" name="series">
        <option value="">--</option>

        <option value="series-1" data-chained="bmw">1 series</option>
        <option value="series-3" data-chained="bmw">3 series</option>
        <option value="series-5" data-chained="bmw">5 series</option>
        <option value="series-6" data-chained="bmw">6 series</option>
        <option value="series-7" data-chained="bmw">7 series</option>

        <option value="a1" data-chained="audi">A1</option>
        <option value="a3" data-chained="audi">A3</option>
        <option value="s3" data-chained="audi">S3</option>
        <option value="a4" data-chained="audi">A4</option>
        <option value="s4" data-chained="audi">S4</option>
        <option value="a5" data-chained="audi">A5</option>
        <option value="s5" data-chained="audi">S5</option>
        <option value="a6" data-chained="audi">A6</option>
        <option value="s6" data-chained="audi" selected="selected">S6</option>
        <option value="rs6" data-chained="audi">RS6</option>
        <option value="a8" data-chained="audi">A8</option>
    </select>
    <script type="text/javascript">
        var rupiah = document.getElementById('planned_expenditure');
        rupiah.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8">
    </script>
    <script src="/sb-admin-2/vendor/jquery-select-chained/jquery.chained.js?v=1.0.0"></script>

    <script>
        $("#series").chained("#mark");
    </script>
@endsection
