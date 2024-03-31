@extends('layout.index')

@section('title', 'Form Pengajuan PPUF | APERKAT')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Form Pengajuan PPUF</h6>
            </div>

            <div class="card-body p-4">

                @if (session()->has('failed'))
                <div class="alert alert-danger">
                    {{ session()->get('failed') }}.
                </div>
                @endif

                <form action="{{ route('submission.store') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="col-12 col-lg-2 mb-3">
                            <label for="ppuf_id">Nomor PPUF</label>
                            <select class="w-100 border rounded selectpicker @error('ppuf_id') is-invalid @enderror" id="ppuf_id" name="ppuf_id" data-live-search="true">
                                <option>Pilih Nomor PPUF</option>
                                @foreach ($ppufs as $ppuf)
                                <option value="{{ $ppuf->id }}" {{ old('ppuf_id') == $ppuf->id ? 'selected' : '' }}>
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
                            <label for="rabkegiatan">RAB Kegiatan</label>
                            <select class="w-100 border rounded custom-select" id="rabkegiatan" name="rabkegiatan">
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
                            <textarea rows="4" class="form-control @error('background') is-invalid @enderror" id="background" name="background">{{ old('background') }}</textarea>
                            @error('background')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12 col-lg-4  mb-3">
                            <label for="speaker">Pemateri</label>
                            <textarea class="form-control @error('speaker') is-invalid @enderror" id="speaker" name="speaker">{{ old('speaker') }}</textarea>
                            @error('speaker')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12 col-lg-4  mb-3">
                            <label for="participant">Peserta</label>
                            <textarea class="form-control @error('participant') is-invalid @enderror" id="participant" name="participant">{{ old('participant') }}</textarea>
                            @error('participant')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12 col-lg-4  mb-3">
                            <label for="rundown">Rundown</label>
                            <textarea class="form-control @error('rundown') is-invalid @enderror" id="rundown" name="rundown">{{ old('rundown') }}</textarea>
                            @error('rundown')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12 col-lg-4 mb-3">
                            <label for="iku1_id">IKU 1</label>
                            <select class="custom-select w-100 border rounded @error('iku1_id') is-invalid @enderror" id="iku1_id" name="iku1_id" data-live-search="true">
                                <option>Pilih IKU</option>
                                @foreach ($ikus['iku1'] as $iku)
                                <option value="{{ $iku->id }}" {{ old('iku1_id') == $iku->id ? 'selected' : '' }}>
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
                            <select class="custom-select w-100 border rounded @error('iku2_id') is-invalid @enderror" id="iku2_id" name="iku2_id" data-live-search="true">
                                <option>Pilih IKU</option>
                                @foreach ($ikus['iku2'] as $iku)
                                <option value="{{ $iku->id }}" {{ old('iku2_id') == $iku->id ? 'selected' : '' }} data-chained="{{ $iku->parent_id }}">
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
                            <select class="custom-select w-100 border rounded @error('iku3_id') is-invalid @enderror" id="iku3_id" name="iku3_id" data-live-search="true">
                                <option>Pilih IKU</option>
                                @foreach ($ikus['iku3'] as $iku)
                                <option value="{{ $iku->id }}" {{ old('iku3_id') == $iku->id ? 'selected' : '' }} data-chained="{{ $iku->parent_id }}">
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
                            <input type="text" class="form-control @error('vendor') is-invalid @enderror" id="vendor" name="vendor" value="{{ old('vendor') }}">
                            @error('vendor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12 col-lg-4 mb-3">
                            <label for="place">Tempat Pelaksanaan</label>
                            <input type="text" class="form-control @error('place') is-invalid @enderror" id="place" name="place" value="{{ old('place') }}">
                            @error('place')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12 col-lg-4 mb-3">
                            <label for="date">Waktu Pelaksanaan</label>
                            <select class="w-100 border rounded selectpicker @error('date') is-invalid @enderror" id="date" name="date" data-live-search="true">
                                <option value="">Pilih Waktu</option>
                                @foreach ($activity_dates as $activity_date)
                                <option value="{{ $activity_date }}" {{ old('date') == $activity_date ? 'selected' : '' }}>
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
                    </div>

                    <div class="form-group mb-3">
                        <label for="rab">Detail RAB</label>
                        <div id="rabs-container">
                            @foreach (old('rab', [['item' => '', 'qty' => '', 'harga_satuan' => '', 'total' => '', 'detail' => '']]) as $index => $row)
                            <div class="row mb-1 rab-{{ $index }} rab">
                                <div class="col-sm mb-1">
                                    <input type="text" class="form-control @error('rab.' . $index . '.item') is-invalid @enderror" id="item" name="rab[{{ $index }}][item]" placeholder="Item" value="{{ $row['item'] }}">
                                    @error('rab.' . $index . '.item')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm mb-1">
                                    <input type="number" class="form-control @error('rab.' . $index . '.qty') is-invalid @enderror" id="qty" name="rab[{{ $index }}][qty]" placeholder="Qty" value="{{ $row['qty'] }}" oninput="calculateTotal('{{ $index }}')">
                                    @error('rab.' . $index . '.qty')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm mb-1">
                                    <input type="number" class="form-control @error('rab.' . $index . '.harga_satuan') is-invalid @enderror" id="harga_satuan" name="rab[{{ $index }}][harga_satuan]" placeholder="Harga Satuan" value="{{ $row['harga_satuan'] }}" oninput="calculateTotal('{{ $index }}')">
                                    @error('rab.' . $index . '.harga_satuan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm mb-1">
                                    <input type="number" class="form-control @error('rab.' . $index . '.total') is-invalid @enderror" id="total" name="rab[{{ $index }}][total]" placeholder="Total" value="{{ $row['total'] }}" readonly>
                                    @error('rab.' . $index . '.total')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm mb-1">
                                    <input type="text" class="form-control @error('rab.' . $index . '.detail') is-invalid @enderror" id="detail" name="rab[{{ $index }}][detail]" placeholder="Detail" value="{{ $row['detail'] }}">
                                    @error('rab.' . $index . '.detail')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm mb-1">
                                    @if ($index == 0)
                                    <button class="btn btn-danger" type="button" disabled>Remove</button>
                                    @else
                                    <button class="btn bg-danger btn-danger" type="button" onclick="removeRab('{{ $index }}')">Remove</button>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-2 mb-3 row">
                            <div class="col-4">
                                <input type="text" class="form-control" id="totalRab" name="totalRab" value="Rp. 0">
                            </div>
                            <div class="col-4">
                                <button class="btn bg-primary btn-primary" type="button" onclick="addRab()">Tambah</button>
                            </div>
                        </div>
                    </div>


                    <div>
                        <button type="submit" class="btn bg-primary btn-primary float-right ">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function calculateTotal(index) {
        var qty = parseFloat(document.querySelector('.rab-' + index + ' input[name="rab[' + index + '][qty]"]').value);
        var hargaSatuan = parseFloat(document.querySelector('.rab-' + index + ' input[name="rab[' + index +
            '][harga_satuan]"]').value);
        var total = qty * hargaSatuan;
        console.log(total);
        if (!isNaN(total)) {
            document.querySelector('.rab-' + index + ' input[name="rab[' + index + '][total]"]').value = total;
            updateRabInput();
        }
    }


    function updateRabInput() {
        var totalRab = 0;
        var rabs = document.querySelectorAll('.rab');
        rabs.forEach(function(rab, index) {
            var qty = parseFloat(rab.querySelector('input[name="rab[' + index + '][qty]"]').value);
            var hargaSatuan = parseFloat(rab.querySelector('input[name="rab[' + index + '][harga_satuan]"]')
                .value);
            var total = qty * hargaSatuan;
            if (!isNaN(total)) {
                totalRab += total;
            }
        });
        document.getElementById('totalRab').value = formatRupiah(totalRab); // Menyimpan total dengan dua angka desimal
    }


    function addRab() {
        var rabsContainer = document.getElementById('rabs-container');
        var index = rabsContainer.querySelectorAll('.rab').length;
        var newRow = document.createElement('div');
        newRow.classList.add('row', 'mb-1', 'rab-' + index, 'rab');
        newRow.innerHTML = `
            <div class="col-sm mb-1">
                <input type="text" class="form-control" name="rab[${index}][item]" placeholder="Item">
            </div>
            <div class="col-sm mb-1">
                <input type="number" class="form-control" name="rab[${index}][qty]" placeholder="Qty" oninput="calculateTotal(${index})">
            </div>
            <div class="col-sm mb-1">
                <input type="number" class="form-control" name="rab[${index}][harga_satuan]" placeholder="Harga Satuan" oninput="calculateTotal(${index})">
            </div>
            <div class="col-sm mb-1">
                <input type="number" class="form-control" name="rab[${index}][total]" placeholder="Total" readonly>
            </div>
            <div class="col-sm mb-1">
                <input type="text" class="form-control" name="rab[${index}][detail]" placeholder="Detail">
            </div>
            <div class="col-sm mb-1">
                <button class="btn bg-danger btn-danger" type="button" onclick="removeRab(${index})">Remove</button>
            </div>
        `;
        rabsContainer.appendChild(newRow);
    }

    function removeRab(index) {
        var rabsContainer = document.getElementById('rabs-container');
        var rabToRemove = document.querySelector('.rab-' + index);
        rabsContainer.removeChild(rabToRemove);
        updateRabInput(); // Memanggil fungsi updateRabInput() setelah menghapus baris RAB
    }

    function formatRupiah(angka, prefix = 'Rp. ') {
        var number_string = angka.toString().replace(/[^0-9]/g, '');
        var split = number_string.split(',');
        var sisa = split[0].length % 3;
        var rupiah = split[0].substr(0, sisa);
        var ribuan = split[0].substr(sisa).match(/\d{3}/g);

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
        $("#rabkegiatan").chained("#ppuf_id");
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

        document.getElementById("activity_type").onchange = optional

        function optional() {
            var selectBox = document.getElementById("activity_type");
            var selectedText = selectBox.options[selectBox.selectedIndex].textContent;
            selectedText = selectedText.replace(/\s/g, '');

            var textareaPeserta = document.getElementById("participant");
            if (selectedText !== 'Program') {
                textareaPeserta.setAttribute('disabled', 'disabled');
            } else {
                textareaPeserta.removeAttribute('disabled');
            }

            var speaker = document.getElementById("speaker");
            if (selectedText !== 'Program') {
                speaker.setAttribute('disabled', 'disabled');
            } else {
                speaker.removeAttribute('disabled');
            }

            var rundown = document.getElementById("rundown");
            if (selectedText !== 'Program') {
                rundown.setAttribute('disabled', 'disabled');
            } else {
                rundown.removeAttribute('disabled');
            }

            var rundown = document.getElementById("vendor");
            if (selectedText === 'Program') {
                rundown.setAttribute('disabled', 'disabled');
            } else {
                rundown.removeAttribute('disabled');
            }
        };
        optional()
    });
</script>
@endsection