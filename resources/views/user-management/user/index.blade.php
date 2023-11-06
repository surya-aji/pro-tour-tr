@extends('layouts.main')
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ $title }}</h5>
                <button class="btn btn-sm btn-success" type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModalgetbootstrapCreate" data-whatever="@getbootstrap">Tambah User</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="display dataTable" id="basic-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Log</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td
                                        class="onhover-dropdown navs-dropdown {{ $item->id === Auth::user()->id ? 'text-success' : '' }}">
                                        {{ $item->name }}
                                        <span>
                                            @if ($item->id === Auth::user()->id)
                                                <span> <code>Its Me..</code>
                                                </span>
                                        </span>
                            @endif
                            </span>
                            </td>
                            <td>{{ $item->email }}</td>
                            <td>
                                @foreach ($item->roles as $role)
                                {{ $role->name }}
                                @endforeach
                            </td>
                            <td><div class=""><i class="fa fa-spin fa-refresh"></i><code>Recently Updated by<br>{{ $item->updated_by }}</code></div></code></td>
                            <td>
                                <span>
                                    <a href="javascript:void(0)" type="button" data-bs-toggle="modal"data-bs-target="#exampleModalgetbootstrap{{$item->id}}" data-whatever="@getbootstrap"><i class="fa fa-pencil"></i><span> Ubah</span></a>
                                    <a class="text-danger" href="{{route('delete-user',$item->id)}}"><i class="fa fa-trash"></i><span> Hapus</span></a>
                                </span>
                                </td>

                            </tr>


                            {{-- Modal Update --}}
                            <div class="modal fade" id="exampleModalgetbootstrap{{$item->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h5 class="modal-title">Ubah User {{$item->name}}</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('update-user')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="col-form-label" for="recipient-name">Nama:</label>
                                                    <input class="form-control" name="id" type="text" value="{{$item->id}}" hidden>
                                                    <input class="form-control" name="name" type="text" value="{{$item->name}}" disabled>
                                                </div>
                                                <div class="mb-3">
                                                  <label class="col-form-label" for="recipient-name">Email:</label>
                                                  <input class="form-control" name="name" type="text" value="{{$item->email}}" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="col-form-label">Role</label>
                                                    <select class="js-example-basic-multiple col-sm-12" name="role">
                                                        @foreach ($item->roles as $role)
                                                        <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                                        @endforeach
                                                       @foreach ($roles as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                       @endforeach
                                                    </select>
                                                  </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit">Simpan</button>
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
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
                               <div class="modal-header bg-primary">
                                   <h5 class="modal-title">Tambah User</h5>
                                   <button class="btn-close" type="button" data-bs-dismiss="modal"
                                       aria-label="Close"></button>
                               </div>
                               <div class="modal-body">
                                   <form method="post" action="{{route('create-user')}}" enctype="multipart/form-data">
                                     @csrf
                                       <div class="mb-3">
                                           <label class="col-form-label" for="recipient-name">Nama:</label>
                                           <input class="form-control" name="name" type="text">
                                       </div>
                                       <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Email:</label>
                                            <input class="form-control" name="email" type="email">
                                       </div>
                                       <div class="mb-3">
                                        <label class="col-form-label" for="recipient-name">Nomor Telepon:</label>
                                        <input class="form-control" name="phone" type="text">
                                       </div>
                                       <div class="mb-3">
                                        <label class="col-form-label" for="recipient-name">Password:</label>
                                        <input class="form-control" name="password" type="password">
                                       </div>
                                       <div class="mb-3">
                                         <label class="col-form-label">Tambahkan Role :</label>
                                         <select class="js-example-basic-multiple col-sm-12" name="role">
                                            @foreach ($roles as $item)
                                             <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                         </select>
                                       </div>
                                       <div class="modal-footer">
                                           <button type="submit" class="btn btn-primary">Simpan</button>
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
