@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="card-body">
            <form class="theme-form shadow p-3 mb-5 bg-white rounded col-sm-12" action="{{ route('update-role') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input class="form-control" name="id" type="text" value="{{ $role->id }}" hidden>
                    <div class="col-sm-3 ">
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="exampleInputEmail1">Role Name</label>
                            <input id="m" class="form-control" name="name" id="exampleInputEmail1" type="text"
                                aria-describedby="emailHelp" placeholder="Role" value="{{ $role->name }}" />
                        </div>
                        <button class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                    <div class="col-sm-9 nav-md-mt">
                        <div>
                          <label class="col-form-label pt-0" for="exampleInputEmail1">Permissions Selected <b>({{ $role->permissions->count() }})</b></label>
                        </div>
                        @foreach ($permissions as $item)
                            <ul class="icon-lists border navs-icon style-1" id="accordionoc">
                                <li>
                                    <a href="#" class="btn btn-link text-muted collapsed pb-0"
                                        data-bs-toggle="collapse" data-bs-target="#collapseicon{{ $item->id }}"
                                        aria-expanded="false"><i data-feather="chevrons-right"></i>
                                        <h6>{{ $item->name }}</h6>
                                    </a>
                                    <ul class="collapse" id="collapseicon{{ $item->id }}" data-parent="#accordionoc">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button class="btn btn-primary ga-bt" id="give-all-{{ $item->id }}"
                                                type="button">Give all Permissions</button>
                                            <button class="btn btn-danger  rv-bt" id="revoke-all-{{ $item->id }}"
                                                type="button">Revoke all Permissions</button>
                                        </div>
                                        @foreach ($item->children as $permission)
                                            <li class="pl-navs-inline">
                                                <div class="media">
                                                    <div class="media-body switch-md row">
                                                        <div class="col-sm-3">
                                                            <label class="switch">
                                                                @if (in_array($permission->id, $role->permissions->pluck('id')->toArray()))
                                                                    <input
                                                                        class="give-all-{{ $item->id }} revoke-all-{{ $item->id }}"
                                                                        type="checkbox"
                                                                        name="permission[{{ $permission->id }}]"
                                                                        checked><span class="switch-state"></span>
                                                                @else
                                                                    <input
                                                                        class="give-all-{{ $item->id }} revoke-all-{{ $item->id }}"
                                                                        type="checkbox"
                                                                        name="permission[{{ $permission->id }}]"><span
                                                                        class="switch-state"></span>
                                                                @endif
                                                            </label>
                                                            <label class="col-form-label">&nbsp
                                                                &nbsp{{ $permission->name }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </form>
        </div>
        <script src="{{ asset('build/template/assets/js/jquery-3.5.1.min.js') }}"></script>
        {{-- @push('custom-script')     --}}
        <script>
            $(document).ready(function() {
                $('.ga-bt').on('click', function(e) {
                    e.preventDefault();
                    var id = $(this).attr('id');
                    $(`.${id}`).attr('checked', true);
                    //  alert(id);
                });

                $('.rv-bt').on('click', function(e) {
                    e.preventDefault();
                    var id = $(this).attr('id');
                    $(`.${id}`).attr('checked', false);
                    //  alert(id);
                });
            });
        </script>
        {{-- @endpush --}}
    @endsection
