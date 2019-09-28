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
                    {!! Form::open(['route' => 'artikels.store', 'enctype' => 'multipart/form-data']) !!}

                        @include('artikels.fields_create')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let gallery_id = 1;

        $(document).ready(function() {
            $("#cover").fileinput({
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

            $("#gallery_0").fileinput({
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
        });

        $(document).on('click', '#add_gallery', function() {
            var html = '';

            html += `<div class="form-group col-sm-10 gallery_${gallery_id}">` +
                `<input type="file" name="gallery[]" id="gambar_${gallery_id}">` +
            `</div>` +
            `<div class="col-sm-2 gallery_${gallery_id}">` +
                `<button type="button" id="remove_gallery" data-id="${gallery_id}" class="btn btn-danger">Hapus</button>` +
            `</div>`;

            $("#galleries").append(html);

            $("#gambar_" + gallery_id).fileinput({
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

            gallery_id++;
        });

        $(document).on('click', '#remove_gallery', function() {
            var id = $(this).data('id');

            $('.gallery_' + id).remove();
        });
    </script>
@endsection

