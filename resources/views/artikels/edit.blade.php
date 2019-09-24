@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Artikel
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($artikel, ['route' => ['artikels.update', $artikel->id], 'method' => 'patch']) !!}

                        @include('artikels.edit_fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@section('scripts')
    <script>
        var gambar_id = 1;

        $(document).ready(function() {
            $("#cover").fileinput({
                'initialPreview': '{{ asset('cover/'.$artikel->cover) }}',
                'initialPreviewAsData': true,
                'initialPreviewConfig': {
                    'type': "image",
                    'filetype': "image/png",
                    'caption': "{{ $artikel->judul }}",
                    'url': "{{ asset('cover/'.$artikel->cover) }}"
                },
                'initialCaption': "{{ $artikel->judul }}",
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

            @php
            $gambars = explode('|', $artikel->gambar);
            @endphp
            @foreach ($gambars as $key => $gambar)
                $("#input_{{ $key }}").fileinput({
                    'initialPreview': '{{ asset('gambar/'.$gambar) }}',
                    'initialPreviewAsData': true,
                    'initialPreviewConfig': {
                        'type': "image",
                        'filetype': "image/png",
                        'caption': "{{ $artikel->judul }}",
                        'url': "{{ asset('gambar/'.$gambar) }}"
                    },
                    'initialCaption': "{{ $artikel->judul }}",
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
            @endforeach
        });

        $(document).on('click', '#add_gambar', function() {
            var html = '';
            html += `<div class="form-group col-sm-4 gambar_${gambar_id}">` +
                `<input id="input_${gambar_id}" name="gambar[]" type="file">`+
            `</div>` +
            `<div class="form-group col-sm-8 gambar_${gambar_id}">` +
                `<button type="button" data-id="${gambar_id}" class="btn btn-danger delete_gambar">Hapus</button>` +
            `</div>` +
            `<div class="clearfix gambar_0"></div>`;

            $('#gambars').append(html);

            $("#input_" + gambar_id).fileinput({
                'showUpload': false,
                'showClose': false,
                'previewFileAny': false,
                'removeFromPreviewOnError': true,
                'dropZoneEnabled': false,
                'fileActionSettings': {
                    'showDrag': false,
                    'indicatorNew': '',
                    'indicatorNewTitle': '',
                }
            });

            gambar_id++;
        });

        $(document).on('click', '.delete_gambar', function() {
            var id = $(this).data('id');
            
            $('.gambar_' + id).remove();
        });
    </script>
@endsection