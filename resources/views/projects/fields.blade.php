<!-- Judul Field -->
<div class="form-group col-sm-6">
    {!! Form::label('judul', 'Judul:') !!}
    {!! Form::text('judul', null, ['class' => 'form-control']) !!}
</div>

<!-- Deskripsi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control', 'rows' => '1', 'cols' => '50']) !!}
</div>

<!-- Cover Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cover', 'Cover:') !!}
    {!! Form::file('cover', ['id' => 'cover']) !!}
</div>

<!-- Kode Donasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode_donasi', 'Kode Donasi:') !!}
    {!! Form::text('kode_donasi', null, ['class' => 'form-control']) !!}
</div>
<div class="clearfix"></div>

<!-- Daftar Solia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('daftar_solia', 'Daftar Solia:') !!}
    {!! Form::textarea('daftar_solia', null, ['class' => 'form-control', 'rows' => '1', 'cols' => '50']) !!}
</div>

<!-- Timeline Field -->
<div class="form-group col-sm-6">
    {!! Form::label('timeline', 'Timeline:') !!}
    {!! Form::textarea('timeline', null, ['class' => 'form-control', 'rows' => '1', 'cols' => '50']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('projects.index') !!}" class="btn btn-default">Cancel</a>
</div>
