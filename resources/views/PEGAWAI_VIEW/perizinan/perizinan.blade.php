@extends('PEGAWAI_VIEW.layouts.main')
@section('p_content')
<div class="page-body p-15">
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-5"><img class="bg-img-cover bg-center" src="{{asset('build/template/assets/images/login/3.jpg')}}" alt="looginpage"></div>
      <div class="col-xl-7 p-0">    
        <div class="login-card">
          <form class="theme-form login-form">
            <h4>Perizinan Keluar Kantor</h4>
            <h6>Formulir izin keluar kantor</h6>
            <div class="form-group">
              <label>Yang Bertanda tangan dibawah ini :</label>
              <div class="input-group"></span>
                <select class="js-example-basic-single" name="dari" form="form-surat-stsppd">
                      <option value="test" selected>test</option>
              </select>
              </div>
            </div>
            <div class="form-group">
              <label>Dengan ini memberikan izin kepada :</label>
              <div class="input-group"></span>
                <select class="js-example-basic-single" name="dari" form="form-surat-stsppd">
                      <option value="test" selected>test</option>
              </select>
              </div>
            </div>
            <div class="login-social-title">                
              <h5>Untuk Keluar Kantor</h5>
            </div>
           <div class="form-group">
            <label>pada tanggal :</label>
            <div class="input-group"></span>
              <input class="datepicker-here form-control digits" type="text" data-language="en"
              name="tanggal_pelaksanaan" form="form-surat-stsppd">
            </select>
            </div>
            <label>Pada pukul :</label>
            <div class="input-group clockpicker"></span>
              <input class="form-control" type="text" value="09:30"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
            </div>
            <label>sampai pukul :</label>
            <div class="input-group clockpicker"></span>
              <input class="form-control" type="text" value="09:30"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
            </div>
            <label>Keperluan :</label>
            <div class="input-group"></span>
              <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"
            name="alamat"></textarea>
            </div>
          </div>
            <div class="form-group"><a class="btn btn-primary btn-block" href="index.html" type="submit">Simpan & Cetak</a></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection