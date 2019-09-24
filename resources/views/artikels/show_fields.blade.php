<!-- Judul Field -->
<div class="form-group">
    {!! Form::label('judul', 'Judul:') !!}
    <p>{!! $artikel->judul !!}</p>
</div>

<!-- Jenis Field -->
<div class="form-group">
    {!! Form::label('jenis', 'Jenis:') !!}
    <p>{!! $artikel->jenis !!}</p>
</div>

<!-- Deskripsi Field -->
<div class="form-group">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    <p>{!! $artikel->deskripsi !!}</p>
</div>

<!-- Gambar Field -->
<div class="form-group">
    {!! Form::label('gambar', 'Gambar:') !!}
    <br>
    @php
    $gambars = explode('|', $artikel->gambar);
    @endphp
    @foreach ($gambars as $gambar)
    <img width="200" height="200" src="{{ asset('gambar/'.$gambar) }}">&emsp;
    @endforeach
</div>

<!-- Cover Field -->
<div class="form-group">
    {!! Form::label('cover', 'Cover:') !!}
    <br>
    <img width="200" height="200" src="{{ asset('cover/'.$artikel->cover) }}">
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $artikel->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $artikel->updated_at !!}</p>
</div>

