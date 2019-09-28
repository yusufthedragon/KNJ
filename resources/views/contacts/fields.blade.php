<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis', 'Jenis:') !!}
    {!! Form::select('jenis', [
        'Telepon' => 'Telepon', 
        'Twitter' => 'Twitter', 
        'Facebook' => 'Facebook',
        'Line' => 'Line',
        'Instagram' => 'Instagram',
        'Youtube' => 'Youtube',
        'Website' => 'Website',
        'E-mail' => 'E-mail'
    ], null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact', 'Contact:') !!}
    {!! Form::text('contact', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('contacts.index') !!}" class="btn btn-default">Cancel</a>
</div>
