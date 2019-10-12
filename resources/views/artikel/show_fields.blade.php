<!-- Judul Field -->
<div class="form-group">
    {!! Form::label('judul', 'Judul:') !!}
    <p>{!! $artikel->judul !!}</p>
</div>

<!-- Deskripsi Field -->
<div class="form-group">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    <p>{!! nl2br(e($artikel->deskripsi)) !!}</p>
</div>

<!-- Wilayah Field -->
<div class="form-group">
    {!! Form::label('wilayah', 'Wilayah:') !!}
    <p>{!! $artikel->wilayah !!}</p>
</div>

<!-- Cover Field -->
<div class="form-group">
    {!! Form::label('cover', 'Cover:') !!}
    <p>
        <a href="{{ asset('upload/artikel/cover/'.$artikel->cover) }}" target="_blank">
            <img width="150" height="100" src="{{ asset('upload/artikel/cover/'.$artikel->cover) }}">
        </a>
    </p>
</div>

<!-- Gallery Field -->
<div class="form-group">
    {!! Form::label('gallery', 'Gallery:') !!}
    <p>
        @php
            $galleries = explode('|', $artikel->gallery);
        @endphp
        @foreach ($galleries as $gallery)
        <a href="{{ asset('upload/artikel/gallery/'.$gallery) }}" target="_blank">
            <img src="{{ asset('upload/artikel/gallery/'.$gallery) }}" width="150" height="100" />
        </a>
        @endforeach
    </p>
</div>

<!-- Nama Solia Field -->
<div class="form-group">
    {!! Form::label('nama_solia', 'Nama Solia:') !!}
    <p>{!! $artikel->nama_solia !!}</p>
</div>

<!-- Usia Field -->
<div class="form-group">
    {!! Form::label('usia', 'Usia:') !!}
    <p>{!! $artikel->usia !!}</p>
</div>

<!-- Pekerjaan Field -->
<div class="form-group">
    {!! Form::label('pekerjaan', 'Pekerjaan:') !!}
    <p>{!! $artikel->pekerjaan !!}</p>
</div>

<!-- Alamat Field -->
<div class="form-group">
    {!! Form::label('alamat', 'Alamat:') !!}
    <p>{!! $artikel->alamat !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! Carbon::parse($artikel->created_at)->format('d-m-Y H:i:s') !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! Carbon::parse($artikel->updated_at)->format('d-m-Y H:i:s') !!}</p>
</div>

