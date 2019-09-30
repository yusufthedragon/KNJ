<!-- Nama Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('nama', 'Nama:') !!}
        <p>{!! $donasi->nama !!}</p>
    </div>
</div>

<!-- Bank Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('bank', 'Bank:') !!}
        <p>{!! $donasi->bank !!}</p>
    </div>
</div>

<!-- Tanggal Transfer Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('tanggal_transfer', 'Tanggal Transfer:') !!}
        <p>{!! Carbon::parse($donasi->tanggal_transfer)->format('d-m-Y') !!}</p>
    </div>
</div>

<!-- Nominal Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('nominal', 'Nominal:') !!}
        <p>Rp{!! number_format($donasi->nominal, 0, ',', ',') !!}</p>
    </div>
</div>

<!-- No Telepon Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('no_telepon', 'No Telepon:') !!}
        <p>{!! $donasi->no_telepon !!}</p>
    </div>
</div>

<!-- Email Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        <p>{!! $donasi->email !!}</p>
    </div>
</div>

<!-- Catatan Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('catatan', 'Catatan:') !!}
        <p>{!! $donasi->catatan !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{!! $donasi->created_at !!}</p>
    </div>
</div>

<!-- Bukti Transfer Field -->
<div class="col-md-12">
    <div class="form-group">
        {!! Form::label('bukti_transfer', 'Bukti Transfer:') !!}
        <br>
        <a href="{{ asset('donasi/bukti/'.$donasi->bukti_transfer) }}" target="_blank">
            <img src="{{ asset('donasi/bukti/'.$donasi->bukti_transfer) }}" style="max-width: 500px; max-height: 250px;">
        </a>
    </div>
</div>