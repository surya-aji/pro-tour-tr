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
            <h6>Website Information Settings</h6>
            @foreach ($setting_website as $item)     
            <div class="mb-3">
              <label class="col-form-label">{{$item->display_name}}</label>
              <input class="form-control" name="setting[{{$loop->index}}][id]" type="text" value="{{$item->id}}" hidden/>
              <input class="form-control" name="setting[{{$loop->index}}][key]" type="text" value="{{$item->value}}" />
            </div>
            @endforeach
            <hr class="mt-4 mb-4" />

            <h6>Configuration Settings</h6>
            @foreach ($setting_configuration as $item)     
            <div class="mb-3">
              <label class="col-form-label">{{$item->display_name}}</label>
              <input class="form-control" name="setting[{{$loop->index}}][id]" type="text" value="{{$item->id}}" hidden/>
              <input class="form-control" name="setting[{{$loop->index}}][key]" type="text" value="{{$item->value}}" />
            </div>
            @endforeach
            <hr class="mt-4 mb-4" />

            <div class="card-footer">
              <button class="btn btn-primary" type="submit">Save</button>
            </div>
          </form>
      </div>
    </div>
@endsection