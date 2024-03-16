@extends('layout.index')

@section('title', 'Form Edit Pengajuan PPUF | APERKAT')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Pengajuan PPUF</h6>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('submission.update', $submission->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="col-12 col-lg-2 mb-3">
                                <label for="ppuf_id">Nomor PPUF</label>
                                <select class="w-100 border rounded selectpicker @error('ppuf_id') is-invalid @enderror"
                                    id="ppuf_id" name="ppuf_id" data-live-search="true" required>
                                    <option>Pilih Nomor PPUF</option>
                                    @foreach ($ppufs as $ppuf)
                                        <option value="{{ $ppuf->id }}"
                                            {{ old('ppuf_id', $submission->ppuf_id) == $ppuf->id ? 'selected' : '' }}>
                                            {{ $ppuf->ppuf_number }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('ppuf_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="ppuf_name">Nama Kegiatan</label>
                                <select class="w-100 border rounded custom-select" id="ppuf_name" name="ppuf_name">
                                    @foreach ($ppufs as $ppuf)
                                        <option value="{{ $ppuf->id }}" selected data-chained="{{ $ppuf->id }}">
                                            {{ $ppuf->program_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-lg-3 mb-3">
                                <label for="rab">RAB Kegiatan</label>
                                <select class="w-100 border rounded custom-select" id="rab" name="rab">
                                    @foreach ($ppufs as $ppuf)
                                        <option value="{{ $ppuf->id }}" selected data-chained="{{ $ppuf->id }}">
                                            {{ $ppuf->budget }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-lg-3 mb-3">
                                <label for="activity_type">Jenis Kegiatan</label>
                                <select class="w-100 border rounded custom-select" id="activity_type" name="activity_type">
                                    @foreach ($ppufs as $ppuf)
                                        <option value="{{ $ppuf->id }}" selected data-chained="{{ $ppuf->id }}">
                                            {{ ucfirst($ppuf->activity_type) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="background">Latar Belakang</label>
                                <textarea rows="4" class="form-control @error('background') is-invalid @enderror" id="background"
                                    name="background" required>{{ old('background', $submission->background) }}</textarea>
                                @error('background')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4  mb-3">
                                <label for="speaker">Pemateri</label>
                                <textarea class="form-control @error('speaker') is-invalid @enderror" id="speaker" name="speaker" required>{{ old('speaker', $submission->speaker) }}</textarea>
                                @error('speaker')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4  mb-3">
                                <label for="participant">Peserta</label>
                                <textarea class="form-control @error('participant') is-invalid @enderror" id="participant" name="participant" required>{{ old('participant', $submission->participant) }}</textarea>
                                @error('participant')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4  mb-3">
                                <label for="rundown">Rundown</label>
                                <textarea class="form-control @error('rundown') is-invalid @enderror" id="rundown" name="rundown" required>{{ old('rundown', $submission->rundown) }}</textarea>
                                @error('rundown')
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
                                            {{ old('iku1_id', $submission->iku1_id) == $iku->id ? 'selected' : '' }}>
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
                                            {{ old('iku2_id', $submission->iku2_id) == $iku->id ? 'selected' : '' }}
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
                                            {{ old('iku3_id', $submission->iku3_id) == $iku->id ? 'selected' : '' }}
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
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="vendor">Vendor</label>
                                <input type="text" class="form-control @error('vendor') is-invalid @enderror"
                                    id="vendor" name="vendor" required value="{{ old('vendor', $submission->vendor) }}">
                                @error('vendor')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="place">Tempat Pelaksanaan</label>
                                <input type="text" class="form-control @error('place') is-invalid @enderror"
                                    id="place" name="place" required value="{{ old('place', $submission->place) }}">
                                @error('place')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="date">Waktu Pelaksanaan</label>
                                <select class="w-100 border rounded selectpicker @error('date') is-invalid @enderror"
                                    id="date" name="date" data-live-search="true" required>
                                    <option>Pilih Waktu</option>
                                    @foreach ($activity_dates as $activity_date)
                                        <option value="{{ $activity_date }}"
                                            {{ old('date', $submission->date) == $activity_date ? 'selected' : '' }}>
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
                                <label for="budget">RAB</label>
                                <input type="text" class="form-control @error('budget') is-invalid @enderror"
                                    id="budget" name="budget" required value="{{ old('budget', $submission->budget) }}">
                                @error('budget')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="file">Upload File RAB (.XLSX)</label>
                                <input type="file" class="form-control" id="file" name="file">
                                <small class="success-feedback">
                                    Tidak perlu mengisi RAB jika meng-upload file RAB dan juga sebaliknya <br>
                                    <a href="#">Klik untuk donwload template</a>.
                                </small>
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
    <script src="/sb-admin-2/vendor/jquery-select-chained/jquery.chained.js" type="text/javascript" charset="utf-8">
    </script>
    <script type="text/javascript" charset="utf-8">
        $(function() {
            $('.selectpicker').selectpicker()
            $("#iku2_id").chained("#iku1_id");
            $("#iku3_id").chained("#iku2_id");
            $("#ppuf_name").chained("#ppuf_id");
            $("#rab").chained("#ppuf_id");
            $("#activity_type").chained("#ppuf_id");

            function checkDisable(selectId, inputId, selectedValue) {
                var selectValue = document.getElementById(selectId).value;
                var inputToDisable = document.getElementById(inputId);

                if (selectValue === selectedValue) {
                    inputToDisable.disabled = true;
                } else {
                    inputToDisable.disabled = false;
                }
            }
        });
    </script>
@endsection
