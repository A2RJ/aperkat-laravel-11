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
                    <form action="{{ route('submission.store') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-12 col-lg-2 mb-3">
                                <label for="ppuf_id">Nomor PPUF</label>
                                <select class="w-100 border rounded selectpicker @error('ppuf_id') is-invalid @enderror"
                                    id="ppuf_id" name="ppuf_id" data-live-search="true" required>
                                    <option>Pilih Nomor PPUF</option>
                                    @foreach ($ppufs as $ppuf)
                                        <option value="{{ $ppuf->id }}"
                                            {{ old('ppuf_id') == $ppuf->id ? 'selected' : '' }}>
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
                                    name="background" required>{{ old('background') }}</textarea>
                                @error('background')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4  mb-3">
                                <label for="speaker">Pemateri</label>
                                <textarea class="form-control @error('speaker') is-invalid @enderror" id="speaker" name="speaker" required>{{ old('speaker') }}</textarea>
                                @error('speaker')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4  mb-3">
                                <label for="participant">Peserta</label>
                                <textarea class="form-control @error('participant') is-invalid @enderror" id="participant" name="participant" required>{{ old('participant') }}</textarea>
                                @error('participant')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4  mb-3">
                                <label for="rundown">Rundown</label>
                                <textarea class="form-control @error('rundown') is-invalid @enderror" id="rundown" name="rundown" required>{{ old('rundown') }}</textarea>
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
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="vendor">Vendor</label>
                                <input type="text" class="form-control @error('vendor') is-invalid @enderror"
                                    id="vendor" name="vendor" required value="{{ old('vendor') }}">
                                @error('vendor')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                <label for="place">Tempat Pelaksanaan</label>
                                <input type="text" class="form-control @error('place') is-invalid @enderror"
                                    id="place" name="place" required value="{{ old('place') }}">
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
                                <label for="budget">RAB</label>
                                <input type="text" class="form-control @error('budget') is-invalid @enderror"
                                    id="budget" name="budget" required value="{{ old('budget') }}">
                                @error('budget')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <div class="min-w-max">
                                <div class="bg-white tw-overflow-x-scroll shadow-md rounded-lg">
                                    <table class="min-w-max w-full table-auto">
                                        <thead>
                                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                                <th style="width: 20%" class="py-3 px-6 text-left">Nama Item</th>
                                                <th style="width: 20%" class="py-3 px-6 text-left">Qty</th>
                                                <th style="width: 20%" class="py-3 px-6 text-left">Harga Satuan</th>
                                                <th style="width: 20%" class="py-3 px-6 text-left">Harga Total</th>
                                                <th style="width: 20%" class="py-3 px-6 text-left">Keterangan</th>
                                                <th style="width: 20%" class="py-3 px-6 text-left">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600 text-sm font-light" id="form-container">
                                            <div class="item-container">
                                                @foreach (old('rab', ['']) as $key => $value)
                                                    <tr class="border-b border-gray-200 hover:bg-gray-100 ">
                                                        <td class="text-left p-1">
                                                            <input type="text"
                                                                class="p-1 rounded border w-auto nama-item @error('nama_item.*') border-red-500 @enderror"
                                                                name="rab['nama_item'][]"
                                                                value="{{ old('nama_item.0') }}">
                                                            @error('nama_item.*')
                                                                <p class="text-red-500 text-xs italic">
                                                                    {{ $errors->first('nama_item.*') }}</p>
                                                            @enderror
                                                        </td>
                                                        <td class="text-left p-1">
                                                            <input type="number"
                                                                class="p-1 rounded border w-200 qty @error('qty.*') border-red-500 @enderror"
                                                                name="rab['qty'][]" value="{{ old('qty.0') }}">
                                                            @error('qty.*')
                                                                <p class="text-red-500 text-xs italic">
                                                                    {{ $errors->first('qty.*') }}
                                                                </p>
                                                            @enderror
                                                        </td>
                                                        <td class="text-left p-1">
                                                            <input type="number"
                                                                class="p-1 rounded border w-200 harga-satuan @error('harga_satuan.*') border-red-500 @enderror"
                                                                name="rab['harga_satuan'][]"
                                                                value="{{ old('harga_satuan.0') }}">
                                                            @error('harga_satuan.*')
                                                                <p class="text-red-500 text-xs italic">
                                                                    {{ $errors->first('harga_satuan.*') }}</p>
                                                            @enderror
                                                        </td>
                                                        <td class="text-left p-1">
                                                            <input type="number"
                                                                class="p-1 rounded border w-200 harga-total @error('harga_total.*') border-red-500 @enderror"
                                                                name="rab['harga_total'][]" readonly
                                                                value="{{ old('harga_total.0') }}">
                                                            @error('harga_total.*')
                                                                <p class="text-red-500 text-xs italic">
                                                                    {{ $errors->first('harga_total.*') }}</p>
                                                            @enderror
                                                        </td>
                                                        <td class="text-left p-1">
                                                            <input type="text"
                                                                class="p-1 rounded border w-200 keteragan @error('keterangan.*') border-red-500 @enderror"
                                                                name="rab['keterangan'][]"
                                                                value="{{ old('keterangan.0') }}">
                                                            @error('keterangan.*')
                                                                <p class="text-red-500 text-xs italic">
                                                                    {{ $errors->first('keterangan.*') }}</p>
                                                            @enderror
                                                        </td>
                                                        <td class="text-left p-1">
                                                            <button type="button"
                                                                class="remove-item btn bg-danger btn-danger">
                                                                <i class="fas fa-fw fa-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </div>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <button type="button" id="add-item" class="btn btn-sm bg-primary btn-primary mt-2">
                            Tambah Item
                        </button>

                        <div class="form-group mb-3">
                            <label for="participants">Daftar Anggota</label>
                            <div id="lecturers-container">
                                @foreach (old('participants', [['name' => '', 'nidn' => '', 'studyProgram' => '', 'detail' => '']]) as $index => $row)
                                    <div class="row mb-1 participants-<?= $index ?>">
                                        <div class="col">
                                            <input type="text"
                                                class="form-control @error('participants.' . $index . '.name') is-invalid @enderror"
                                                name="participants[{{ $index }}][name]" placeholder="Name"
                                                value="{{ $row['name'] }}">
                                            @error('participants.' . $index . '.name')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <input type="text"
                                                class="form-control @error('participants.' . $index . '.nidn') is-invalid @enderror"
                                                name="participants[{{ $index }}][nidn]" placeholder="NIDN"
                                                value="{{ $row['nidn'] }}">
                                            @error('participants.' . $index . '.nidn')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <input type="text"
                                                class="form-control @error('participants.' . $index . '.studyProgram') is-invalid @enderror"
                                                name="participants[{{ $index }}][studyProgram]"
                                                placeholder="Program Studi" value="{{ $row['studyProgram'] }}">
                                            @error('participants.' . $index . '.studyProgram')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <input type="text"
                                                class="form-control @error('participants.' . $index . '.detail') is-invalid @enderror"
                                                name="participants[{{ $index }}][detail]" placeholder="Detail"
                                                value="{{ $row['detail'] }}">
                                            @error('participants.' . $index . '.detail')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            @if ($index == 0)
                                                <button class="btn btn-danger" type="button" disabled>Remove</button>
                                            @else
                                                <button class="btn btn-danger" type="button"
                                                    onclick="removeLecturer(<?= $index ?>)">Remove</button>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-2 mb-3">
                                <button class="btn btn-primary" type="button" onclick="addLecturer()">Tambah
                                    dosen</button>
                            </div>
                        </div>


                        <div>
                            <button type="submit" class="btn btn-sm bg-primary btn-primary float-right ">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let lecturerIndex = 1;

        function addLecturer() {
            const container = document.getElementById('lecturers-container');
            const newRow = document.createElement('div');
            newRow.className = `row mb-1 participants-client-${lecturerIndex}`;
            newRow.innerHTML = `
                                <div class="col">
                                    <input type="text" class="form-control" name="participants[${lecturerIndex}][name]" placeholder="Name">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="participants[${lecturerIndex}][nidn]" placeholder="NIDN">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="participants[${lecturerIndex}][studyProgram]" placeholder="Program Studi">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="participants[${lecturerIndex}][detail]" placeholder="Detail">
                                </div>
                                <div class="col">
                                    <button class="btn btn-danger" type="button" onclick="removeLecturerClient(${lecturerIndex})">Remove</button>
                                </div>
                            `;
            container.appendChild(newRow);
            lecturerIndex++;
        }

        function removeLecturer(index) {
            const container = document.getElementById('lecturers-container');
            const row = document.querySelector(`.participants-${index}`);
            container.removeChild(row);
        }

        function removeLecturerClient(lecturerIndex) {
            const container = document.getElementById('lecturers-container');
            const row = document.querySelector(`.participants-client-${lecturerIndex}`);
            container.removeChild(row);
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

        $(document).ready(function() {
            // Tambah item
            $('#add-item').click(function() {
                var newItem = $('.item-container:first').clone();
                newItem.find('input').val('');
                newItem.appendTo('#form-container');
                updateRemoveButtonVisibility();
                updateTotalHarga()
            });

            // Hapus item
            $('#form-container').on('click', '.remove-item', function() {
                $(this).closest('.item-container').remove();
                updateRemoveButtonVisibility();
                updateTotalHarga()
            });

            // Hitung harga total
            $('#form-container').on('input', '.qty, .harga-satuan', function() {
                var container = $(this).closest('.item-container');
                var qty = parseInt(container.find('.qty').val()) || 0;
                var hargaSatuan = parseInt(container.find('.harga-satuan').val()) || 0;

                // Validasi untuk memastikan kedua input adalah angka yang valid
                if (isNaN(qty) || isNaN(hargaSatuan)) {
                    container.find('.harga-total').val('');
                    return;
                }

                // Hitung dan set nilai harga total
                container.find('.harga-total').val(qty * hargaSatuan);
                updateTotalHarga()
            });


            // Fungsi untuk memperbarui visibilitas tombol hapus
            function updateRemoveButtonVisibility() {
                var itemsCount = $('.item-container').length;
                $('.remove-item').prop('disabled', itemsCount <= 1);
            }

            function updateTotalHarga() {
                var totalHarga = 0;
                $('.harga-total').each(function() {
                    var hargaTotal = parseInt($(this).val());
                    totalHarga += isNaN(hargaTotal) ? 0 : hargaTotal;
                });
                $('#budget').val(formatRupiah(totalHarga));
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

        });
    </script>
@endsection
