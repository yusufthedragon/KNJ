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
    <input type="hidden" name="cover" value="{{ $artikel->cover }}">
    {!! Form::label('cover', 'Cover:') !!}
    {!! Form::file('cover', ['id' => 'cover']) !!}
</div>

<!-- Gambar Field -->
<div id="gambars">
    @php
    $gambars = explode('|', $artikel->gambar);
    @endphp
    @foreach ($gambars as $key => $gambar)
        <div class="form-group col-sm-4 col-lg-4 gambar_{{ $key }}">
            {!! Form::label('gambar', 'Gambar:') !!}
            {!! Form::file('gambar[]', ['id' => 'input_'.$key]) !!}
        </div>
        <div class="form-group col-sm-8 col-lg-8 gambar_{{ $key }}" style="margin-top: 25px;">
            @if ($key == 0)
                <button type="button" id="add_gambar" class="btn btn-primary">Tambah</button>
            @else
                <button type="button" data-id="{{ $key }}" class="btn btn-danger delete_gambar">Hapus</button>
            @endif
        </div>
        <div class="clearfix gambar_{{ $key }}"></div>
    @endforeach
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('artikels.index') !!}" class="btn btn-default">Cancel</a>
</div>
