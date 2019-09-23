<!-- Deskripsi Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
</div>

<!-- Sejarah Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('sejarah', 'Sejarah:') !!}
    {!! Form::textarea('sejarah', null, ['class' => 'form-control']) !!}
</div>

<!-- Aktivitas Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('aktivitas', 'Aktivitas:') !!}
    {!! Form::textarea('aktivitas', null, ['class' => 'form-control']) !!}
</div>

<!-- Visi Misi Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('visi_misi', 'Visi Misi:') !!}
    {!! Form::textarea('visi_misi', null, ['class' => 'form-control']) !!}
</div>

<!-- Kepengurusan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('kepengurusan', 'Kepengurusan:') !!}
    {!! Form::textarea('kepengurusan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('profiles.index') !!}" class="btn btn-default">Cancel</a>
</div>
