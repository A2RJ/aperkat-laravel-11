@extends('layout.index')

@section('title', 'Preview PPUF | APERKAT')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Preview PPUF</h6>
            </div>

            <div class="card-body p-4">
                <div class="table-responsive ">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Unit Kerja</th>
                                <th scope="col">Unit Pengaju</th>
                                <th scope="col">Nomor PPUF</th>
                                <th scope="col">Jenis Program</th>
                                <th scope="col">Nama Program</th>
                                <th scope="col">Tempat & Waktu</th>
                                <th scope="col">RAB</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ppufs as $ppuf)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $ppuf['role'] }}</td>
                                <td>{{ $ppuf['parent'] }}</td>
                                <td>{{ $ppuf['ppuf_number'] }}</td>
                                <td>{{ ucfirst($ppuf['activity_type']) }}</td>
                                <td>{{ $ppuf['program_name'] }}</td>
                                <td>{{ $ppuf['place'] }}, {{ $ppuf['date'] }}</td>
                                <td>{{ money($ppuf['budget'], 'IDR', true) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mb-4 d-flex justify-content-between ">
                    <a href="{{ route('ppuf.import') }}" class="btn btn-dark ">Cancel</a>
                    <form action="{{ route('ppuf.import') }}" method="post">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <button class="btn bg-primary btn-primary" type="submit">Save PPUF</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection