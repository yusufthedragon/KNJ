<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{!! $contact->nama !!}</p>
</div>

<!-- Jenis Field -->
<div class="form-group">
    {!! Form::label('jenis', 'Jenis:') !!}
    <p>{!! $contact->jenis !!}</p>
</div>

<!-- Contact Field -->
<div class="form-group">
    {!! Form::label('contact', 'Contact:') !!}
    <p>{!! $contact->contact !!}</p>
</div>

<!-- Keterangan Field -->
<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <p>{!! $contact->keterangan !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! Carbon::parse($contact->created_at)->format('d-m-Y H:i:s') !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! Carbon::parse($contact->updated_at)->format('d-m-Y H:i:s') !!}</p>
</div>

