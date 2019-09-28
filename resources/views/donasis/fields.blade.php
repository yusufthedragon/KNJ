<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Bank Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank', 'Bank:') !!}
    {!! Form::text('bank', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Transfer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_transfer', 'Tanggal Transfer:') !!}
    {!! Form::date('tanggal_transfer', null, ['class' => 'form-control','id'=>'tanggal_transfer']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#tanggal_transfer').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Bukti Transfer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bukti_transfer', 'Bukti Transfer:') !!}
    {!! Form::file('bukti_transfer') !!}
</div>
<div class="clearfix"></div>

<!-- Nominal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nominal', 'Nominal:') !!}
    {!! Form::text('nominal', null, ['class' => 'form-control']) !!}
</div>

<!-- No Telepon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_telepon', 'No Telepon:') !!}
    {!! Form::text('no_telepon', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Catatan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('catatan', 'Catatan:') !!}
    {!! Form::textarea('catatan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('donasis.index') !!}" class="btn btn-default">Cancel</a>
</div>
