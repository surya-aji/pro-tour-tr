@extends('layouts.main')
@section('content')



<div class="container-fluid">
  <div class="email-wrap bookmark-wrap">
    <div class="row">
      <div class="col-xl-3 box-col-4 xl-30">
        <div class="email-sidebar"><a class="btn btn-primary email-aside-toggle" href="javascript:void(0)">bookmark filter</a>
          <div class="email-left-aside">
            <div class="card">
              <div class="card-body">
                <div class="email-app-sidebar left-bookmark">
                  <div class="media">
                    <div class="media-size-email"><img class="me-3 rounded-circle" src="{{asset('build/template/assets/images/user/user.png')}}" alt=""></div>
                    <div class="media-body">
                      <h6 class="f-w-600">{{$pegawai->nama}}</h6>
                      <p>{{$pegawai->nip}}</p>
                    </div>
                  </div>
                  <ul class="nav main-menu mt-3" role="tablist">
                    <li class="nav-item">
                      <button class="badge-light btn-block btn-mail text-center" type="button">{{$pegawai->jabatan}}</button>
                    </li>
                  </ul>
                </div>
                <hr>
                <div class="navigation-option">
                  <ul>
                    <li><a href="javascript:void(0)"><i data-feather="calendar"></i>Cuti Tahunan</a>
                      <li><a href="javascript:void(0)"></i>{{date('Y') - 2}}</a><span class="badge badge-primary badge-pill pull-right">{{$sisa_th->tahun_tiga}}</span></li>
                      <li><a href="javascript:void(0)"></i>{{date('Y') - 1}}</a><span class="badge badge-primary badge-pill pull-right">{{$sisa_th->tahun_dua}}</span></li>
                      <li><a href="javascript:void(0)"></i>{{date('Y')}}</a><span class="badge badge-primary badge-pill pull-right">{{$sisa_th->tahun_satu}}</span></li>
                    </li>
                    <hr>
                    <li><a href="javascript:void(0)"><i data-feather="alert-octagon"></i>Cuti Karena Alasan Penting</a><span class="badge badge-primary badge-pill pull-right">{{$sisa_cap}}</span></li>
                    <li><a href="javascript:void(0)"><i data-feather="thermometer"></i>Cuti Karena Sakit</a><span class="badge badge-primary badge-pill pull-right">{{$sisa_cs}}</span></li>
                    <li><a href="javascript:void(0)"><i data-feather="file-text"></i>Cuti Besar</a><span class="badge badge-primary badge-pill pull-right">{{$sisa_cb}}</span></li>
                    <li><a href="javascript:void(0)"><i data-feather="users"></i>Cuti Melahirkan</a><span class="badge badge-primary badge-pill pull-right">{{$sisa_cm}}</span></li>
                    <li><a href="javascript:void(0)"><i data-feather="x-square"></i>Cuti di Luar Tanggungan Negara</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-9 col-md-12 box-col-8 xl-70">
        <div class="email-right-aside bookmark-tabcontent">
          <div class="card email-body radius-left">
            <div class="ps-0">
              <div class="tab-content">
                <div class="tab-pane fade active show" id="pills-created" role="tabpanel" aria-labelledby="pills-created-tab">
                  <div class="card mb-0">
                    <div class="card-header">
                      <h5 class="mb-0">{{$title}}</h5><a class="f-w-600" href="{{route('cetak-kartu-cuti',$pegawai->id)}}"><i class="me-2" data-feather="printer"></i>Print</a>
                    </div>
                    
                    <div class="card-body p-3">
                      <div class="table-responsive">
                        <table class="display dataTable" id="basic-3">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Cuti</th>
                                    <th>Surat Izin / Surat Keputusan</th>
                                    <th>Lama Cuti</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($riwayat as $item)    
                              <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$item->jenis_cuti->jenis_cuti}}</td>
                                  <td>{{$item->nomor_surat}} / {{$item->created_at}}</td>
                                  <td>{{$item->lama_hari}} hari</td>
                              </tr>
                              @endforeach
                            <tfoot>
                                <tr>
                                  <th>No</th>
                                  <th>Jenis Cuti</th>
                                  <th>Surat Izin / Surat Keputusan</th>
                                  <th>Lama Cuti</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    </div>
                  </div>
                </div>
                <div class="fade tab-pane" id="pills-todaytask" role="tabpanel" aria-labelledby="pills-todaytask-tab">
                  <div class="card mb-0">
                    <div class="card-header d-flex">
                      <h6 class="mb-0">Today's Tasks</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>Print</a>
                    </div>
                    <div class="card-body">
                      <div class="details-bookmark text-center">
                        <div class="row" id="favouriteData"></div>
                        <div class="no-favourite"><span>No task due today.</span></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="fade tab-pane" id="pills-delayed" role="tabpanel" aria-labelledby="pills-delayed-tab">
                  <div class="card mb-0">
                    <div class="card-header d-flex">
                      <h6 class="mb-0">Delayed Tasks</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>Print</a>
                    </div>
                    <div class="card-body">
                      <div class="details-bookmark text-center"><span>No tasks found.</span></div>
                    </div>
                  </div>
                </div>
                <div class="fade tab-pane" id="pills-upcoming" role="tabpanel" aria-labelledby="pills-upcoming-tab">
                  <div class="card mb-0">
                    <div class="card-header d-flex">
                      <h6 class="mb-0">Upcoming Tasks</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>Print</a>
                    </div>
                    <div class="card-body">
                      <div class="details-bookmark text-center"><span>No tasks found.</span></div>
                    </div>
                  </div>
                </div>
                <div class="fade tab-pane" id="pills-weekly" role="tabpanel" aria-labelledby="pills-weekly-tab">
                  <div class="card mb-0">
                    <div class="card-header d-flex">
                      <h6 class="mb-0">This Week Tasks</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>Print</a>
                    </div>
                    <div class="card-body">
                      <div class="details-bookmark text-center"><span>No tasks found.</span></div>
                    </div>
                  </div>
                </div>
                <div class="fade tab-pane" id="pills-monthly" role="tabpanel" aria-labelledby="pills-monthly-tab">
                  <div class="card mb-0">
                    <div class="card-header d-flex">
                      <h6 class="mb-0">This Month Tasks</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>Print</a>
                    </div>
                    <div class="card-body">
                      <div class="details-bookmark text-center"><span>No tasks found.</span></div>
                    </div>
                  </div>
                </div>
                <div class="fade tab-pane" id="pills-assigned" role="tabpanel" aria-labelledby="pills-assigned-tab">
                  <div class="card mb-0">
                    <div class="card-header d-flex">
                      <h6 class="mb-0">Assigned to me</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>Print</a>
                    </div>
                    <div class="card-body p-0">
                      <div class="taskadd">
                        <div class="table-responsive">
                          <table class="table">
                            <tr>
                              <td>
                                <h6 class="task_title_0">Task name</h6>
                                <p class="project_name_0">General</p>
                              </td>
                              <td>
                                <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                              </td>
                              <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                              <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                            </tr>
                            <tr>
                              <td>
                                <h6 class="task_title_0">Task name</h6>
                                <p class="project_name_0">General</p>
                              </td>
                              <td>
                                <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                              </td>
                              <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                              <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                            </tr>
                            <tr>
                              <td>
                                <h6 class="task_title_0">Task name</h6>
                                <p class="project_name_0">General</p>
                              </td>
                              <td>
                                <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                              </td>
                              <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                              <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                            </tr>
                            <tr>
                              <td>
                                <h6 class="task_title_0">Task name</h6>
                                <p class="project_name_0">General</p>
                              </td>
                              <td>
                                <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                              </td>
                              <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                              <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                            </tr>
                            <tr>
                              <td>
                                <h6 class="task_title_0">Task name</h6>
                                <p class="project_name_0">General</p>
                              </td>
                              <td>
                                <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                              </td>
                              <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                              <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="fade tab-pane" id="pills-tasks" role="tabpanel" aria-labelledby="pills-tasks-tab">
                  <div class="card mb-0">
                    <div class="card-header d-flex">
                      <h6 class="mb-0">My tasks</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>Print</a>
                    </div>
                    <div class="card-body p-0">
                      <div class="taskadd">
                        <div class="table-responsive">
                          <table class="table">
                            <tr>
                              <td>
                                <h6 class="task_title_0">Task name</h6>
                                <p class="project_name_0">General</p>
                              </td>
                              <td>
                                <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                              </td>
                              <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                              <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                            </tr>
                            <tr>
                              <td>
                                <h6 class="task_title_0">Task name</h6>
                                <p class="project_name_0">General</p>
                              </td>
                              <td>
                                <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                              </td>
                              <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                              <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                            </tr>
                            <tr>
                              <td>
                                <h6 class="task_title_0">Task name</h6>
                                <p class="project_name_0">General</p>
                              </td>
                              <td>
                                <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                              </td>
                              <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                              <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                            </tr>
                            <tr>
                              <td>
                                <h6 class="task_title_0">Task name</h6>
                                <p class="project_name_0">General</p>
                              </td>
                              <td>
                                <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                              </td>
                              <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                              <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                            </tr>
                            <tr>
                              <td>
                                <h6 class="task_title_0">Task name</h6>
                                <p class="project_name_0">General</p>
                              </td>
                              <td>
                                <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                              </td>
                              <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                              <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="fade tab-pane" id="pills-notification" role="tabpanel" aria-labelledby="pills-notification-tab">
                  <div class="card mb-0">
                    <div class="card-header d-flex">
                      <h6 class="mb-0">Notification</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>Print</a>
                    </div>
                    <div class="card-body">
                      <div class="details-bookmark text-center"><span>No tasks found.</span></div>
                    </div>
                  </div>
                </div>
                <div class="fade tab-pane" id="pills-newsletter" role="tabpanel" aria-labelledby="pills-newsletter-tab">
                  <div class="card mb-0">
                    <div class="card-header d-flex">
                      <h6 class="mb-0">Newsletter</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>Print</a>
                    </div>
                    <div class="card-body">
                      <div class="details-bookmark text-center"><span>No tasks found.</span></div>
                    </div>
                  </div>
                </div>
                <div class="modal fade modal-bookmark" id="createtag" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Create Tag</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">                                            </button>
                      </div>
                      <div class="modal-body">
                        <form class="form-bookmark needs-validation" novalidate="">
                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <label>Tag Name</label>
                              <input class="form-control" type="text" required="" autocomplete="off">
                            </div>
                            <div class="form-group col-md-12 mb-0">
                              <label>Tag color</label>
                              <input class="form-control fill-color" type="color" value="#24695c">
                            </div>
                          </div>
                          <button class="btn btn-secondary" type="button">Save</button>
                          <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
