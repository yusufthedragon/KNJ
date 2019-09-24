<!-- Judul Field -->
<div class="form-group col-sm-6">
    {!! Form::label('judul', 'Judul:') !!}
    {!! Form::text('judul', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis', 'Jenis:') !!}
    {!! Form::select('jenis', ['Info Solia' => 'Info Solia', 'Kegiatan Internal' => 'Kegiatan Internal', 'Sebagai Narasumber' => 'Sebagai Narasumber'], null, ['class' => 'form-control']) !!}
</div>

<!-- Deskripsi Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
</div>

<!-- Cover Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('cover', 'Cover:') !!}
    {!! Form::file('cover', ['id' => 'cover']) !!}
</div>

<!-- Gambar Field -->
<div id="gambars">
    <div class="form-group col-sm-4 col-lg-4 gambar_0">
        {!! Form::label('gambar', 'Gambar:') !!}
        {!! Form::file('gambar[]', ['id' => 'input_0']) !!}
    </div>
    <div class="form-group col-sm-8 col-lg-8 gambar_0" style="margin-top: 25px;">
        <button type="button" id="add_gambar" class="btn btn-primary">Tambah</button>
    </div>
    <div class="clearfix gambar_0"></div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('artikels.index') !!}" class="btn btn-default">Cancel</a>
</div>
