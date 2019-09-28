@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Project
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($project, ['route' => ['projects.update', $project->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('projects.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#cover").fileinput({
                'initialPreview': '{{ asset('project/cover/'.$project->cover) }}',
                'initialPreviewAsData': true,
                'initialPreviewConfig': {
                    'type': "image",
                    'filetype': "image/png",
                    'caption': "{{ $project->judul }}",
                    'url': "{{ asset('project/cover/'.$project->cover) }}"
                },
                'initialCaption': "{{ $project->judul }}",
                'initialPreviewFileType': 'image',
                'showUpload': false,
                'showClose': false,
                'showRemove': false,
                'previewFileAny': false,
                'removeFromPreviewOnError': true,
                'dropZoneEnabled': false,
                'fileActionSettings': {
                    'showRemove': false,
                    'showDrag': false,
                    'showUpload': false,
                    'indicatorNew': '',
                    'indicatorNewTitle': ''
                }
            });
        });
    </script>
@endsection