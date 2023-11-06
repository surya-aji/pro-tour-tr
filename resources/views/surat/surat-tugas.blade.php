@extends('layouts.main')
@section('content')
    {{-- Add Surat --}}
    <div class="row">

        {{-- Form Surat Tugas Dalam Kota --}}
        <div class="col-sm-12" id="form-surat-tugas-dalkot" style="display:none;">
            <div class="card">
                <div class="card-header text-center bg-primary">
                    <h5>Formulir Surat Tugas Dalam Kota</h5>
                </div>
                <hr>
                <div class="card-body">
                    <form  class="theme-form" action="{{ route('add-surat-tugas') }}" method="POST" enctype="multipart/form-data" data-form-validate="true">
                        @csrf
                        <input class="form-control" type="text" id="jenis" name="jenis" value="0" hidden>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="nomor_surat">Nomor Surat</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="NomorSurat" type="text" placeholder="Nomor Surat"
                                  name="nomor_surat">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="tanggal_surat">Tanggal Surat</label>
                            <div class="col-sm-9">
                                <input class="datepicker-here form-control digits" type="text" data-language="en"
                                    name="tanggal_surat">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="dasar_surat">Dasar Surat</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Dasar Surat"
                                    name="dasar_surat"></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="dasar_hukum">Dasar Hukum</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Dasar Hukum"
                                    name="dasar_hukum"></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="dari">Dari</label>
                            <div class="col-sm-9">
                                <select class="js-example-basic-multiple" name="dari">
                                    @foreach ($pegawai as $data)
                                        <option value="{{ $data->id }}" selected>{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="kepada">Kepada</label>
                            <div class="col-sm-9">
                                <select class="js-example-basic-multiple" name="kepada[]" multiple=""
                                >
                                    @foreach ($pegawai as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="tanggal_pelaksanaan">Tanggal Pelaksanaan</label>
                            <div class="col-sm-9">
                                <input class="datepicker-here form-control digits" type="text" data-language="en"
                                    name="tanggal_pelaksanaan">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="tempat_pelaksanaan">Tempat Pelaksanaan</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="tempat" type="text" placeholder="Tempat Pelaksanaan"
                                    name="tempat_pelaksanaan">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="maksud_surat">Maksud Surat</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Maksud Surat"
                                    name="maksud_surat"></textarea>
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
        {{-- Form Surat Tugas Dalam Kota --}}




        <div class="col-sm-6" id="form-surat-tugas" style="display:none;">
            <div class="card">
                <div class="card-header text-center bg-primary">
                    <h5>Formulir Surat Tugas Luar Kota</h5>
                </div>
                <hr>
                <div class="card-body">
                    <form id="frm-spd" class="theme-form" method="POST" enctype="multipart/form-data" data-form-validate="true">
                        @csrf
                        <input class="form-control"  type="text" id="jenis" name="jenis" value="1" form="form-surat-stsppd" hidden>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="nomor_surat">Nomor Surat</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="NomorSurat" type="text" placeholder="Nomor Surat"
                                   id="nomor_surat" name="nomor_surat" form="form-surat-stsppd">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="tanggal_surat">Tanggal Surat</label>
                            <div class="col-sm-9">
                                <input class="datepicker-here form-control digits" type="text" data-language="en"
                                    name="tanggal_surat" form="form-surat-stsppd">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="dasar_surat">Dasar Surat</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Dasar Surat"
                                    name="dasar_surat" form="form-surat-stsppd"></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="dasar_hukum">Dasar Hukum</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Dasar Hukum"
                                    name="dasar_hukum" form="form-surat-stsppd"></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="dari">Dari</label>
                            <div class="col-sm-9">
                                <select class="js-example-basic-multiple" name="dari" form="form-surat-stsppd">
                                    @foreach ($pegawai as $data)
                                        <option value="{{ $data->id }}" selected>{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="kepada">Kepada</label>
                            <div class="col-sm-9">
                                <select class="js-example-basic-multiple" name="kepada[]" multiple=""
                                    form="form-surat-stsppd">
                                    @foreach ($pegawai as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="tanggal_pelaksanaan">Tanggal Pelaksanaan</label>
                            <div class="col-sm-9">
                                <input class="datepicker-here form-control digits" type="text" data-language="en"
                                    name="tanggal_pelaksanaan" form="form-surat-stsppd">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="tempat_pelaksanaan">Tempat Pelaksanaan</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="tempat" type="text" placeholder="Tempat Pelaksanaan"
                                    name="tempat_pelaksanaan" form="form-surat-stsppd">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="maksud_surat">Maksud Surat</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Maksud Surat"
                                    name="maksud_surat" form="form-surat-stsppd"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" id="tutup-st">Tutup</button>
                            <button class="btn btn-primary" id="next">Selanjutnya</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <div class="col-sm-6" id="form-surat-sppd" style="display:none;">
            <div class="card">
                <div class="card-header bg-primary text-center">
                    <h5>Formulir SPD</h5>
                </div>
                <div class="card-body">
                    <form class="theme-form" action="{{ route('add-surat-tugas') }}" id="form-surat-stsppd"
                        method="POST" enctype="multipart/form-data" id="form-surat">
                        @csrf
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="tingkat_biaya">Tingkat Biaya</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="tingkat_biaya" type="text" placeholder="Tingkat Biaya"
                                    name="tingkat_biaya" @required(true) title="Tingkat Biaya Wajib Diisi">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="angkutan">Alat/Angkutan yang dipakai</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="angkutan" type="text"
                                    placeholder="Alat Atau Angkutan yang dipergunakan" name="angkutan" @required(true) title="Alat Transportasi / Angkutan Wajib Diisi">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="kota_tujuan">Kota Tujuan</label>
                            <div class="col-sm-9">
                                <input class="form-control"  type="text"
                                    placeholder="Kota Tujuan" name="kota_tujuan" @required(true) title="Kota Tujuan Wajib Diisi">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="tanggal_berangkat">Tanggal Berangkat</label>
                            <div class="col-sm-3">
                                <input class="datepicker-here form-control digits" type="text" data-language="en"
                                    name="tanggal_berangkat" @required(true) title="Tanggal Berangkat Wajib Diisi">
                            </div>

                            <label class="col-sm-3 col-form-label" for="tanggal_pulang">Tanggal Pulang</label>
                            <div class="col-sm-3">
                                <input class="datepicker-here form-control digits" type="text" data-language="en"
                                    name="tanggal_pulang" @required(true) title="Tanggal Pulang Wajib Diisi">
                            </div>
                        </div>
                        <hr>
                        <h6>Pembebanan Anggaran</h6>
                        <hr>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="NomorSurat">Instansi</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="NomorSurat" type="text" name="instansi"
                                    value="Pengadilan Agama Banyuwangi" @required(true) title="Instansi Wajib Diisi" >
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="NomorSurat">Akun</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="NomorSurat" type="text" name="akun" @required(true) title="Akun Wajib Diisi">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" id="tutup-sppd">Kembali</button>
                            <button class="btn btn-primary" type="submit">Simpan </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Add Surat --}}






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
                {{-- <button class="btn btn-sm btn-success" id="btn-add-surat" type="button">Tambah Surat Tugas</button> --}}
                <div class="onhover-dropdown navs-dropdown">
                    <button class="btn btn-primary onhover-dropdown">Tambah Surat Tugas</button>
                    <div class="onhover-show-div">
                      <ul class="icon-lists navs-icon">
                        <li><a id="ref_form_dalkot" href="javascript:void(0)"><i data-feather="file-text"></i><span> Forms Surat Tugas Dalam Kota</span></a></li>
                        <li><a id="ref_form_lukot" href="javascript:void(0)"><i data-feather="file-text"></i><span> Forms Surat Tugas Luar Kota</span></a></li>
                      </ul>
                    </div>
                  </div>
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surat as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="onhover-dropdown navs-dropdown">
                                            <b><a class="onhover-dropdown">{{ $item->nomor_surat }}</a></b>
                                            <div class="onhover-show-div">
                                                <ul class="icon-lists navs-icon">
                                                    <li>
                                                        <a href="{{ route('cetak-st', $item->id) }}">
                                                            <span>Cetak</span>
                                                        </a>
                                                    </li>
                                                    <hr>
                                                    <li><a href="{{ route('edit-surat-tugas', $item->id) }}">
                                                            <span>
                                                                Edit</span></a></li>
                                                                <hr>
                                                    <li><a href="{{ route('delete-surat-tugas', $item->id) }}"></i><span> Hapus</span></a></li>
                                                </ul>
                                            </div>
                                           
                                    </td>
                                   
                                    <td class="w-25">{{ $item->dasar_surat }}</td>
                                    <td>{{ \app\Modules\Pegawai\Models\Pegawai::where('id', $item->dari)->pluck('nama')[0] }}
                                    </td>
                                    <td>
                                        @foreach (json_decode($item->kepada) as $id)
                                            <li>
                                                <a href=""><i data-feather="person"></i></a>
                                                {{ \app\Modules\Pegawai\Models\Pegawai::where('id', $id)->pluck('nama')[0] }}
                                            </li>
                                        @endforeach
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_pelaksanaan)->isoFormat('dddd, D MMMM Y') }}</td>
                                </tr>

                                {{-- Modal Update --}}
                                <div class="modal fade" id="exampleModalgetbootstrap{{ $item->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Update User {{ $item->name }}</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('update-user') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label class="col-form-label" for="recipient-name">Name:</label>
                                                        <input class="form-control" name="id" type="text"
                                                            value="{{ $item->id }}" hidden>
                                                        <input class="form-control" name="name" type="text"
                                                            value="{{ $item->nama }}" disabled>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary" type="submit">Save</button>
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
                                <th>Dasar Surat</th>
                                <th>Dari</th>
                                <th>Kepada</th>
                                <th>Tanggal Pelaksanaan</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('build/template/assets/js/jquery-3.5.1.min.js') }}"></script>
    {{-- @push('custom-script')     --}}
    <script>
        $(document).ready(function() {

            $('#ref_form_dalkot').on('click', function(e) {
                e.preventDefault();
                $(`#form-surat-tugas-dalkot`).slideDown('slow');
                //  alert(id);

            });


            $('#ref_form_lukot').on('click', function(e) {
                e.preventDefault();
                $(`#form-surat-tugas`).slideDown('slow');
                //  alert(id);

            });
            $('#next').on('click', function(e) {
                e.preventDefault();

                var clikedForm = $("#frm-spd"); // Select Form

                if (clikedForm.find("[name='nomor_surat']").val() == '') {
                alert('Nomor Surat Wajib Diisi.');
                return false;
                }
                if (clikedForm.find("[name='tanggal_surat']").val() == '') {
                alert('Tanggal Surat Wajib Diisi.');
                return false;
                }
                if (clikedForm.find("[name='dasar_surat']").val() == '') {
                alert('Dasar Surat Wajib Diisi.');
                return false;
                }
                if (clikedForm.find("[name='dasar_hukum']").val() == '') {
                alert('Dasar Hukum Wajib Diisi.');
                return false;
                }
                if (clikedForm.find("[name='dari']").val() == '') {
                alert('Dari / Pemberi Perintah Wajib Diisi.');
                return false;
                }
                if (clikedForm.find("[name='kepada[]']").val() == '') {
                alert('Kepada / Yang Di Perintah Wajib Diisi.');
                return false;
                }
                if (clikedForm.find("[name='tanggal_pelaksanaan']").val() == '') {
                alert('Tanggal Pelaksanaan Wajib Diisi.');
                return false;
                }
                if (clikedForm.find("[name='tempat_pelaksanaan']").val() == '') {
                alert('Tempat Pelaksanaan Wajib Diisi.');
                return false;
                }
                if (clikedForm.find("[name='maksud_surat']").val() == '') {
                alert('Maksud Surat Wajib Diisi.');
                return false;
                }

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
            $('#tutup-st-dalkot').on('click', function(e) {
                e.preventDefault();
                $(`#form-surat-tugas-dalkot`).slideUp('slow');
                //  alert(id);

            });

            $('#tutup-sppd').on('click', function(e) {
                e.preventDefault();
                $(`#form-surat-sppd`).slideUp('slow');
                $(`#next`).fadeIn('slow');
                $(`#tutup-st`).fadeIn('slow');
                $(`#frm-spd`).find(':input').prop('readonly', false);

            });

            


             



        });
    </script>

    
@endsection
