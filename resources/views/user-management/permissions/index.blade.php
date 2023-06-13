@extends('layouts.main')
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ $title }}</h5>
                <button class="btn btn-sm btn-success" type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModalgetbootstrapCreate" data-whatever="@getbootstrap">Add Permsision</button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="display dataTable" id="basic-3">
                  <thead>
                            <tr>
                                <th>No</th>
                                <th>Modul</th>
                                <th>Name</th>
                                <th>Log</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="onhover-dropdown navs-dropdown ">
                                        {{ Spatie\Permission\Models\Permission::where('id',$item->parent_id)->pluck('name')->first()}}
                            </span>
                            </td>
                            <td>{{ $item->name }}</td>
                            <td><div class=""><i class="fa fa-spin fa-refresh"></i><code>Recently Updated by<br>{{ $item->updated_by }}</code></div></td>
                            <td>
                                <span>
                                    <a href="javascript:void(0)" type="button" data-bs-toggle="modal"data-bs-target="#exampleModalgetbootstrap{{$item->id}}" data-whatever="@getbootstrap"><i class="fa fa-pencil"></i><span> Edit</span></a>
                                    <a class="text-danger" href="{{route('delete-permission',$item->id)}}"><i class="fa fa-trash"></i><span> Delete</span></a>
                                </span>
                            </td>
                            </tr>


                            {{-- Modal Update --}}
                            <div class="modal fade" id="exampleModalgetbootstrap{{$item->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Update Permission {{$item->name}}</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{route('update-permission')}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                  <label class="col-form-label">Select Parent</label>
                                                  <select name="parent" class="js-example-basic-single col-sm-12">
                                                          <option value="0">Create as parent</option>
                                                          @foreach ($parent_permissions as $item)
                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                          @endforeach
                                                  </select>
                                                </div>
                                                  <div class="mb-3">
                                                      <input class="form-control" name="id" type="text" value="{{$item->id}}" hidden>
                                                      <label class="col-form-label" for="recipient-name">Name:</label>
                                                      <input class="form-control" name="name" type="text" value="{{$item->name}}">
                                                  </div>
                                                  <div class="mb-3">
                                                    <label class="col-form-label" for="recipient-name">Display Name:</label>
                                                    <input class="form-control" name="displayname" type="text" value="{{$item->display_name}}">
                                                  </div>
                                                  <div class="modal-footer">
                                                      <button type="submit" class="btn btn-primary">Save</button>
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
                                <th>Modul</th>
                                <th>Name</th>
                                <th>Log</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>


                      {{-- Modal Create --}}
                      <div class="modal fade" id="exampleModalgetbootstrapCreate" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Permission</h5>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{url('user-management/add-permission')}}" enctype="multipart/form-data">
                                      @csrf
                                      <div class="mb-3">
                                        <label class="col-form-label">Select Parent</label>
                                        <select name="parent" class="js-example-basic-single col-sm-12">
                                                <option value="0">Create as parent</option>
                                                @foreach ($parent_permissions as $item)
                                                  <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                        </select>
                                      </div>
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Name:</label>
                                            <input class="form-control" name="name" type="text">
                                        </div>
                                        <div class="mb-3">
                                          <label class="col-form-label" for="recipient-name">Display Name:</label>
                                          <input class="form-control" name="displayname" type="text">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Modal Create --}}



                </div>
            </div>
        </div>
    </div>
@endsection
