<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jabatan', 'Jabatan:') !!}
    {!! Form::select('jabatan', [
        'Founder' => 'Founder', 
        'CEO' => 'CEO', 
        'Sekretaris 1' => 'Sekretaris 1',
        'Sekretaris 2' => 'Sekretaris 2',
        'Finance Controller 1' => 'Finance Controller 1',
        'Finance Controller 2' => 'Finance Controller 2',
        'Coordinator Internal Team Development' => 'Coordinator Internal Team Development',
        'Coordinator Documentation' => 'Coordinator Documentation',
        'Coordinator Field Executor' => 'Coordinator Field Executor',
        'Coordinator Purchase & Merchandising' => 'Coordinator Purchase & Merchandising',
        'Coordinator Public Relation' => 'Coordinator Public Relation'
    ], null, ['class' => 'form-control']) !!}
</div>

<!-- Pendapat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('pendapat', 'Pendapat:') !!}
    {!! Form::textarea('pendapat', null, ['class' => 'form-control', 'rows' => 3]) !!}
</div>

<!-- Foto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto', 'Foto:') !!}
    {!! Form::file('foto') !!}
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('kepengurusan.index') !!}" class="btn btn-default">Cancel</a>
</div>
