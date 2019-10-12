<!-- Judul Field -->
<div class="form-group">
    {!! Form::label('judul', 'Judul:') !!}
    <p>{!! $project->judul !!}</p>
</div>

<!-- Deskripsi Field -->
<div class="form-group">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    <p>{!! nl2br(e($project->deskripsi)) !!}</p>
</div>

<!-- Cover Field -->
<div class="form-group">
    {!! Form::label('cover', 'Cover:') !!}
    <p>
        <a href="{{ asset('upload/project/cover/'.$project->cover) }}" target="_blank">
            <img src="{{ asset('upload/project/cover/'.$project->cover) }}" alt="Logo" height="100" width="150" />
        </a>
    </p>
</div>

<!-- Kode Donasi Field -->
<div class="form-group">
    {!! Form::label('kode_donasi', 'Kode Donasi:') !!}
    <p>{!! $project->kode_donasi !!}</p>
</div>

<!-- Daftar Solia Field -->
<div class="form-group">
    {!! Form::label('daftar_solia', 'Daftar Solia:') !!}
    <p>{!! nl2br(e($project->daftar_solia)) !!}</p>
</div>

<!-- Timeline Field -->
<div class="form-group">
    {!! Form::label('timeline', 'Timeline:') !!}
    <p>{!! nl2br(e($project->timeline)) !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! Carbon::parse($project->created_at)->format('d-m-Y H:i:s') !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! Carbon::parse($project->updated_at)->format('d-m-Y H:i:s') !!}</p>
</div>

