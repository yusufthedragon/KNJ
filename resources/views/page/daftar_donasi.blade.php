@extends('page.header')
@section('content')
<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="inner-heading">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('page') }}">Home</a> <i class="icon-angle-right"></i></li>
                        <li class="active">Profile</li>
                    </ul>
                    <h2>Daftar Donasi</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
        <div class="row">
            <div class="span4">
                <aside class="left-sidebar">
                    <div class="widget">
                        <ul class="cat">
                            <li><i class="icon-angle-right"></i> <a @if (Request::is('profile')) href="#" @else href="{{ route('profile.page') }}" @endif>Ubah Profile</a></li>
                            <li><i class="icon-angle-right"></i> <a @if (Request::is('daftar_donasi')) href="#" @else href="{{ route('daftar_donasi.page') }}" @endif>Daftar Donasi</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
            <div class="span8">
                <form id="form-register" action="{{ route('change_profile.page') }}" method="post" role="form" class="contactForm" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal Transfer</th>
                                <th>Nominal</th>
                                <th>Bank</th>
                                <th>Bukti Transfer</th>
                                <th>Jenis Donasi</th>
                                <th>Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (auth()->user()->donasi as $key => $donasi)
                            <tr>
                                <td>{{ ++$key }}.</td>
                                <td>{{ Carbon::parse($donasi->tanggal_transfer)->format('d-m-Y') }}</td>
                                <td>Rp{{ number_format($donasi->nominal, 0, ',', ',') }}</td>
                                <td>{{ $donasi->bank }}</td>
                                <td>
                                    <a href="{{ asset('upload/donasi/bukti/'.$donasi->bukti_transfer) }}" target="_blank">
                                        <img src="{{ asset('upload/donasi/bukti/'.$donasi->bukti_transfer) }}" alt="Logo" height="80" width="80" />
                                    </a>
                                </td>
                                <td>{{ $donasi->jenis_donasi }}</td>
                                <td>{{ $donasi->catatan }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
