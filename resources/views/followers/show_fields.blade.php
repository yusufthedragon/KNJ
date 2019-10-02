<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{!! $followers->nama !!}</p>
</div>

<!-- Domisili Field -->
<div class="form-group">
    {!! Form::label('domisili', 'Domisili:') !!}
    <p>{!! $followers->domisili !!}</p>
</div>

<!-- Jenis Kelamin Field -->
<div class="form-group">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
    <p>{!! $followers->jenis_kelamin !!}</p>
</div>

<!-- No Telepon Field -->
<div class="form-group">
    {!! Form::label('no_telepon', 'No. Telepon:') !!}
    <p>{!! $followers->no_telepon !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $followers->email !!}</p>
</div>

<!-- Foto Field -->
<div class="form-group">
    {!! Form::label('foto', 'Foto:') !!}
    <br>
    <a href="{{ asset('upload/followers/foto/'.$followers->foto) }}" target="_blank">
        <img width="100" height="100" src="{{ asset('upload/followers/foto/'.$followers->foto) }}">
    </a>
</div>

<!-- Tanggal Lahir Field -->
<div class="form-group">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
    <p>{!! Carbon::parse($followers->tanggal_lahir)->format('d-m-Y') !!}</p>
</div>

<!-- Alamat Field -->
<div class="form-group">
    {!! Form::label('alamat', 'Alamat:') !!}
    <p>{!! $followers->alamat !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $followers->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $followers->updated_at !!}</p>
</div>

