@extends('page.header')
@section('content')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="inner-heading">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a> <i class="icon-angle-right"></i></li>
                            <li class="active">Project</li>
                        </ul>
                        <h2>Project</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="row">
                        <section id="team">
                            <ul id="thumbs" class="team">
                                @foreach ($projects as $key => $project)
                                    <li class="item-thumbs span3">
                                        <div class="team-box thumbnail">
                                            <img src="{{ asset('upload/project/cover/'.$project->cover) }}" style="height: 171px; width: 228px;" />
                                            <div class="caption">
                                                @php
                                                    $count_judul = strlen($project->judul);
                                                    $count_deskripsi = strlen($project->deskripsi);

                                                    if ($count_judul > 13) {
                                                        $judul = substr($project->judul, 0, 13) . '...';
                                                    } else {
                                                        $judul = $project->judul;
                                                    }

                                                    if ($count_deskripsi > 90) {
                                                        $deskripsi = substr($project->deskripsi, 0, 85) . '...';
                                                    } else {
                                                        $deskripsi = $project->deskripsi;
                                                    }
                                                @endphp
                                                <h5>{{ $judul }}</h5>
                                                <p style="text-align: justify;">
                                                    {{ $deskripsi }}
                                                </p>
                                                <a href="{{ route('project_detail.page', Str::slug($project->judul)) }}" class="btn btn-success btn-medium">
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
                            {{ $projects->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection