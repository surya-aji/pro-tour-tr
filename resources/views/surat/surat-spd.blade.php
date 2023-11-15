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
                                <th>No</th>
                                <th>Nomor Surat</th>
                                <th>Nama</th>
                                <th>Maksud Dinas</th>
                                <th>Tanggal</th>
                                <th>Tujuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surat as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <b><a href="{{route('cetak-spd', $item->id)}}" class="onhover-dropdown">{{ $item->surat_tugas->nomor_surat }}</a></b>
                                    </td>
                                    <td>
                                    {{ $item->pegawai->nama ?? "Data Tidak ditemukan / Terhapus" }}
                                    </td>
                                    <td class="w-25"> {{ $item->surat_tugas->maksud_surat }}</td>
                                    <td>
                                      <ul>
                                        <li>Tanggal Berangkat : {{\Carbon\Carbon::parse($item->tanggal_berangkat)->isoFormat('D MMMM Y')}}</li>
                                        <li>Tanggal Harus Pulang : {{\Carbon\Carbon::parse($item->tanggal_pulang)->isoFormat('D MMMM Y')}}
                                         </li>
                                      </ul>
                                    </td>
                                    <td>{{$item->kota_tujuan}}</td>
                                </tr>

                                {{-- Modal Update --}}
                                <div class="modal fade" id="exampleModalgetbootstrap{{ $item->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Update Role {{ $item->name }}</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{ route('update-pegawai') }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label class="col-form-label" for="recipient-name">Nama:</label>
                                                        <input class="form-control" name="id" type="text"
                                                            value="{{ $item->id }}" hidden>
                                                        <input class="form-control" name="nama" type="text"
                                                            value="{{ $item->nama }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label" for="recipient-name">NIP:</label>
                                                        <input class="form-control" name="nip" type="text"
                                                            value="{{ $item->nip }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label" for="recipient-name">Jabatan:</label>
                                                        <input class="form-control" name="jabatan" type="text"
                                                            value="{{ $item->jabatan }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label"
                                                            for="recipient-name">Pangkat/Golongan:</label>
                                                        <input class="form-control" name="pangkat_golongan" type="text"
                                                            value="{{ $item->pangkat_golongan }}"">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label" for="recipient-name">Tempat
                                                            Lahir:</label>
                                                        <input class="form-control" name="tempat_lahir" type="text"
                                                            value="{{ $item->tempat_lahir }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label" for="recipient-name">Tanggal
                                                            Lahir:</label>
                                                        <input class="form-control" name="tanggal_lahir" type="date"
                                                            value="{{ $item->tanggal_lahir }}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modal Update --}}
                            @endforeach

                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nomor Surat</th>
                                <th>Nama</th>
                                <th>Maksud Dinas</th>
                                <th>Tanggal</th>
                                <th>Tujuan</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
