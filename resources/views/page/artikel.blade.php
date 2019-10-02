@extends('page.header')
@section('content')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="inner-heading">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a> <i class="icon-angle-right"></i></li>
                            <li class="active">Artikel</li>
                        </ul>
                        <h2>Artikel</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <ul class="team-categ filter">
                        <li class="all active"><a href="#">Semua Wilayah</a></li>
                        <li class="jakarta-utara"><a href="#" title="">Jakarta Utara</a></li>
                        <li class="jakarta-timur"><a href="#" title="">Jakarta Timur</a></li>
                        <li class="jakarta-selatan"><a href="#" title="">Jakarta Selatan</a></li>
                        <li class="jakarta-barat"><a href="#" title="">Jakarta Barat</a></li>
                        <li class="jakarta-pusat"><a href="#" title="">Jakarta Pusat</a></li>
                        <li class="luar-jakarta"><a href="#" title="">Luar Jakarta</a></li>
                    </ul>
                    <div class="clearfix"></div>
                    <div class="row">
                        <section id="team">
                            <ul id="thumbs" class="team">
                                @foreach ($artikels as $key => $artikel)
                                    <li class="item-thumbs span3 {{ Str::slug($artikel->wilayah) }}" data-id="id-{{ $key }}" data-type="{{ Str::slug($artikel->wilayah) }}">
                                        <div class="team-box thumbnail">
                                            <img src="{{ asset('upload/artikel/cover/'.$artikel->cover) }}" style="height: 171px; width: 228px;" />
                                            <div class="caption">
                                                <h5>{{ $artikel->judul }}</h5>
                                                @php
                                                    $count = strlen($artikel->deskripsi);

                                                    if ($count > 100) {
                                                        $text = substr($artikel->deskripsi, 0, 100) . '...';
                                                    } else {
                                                        $text = $artikel->deskripsi;
                                                    }
                                                @endphp
                                                <p style="text-align: justify;">
                                                    {{ $text }}
                                                </p>
                                                <a href="{{ route('artikel_detail.page', Str::slug($artikel->judul)) }}" class="btn btn-success btn-medium">
                                                    <i class="icon-link"></i> Read more
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </section>
                    </div>
                    <div class="pagination aligncenter" style="margin: 0px;">
                        <ul>
                            {{ $artikels->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection