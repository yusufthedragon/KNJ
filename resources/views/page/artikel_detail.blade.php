@extends('page.header')
@section('content')
<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="span6">
                <div class="inner-heading">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('page') }}">Home</a> <i class="icon-angle-right"></i></li>
                        <li><a href="{{ route('artikel.page') }}">Artikel</a> <i class="icon-angle-right"></i></li>
                        <li class="active">{{ $artikel->judul }}</li>
                    </ul>
                    <h2>{{ $artikel->judul }}</h2>
                    <br>
                    @if ($artikel->nama_solia != "")
                    Nama Solia: {{ $artikel->nama_solia }}
                    <br>
                    @endif
                    @if ($artikel->usia != "")
                    Usia: {{ $artikel->usia }}
                    <br>
                    @endif
                    @if ($artikel->pekerjaan != "")
                    Pekerjaan: {{ $artikel->pekerjaan }}
                    <br>
                    @endif
                    @if ($artikel->alamat != "")
                    Alamat: {{ $artikel->alamat }}
                    <br>
                    @endif
                    Wilayah: {{ $artikel->wilayah }}
                    <br>
                </div>
            </div>
            <div class="span6 aligncenter">
                <a href="{{ asset('upload/artikel/cover/'.$artikel->cover) }}" target="_blank">
                    <img src="{{ asset('upload/artikel/cover/'.$artikel->cover) }}" class="cover-project" />
                </a>
            </div>
        </div>
    </div>
</section>
<section id="content">
    <div class="container">
        <div class="row">
            <div class="span12">
                <h4>Deskripsi</h4>
                <p style="text-align: justify;">
                    {{ $artikel->deskripsi }}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="span12">
                <h4>Gallery</h4>
                @php
                    $galleries = explode('|', $artikel->gallery);
                @endphp
                @foreach ($galleries as $gallery)
                    <div class="span2" style="padding-bottom: 15px;">
                        <a href="{{ asset('upload/artikel/gallery/'.$gallery) }}" target="_blank">
                            <img src="{{ asset('upload/artikel/gallery/'.$gallery) }}" class="cover-project" />
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection