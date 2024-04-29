<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $submission->ppuf->author->role }} {{ $submission->ppuf->ppuf_number }}-{{ date("d-m-Y") }}</title>

    <style>
        #judul {
            text-align: center;
        }

        table tr .justify {
            width: 70%;
            padding-bottom: 10px;
        }

        .text-center {
            text-align: center;
        }

        .text-bold {
            font-weight: bold;
        }

        #img-kop-surat {
            width: 100%;
            height: auto;
        }

        .unit {
            margin-bottom: 30px;
        }

        .top {
            width: 920px;
            height: 150px;
        }

        .ttd {
            /* width: 920px; */
            height: 200px;
            margin-top: -20px;
        }

        #rab {
            width: 90%;
            border-collapse: collapse;
        }

        .wrap-word {

            width: fit-content;
            word-wrap: break-word;
        }
    </style>
    <script>
        window.print();
        window.onafterprint = function() {
            window.close();
        }
    </script>
</head>

<body id="body">
    <div style="page-break-after: always; width: 920px;">
        <img src="https://aperkat.uts.ac.id/api/public/kop/KOPDefault.png" alt="KOP Surat" class="top">

        <h3 id=judul>KERANGKA ACUAN KERJA</h3>
        <div class="unit">
            <span class="text-bold">Fakultas/Unit Pelaksana:</span> {{ $submission->ppuf->author->role }}
        </div>

        <table>
            <tr>
                <td>1</td>
                <td style="width: 25%;">Nama Kegiatan</td>
                <td>:</td>
                <td class="justify">{{ $submission->ppuf->program_name }}</td>
            </tr>
            <!-- no rkat -->
            <tr>
                <td>2</td>
                <td style="width: 25%;">No. RKAT Kegiatan/Program</td>
                <td>:</td>
                <td class="justify">{{ $submission->ppuf->ppuf_number }}</td>
            </tr>
            <!-- latar belakang -->
            <tr>
                <td>3</td>
                <td style="width: 25%;">Latar Belakang pelaksanaan Kegiatan</td>
                <td>:</td>
                <td class="justify">{{ $submission->background }}</td>
            </tr>
            <!-- tujuan -->
            <tr>
                <td>4</td>
                <td style="width: 25%;">Tujuan</td>
                <td>:</td>
                <td class="justify">{{ $submission->ppuf->description }}</td>
            </tr>
            <!-- bentuk kegiatan -->
            <tr>
                <td>7</td>
                <td style="width: 25%;">Bentuk Pelaksanaan Kegiatan</td>
                <td>:</td>
                <td class="justify">{{ $submission->ppuf->activity_type }}</td>
            </tr>
            <!-- lokasi dan waktu kegiatan -->
            <tr>
                <td>8</td>
                <td style="width: 25%;">Lokasi dan Waktu Kegiatan</td>
                <td>:</td>
                <td class="justify">{{ $submission->place }} {{ $submission->ppuf->date }}</td>
            </tr>
            <!--bidang terkait -->
            <tr>
                <td>9</td>
                <td style="width: 25%;">Bidang Terkait</td>
                <td>:</td>
                <td class="justify">{{ $submission->vendor }}</td>
            </tr>
        </table>

        <h3>RAB</h3>
        <div style="
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        ">
            <table id="rab" border="1" <tr>
                <th width="30%">Barang</th>
                <th width="12%">Harga satuan</th>
                <th width="5%">QTY</th>
                <th width="13%">Total</th>
                <th width="40%">Keterangan</th>
                </tr>
                @foreach ($submission->budget_detail as $budget)
                <tr>
                    <td>{{ $budget['item'] }}</td>
                    <td>{{ money($budget['harga_satuan'], 'IDR', true) }}</td>
                    <td>{{ $budget['qty'] }}</td>
                    <td>{{ money($budget['total'], 'IDR', true) }}</td>
                    <td>
                        @foreach(collect($budget['detail'])->chunk(50) as $chunk)
                        {!! nl2br(e($chunk->implode(''))) !!}<br>
                        @endforeach
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3">Total</td>
                    <!-- count total rab and number format-->
                    <td colspan="2">{{ money(collect($submission->budget_detail)->sum(function ($item) {
                        return $item['qty'] * $item['harga_satuan'];
                    }), 'IDR', true) }}
                    </td>
                </tr>
                <tr>
                    <td>Catatan</td>
                    <td colspan="4"></td>
                </tr>
            </table>
        </div>
        <hr>
        <h3>History</h3>
        <ul>
            @foreach ($submission->status as $v)
            <li>
                {{ $v->role->role }}: {{ $v->message }} ({{ $v->created_at->format('d M Y') }})
            </li>
            @endforeach
        </ul>
    </div>
</body>

</html>