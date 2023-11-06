<div class="page-main-header">
  <div class="main-header-right row m-0">
      <div class="main-header-left">
          <div class="logo-wrapper"></div>
          <div class="dark-logo-wrapper"><a href="{{asset('build/template/dashboard')}}"><img
                      class="img-fluid"
                      src="{{asset('build/template/assets/images/logo/dark-logo.png')}}"
                      alt=""></a></div>
          <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center"
                  id="sidebar-toggle"> </i></div>
      </div>
      <div class="left-menu-header col">
          <ul>
              <li>
                  {{-- <form class="form-inline search-form">
                      <div class="search-bg"><i data-feather="search"></i>
                          <input class="form-control-plaintext" placeholder="Search here.....">
                      </div>
                  </form>
                  <span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span> --}}
              </li>
          </ul>
      </div>
      <div class="nav-right col pull-right right-menu p-0">
          <ul class="nav-menus">
              <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                          data-feather="maximize"></i></a></li>
            
              <li>
                  <div class="mode"><i class="fa fa-moon-o"></i></div>
              </li>
              <li class="onhover-dropdown">
                <div class="bookmark-box"><img class="img-50 rounded-circle" src="{{ Auth::user()->profile_photo_url ? Auth::user()->profile_photo_url : asset('build/template/assets/images/dashboard/1.png') }}"alt="" /></div>
                <div class="bookmark-dropdown onhover-show-div">
                    <ul>
                        <li class="add-to-bookmark">
                            @if (!request()->is('user/profile'))

                            <i class="bookmark-icon"data-feather="more-vertical"></i> 
                            @endif
                            <a href="{{ route('profile.show') }}">Profile Account</a></li>
                                    <li class="add-to-bookmark">
                                        <span>
                                            <i class="fa fa-sign-out mr-1"></i>
                                            <a href="#" onclick="$('#logout').submit();" class="btn btn-primary-light">Logout</a>
                                        </span>
                                        <form method="POST" action="{{ route('logout') }}" id="logout">
                                            @csrf
                                        </form>
            
                                    </li>
                    </ul>
                </div>
            </li>
             
              <li class="onhover-dropdown p-0">
               
                   
              </li>
          </ul>
      </div>
      <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
  </div>
</div>