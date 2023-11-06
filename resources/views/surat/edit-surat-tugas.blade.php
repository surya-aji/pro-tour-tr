@extends('layouts.main')
@section('content')
    {{-- Add Surat --}}
    <div class="row">

        <div class="col-sm-6" id="form-surat-tugas">
            <div class="card">
                <div class="card-header text-center bg-primary">
                    <h5>Formulir Perubahan Surat Tugas</h5>
                </div>
                <hr>
                <div class="card-body">
                    <form id="frm-spd" class="theme-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input class="form-control" type="text" id="jenis" name="jenis" value="1" hidden>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="NomorSurat">Nomor Surat</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="NomorSurat" type="text" placeholder="Nomor Surat"
                                name="id" form="form-surat-stsppd" value="{{ $surat->id}}" hidden>
                                <input class="form-control" id="NomorSurat" type="text" placeholder="Nomor Surat"
                                    name="nomor_surat" form="form-surat-stsppd" value="{{ $surat->nomor_surat }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="NomorSurat">Tanggal Surat</label>
                            <div class="col-sm-9">
                                <input class="datepicker-here form-control digits" type="text" data-language="en"
                                    name="tanggal_surat" form="form-surat-stsppd"
                                    value="{{ \Carbon\Carbon::parse($surat->tanggal_surat)->isoFormat('d/M/Y') }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="DasarSurat">Dasar Surat</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Dasar Surat"
                                    name="dasar_surat" form="form-surat-stsppd">{{ $surat->dasar_surat }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="DasarSurat">Dasar Hukum</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Dasar Hukum"
                                    name="dasar_hukum" form="form-surat-stsppd">{{ $surat->dasar_hukum }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="pemerintah">Dari</label>
                            <div class="col-sm-9">
                                <select class="js-example-basic-multiple" name="dari" form="form-surat-stsppd">
                                    <option value="{{ $dari->id }}">{{ $dari->nama }}</option>
                                    @foreach ($pegawai as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="inputPassword3">Kepada</label>
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
                            <label class="col-sm-3 col-form-label" for="tgl_pelaksanaan">Tanggal Pelaksanaan</label>
                            <div class="col-sm-9">
                                <input class="datepicker-here form-control digits" type="text" data-language="en"
                                    name="tanggal_pelaksanaan" form="form-surat-stsppd"
                                    value="{{ date('d/m/Y', strtotime($surat->tanggal_pelaksanaan)) }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="tempat">Tempat Pelaksanaan</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="tempat" type="text" placeholder="Tempat Pelaksanaan"
                                    name="tempat_pelaksanaan" form="form-surat-stsppd"
                                    value="{{ $surat->tempat_pelaksanaan }}" aria-readonly="true">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="Maksud">Maksud Surat</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Maksud Surat"
                                    name="maksud_surat" form="form-surat-stsppd">{{ $surat->maksud_surat }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            {{-- <button class="btn btn-secondary" id="tutup-st">Tutup</button> --}}
                            <button class="btn btn-primary" id="next">Selanjutnya</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <div class="col-sm-6" id="form-surat-sppd" style="display: none">
            <div class="card">
                <div class="card-header bg-primary text-center">
                    <h5>Formulir Perubahan SPD</h5>
                </div>
                <div class="card-body">
                    <form class="theme-form" action="{{ route('update-surat-tugas') }}" id="form-surat-stsppd"
                        method="POST" enctype="multipart/form-data" id="form-surat">
                        @csrf
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="NomorSurat">Tingkat Biaya</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="NomorSurat" type="text" placeholder="Tingkat Biaya"
                                    name="tingkat_biaya" @required(true) title="Tingkat Biaya Wajib Diisi">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="NomorSurat">Alat/Angkutan yang dipakai</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="NomorSurat" type="text"
                                    placeholder="Alat Atau Angkutan yang dipergunakan" name="angkutan" @required(true) title="Alat Transportasi / Angkutan Wajib Diisi">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="NomorSurat">Kota Tujuan</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text"
                                    placeholder="Kota Tujuan" name="kota_tujuan" @required(true) title="Kota Tujuan Wajib Diisi">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="tgl_pelaksanaan">Tanggal Berangkat</label>
                            <div class="col-sm-3">
                                <input class="datepicker-here form-control digits" type="text" data-language="en"
                                    name="tanggal_berangkat" @required(true) title="Tanggal Berangkat Wajib Diisi">
                            </div>

                            <label class="col-sm-3 col-form-label" for="tgl_pelaksanaan">Tanggal Pulang</label>
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
                                    value="Pengadilan Agama Banyuwangi" @required(true) title="Instansi Wajib Diisi">
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
                $(`#frm-spd`).find(':input').prop('readonly', false);

            });


        });
    </script>
@endsection
