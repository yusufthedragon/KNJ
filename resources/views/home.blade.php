@extends('layouts.app')

@section('content')
<section class="content">
    <h2>
        <b>
            Total Donasi: Rp. {{ number_format($total, 0, '.', '.') }}
        </b>
    </h2>
    <hr />
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>
                        Rp. {{ number_format($biasa, 0, '.', '.') }}
                    </h3>
                    <p>Donasi Biasa</p>
                </div>
                <div class="icon">
                    <i class="ion ion-social-usd"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>
                        Rp. {{ number_format($amanah, 0, '.', '.') }}
                    </h3>
                    <p>Donasi Amanah</p>
                </div>
                <div class="icon">
                    <i class="ion ion-social-usd"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>
                        Rp. {{ number_format($project, 0, '.', '.') }}
                    </h3>
                    <p>Donasi Project</p>
                </div>
                <div class="icon">
                    <i class="ion ion-social-usd"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>
                        Rp. {{ number_format($unverified, 0, '.', '.') }}
                    </h3>
                    <p>Belum Verifikasi</p>
                </div>
                <div class="icon">
                    <i class="ion ion-social-usd"></i>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
