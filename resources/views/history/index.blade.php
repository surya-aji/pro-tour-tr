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
                {{-- <button class="btn btn-sm btn-success" type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModalgetbootstrapCreate" data-whatever="@getbootstrap">Add Pegawai</button> --}}
                {{-- <a href="{{route('create-role-page')}}" class="btn btn-sm btn-success">Add Role</a> --}}
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="display dataTable" id="basic-3">
                  <thead>
                            <tr>
                                <th>No</th>
                                <th>Subject</th>
                                <th>Properties</th>
                                <th>To Properties</th>
                                <th>IP Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                      {{$item->subject}}
                            </span>
                            <td>
                              <pre>
                                {{$item->old_properties}}
                              </pre>
                            </td>
                            </td>
                            <td>
                              <pre>

                                {{$item->properties}}
                              </pre>
                            </td>
                            <td> 
                              {{$item->ip_address}}
                            </td>
                            </tr>
                            @endforeach


                        <tfoot>
                            <tr>
                              <th>No</th>
                              <th>Subject</th>
                              <th>Properties</th>
                              <th>To Properties</th>
                              <th>IP Address</th>
                            </tr>
                        </tfoot>
                    </table>




                </div>
            </div>
        </div>
    </div>
@endsection
