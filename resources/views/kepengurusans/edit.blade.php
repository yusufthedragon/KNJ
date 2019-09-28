@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kepengurusan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($kepengurusan, ['route' => ['kepengurusans.update', $kepengurusan->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('kepengurusans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#foto").fileinput({
                'initialPreview': '{{ asset('kepengurusan/foto/'.$kepengurusan->foto) }}',
                'initialPreviewAsData': true,
                'initialPreviewConfig': {
                    'type': "image",
                    'filetype': "image/png",
                    'caption': "{{ $kepengurusan->nama }}",
                    'url': "{{ asset('kepengurusan/foto/'.$kepengurusan->foto) }}"
                },
                'initialCaption': "{{ $kepengurusan->nama }}",
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