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
    <p>
        <a href="{{ asset('upload/about_us/gambar/'.$aboutUs->gambar) }}" target="_blank">
            <img width="150" height="100" src="{{ asset('upload/about_us/gambar/'.$aboutUs->gambar) }}">
        </a>
    </p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! Carbon::parse($aboutUs->created_at)->format('d-m-Y H:i:s') !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! Carbon::parse($aboutUs->updated_at)->format('d-m-Y H:i:s') !!}</p>
</div>

