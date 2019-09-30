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
                    <div class="row" style="margin-bottom: 0px;">
                        <div class="span4 form-group">
                            <label for="nama">
                                Nama Anda:
                                @if ($errors->has('nama'))
                                    <span style="color: red;">*{{ $errors->first('nama') }}</span>
                                @endif
                            </label>
                            <input type="text" class="register" name="nama" placeholder="Nama Anda" value="{{ auth()->user()->nama }}" />
                        </div>
                        <div class="span4 form-group">
                            <label for="email">
                                E-mail Anda:
                                @if ($errors->has('email'))
                                    <span style="color: red;">*{{ $errors->first('email') }}</span>
                                @endif
                            </label>
                            <input type="email" class="register" name="email" placeholder="E-mail Anda" value="{{ auth()->user()->email }}" />
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 0px;">
                        <div class="span4 form-group">
                            <label for="no_telepon">
                                No. Telepon Anda:
                                @if ($errors->has('no_telepon'))
                                    <span style="color: red;">*{{ $errors->first('no_telepon') }}</span>
                                @endif
                            </label>
                            <input type="text" class="register" name="no_telepon" placeholder="No. Telepon Anda" value="{{ auth()->user()->no_telepon }}" />
                        </div>
                        <div class="span4 form-group">
                            <label for="tanggal_lahir">
                                Tanggal Lahir:
                                @if ($errors->has('tanggal_lahir'))
                                    <span style="color: red;">*{{ $errors->first('tanggal_lahir') }}</span>
                                @endif
                            </label>
                            <input type="text" class="datepicker register" name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ Carbon::parse(auth()->user()->tanggal_lahir)->format('d-m-Y') }}" readonly style="background-color:white;" />
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 0px;">
                        <div class="span4 form-group">
                            <label for="nominal">
                                Jenis Kelamin:
                                @if ($errors->has('jenis_kelamin'))
                                    <span style="color: red;">*{{ $errors->first('jenis_kelamin') }}</span>
                                @endif
                            </label>
                            <select name="jenis_kelamin" class="register" style="color: black;">
                                <option value="Laki-Laki" style="color: black;" @if (auth()->user()->jenis_kelamin == "Laki-Laki") selected @endif>Laki-Laki</option>
                                <option value="Perempuan" style="color: black;" @if (auth()->user()->jenis_kelamin == "Perempuan") selected @endif>Perempuan</option>
                            </select>
                        </div>
                        <div class="span4 form-group">
                            <label for="domisili">
                                Domisili:
                                @if ($errors->has('domisili'))
                                    <span style="color: red;">*{{ $errors->first('domisili') }}</span>
                                @endif
                            </label>
                            <select name="domisili" class="register" style="color: black;">
                                <option value="Jakarta Barat" style="color: black;" @if (auth()->user()->jenis_kelamin == "Jakarta Barat") selected @endif>Jakarta Barat</option>
                                <option value="Jakarta Selatan" style="color: black;" @if (auth()->user()->jenis_kelamin == "Jakarta Selatan") selected @endif>Jakarta Selatan</option>
                                <option value="Jakarta Timur" style="color: black;" @if (auth()->user()->jenis_kelamin == "Jakarta Timur") selected @endif>Jakarta Timur</option>
                                <option value="Jakarta Utara" style="color: black;" @if (auth()->user()->jenis_kelamin == "Jakarta Utara") selected @endif>Jakarta Utara</option>
                                <option value="Jakarta Pusat" style="color: black;" @if (auth()->user()->jenis_kelamin == "Jakarta Pusat") selected @endif>Jakarta Pusat</option>
                                <option value="Luar Jakarta" style="color: black;" @if (auth()->user()->jenis_kelamin == "Luar Jakarta") selected @endif>Luar Jakarta</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 0px;">
                        <div class="span4 form-group">
                            <label for="foto">
                                Foto:
                                @if ($errors->has('foto'))
                                    <span style="color: red;">*{{ $errors->first('foto') }}</span>
                                @endif
                            </label>
                            <a href="{{ asset('followers/foto/'.auth()->user()->foto) }}" target="_blank">
                                <img src="{{ asset('followers/foto/'.auth()->user()->foto) }}" alt="Logo" height="80" width="80" />
                            </a>
                            <br>
                            <input type="file" name="foto" placeholder="Foto" />
                        </div>
                        <div class="span4 form-group">
                            <label for="alamat">Alamat:</label>
                            <textarea name="alamat" class="register" rows="3" placeholder="Alamat">{{ auth()->user()->alamat }}</textarea>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 0px;">
                        <div class="span4 form-group">
                            <label for="password">
                                Password:
                                @if ($errors->has('password'))
                                <span style="color: red;">*{{ $errors->first('password') }}</span>
                                @endif
                            </label>
                            <input type="password" class="register" name="password" placeholder="Password" />
                        </div>
                        <div class="span3 form-group">
                            <div class="text-right">
                                <button class="btn btn-theme btn-medium margintop10" type="submit">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
