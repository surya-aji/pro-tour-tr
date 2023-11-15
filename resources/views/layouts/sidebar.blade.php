<header class="main-nav">
    @if (!request()->is('user/profile'))
    <div class="sidebar-user text-center"><a class="setting-primary" href="javascript:void(0)">
       
        <i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="{{ Auth::user()->profile_photo_url ? Auth::user()->profile_photo_url : asset('build/template/assets/images/dashboard/1.png') }}" alt="">
        <div class="badge-bottom"><span class="badge badge-primary">New</span></div><a href="user-profile.html">
          <h6 class="mt-3 f-14 f-w-600">{{Auth::user()->name}}</h6></a>
        <p class="mb-0 font-roboto">{{Auth::user()->role}}</p>
        {{-- <ul>
          <li><span><span class="counter">19.8</span>k</span>
            <p>Follow</p>
          </li>
          <li><span>2 year</span>
            <p>Experince</p>
          </li>
          <li><span><span class="counter">95.2</span>k</span>
            <p>Follower </p>
          </li>
        </ul> --}}
      </div>
      @endif
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>General</h6>
                        </div>
                    </li>
                    <li>
                        <a class=" {{ Request::segment(2) === 'dashboard' ? 'active' : '' }}"
                            href="<?= url('/dashboard') ?>">
                            @if (!request()->is('user/profile'))
                            <i data-feather="home"></i>
                            @endif
                            <span>Beranda</span></a>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Module</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        @role('super-admin')
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            @if (!request()->is('user/profile'))
                            <i data-feather="user"></i>
                            @endif
                            <span>Manajemen User</span></a>
                        <ul class="nav-submenu menu-content" style="display: none;">
                            <li><a href="{{ route('index-user') }}" class="">User</a></li>
                            <li><a href="{{ route('index-role') }}"" class="">Role</a></li>
                            <li><a href="<?= url('/user-management/permission') ?>"" class="">Hak Akses</a></li>
                        </ul>
                        @endrole

                        <a class="nav-link menu-title" href="javascript:void(0)">
                            @if (!request()->is('user/profile'))
                            <i data-feather="users"></i>
                            @endif
                            <span>Pegawai</span></a>
                        <ul class="nav-submenu menu-content" style="display: none;">
                            <li><a href="{{ route('index-pegawai') }}" class="">Data Pegawai</a></li>
                        </ul>

                        <a class="nav-link menu-title" href="javascript:void(0)">
                            @if (!request()->is('user/profile'))
                            <i data-feather="file-text"></i>
                            @endif
                            <span>Cuti</span></a>
                        <ul class="nav-submenu menu-content" style="display: none;">
                            <li><a href="{{ route('index-data-cuti') }}" class="">Data Pengajuan Cuti</a></li>
                            <li><a href="{{ route('index-riwayat-cuti') }}" class="">Riwayat Cuti Pegawai</a></li>
                            <li><a href="{{ route('kendali-cuti') }}" class="">Kendali Cuti Tahunan</a></li>
                        </ul>

                        <a class="nav-link menu-title" href="javascript:void(0)">
                            @if (!request()->is('user/profile'))
                            <i data-feather="mail"></i>
                            @endif
                            <span>Surat Tugas</span></a>
                        <ul class="nav-submenu menu-content" style="display: none;">
                            <li><a href="{{ route('index-surat-tugas') }}" class="">Surat Tugas</a></li>
                            <li><a href="{{ route('index-spd') }}" class="">Surat Perjalanan Dinas</a></li>
                        </ul>


                        @role('super-admin')
                        <a class="nav-link menu-title " href="javascript:void(0)">
                            @if (!request()->is('user/profile'))
                            <i data-feather="sliders"></i>
                            @endif
                            <span>Pengaturan</span></a>
                        <ul class="nav-submenu menu-content" style="display: none;">
                            <li><a href="{{ route('index-setting') }}" class="">Pengaturan Template</a></li>
                            <li>
                                    <a href="{{ route('reset-jatah-cuti') }}" class="btn btn-danger text-white">Reset Cuti Tahunan</a>

                            </li>
                        </ul>
                        @endrole


                        @role('super-admin')

                        <a class="nav-link menu-title" href="javascript:void(0)">
                            @if (!request()->is('user/profile'))
                            <i data-feather="archive"></i>
                            @endif
                            <span>History</span></a>
                        <ul class="nav-submenu menu-content" style="display: none;">
                            <li><a href="{{ route('index-history') }}" class="">Log</a></li>
                        </ul>
                        @endrole

                    </li>


                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
