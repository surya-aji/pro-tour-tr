@extends('layouts.main')
@section('content')
<div class="col-sm-12 col-xl-12">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header pb-0">
          <h5>{{$title}}</h5>
        </div>
        <div class="card-body">
          <form class="theme-form mega-form" action="{{route('update-setting')}}" method="POST">
            @csrf
            {{-- <h6>Website Information Settings</h6>
            @foreach ($setting_website as $item)     
            <div class="mb-3">
              <label class="col-form-label">{{$item->display_name}}</label>
              <input class="form-control" name="setting[{{$loop->index}}][id]" type="text" value="{{$item->id}}" hidden/>
              <input class="form-control" name="setting[{{$loop->index}}][key]" type="text" value="{{$item->value}}" />
            </div>
            @endforeach
            <hr class="mt-4 mb-4" /> --}}

            <h6>Configuration Settings</h6>
            @foreach ($setting_configuration as $item)     
            <div class="mb-3">
              <label class="col-form-label">{{$item->display_name}}</label>
              <input class="form-control" name="setting[{{$loop->index}}][id]" type="text" value="{{$item->id}}" hidden/>
              <input class="form-control" name="setting[{{$loop->index}}][key]" type="text" value="{{$item->value}}" />
            </div>
            @endforeach


            

            <div class="col-xl-12 xl-100 col-md12 box-col-12">
              <div class="card bg-primary">
                <div class="card-body">
                  <div class="media faq-widgets">
                    <div class="media-body">
                      <h5>Langkah Mengganti Template</h5>
                      <p>Anda dapat membuat templat dokumen dengan menyertakan pola pencarian (makro) yang dapat diganti dengan nilai apa pun yang Anda inginkan. Hanya nilai satu baris yang dapat diganti. Secara default, Makro didefinisikan seperti ini: ${variabel-nilai} tetapi Anda dapat menentukan makro khusus. anda bisa mengunduh contoh <a class="text-primary" href="{{asset('template/Template_ST.docx')}}">template surat tugas</a> dan <a class="text-primary" href="{{asset('template/Template_SPD.docx')}}">surat perjalanan dinas.</a></p><br>
                      <p>Untuk mengganti template pastikan anda perlu mengupload file template pada folder <b>storage</b> pada DIR root aplikasi, kemudian mengganti input template sesuai nama file yang diupload <b>Ex : Template_SPD.docx</b></p>
                      <p>variable yang dapat digunakan pada template Surat Tugas : <br>
                       <ul>
                        <li>${nomor_surat}</li>
                        <li>${dasar_surat}</li>
                        <li>${dasar_hukum}</li>
                        <li>${maksud_surat}</li>
                        <li>${tanggal_pelaksanaan}</li>
                        <li>${tempat_pelaksanaan}</li>
                        <li>${tanggal_surat}</li>
                        <li>${jabatan_pemberi_perintah}</li>
                        <li>${nama_pemberi_perintah}</li>
                        <li>${nip_pemberi_perintah}</li>
                        <li>${index} 'untuk keperluan Nomor'</li>
                       </ul>
                      </p>

                      <p>variable yang dapat digunakan pada template Surat Perjalanan Dinas : <br>
                        <ul>
                         <li>${nomor_surat}</li>
                         <li>${pembuat_komitmen}</li>
                         <li>${nip_pembuat_komitmen}</li>
                         <li>${nama}</li>
                         <li>${nip}</li>
                         <li>${pangkat}</li>
                         <li>${golongan}</li>
                         <li>${jabatan}</li>
                         <li>${biaya}</li>
                         <li>${maksud_surat}</li>
                         <li>${angkutan}</li>
                         <li>${kota_tujuan}</li>
                         <li>${lama_dinas}</li>
                         <li>${tanggal_berangkat}</li>
                         <li>${tanggal_pulang}</li>
                         <li>${instansi}</li>
                         <li>${akun}</li>
                         <li>${tanggal_surat}</li>

                         <li>${nama_pemberi_perintah}</li>
                         <li>${nip_pemberi_perintah}</li>
                         <li>${jabatan_pemberi_perintah}</li>
                        </ul>
                       </p>
                    </div><i data-feather="book-open"></i>
                  </div>
                </div>
              </div>
            </div>


            <hr class="mt-4 mb-4" />

            <div class="card-footer">
              <button class="btn btn-primary" type="submit">Perbaharui</button>
            </div>

            
          </form>
      </div>
    </div>
@endsection