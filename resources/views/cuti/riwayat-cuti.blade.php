@extends('layouts.main')
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ $title }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="display dataTable" id="basic-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Jabatan</th>
                                <th>Pangkat / Golongan</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($pegawai as $item)    
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td> <b><a href="{{route('riwayat-cuti-detail', $item->id)}}">{{$item->nama}}</a></b> 
                              </td>
                              <td>{{$item->nip}}</td>
                              <td>{{$item->jabatan}}</td>
                              <td>{{$item->pangkat}} / {{$item->golongan}}
                              </td>
                          </tr>
                          @endforeach
                        <tfoot>
                            <tr>
                              <th>No</th>
                              <th>Nama</th>
                              <th>NIP</th>
                              <th>Jabatan</th>
                              <th>Pangkat / Golongan</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
