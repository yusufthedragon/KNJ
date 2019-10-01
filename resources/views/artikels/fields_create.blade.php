<!-- Judul Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('judul', 'Judul:') !!}
    {!! Form::text('judul', null, ['class' => 'form-control']) !!}
</div>

<!-- Deskripsi Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control', 'rows' => 2]) !!}
</div>

<!-- Wilayah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('wilayah', 'Wilayah:') !!}
    {!! Form::select('wilayah', [
        'Jakarta Utara' => 'Jakarta Utara',
        'Jakarta Timur' => 'Jakarta Timur',
        'Jakarta Selatan' => 'Jakarta Selatan',
        'Jakarta Barat' => 'Jakarta Barat',
        'Jakarta Pusat' => 'Jakarta Pusat',
        'Luar Jakarta' => 'Luar Jakarta'
    ], null, ['class' => 'form-control']) !!}
</div>

<!-- Cover Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cover', 'Cover:') !!}
    {!! Form::file('cover') !!}
</div>
<div class="clearfix"></div>

<!-- Nama Solia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_solia', 'Nama Solia:') !!}
    {!! Form::text('nama_solia', null, ['class' => 'form-control']) !!}
</div>

<!-- Usia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usia', 'Usia:') !!}
    {!! Form::text('usia', null, ['class' => 'form-control']) !!}
</div>

<!-- Pekerjaan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pekerjaan', 'Pekerjaan:') !!}
    {!! Form::text('pekerjaan', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control', 'rows' => 1]) !!}
</div>

<!-- Gallery Field -->
<div id="galleries">
    <div class="form-group col-sm-10">
        {!! Form::label('gallery', 'Gallery:') !!}
        {!! Form::file('gallery[]', ['id' => 'gallery_0']) !!}
    </div>
    <div class="col-sm-2" style="margin-top: 25px;">
        <button type="button" id="add_gallery" class="btn btn-primary">Tambah</button>
    </div>
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('artikels.index') !!}" class="btn btn-default">Cancel</a>
</div>
