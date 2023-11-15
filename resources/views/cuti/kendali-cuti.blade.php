@extends('layouts.main')
@section('content')

<div class="col-sm-12">
  <div class="card">
    <div class="card-header">
      <div class="typography">
        <h3>Kendali Cuti Tahunan Pegawai Tahun {{date('Y')}}</h3>
      </div>
      <a class="btn btn-success btn-sm" href="{{route('cetak-kendali-cuti')}}"><i class="fa fa-print"></i><span> Cetak</span></a>
       {{-- <form class="row theme-form mt-3">
        <div class="col-xxl-4 mb-3 d-flex">
          <label class="col-form-label col-sm-6 pe-5" for="inputInlineUsername">Kendali Cuti Tahunan</label>
          <input class="form-control" id="inputInlineUsername" type="number" name="inputUsername" value="{{date('Y')}}" autocomplete="off">
        </div>
        <div class="col-xxl-4 mb-3 d-flex">
          <button class="btn btn-primary">Cari</button>
        </div>
      </form> --}}
    </div>
    <div class="table-responsive">
      <table class="table table-hover table-lg table-bordered">
        <thead>
          <tr class="bg-success">
            <th rowspan="2" scope="col" class=" text-center text-white align-middle">No</th>
            <th rowspan="2" scope="col" class="text-center text-white align-middle">Nama</th>
            <th rowspan="2" scope="col" class="text-center text-white align-middle">NIP</th>
            <th rowspan="2" class="text-center text-white align-middle" scope="col">Jenis Cuti</th>
            <th colspan="5" scope="col" class="text-white text-center align-middle">Sisa Cuti</th>
            <th colspan="14" scope="col" class="text-white text-center align-middle">Cuti Yang Diambil</th>
          </tr>
          <tr class="bg-success text-white">
            <th scope="col" class=" text-center text-white align-middle">{{date('Y')-2}}</th>
            <th scope="col" class=" text-center text-white align-middle">{{date('Y')-1}}</th>
            <th scope="col" class=" text-center text-white align-middle">{{date('Y')}}</th>
            <th scope="col" class=" text-center text-white align-middle">Sakit</th>
            <th scope="col" class=" text-center text-white align-middle">CAP</th>
            <th scope="col" class=" text-center text-white align-middle">Jan</th>
            <th scope="col" class=" text-center text-white align-middle">Feb</th>
            <th scope="col" class=" text-center text-white align-middle">Mar</th>
            <th scope="col" class=" text-center text-white align-middle">Apr</th>
            <th scope="col" class=" text-center text-white align-middle">Mei</th>
            <th scope="col" class=" text-center text-white align-middle">Jun</th>
            <th scope="col" class=" text-center text-white align-middle">Jul</th>
            <th scope="col" class=" text-center text-white align-middle">Agu</th>
            <th scope="col" class=" text-center text-white align-middle">Sep</th>
            <th scope="col" class=" text-center text-white align-middle">Okt</th>
            <th scope="col" class=" text-center text-white align-middle">Nov</th>
            <th scope="col" class=" text-center text-white align-middle">Des</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($rekap as $item)    
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td style="min-width: 30rem">{{$item->nama}}</td>
            <td style="min-width: 20rem">{{$item->nip}}</td>
            <td>CT</td>
            <td>{{$item->tahun_tiga}}</td>
            <td>{{$item->tahun_dua}}</td>
            <td>{{$item->tahun_satu}}</td>
            <td>{{$item->CAP}}</td>
            <td>{{$item->CS}}</td>
            <td>{{$item->jan}}</td>
            <td>{{$item->feb}}</td>
            <td>{{$item->mar}}</td>
            <td>{{$item->apr}}</td>
            <td>{{$item->mei}}</td>
            <td>{{$item->jun}}</td>
            <td>{{$item->jul}}</td>
            <td>{{$item->agu}}</td>
            <td>{{$item->sep}}</td>
            <td>{{$item->okt}}</td>
            <td>{{$item->nov}}</td>
            <td>{{$item->des}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
