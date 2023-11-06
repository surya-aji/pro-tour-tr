@extends('layouts.main')
@section('content')



    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ $title }}</h5>
                <button class="btn btn-sm btn-success" type="button" data-bs-toggle="modal"
                    data-bs-target="#exampleModalgetbootstrapCreate" data-whatever="@getbootstrap">Tambah Pengajuan Cuti</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="display dataTable" id="basic-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>Jenis Cuti</th>
                                <th>Pelaksanaan Cuti</th>
                                {{-- <th>Catatan Cuti</th> --}}
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengajuan as $item)     
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$item->nomor_surat}}</td>
                                <td>{{$item->pegawai->nama}}</td>
                                <td>{{$item->jenis_cuti->jenis_cuti}}</td>
                                <td>{{\Carbon\Carbon::parse($item->tanggal_awal)->isoFormat('D MMMM Y')}}
                                    -
                                    {{\Carbon\Carbon::parse($item->tanggal_akhir)->isoFormat('D MMMM Y')}}
                                </td>
                                {{-- <td>
                                    <span>
                                    a 
                                    </span>
                                </td> --}}

                                <td>
                                    <button class="btn btn-sm btn-danger" type="button"  data-whatever="@getbootstrap">Batalkan Pengajuan</button>
                                </td>
                            </tr>
                            @endforeach


                            

                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>Jenis Cuti</th>
                                <th>Pelaksanaan Cuti</th>
                                {{-- <th>Catatan Cuti</th> --}}
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>


                    {{-- Modal Create --}}
                     {{-- Modal Create --}}
                     <div class="modal fade bd-example-modal-lg" id="exampleModalgetbootstrapCreate" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                             <div class="modal-header bg-primary">
                                 <h5 class="modal-title">Formulir Pengajuan Cuti</h5>
                                 <button class="btn-close" type="button" data-bs-dismiss="modal"
                                     aria-label="Close"></button>
                             </div>
                             <div class="modal-body">
                                <form  class="theme-form" action="{{ route('simpan-pengajuan-cuti') }}" method="POST" enctype="multipart/form-data" data-form-validate="true">
                                    @csrf
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label" for="nomor_surat">* Nomor Surat </label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="NomorSurat" type="text" placeholder=""
                                              name="nomor_surat">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label" for="pegawai">* Pegawai </label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-multiple" name="pegawai">
                                                @foreach ($pegawai as $data)
                                                    <option value="{{ $data->id }}" selected>{{ $data->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label" for="jenis_cuti">* Jenis Cuti </label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-multiple" name="jenis_cuti">
                                                @foreach ($jenis_cuti as $data)
                                                    <option value="{{ $data->id }}" selected>{{ $data->jenis_cuti }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label" for="alasan">* Alasan Cuti</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder=""
                                                name="alasan"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3 row">
                                                <label class="col-sm-6 col-form-label" for="tanggal_awal">* Mulai Tanggal</label>
                                                <div class="col-sm-6">
                                                    <input class="datepicker-here form-control digits" type="text" data-language="en"
                                                        name="tanggal_awal">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3 row">
                                                <label class="col-sm-6 col-form-label" for="tanggal_akhir">* Sampai Tanggal</label>
                                                <div class="col-sm-6">
                                                    <input class="datepicker-here form-control digits" type="text" data-language="en"
                                                        name="tanggal_akhir">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            
                                   
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label" for="alamat">* Alamat Selama Menjalankan Cuti</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder=""
                                                name="alamat"></textarea>
                                        </div>
                                    </div>
            
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label" for="atasan">* Atasan Langsung </label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-multiple" name="atasan">
                                                @foreach ($pegawai as $data)
                                                    <option value="{{ $data->id }}" selected>{{ $data->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" id="tutup-st-dalkot">Tutup</button>
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </form>
                             </div>
                         </div>
                     </div>
                 </div>
                 {{-- Modal Create --}}
                    {{-- Modal Create --}}

                </div>
            </div>
        </div>
    </div>
@endsection
