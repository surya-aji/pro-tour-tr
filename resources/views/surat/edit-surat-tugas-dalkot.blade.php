@extends('layouts.main')
@section('content')
    {{-- Add Surat --}}
    <div class="row">

        <div class="col-sm-12" id="form-surat-tugas-dalkot">
            <div class="card">
                <div class="card-header text-center bg-primary">
                    <h5>Formulir Perubahan Surat Tugas</h5>
                </div>
                <hr>
                <div class="card-body">
                    <form  class="theme-form" action="{{ route('update-surat-tugas') }}" method="POST" enctype="multipart/form-data" data-form-validate="true">
                        @csrf
                        <input class="form-control" id="NomorSurat" type="text" placeholder="Nomor Surat"
                        name="id" value="{{ $surat->id}}" hidden>
                        <input class="form-control" type="text" id="jenis" name="jenis" value="0" hidden>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="nomor_surat">Nomor Surat</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="NomorSurat" type="text" placeholder="Nomor Surat" name="nomor_surat" value="{{$surat->nomor_surat}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="tanggal_surat">Tanggal Surat</label>
                            <div class="col-sm-9">
                                <input class="datepicker-here form-control digits" type="text" data-language="en"
                                    name="tanggal_surat" value="{{date('d/m/Y', strtotime($surat->tanggal_surat))}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="dasar_surat">Dasar Surat</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Dasar Surat"
                                    name="dasar_surat">{{$surat->dasar_surat}}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="dasar_hukum">Dasar Hukum</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Dasar Hukum"
                                    name="dasar_hukum">{{$surat->dasar_hukum}}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="dari">Dari</label>
                            <div class="col-sm-9">
                                <select class="js-example-basic-multiple" name="dari">
                                    <option value="{{ $dari->id }}">{{ $dari->nama }}</option>
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
                                    name="tanggal_pelaksanaan" value="{{date('d/m/Y', strtotime($surat->tanggal_pelaksanaan))}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="tempat_pelaksanaan">Tempat Pelaksanaan</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="tempat" type="text" placeholder="Tempat Pelaksanaan"
                                    name="tempat_pelaksanaan" value="{{$surat->tempat_pelaksanaan}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="maksud_surat">Maksud Surat</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Maksud Surat"
                                    name="maksud_surat">{{$surat->maksud_surat}}</textarea>
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
    {{-- Add Surat --}}

@endsection
