@extends('layouts.main')
@section('content')
    <div class="row">

        <div class="col-sm-6" id="form-surat-tugas" style="display:none;">
            <div class="card">
                <div class="card-header">
                    <h5>Form Surat Tugas</h5>
                </div>
                <div class="card-body">
                    <form id="frm-spd" class="theme-form"  method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="NomorSurat">Nomor Surat</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="NomorSurat" type="text" placeholder="Nomor Surat"
                                    name="nomor_surat" form="form-surat-stsppd">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="NomorSurat">Tanggal Surat</label>
                            <div class="col-sm-9">
                                <input class="datepicker-here form-control digits" type="text" data-language="en"
                                    name="tanggal_surat" form="form-surat-stsppd">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="DasarSurat">Dasar Surat</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Dasar Surat"
                                    name="dasar_surat" form="form-surat-stsppd"></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="pemerintah">Dari</label>
                            <div class="col-sm-9">
                                <select class="js-example-basic-multiple" name="dari" form="form-surat-stsppd">
                                    @foreach ($pegawai as $data)
                                        <option value="{{ $data->id }}" selected>{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="inputPassword3">Kepada</label>
                            <div class="col-sm-9">
                                <select class="js-example-basic-multiple" name="kepada[]" multiple="" form="form-surat-stsppd">
                                    @foreach ($pegawai as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="tgl_pelaksanaan">Tanggal Pelaksanaan</label>
                            <div class="col-sm-9">
                                <input class="datepicker-here form-control digits" type="text" data-language="en"
                                    name="tanggal_pelaksanaan" form="form-surat-stsppd">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="tempat">Tempat Pelaksanaan</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="tempat" type="text" placeholder="Tempat Pelaksanaan"
                                    name="tempat_pelaksanaan" form="form-surat-stsppd">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="Maksud">Maksud Perjalanan Dinas</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Maksud Perjalanan Dinas"
                                    name="maksud_surat" form="form-surat-stsppd"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-secondary" id="tutup-st">Close</button>
                            <button class="btn btn-primary" id="next">Next</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <div class="col-sm-6" id="form-surat-sppd" style="display:none;">
            <div class="card">
                <div class="card-header">
                    <h5>Form SPPD</h5>
                </div>
                <div class="card-body">
                    <form class="theme-form" action="{{ route('add-surat-tugas') }}" id="form-surat-stsppd" method="POST"
                        enctype="multipart/form-data" id="form-surat">
                        @csrf
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="NomorSurat">Tingkat Biaya</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="NomorSurat" type="text" placeholder="Tingkat Biaya"
                                    name="tingkat_biaya">
                            </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label" for="NomorSurat">Alat/Angkutan yang dipakai</label>
                          <div class="col-sm-9">
                              <input class="form-control" id="NomorSurat" type="text" placeholder="Alat Atau Angkutan yang dipergunakan"
                                  name="angkutan">
                          </div>
                      </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="tgl_pelaksanaan">Tanggal Berangkat</label>
                            <div class="col-sm-3">
                                <input class="datepicker-here form-control digits" type="text" data-language="en"
                                    name="tanggal_berangkat">
                            </div>

                            <label class="col-sm-3 col-form-label" for="tgl_pelaksanaan">Tanggal Pulang</label>
                            <div class="col-sm-3">
                                <input class="datepicker-here form-control digits" type="text" data-language="en"
                                    name="tanggal_pulang">
                            </div>
                        </div>

                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label" for="NomorSurat">Anggaran</label>
                          <div class="col-sm-9">
                              <input class="form-control" id="NomorSurat" type="text" placeholder="Pembebanan Anggaran"
                                  name="anggaran">
                          </div>
                      </div>

                      <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label" for="NomorSurat">Instansi</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="NomorSurat" type="text"
                                name="instansi" value="Pengadilan Agama Banyuwangi" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                      <label class="col-sm-3 col-form-label" for="NomorSurat">Akun</label>
                      <div class="col-sm-9">
                          <input class="form-control" id="NomorSurat" type="text"
                              name="akun">
                      </div>
                  </div>



                  
                        
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="Maksud">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Keterangan "
                                    name="keterangan"></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label" for="pemerintah">Pejabat Pembuat Komitmen</label>
                          <div class="col-sm-9">
                              <select class="js-example-basic-multiple" name="pejabat_pembuat_komitmen">
                                <option value="4" selected>TATANG WINARTO, S.Kom</option>
                                  @foreach ($pegawai as $data)
                                      <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                        <div class="modal-footer">
                          <button class="btn btn-secondary" id="tutup-sppd">Close</button>
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>






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
                <button class="btn btn-sm btn-success" id="btn-add-surat" type="button">Add New Surat Tugas</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="display dataTable" id="basic-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Surat</th>
                                <th>Dasar Surat</th>
                                <th>Dari</th>
                                <th>Kepada</th>
                                <th>Tanggal Pelaksanaan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surat as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td> <b>{{ $item->nomor_surat }}</b></td>
                                    <td>{{ $item->dasar_surat }}</td>
                                    <td>{{ \app\Modules\Pegawai\Models\Pegawai::where('id',$item->dari)->pluck('nama')[0]}}</td>
                                    <td>
                                        @foreach (json_decode($item->kepada) as $id)
                                           <li>
                                            {{\app\Modules\Pegawai\Models\Pegawai::where('id',$id)->pluck('nama')[0]}}
                                            </li> 
                                        @endforeach
                                    </td>
                                    <td>{{date('d-m-Y', strtotime( $item->tanggal_pelaksanaan))}}</td>
                                    <td>
                                        <span>
                                            <a class="text-primary" href="{{ route('cetak-st', $item->id) }}"><i
                                                class="fa fa-print"></i><span> Cetak</span></a>
                                            <a href="javascript:void(0)" type="button"
                                                data-bs-toggle="modal"data-bs-target="#exampleModalgetbootstrap{{ $item->id }}"
                                                data-whatever="@getbootstrap"><i class="fa fa-pencil"></i><span>
                                                    Edit</span></a>
                                            <a class="text-danger" href="{{ route('delete-user', $item->id) }}"><i
                                                    class="fa fa-trash"></i><span> Delete</span></a>
                                        </span>
                                    </td>

                                </tr>


                                {{-- Modal Update --}}
                                {{-- <div class="modal fade" id="exampleModalgetbootstrap{{$item->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Update User {{$item->name}}</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('update-user')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="col-form-label" for="recipient-name">Name:</label>
                                                    <input class="form-control" name="id" type="text" value="{{$item->id}}" hidden>
                                                    <input class="form-control" name="name" type="text" value="{{$item->name}}" disabled>
                                                </div>
                                                <div class="mb-3">
                                                  <label class="col-form-label" for="recipient-name">Email:</label>
                                                  <input class="form-control" name="name" type="text" value="{{$item->email}}" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="col-form-label">Role</label>
                                                    <select class="js-example-basic-multiple col-sm-12" name="role">
                                                        @foreach ($item->roles as $role)
                                                        <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                                        @endforeach
                                                       @foreach ($roles as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                       @endforeach
                                                    </select>
                                                  </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                                {{-- Modal Update --}}
                            @endforeach

                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nomor Surat</th>
                                <th>Dasar Surat</th>
                                <th>Dari</th>
                                <th>Kepada</th>
                                <th>Tanggal Pelaksanaan</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>


                    {{-- Modal Create --}}
                    {{-- <div class="modal fade bd-example-modal-lg" id="exampleModalgetbootstrapCreate" tabindex="-1" role="dialog"
                       aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog modal-lg" role="document">
                           <div class="modal-content">
                               <div class="modal-header">
                                   <h5 class="modal-title">Add New Surat Tugas</h5>
                                   <button class="btn-close" type="button" data-bs-dismiss="modal"
                                       aria-label="Close"></button>
                               </div>
                               <div class="modal-body">
                               
                               </div>
                           </div>
                       </div>
                   </div> --}}
                    {{-- Modal Create --}}

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('build/template/assets/js/jquery-3.5.1.min.js') }}"></script>
    {{-- @push('custom-script')     --}}
    <script>
        $(document).ready(function() {
            $('#btn-add-surat').on('click', function(e) {
                e.preventDefault();
                $(`#form-surat-tugas`).slideDown('slow');
                //  alert(id);

            });
            $('#next').on('click', function(e) {
                e.preventDefault();
                $(`#next`).fadeOut('slow');
                $(`#tutup-st`).fadeOut('slow');
                $(`#frm-spd`).find(':input').prop('readonly', true);
                $(`#form-surat-sppd`).slideDown('slow');
                //  alert(id);

            });

            $('#tutup-st').on('click', function(e) {
                e.preventDefault();
                $(`#form-surat-tugas`).slideUp('slow');
                //  alert(id);

            });

            $('#tutup-sppd').on('click', function(e) {
                e.preventDefault();
                $(`#form-surat-sppd`).slideUp('slow');
                $(`#next`).fadeIn('slow');
                $(`#tutup-st`).fadeIn('slow');

            });


        });
    </script>
@endsection
