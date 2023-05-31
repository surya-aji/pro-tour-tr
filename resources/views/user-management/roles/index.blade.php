@extends('layouts.main')
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ $title }}</h5>
                <button class="btn btn-sm btn-success" type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModalgetbootstrapCreate" data-whatever="@getbootstrap">Add Role</button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="display dataTable" id="basic-3">
                  <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Created at / Updated at</th>
                                <th>Created by / Updated by</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($role as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="onhover-dropdown navs-dropdown ">
                                      {{$item->name}}
                            <div class="onhover-show-div">
                                <ul class="icon-lists navs-icon">
                                    <li>
                                        <a href="javascript:void(0)" type="button" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalgetbootstrap{{$item->id}}" data-whatever="@getbootstrap"><i
                                                data-feather="feather"></i><span> Edit</span></a>
                                    </li>
                                    <li>
                                        <a href="{{route('delete-role',$item->id)}}"><i data-feather="trash"></i><span> Delete</span></a>
                                    </li>
                                </ul>
                            </div>
                            </span>
                            </td>
                            <td><code>{{ $item->created_at }}<br>{{ $item->updated_at }}</code></td>
                            <td><code>{{ $item->created_by }}<br>{{ $item->updated_by }}</code></td>
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
                                <th>Created at / Updated at</th>
                                <th>Created by / Updated by</th>
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
