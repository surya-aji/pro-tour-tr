@extends('layouts.main')
@section('content')
    <div class="col-sm-12">
        <div class="card">
            @if ($errors->any())
                <div>
                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-header">
                <h5>{{ $title }}</h5>
                {{-- <a href="{{route('create-role-page')}}" class="btn btn-sm btn-success">Add Role</a> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="display dataTable" id="basic-3">
                        <thead>
                            <tr>
                                <th>Pegawai</th>
                                <th>Jam</th>
                                <th>Tanggal / Jam</th>
                                <th>Pemberi Perizinan</th>
                                <th>Keperluan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td></td>
                                <td><td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            @endforeach

                        <tfoot>
                            <tr>
                                <th>Pegawai</th>
                                <th>Jam</th>
                                <th>Tanggal / Jam</th>
                                <th>Pemberi Perizinan</th>
                                <th>Keperluan</th>
                            </tr>
                        </tfoot>
                    </table>


                </div>
            </div>
        </div>
    </div>
@endsection
