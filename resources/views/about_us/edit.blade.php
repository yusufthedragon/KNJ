@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            About Us
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($aboutUs, ['route' => ['about-us.update', $aboutUs->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('about_us.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#gambar").fileinput({
                'initialPreview': '{{ asset('about_us/gambar/'.$aboutUs->gambar) }}',
                'initialPreviewAsData': true,
                'initialPreviewConfig': {
                    'type': "image",
                    'filetype': "image/png",
                    'caption': "{{ $aboutUs->judul }}",
                    'url': "{{ asset('about_us/gambar/'.$aboutUs->gambar) }}"
                },
                'initialCaption': "{{ $aboutUs->judul }}",
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