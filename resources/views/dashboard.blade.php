@extends('layouts.main')
@section('content')
    <div class="container-fluid dashboard-default-sec">
        <div class="row">
            <div class="col-xl-6 box-col-12 des-xl-100">
                <div class="row">
                    <div class="col-xl-12 col-md-6 box-col-6 des-xl-50">
                        <div class="card profile-greeting">
                            <div class="card-header">
                                <div class="header-top">
                                </div>
                            </div>
                            <div class="card-body text-center p-t-0">
                                <h3 class="font-dark">Selamat Datang, {{ Auth::user()->name }}</h3>
                                <p class="font-dark">Selamat Datang, kami senang Anda mengunjungi Halaman
                                    dashboard. kami akan dengan senang hati membantu Anda</p>
                                <button class="btn btn-light">Have Fun !!!</button>
                            </div>
                            <div class="confetti">
                                <div class="confetti-piece"></div>
                                <div class="confetti-piece"></div>
                                <div class="confetti-piece"></div>
                                <div class="confetti-piece"></div>
                                <div class="confetti-piece"></div>
                                <div class="confetti-piece"></div>
                                <div class="confetti-piece"></div>
                                <div class="confetti-piece"></div>
                                <div class="confetti-piece"></div>
                                <div class="confetti-piece"></div>
                                <div class="confetti-piece"></div>
                                <div class="confetti-piece"></div>
                                <div class="confetti-piece"></div>
                                <div class="code-box-copy">
                                    <button class="code-box-copy__btn btn-clipboard"
                                        data-clipboard-target="#profile-greeting" title="Copy"><i
                                            class="icofont icofont-copy-alt"></i></button>
                                    <pre><code class="language-html" id="profile-greeting">                                     &lt;div class="card profile-greeting"&gt;
                                        &lt;div class="card-header"&gt;
                                        &lt;div class="header-top"&gt;
                                          &lt;div class="setting-list bg-primary"&gt;
                                            &lt;ul class="list-unstyled setting-option"&gt;
                                              &lt;li&gt;&lt;div class="setting-white"&gt;&lt;i class="icon-settings"&gt;&lt;/i&gt;&lt;/div&gt;&lt;/li&gt;
                                              &lt;li&gt;&lt;i class="view-html fa fa-code font-white"&gt;&lt;/i&gt;&lt;/li&gt;
                                              &lt;li&gt;&lt;i class="icofont icofont-maximize full-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
                                              &lt;li&gt;&lt;i class="icofont icofont-minus minimize-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
                                              &lt;li&gt;&lt;i class="icofont icofont-refresh reload-card font-white"&gt;&lt;/i&gt;&lt;/li&gt;
                                              &lt;li&gt;&lt;i class="icofont icofont-error close-card font-white"&gt; &lt;/i&gt;&lt;/li&gt;
                                            &lt;/ul&gt;
                                          &lt;/div&gt;
                                        &lt;/div&gt;
                                        &lt;/div&gt;
                                        &lt;div class="card-body text-center"&gt;
                                        &lt;h3 class="font-light"&gt;Wellcome Back, John!!&lt;/h3&gt;
                                        &lt;p&gt;Lorem ipsum is simply dummy text of the printing and typesetting industry.Lorem ipsum has been&lt;/p&gt;
                                        &lt;button class="btn btn-light"&gt;Update &lt;/button&gt;
                                        &lt;/div&gt;
                                        &lt;/div&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="database"></i></div>
                            <div class="media-body"><span class="m-0">Jumlah Surat Tugas</span>
                                <h4 class="mb-0 counter">{{ $j_st }}</h4><i class="icon-bg"
                                    data-feather="database"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card o-hidden border-0">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="user-plus"></i></div>
                            <div class="media-body"><span class="m-0">Jumlah Pengguna</span>
                                <h4 class="mb-0 counter">{{ $j_user }}</h4><i class="icon-bg"
                                    data-feather="user-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-secondary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="shopping-bag"></i></div>
                            <div class="media-body"><span class="m-0">Jumlah Surat Dinas</span>
                                <h4 class="mb-0 counter">{{ $j_spd }}</h4><i class="icon-bg"
                                    data-feather="shopping-bag"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card o-hidden border-0">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                            <div class="media-body"><span class="m-0">Jumlah Pegawai</span>
                                <h4 class="mb-0 counter">{{ $j_peg }}</h4><i class="icon-bg"
                                    data-feather="message-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>



    <div class="container-fluid general-widget">
        <div class="row">

            <div class="col-xl-6 xl-100 box-col-12">
                <div class="card">
                    <div class="cal-date-widget card-body">
                        <div class="row">
                            <div class="col-xl-6 col-xs-12 col-md-6 col-sm-6">
                                <div class="cal-info text-center">
                                    <div>
                                        <h2>{{ date('d') }}</h2>
                                        <div class="d-inline-block"><span
                                                class="b-r-dark pe-3">{{ date('F') }}</span><span
                                                class="ps-3">{{ date('Y') }}</span></div>
                                        <p class="f-16">Salam, {{ Auth::user()->name }}. Anda berada di Dashboard Utama.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-xs-12 col-md-6 col-sm-6">
                                <div class="cal-datepicker">
                                    <div class="datepicker-here float-sm-end" data-language="en"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-xl-6 col-50 box-col-6 des-xl-50">
                <div class="card latest-update-sec">
                    <div class="card-header">
                        <div class="header-top d-sm-flex align-items-center">
                            <h5>Yang Baru - baru dikerjakan</h5>
                            <div class="center-content">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordernone">
                                <tbody>
                                    @foreach ($latestAct as $item)
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="media-body"><span>{{ $item->subject }}</span>
                                                        {{-- <pre>{{$item->properties}}</pre> --}}
                                                        <p>Selesai
                                                            {{ $item->updated_at->diffInHours(\Carbon\Carbon::now()) }} Jam
                                                            yang lalu</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><a href="" target="">{{ $item->ip_address }}</a></td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#latest-update-sec"
                                title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                            <pre><code class="language-html" id="latest-update-sec">                                     &lt;div class="card latest-update-sec"&gt;
            &lt;div class="card-header"&gt;
            &lt;div class="header-top d-sm-flex align-items-center"&gt;
              &lt;h5&gt; Latest Update &lt;/h5&gt;
                &lt;div class="center-content" &gt;
                  &lt;ul class="week-date" &gt;
                      &lt;li class="font-primary"&gt; Today &lt;/li&gt;
                      &lt;li &gt; Month &lt;/li&gt;
                  &lt;/ul&gt;
              &lt;/div&gt;
              &lt;div class="setting-list"&gt;
                &lt;ul class="list-unstyled setting-option"&gt;
                  &lt;li&gt;&lt;div class="setting-primary"&gt;&lt;i class="icon-settings"&gt;&lt;/i&gt;&lt;/div&gt;&lt;/li&gt;
                  &lt;li&gt;&lt;i class="view-html fa fa-code font-primary"&gt;&lt;/i&gt;&lt;/li&gt;
                  &lt;li&gt;&lt;i class="icofont icofont-maximize full-card font-primary"&gt;&lt;/i&gt;&lt;/li&gt;
                  &lt;li&gt;&lt;i class="icofont icofont-minus minimize-card font-primary"&gt;&lt;/i&gt;&lt;/li&gt;
                  &lt;li&gt;&lt;i class="icofont icofont-refresh reload-card font-primary"&gt;&lt;/i&gt;&lt;/li&gt;
                  &lt;li&gt;&lt;i class="icofont icofont-error close-card font-primary"&gt; &lt;/i&gt;&lt;/li&gt;
                &lt;/ul&gt;
              &lt;/div&gt;
            &lt;/div&gt;
            &lt;/div&gt;
            &lt;div class="card-body px-0"&gt;
            &lt;div class="table-responsive"&gt;
                &lt;table class="table table-bordernone"&gt;
                    &lt;tbody&gt;
                      &lt;tr&gt;
                        &lt;td&gt;
                              &lt;div class="media"&gt;
                                    &lt;svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve"&gt;
                                      &lt;g&gt;
                                        &lt;g&gt;
                                          &lt;path d="M506.35,80.699c-7.57-7.589-19.834-7.609-27.43-0.052L331.662,227.31l-42.557-42.557c-7.577-7.57-19.846-7.577-27.423,0 L89.076,357.36c-7.577,7.57-7.577,19.853,0,27.423c3.782,3.788,8.747,5.682,13.712,5.682c4.958,0,9.93-1.894,13.711-5.682 l158.895-158.888l42.531,42.524c7.57,7.57,19.808,7.577,27.397,0.032l160.97-160.323 C513.881,100.571,513.907,88.288,506.35,80.699z"&gt;&lt;/path&gt;
                                        &lt;/g&gt;
                                      &lt;/g&gt;
                                      &lt;g&gt;
                                        &lt;g&gt;
                                          &lt;path d="M491.96,449.94H38.788V42.667c0-10.712-8.682-19.394-19.394-19.394S0,31.955,0,42.667v426.667 c0,10.712,8.682,19.394,19.394,19.394H491.96c10.712,0,19.394-8.682,19.394-19.394C511.354,458.622,502.672,449.94,491.96,449.94z "&gt;&lt;/path&gt;
                                        &lt;/g&gt;
                                      &lt;/g&gt;
                                      &lt;g&gt;
                                        &lt;g&gt;
                                          &lt;path d="M492.606,74.344H347.152c-10.712,0-19.394,8.682-19.394,19.394s8.682,19.394,19.394,19.394h126.061v126.067 c0,10.705,8.682,19.394,19.394,19.394S512,249.904,512,239.192V93.738C512,83.026,503.318,74.344,492.606,74.344z"&gt;&lt;/path&gt;
                                        &lt;/g&gt;
                                      &lt;/g&gt;
                                    &lt;/svg&gt;
                                &lt;div class="media-body"&gt;
                                    &lt;span&gt; Google project Apply Review&lt;/span&gt;
                                    &lt;p&gt; Complete in 3 Hours&lt;/p&gt;
                                &lt;/div&gt;
                              &lt;/div&gt;
                        &lt;/td&gt;
                        &lt;td&gt;
                          &lt;a href='https://laravel.pixelstrap.com/viho/dashboard' target='_blank'&gt; Edit
                          &lt;/a&gt;
                        &lt;/td&gt;
                        &lt;td&gt;
                          &lt;a href='https://laravel.pixelstrap.com/viho/dashboard' target='_blank'&gt; Detete
                          &lt;/a&gt;
                        &lt;/td&gt;
                      &lt;/tr&gt;
                      &lt;tr&gt;
                        &lt;td&gt;
                              &lt;div class="media"&gt;
                                  &lt;svg enable-background="new 0 0 512 512" viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"&gt;
                                        &lt;path d="m362 91v-60h-212v60h-150v390h512c0-16.889 0-372.29 0-390zm-182-30h152v30h-152zm302 390h-452v-202.844l90 36v46.844h90v-30h92v30h90v-46.844l90-36zm-302-150h-30v-60h30zm152-60h30v60h-30c0-7.259 0-52.693 0-60zm150-25.156-90 36v-40.844h-90v60h-92v-60h-90v40.844l-90-36c0-14.163 0-84.634 0-94.844h452z"&gt;&lt;/path&gt;
                                    &lt;/svg&gt;
                                &lt;div class="media-body"&gt;
                                    &lt;span&gt; Business Logo Create&lt;/span&gt;
                                    &lt;p&gt; Complete in 2 Days&lt;/p&gt;
                                &lt;/div&gt;
                              &lt;/div&gt;
                        &lt;/td&gt;
                        &lt;td&gt;
                          &lt;a href='https://laravel.pixelstrap.com/viho/dashboard' target='_blank'&gt; Edit
                          &lt;/a&gt;
                        &lt;/td&gt;
                        &lt;td&gt;
                          &lt;a href='https://laravel.pixelstrap.com/viho/dashboard' target='_blank'&gt; Detete
                          &lt;/a&gt;
                        &lt;/td&gt;
                      &lt;/tr&gt;
                      &lt;tr&gt;
                        &lt;td&gt;
                              &lt;div class="media"&gt;
                                  &lt;svg enable-background="new 0 0 512 512" viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"&gt;
                                        &lt;g&gt;
                                          &lt;path d="m345.622 126.038c-50.748-45.076-130.482-46.914-183.244 3.903-21.262 20.478-35.375 47.381-39.737 75.754-5.454 35.471 2.872 70.834 23.444 99.576 56.271 78.616 49.132 141.058 49.915 145.691 0 16.435 6.211 31.795 17.491 43.253 11.289 11.469 26.386 17.785 42.509 17.785 33.084 0 60-26.916 60-60 .686-4.269-6.11-72.81 47.676-143.691 17.875-23.557 27.324-51.673 27.324-81.309 0-38.547-16.54-75.347-45.378-100.962zm-89.622 355.962c-16.486 0-29.462-13.096-29.975-30h59.975c0 16.542-13.458 30-30 30zm83.777-191.826c-30.015 39.554-47.946 84.707-52.569 131.826h-62.57c-4.961-45.331-23.43-91.26-54.157-134.19-15.985-22.333-22.444-49.876-18.188-77.556 7.293-47.43 49.733-88.262 103.846-88.262 58.661 0 104.861 47.891 104.861 105.008 0 23.032-7.339 44.877-21.223 63.174z"&gt;&lt;/path&gt;<br />&lt;path d="m256 62c8.284 0 15-6.716 15-15v-32c0-8.284-6.716-15-15-15s-15 6.716-15 15v32c0 8.284 6.716 15 15 15z"&gt;&lt;/path&gt;<br />&lt;path d="m419.385 149.99 25.98-15c7.174-4.142 9.632-13.316 5.49-20.49-4.142-7.175-13.316-9.633-20.49-5.49l-25.98 15c-7.174 4.142-9.632 13.316-5.49 20.49 4.162 7.21 13.349 9.613 20.49 5.49z"&gt;&lt;/path&gt;<br />&lt;path d="m92.615 304.01-25.98 15c-7.174 4.142-9.632 13.316-5.49 20.49 4.163 7.21 13.35 9.613 20.49 5.49l25.98-15c7.174-4.142 9.632-13.316 5.49-20.49-4.141-7.175-13.316-9.632-20.49-5.49z"&gt;&lt;/path&gt;<br />&lt;path d="m338.5 84.105c7.141 4.124 16.33 1.716 20.49-5.49l15-25.98c4.142-7.174 1.684-16.348-5.49-20.49-7.174-4.144-16.349-1.685-20.49 5.49l-15 25.98c-4.142 7.175-1.684 16.348 5.49 20.49z"&gt;&lt;/path&gt;<br />&lt;path d="m153.01 78.615c4.163 7.21 13.35 9.613 20.49 5.49 7.174-4.142 9.632-13.316 5.49-20.49l-15-25.98c-4.142-7.174-13.315-9.633-20.49-5.49-7.174 4.142-9.632 13.316-5.49 20.49z"&gt;&lt;/path&gt;<br />&lt;path d="m445.365 319.01-25.98-15c-7.175-4.143-16.349-1.684-20.49 5.49-4.142 7.174-1.684 16.348 5.49 20.49l25.98 15c7.141 4.124 16.33 1.716 20.49-5.49 4.143-7.174 1.685-16.348-5.49-20.49z"&gt;&lt;/path&gt;<br />&lt;path d="m107.615 124.01-25.98-15c-7.175-4.144-16.348-1.684-20.49 5.49s-1.684 16.348 5.49 20.49l25.98 15c7.141 4.124 16.33 1.716 20.49-5.49 4.143-7.174 1.685-16.348-5.49-20.49z"&gt;&lt;/path&gt;<br />&lt;path d="m466 212h-30c-8.284 0-15 6.716-15 15s6.716 15 15 15h30c8.284 0 15-6.716 15-15s-6.716-15-15-15z"&gt;&lt;/path&gt;<br />&lt;path d="m91 227c0-8.284-6.716-15-15-15h-30c-8.284 0-15 6.716-15 15s6.716 15 15 15h30c8.284 0 15-6.716 15-15z"&gt;&lt;/path&gt;<br />&lt;path d="m275.394 216.394-19.394 19.393-19.394-19.393c-5.857-5.858-15.355-5.858-21.213 0s-5.858 15.355 0 21.213l25.607 25.606v53.787c0 8.284 6.716 15 15 15s15-6.716 15-15v-53.787l25.606-25.606c5.858-5.858 5.858-15.355 0-21.213-5.857-5.859-15.355-5.859-21.212 0z"&gt;&lt;/path&gt;
                                        &lt;/g&gt;
                                    &lt;/svg&gt;
                                &lt;div class="media-body"&gt;
                                    &lt;span&gt; Business Project Research&lt;/span&gt;
                                    &lt;p&gt; Due in 1 hour&lt;/p&gt;
                                &lt;/div&gt;
                              &lt;/div&gt;
                        &lt;/td&gt;
                        &lt;td&gt;
                          &lt;a href='https://laravel.pixelstrap.com/viho/dashboard' target='_blank'&gt; Edit
                          &lt;/a&gt;
                        &lt;/td&gt;
                        &lt;td&gt;
                          &lt;a href='https://laravel.pixelstrap.com/viho/dashboard' target='_blank'&gt; Detete
                          &lt;/a&gt;
                        &lt;/td&gt;
                      &lt;/tr&gt;
                      &lt;tr&gt;
                        &lt;td&gt;
                              &lt;div class="media"&gt;
                                  &lt;svg enable-background="new 0 0 512 512" viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"&gt;
                                        &lt;g&gt;
                                          &lt;path d="m512 390v-390h-512v390h241v32h-15c-41.355 0-75 33.645-75 75v15h210v-15c0-41.355-33.645-75-75-75h-15v-32zm-226 62c19.556 0 36.239 12.539 42.43 30h-144.86c6.191-17.461 22.874-30 42.43-30zm-256-92v-330h452v330c-12.164 0-438.947 0-452 0z"&gt;&lt;/path&gt;
                                          &lt;path d="m136 180c24.813 0 45-20.187 45-45s-20.187-45-45-45-45 20.187-45 45 20.187 45 45 45zm0-60c8.271 0 15 6.729 15 15s-6.729 15-15 15-15-6.729-15-15 6.729-15 15-15z"&gt;&lt;/path&gt;<br />&lt;path d="m184.568 197.848c-28.678-24.39-60.953-16.827-61.054-16.833-35.639 5.799-62.514 38.985-62.514 77.196v41.789h150v-45c0-22.034-9.634-42.865-26.432-57.152zm-3.568 72.152h-90v-11.789c0-23.666 16.049-44.122 37.332-47.584 13.509-2.198 26.578 1.38 36.801 10.074 10.083 8.577 15.867 21.078 15.867 34.299z"&gt;&lt;/path&gt;
                                          &lt;path d="m241 270h120v30h-120z"&gt;&lt;/path&gt;
                                          &lt;path d="m241 210h210v30h-210z"&gt;&lt;/path&gt;
                                          &lt;path d="m241 150h210v30h-210z"&gt;&lt;/path&gt;
                                          &lt;path d="m331 90h120v30h-120z"&gt;&lt;/path&gt;
                                          &lt;path d="m241 90h60v30h-60z"&gt;&lt;/path&gt;
                                          &lt;path d="m391 270h60v30h-60z"&gt;&lt;/path&gt;
                                        &lt;/g&gt;
                                    &lt;/svg&gt;
                                &lt;div class="media-body"&gt;
                                    &lt;span&gt; Recruitment in IT Depertment&lt;/span&gt;
                                    &lt;p&gt; Complete in 3 Hours&lt;/p&gt;
                                &lt;/div&gt;
                              &lt;/div&gt;
                        &lt;/td&gt;
                        &lt;td&gt;
                          &lt;a href='https://laravel.pixelstrap.com/viho/dashboard' target='_blank'&gt; Edit
                          &lt;/a&gt;
                        &lt;/td&gt;
                        &lt;td&gt;
                          &lt;a href='https://laravel.pixelstrap.com/viho/dashboard' target='_blank'&gt; Detete
                          &lt;/a&gt;
                        &lt;/td&gt;
                      &lt;/tr&gt;
                      &lt;tr&gt;
                        &lt;td&gt;
                              &lt;div class="media"&gt;
                                    &lt;svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"&gt;
                                        &lt;g&gt;
                                          &lt;g&gt;
                                            &lt;path d="M256,0C114.848,0,0,114.848,0,256s114.848,256,256,256s256-114.848,256-256S397.152,0,256,0z M256,480 C132.48,480,32,379.52,32,256S132.48,32,256,32s224,100.48,224,224S379.52,480,256,480z"&gt;&lt;/path&gt;
                                          &lt;/g&gt;
                                        &lt;/g&gt;
                                      &lt;g&gt;
                                        &lt;g&gt;
                                          &lt;path d="M340.688,292.688L272,361.376V96h-32v265.376l-68.688-68.688l-22.624,22.624l96,96c3.12,3.12,7.216,4.688,11.312,4.688 s8.192-1.568,11.312-4.688l96-96L340.688,292.688z"&gt;&lt;/path&gt;
                                        &lt;/g&gt;
                                      &lt;/g&gt;
                                    &lt;/svg&gt;
                                &lt;div class="media-body"&gt;
                                    &lt;span&gt; Submit Riverfront Project&lt;/span&gt;
                                    &lt;p&gt; Complete in 2 Days&lt;/p&gt;
                                &lt;/div&gt;
                              &lt;/div&gt;
                        &lt;/td&gt;
                        &lt;td&gt;
                          &lt;a href='https://laravel.pixelstrap.com/viho/dashboard' target='_blank'&gt; Edit
                          &lt;/a&gt;
                        &lt;/td&gt;
                        &lt;td&gt;
                          &lt;a href='https://laravel.pixelstrap.com/viho/dashboard' target='_blank'&gt; Detete
                          &lt;/a&gt;
                        &lt;/td&gt;
                      &lt;/tr&gt;
                    &lt;/tbody&gt;
                &lt;/table&gt;
            &lt;/div&gt;
            &lt;/div&gt;
            &lt;/div&gt;</code></pre>
                        </div>
                    </div>
                </div>

            </div>
        @endsection
