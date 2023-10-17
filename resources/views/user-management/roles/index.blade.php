@extends('layouts.main')
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ $title }}</h5>
                {{-- <button class="btn btn-sm btn-success" type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModalgetbootstrapCreate" data-whatever="@getbootstrap">Add Role</button> --}}
                <a href="{{route('create-role-page')}}" class="btn btn-sm btn-success">Add Role</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="display dataTable" id="basic-3">
                  <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Permission</th>
                                <th>Log</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($role as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                      {{$item->name}}
                            </span>
                            <td>
                              {{-- {{$item->permission}} --}}
                              @foreach ($item->permissions as $permit)
                                  <li>{{$permit->name}}</li>
                              @endforeach
                            </td>
                            </td>
                            <td><div class=""><i class="fa fa-spin fa-refresh"></i><code>Recently Updated by<br>{{ $item->updated_by }}</code></div></td>
                            <td> <span>
                                {{-- <a href="javascript:void(0)" type="button" data-bs-toggle="modal"data-bs-target="#exampleModalgetbootstrap{{$item->id}}" data-whatever="@getbootstrap"><i class="fa fa-pencil"></i><span> Edit</span></a> --}}
                                <a class="" href="{{route('show-role',$item->id)}}"><i class="fa fa-pencil"></i><span> Edit</span></a>
                                <a class="text-danger" href="{{route('delete-role',$item->id)}}"><i class="fa fa-trash"></i><span> Delete</span></a>
                            </span></td>
                            </tr>


                            {{-- Modal Update --}}
                            <div class="modal fade" id="exampleModalgetbootstrap{{$item->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Update Role {{$item->name}}</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <form method="post" action="{{route('update-role')}}" enctype="multipart/form-data">
                                            @csrf
                                              <div class="mb-3">
                                                  <label class="col-form-label" for="recipient-name">Name:</label>
                                                  <input class="form-control" name="id" type="text" value="{{$item->id}}" hidden>
                                                  <input class="form-control" name="name" type="text" value="{{$item->name}}">
                                              </div>
                                              <div class="mb-3">
                                                <label class="col-form-label">Add Permissions</label>
                                                <select class="js-example-basic-multiple col-sm-12" name="permissions[]" multiple="multiple">
                                                  @foreach ($item->permissions as $item)
                                                    <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                                  @endforeach
                                                  @foreach ($permissions as $p)
                                                  <optgroup label="{{$p->name}}">
                                                    @foreach ($p->children as $permission)
                                                    <option value="{{$permission->id}}">{{$permission->name}}</option>
                                                    @endforeach
                                                  </optgroup>
                                                  @endforeach
                                                </select>
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
                                <th>Name</th>
                                <th>Permission</th>
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
                                    <h5 class="modal-title">Add Role</h5>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{route('create-role')}}" enctype="multipart/form-data">
                                      @csrf
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Name:</label>
                                            <input class="form-control" name="name" type="text">
                                        </div>
                                        <div class="mb-3">
                                          <label class="col-form-label">Add Permissions</label>
                                          <select class="js-example-basic-multiple col-sm-12" name="permissions[]" multiple="multiple">
                                            @foreach ($permissions as $item)
                                            <optgroup label="{{$item->name}}">
                                              @foreach ($item->children as $permission)
                                              <option value="{{$permission->id}}">{{$permission->name}}</option>
                                              @endforeach
                                            </optgroup>
                                            @endforeach
                                          </select>
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
