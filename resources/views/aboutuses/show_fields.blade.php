<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $aboutUs->id !!}</p>
</div>

<!-- Judul Field -->
<div class="form-group">
    {!! Form::label('judul', 'Judul:') !!}
    <p>{!! $aboutUs->judul !!}</p>
</div>

<!-- Deskripsi Field -->
<div class="form-group">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    <p>{!! $aboutUs->deskripsi !!}</p>
</div>

<!-- Gambar Field -->
<div class="form-group">
    {!! Form::label('gambar', 'Gambar:') !!}
    <p>{!! $aboutUs->gambar !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $aboutUs->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $aboutUs->updated_at !!}</p>
</div>

