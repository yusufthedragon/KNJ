<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $subject->id !!}</p>
</div>

<!-- Hubungi Kami Field -->
<div class="form-group">
    {!! Form::label('hubungi_kami', 'Hubungi Kami:') !!}
    <p>{!! $subject->hubungi_kami !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $subject->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $subject->updated_at !!}</p>
</div>

