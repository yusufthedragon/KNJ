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
                    {!! Form::open(['route' => 'kepengurusan.store', 'enctype' => 'multipart/form-data']) !!}

                        @include('kepengurusan.fields')

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
    </script>
@endsection