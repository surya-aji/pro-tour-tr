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
                <button class="btn btn-sm btn-success" type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModalgetbootstrapCreate" data-whatever="@getbootstrap">Tambah Data Pegawai</button>
                {{-- <a href="{{route('create-role-page')}}" class="btn btn-sm btn-success">Add Role</a> --}}
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                      {{$item->nama}}
                            </span>
                            <td>
                              {{$item->nip}}
                            </td>
                            </td>
                            <td>{{$item->jabatan}}</td>
                            <td> <span>
                                <a href="javascript:void(0)" type="button" data-bs-toggle="modal"data-bs-target="#exampleModalgetbootstrap{{$item->id}}" data-whatever="@getbootstrap"><i class="fa fa-pencil"></i><span> Ubah</span></a>
                                {{-- <a class="" href="{{route('show-role',$item->id)}}"><i class="fa fa-pencil"></i><span> Edit</span></a> --}}
                                <a class="text-danger" href="{{route('delete-pegawai',$item->id)}}"><i class="fa fa-trash"></i><span> Hapus</span></a>
                            </span></td>
                            </tr>


                            {{-- Modal Update --}}
                           <div class="modal fade bd-example-modal-lg" id="exampleModalgetbootstrap{{$item->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title">Edit Data Pegawai</h5>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{route('update-pegawai')}}" enctype="multipart/form-data">
                                      @csrf
                                      <div class="row">

                                        <div class="col-sm-6">
                                          <div class="mb-3">
                                              <input class="form-control" name="id" value="{{$item->id}}" type="text" hidden>
                                              <label class="col-form-label" for="recipient-name">* Nama:</label>
                                              <input class="form-control" name="nama" value="{{$item->nama}}" type="text" required>
                                          </div>
                                          <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">* NIP:</label>
                                            <input class="form-control" name="nip" value="{{$item->nip}}" type="text" required>
                                          </div>
                                          <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">* Jabatan:</label>
                                            <input class="form-control" name="jabatan" value="{{$item->jabatan}}" type="text" required>
                                          </div>
                                          <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Nomor Telepon:</label>
                                            <input class="form-control" name="nomor_telepon" value="{{$item->nomor_telepon}}" type="text">
                                          </div>
                                        </div>

                                        <div class="col-sm-6">
                                          <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">* Pangkat:</label>
                                            <input class="form-control" name="pangkat" value="{{$item->pangkat}}" type="text">
                                          </div>
                                          <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">* Golongan:</label>
                                            <input class="form-control" name="golongan" value="{{$item->golongan}}" type="text">
                                          </div>
                                          <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">* Tempat Lahir:</label>
                                            <input class="form-control" name="tempat_lahir" value="{{$item->tempat_lahir}}" type="text">
                                          </div>
                                          <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">* Tanggal Lahir:</label>
                                            <input class="datepicker-here form-control digits" type="text" data-language="en" name="tanggal_lahir" value="{{ date('d/m/Y', strtotime($item->tanggal_lahir)) }}">
                                          </div>
                                        </div>
                                        <div class="mb-3">
                                          <label class="col-form-label" for="recipient-name">Alamat:</label>
                                          <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"
                                          name="alamat">{{$item->alamat}}</textarea>
                                        </div>
                                      </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
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
                              <th>Nama</th>
                              <th>NIP</th>
                              <th>Jabatan</th>
                              <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>


                      {{-- Modal Create --}}
                      <div class="modal fade bd-example-modal-lg" id="exampleModalgetbootstrapCreate" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title">Tambah Data Pegawai</h5>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{route('store-pegawai')}}" enctype="multipart/form-data">
                                      @csrf
                                      <div class="row">

                                        <div class="col-sm-6">
                                          <div class="mb-3">
                                              <label class="col-form-label" for="recipient-name">* Nama:</label>
                                              <input class="form-control" name="nama" type="text" required>
                                          </div>
                                          <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">* NIP:</label>
                                            <input class="form-control" name="nip" type="text" required>
                                          </div>
                                          <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">* Jabatan:</label>
                                            <input class="form-control" name="jabatan" type="text" required>
                                          </div>
                                          <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Nomor Telepon:</label>
                                            <input class="form-control" name="nomor_telepon" type="text">
                                          </div>
                                        </div>

                                        <div class="col-sm-6">
                                          <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">* Pangkat:</label>
                                            <input class="form-control" name="pangkat" type="text">
                                          </div>
                                          <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">* Golongan:</label>
                                            <input class="form-control" name="golongan" type="text">
                                          </div>
                                          <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">* Tempat Lahir:</label>
                                            <input class="form-control" name="tempat_lahir" type="text">
                                          </div>
                                          <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">* Tanggal Lahir:</label>
                                            <input class="datepicker-here form-control digits" type="text" data-language="en" name="tanggal_lahir">
                                          </div>
                                        </div>
                                        <div class="mb-3">
                                          <label class="col-form-label" for="recipient-name">Alamat:</label>
                                          <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"
                                          name="alamat"></textarea>
                                        </div>
                                      </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Modal Create --}}



                </div>
            </div>
        </div>
    </div>
@endsection
