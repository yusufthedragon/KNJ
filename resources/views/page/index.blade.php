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