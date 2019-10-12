<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{!! $kepengurusan->nama !!}</p>
</div>

<!-- Jabatan Field -->
<div class="form-group">
    {!! Form::label('jabatan', 'Jabatan:') !!}
    <p>{!! $kepengurusan->jabatan !!}</p>
</div>

<!-- Pendapat Field -->
<div class="form-group">
    {!! Form::label('pendapat', 'Pendapat:') !!}
    <p>{!! nl2br(e($kepengurusan->pendapat)) !!}</p>
</div>

<!-- Foto Field -->
<div class="form-group">
    {!! Form::label('foto', 'Foto:') !!}
    <p>
        <a href="{{ asset('upload/kepengurusan/foto/'.$kepengurusan->foto) }}" target="_blank">
            <img width="150" height="100" src="{{ asset('upload/kepengurusan/foto/'.$kepengurusan->foto) }}">
        </a>
    </p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! Carbon::parse($kepengurusan->created_at)->format('d-m-Y H:i:s') !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! Carbon::parse($kepengurusan->updated_at)->format('d-m-Y H:i:s') !!}</p>
</div>

