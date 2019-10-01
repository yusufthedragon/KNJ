@extends('page.header')
@section('content')
<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="span6">
                <div class="inner-heading">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('page') }}">Home</a> <i class="icon-angle-right"></i></li>
                        <li class="active">{{ $project->judul }}</li>
                    </ul>
                    <h2>{{ $project->judul }}</h2>
                    <br>
                    Kode Donasi: {{ $project->kode_donasi }}
                    <br>
                    Daftar Solia: {{ $project->daftar_solia }}
                </div>
            </div>
            <div class="span6 aligncenter">
                <img src="{{ asset('upload/project/cover/'.$project->cover) }}" class="cover-project" />
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
                    {{ $project->deskripsi }}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="span12">
                <h4>Timeline</h4>
                <p>
                    {{ $project->timeline }}
                </p>
            </div>
        </div>
    </div>
</section>

@endsection