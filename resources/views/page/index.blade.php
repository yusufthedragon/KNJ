@extends('page.header')
    @section('content')
    <section id="featured">
        <div class="camera_wrap" id="camera-slide">
            <!-- slide 1 here -->
            @foreach ($artikels as $key => $artikel)
                <div data-src="{{ asset('page/img/slides/camera/slide'.(random_int(1, 2)).'/img1'.'.jpg') }}">
                    <div class="camera_caption fadeFromLeft">
                        <div class="container">
                            <div class="row">
                                <div class="span6">
                                    <h2 class="animated fadeInDown"><strong><span class="colored">{{ $artikel->judul }}</span></strong></h2>
                                    @php
                                        $count = strlen($artikel->deskripsi);

                                        if ($count > 180) {
                                            $text = substr($artikel->deskripsi, 0, 180) . '...';
                                        } else {
                                            $text = $artikel->deskripsi;
                                        }
                                    @endphp
                                    <p class="animated fadeInUp" style="text-align: justify;">{{ $text }}</p>
                                    <a href="{{ route('artikel_detail.page', Str::slug($artikel->judul)) }}" class="btn btn-success btn-large animated fadeInUp">
                                        Lihat Selengkapnya
                                    </a>
                                </div>
                                <div class="span6">
                                    <img src="{{ asset('upload/artikel/cover/'.$artikel->cover) }}" style="width: 570px; height: 250px;" class="animated bounceInDown delay1" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="row">
                        <div class="span12">
                            <div class="aligncenter">
                                <h3><strong>Tentang Kami</strong></h3>
                                <br>
                            </div>
                        </div>
                        @foreach ($about_uses as $key => $about_us)
                        <div class="span6">
                            <div class="box @if ($key % 2 == 1) flyLeft @else flyRight @endif">
                                <div class="icon">
                                    <img src="{{ asset('upload/about_us/gambar/'.$about_us->gambar) }}" class="gambar-about-us" />
                                </div>
                                <div class="text about-us">
                                    <h4><strong>{{ $about_us->judul }}</strong></h4>
                                    <p>
                                    {{ $about_us->deskripsi }}
                                    </p>
                                </div>
                            </div>
                            <br>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span12">
                    <div class="solidline"></div>
                </div>
            </div>
            <div class="row">
                <div class="span12">
                    <div class="aligncenter">
                        <h3><strong>Kepengurusan</strong></h3>
                    </div>
                </div>
                <div class="span12">
                    <div id="myCarousel" class="carousel slide">
                        <ol class="carousel-indicators">
                            @foreach ($kepengurusans as $key => $kepengurusan)
                                <li data-target="#myCarousel" data-slide-to="{{ $key }}" @if ($key == 0) class="active" @endif></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($kepengurusans as $key => $kepengurusan)
                            <div class="item @if ($key == 0)active @endif">
                                <div class="team-box thumbnail">
                                    <img src="{{ asset('upload/kepengurusan/foto/'.$kepengurusan->foto) }}" class="foto-kepengurusan" />
                                    <div class="caption">
                                        <h5>{{ $kepengurusan->nama }}</h5>
                                        <p>
                                            {{ $kepengurusan->jabatan }}
                                        </p>
                                        <p style="font-style: italic;">
                                            &ldquo;{{ $kepengurusan->pendapat }}&rdquo;
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span12">
                    <div class="solidline"></div>
                </div>
            </div>
{{-- 
        <div class="row">
          <div class="span12">
            <div class="row">
              <div class="span12">
                <div class="aligncenter">
                  <h3>Our <strong>Pricing</strong></h3>
                  <p>Lorem ipsum dolor sit amet, labores dolorum scriptorem eum an, te quodsi sanctus neglegentur.
                  </p>
                </div>
              </div>
            </div>


            <div class="row">

              <div class="span3">
                <div class="pricing-box-wrap animated-fast flyIn">
                  <div class="pricing-heading">
                    <h3>Very <strong>Basic</strong></h3>
                  </div>
                  <div class="pricing-terms">
                    <h6>&#36;15.00 / Month</h6>
                  </div>
                  <div class="pricing-content">
                    <ul>
                      <li><i class="icon-ok"></i> 100 applications</li>
                      <li><i class="icon-ok"></i> 24x7 support available</li>
                      <li><i class="icon-ok"></i> No hidden fees</li>
                      <li><i class="icon-ok"></i> Free 30-days trial</li>
                      <li><i class="icon-ok"></i> Stop anytime easily</li>
                    </ul>
                  </div>
                  <div class="pricing-action">
                    <a href="#" class="btn btn-medium btn-theme"><i class="icon-chevron-down"></i> Sign Up</a>
                  </div>
                </div>
              </div>

              <div class="span3">
                <div class="pricing-box-wrap animated-fast flyIn">
                  <div class="pricing-heading">
                    <h3>Simple <strong>Choice</strong></h3>
                  </div>
                  <div class="pricing-terms">
                    <h6>&#36;20.00 / Month</h6>
                  </div>
                  <div class="pricing-content">
                    <ul>
                      <li><i class="icon-ok"></i> 100 applications</li>
                      <li><i class="icon-ok"></i> 24x7 support available</li>
                      <li><i class="icon-ok"></i> No hidden fees</li>
                      <li><i class="icon-ok"></i> Free 30-days trial</li>
                      <li><i class="icon-ok"></i> Stop anytime easily</li>
                    </ul>
                  </div>
                  <div class="pricing-action">
                    <a href="#" class="btn btn-medium btn-theme"><i class="icon-chevron-down"></i> Sign Up</a>
                  </div>
                </div>
              </div>

              <div class="span3">
                <div class="pricing-box-wrap special animated-slow flyIn">
                  <div class="pricing-heading">
                    <h3>Special <strong>Choice</strong></h3>
                  </div>
                  <div class="pricing-terms">
                    <h6>&#36;15.00 / Month</h6>
                  </div>
                  <div class="pricing-content">
                    <ul>
                      <li><i class="icon-ok"></i> 100 applications</li>
                      <li><i class="icon-ok"></i> 24x7 support available</li>
                      <li><i class="icon-ok"></i> No hidden fees</li>
                      <li><i class="icon-ok"></i> Free 30-days trial</li>
                      <li><i class="icon-ok"></i> Stop anytime easily</li>
                    </ul>
                  </div>
                  <div class="pricing-action">
                    <a href="#" class="btn btn-medium btn-theme"><i class="icon-chevron-down"></i> Sign Up</a>
                  </div>
                </div>
              </div>

              <div class="span3">
                <div class="pricing-box-wrap animated flyIn">
                  <div class="pricing-heading">
                    <h3>Just <strong>Happy</strong></h3>
                  </div>
                  <div class="pricing-terms">
                    <h6>&#36;15.00 / Month</h6>
                  </div>
                  <div class="pricing-content">
                    <ul>
                      <li><i class="icon-ok"></i> 100 applications</li>
                      <li><i class="icon-ok"></i> 24x7 support available</li>
                      <li><i class="icon-ok"></i> No hidden fees</li>
                      <li><i class="icon-ok"></i> Free 30-days trial</li>
                      <li><i class="icon-ok"></i> Stop anytime easily</li>
                    </ul>
                  </div>
                  <div class="pricing-action">
                    <a href="#" class="btn btn-medium btn-theme"><i class="icon-chevron-down"></i> Sign Up</a>
                  </div>
                </div>
              </div>
            </div>

          </div>


        </div>



        <div class="row">
          <div class="span12 aligncenter">
            <h3 class="title">What people <strong>saying</strong> about us</h3>
            <div class="blankline30"></div>

            <ul class="bxslider">
              <li>
                <blockquote>
                  Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis feugiat.Suspendisse eu erat quam. Vivamus porttitor eros quis nisi lacinia sed interdum lorem vulputate. Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis
                  feugiat
                </blockquote>
                <div class="testimonial-autor">
                  <img src="img/dummies/testimonial/1.png" alt="" />
                  <h4>Hillary Doe</h4>
                  <a href="#">www.companyname.com</a>
                </div>
              </li>
              <li>
                <blockquote>
                  Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis feugiat.Suspendisse eu erat quam. Vivamus porttitor eros quis nisi lacinia sed interdum lorem vulputate. Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis
                  feugiat
                </blockquote>
                <div class="testimonial-autor">
                  <img src="img/dummies/testimonial/2.png" alt="" />
                  <h4>Michael Doe</h4>
                  <a href="#">www.companyname.com</a>
                </div>
              </li>
              <li>
                <blockquote>
                  Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis feugiat.Suspendisse eu erat quam. Vivamus porttitor eros quis nisi lacinia sed interdum lorem vulputate. Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis
                  feugiat
                </blockquote>
                <div class="testimonial-autor">
                  <img src="img/dummies/testimonial/3.png" alt="" />
                  <h4>Mark Donovan</h4>
                  <a href="#">www.companyname.com</a>
                </div>
              </li>
              <li>
                <blockquote>
                  Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis feugiat.Suspendisse eu erat quam. Vivamus porttitor eros quis nisi lacinia sed interdum lorem vulputate. Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis
                  feugiat
                </blockquote>
                <div class="testimonial-autor">
                  <img src="img/dummies/testimonial/4.png" alt="" />
                  <h4>Marry Doe Elliot</h4>
                  <a href="#">www.companyname.com</a>
                </div>
              </li>
            </ul>

          </div>
        </div> --}}

        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="span12">
                    <h4 class="title"><strong>Projects</strong></h4>
                    <div id="da-slider" class="da-slider">
                    @foreach ($projects as $key => $project)
                        <div class="da-slide">
                            <h2>{{ $project->judul }}</h2>
                            @php
                                $count = strlen($project->deskripsi);

                                if ($count > 200) {
                                    $text = substr($project->deskripsi, 0, 200) . '...';
                                } else {
                                    $text = $project->deskripsi;
                                }
                            @endphp
                            <p style="text-align: justify;">{{ $text }}</p>
                            <a href="{{ route('project_detail.page', Str::slug($project->judul)) }}" class="btn btn-theme btn-large da-link">Lihat Selengkapnya</a>
                            <div class="da-img"><img src="{{ asset('upload/project/cover/'.$project->cover) }}" class="cover-project" /></div>
                        </div>
                        <nav class="da-arrows">
                            <span class="da-arrows-prev"></span>
                            <span class="da-arrows-next"></span>
                        </nav>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection