<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ketimbang Ngemis Jakarta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="" />
    <link href="https://fonts.googleapis.com/css?family=Handlee|Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="{{ asset('page/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('page/css/bootstrap-responsive.css') }}" rel="stylesheet" />
    <link href="{{ asset('page/css/flexslider.css') }}" rel="stylesheet" />
    <link href="{{ asset('page/css/prettyPhoto.css') }}" rel="stylesheet" />
    <link href="{{ asset('page/css/camera.css') }}" rel="stylesheet" />
    <link href="{{ asset('page/css/jquery.bxslider.css') }}" rel="stylesheet" />
    <link href="{{ asset('page/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('page/color/default.css') }}" rel="stylesheet" />
    <link href="{{ asset('page/css/cslider.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="ico/favicon.png" />
</head>

<body>
    <div id="wrapper">
        <header>
            <div class="container">
                <div class="row nomargin">
                    <div class="span6">
                        <div class="logo">
                            <a href="{{ url('/') }}" class="logo"><img src="{{ asset('page/img/logo.jpg') }}" alt="Logo" height="80" width="80" /></a>
                            <h4 class="text-logo"><a href="{{ url('/') }}" style="color:inherit; text-decoration: none;">KETIMBANG NGEMIS JAKARTA</a></h4>
                            <h6 class="text-logo-2"><a href="{{ url('/') }}" style="color:inherit; text-decoration: none;">Say No To Ngemis</a></h6>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="navbar navbar-static-top">
                            <div class="navigation">
                                <nav>
                                    <ul class="nav topnav">
                                        <li class="active">
                                            <a href="{{ url('/') }}"><i class="icon-home"></i> Home</a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#"><i class="icon-dollar"></i> Donasi</a>
                                            <ul class="dropdown-menu donasi">
                                                <li>
                                                    <a href="{{ route('donasi.page', 'Biasa') }}">Biasa</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('donasi.page', 'Amanah') }}">Amanah</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('donasi.page', 'Project') }}">Project</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{ route('artikel.page') }}"><i class="icon-file-text-alt"></i> Artikel</a>
                                        </li>
                                        @if (! auth()->check())
                                            <li>
                                                <a href="#modal-login" role="button" class="login-button" data-toggle="modal"><i class="icon-key"></i> Login</a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ route('profile.page') }}"><i class="fas fa-user"></i> Profil</a>
                                            </li>
                                            <li>
                                                <a href="{!! url('/admin/logout') !!}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <i class="icon-signout"></i> Logout
                                                </a>
                                                <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row" style="margin-bottom: 0px;">
                    <div class="col-lg-12">
                        @yield('content')
                        @php
                            $contacts = \App\Models\Contact::get();
                        @endphp
                        <footer>
                            <div class="container">
                                <div class="row">
                                    <div class="span12">
                                        <div class="aligncenter">
                                            <h3>Hubungi <strong>Kami</strong></h3>
                                        </div>
                                    </div>
                                    <div class="span12">
                                        <div class="solidline">&nbsp;</div>
                                    </div>
                                    <div class="span4">
                                        <div class="widget">
                                            <h5 class="widgetheading">Telepon</h5>
                                            @foreach ($contacts->where('jenis', 'Telepon') as $contact)
                                            <i class="icon-phone"></i>&ensp;{{ $contact->contact }} - {{ $contact->keterangan }}<br>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="span4 offset1">
                                        <div class="widget">
                                            <h5 class="widgetheading">Follow Us</h5>
                                            <p>
                                                @foreach ($contacts->where('jenis', 'Twitter') as $contact)
                                                <i class="icon-twitter"></i>&ensp;{{ $contact->contact }}<br>
                                                @endforeach
                                                @foreach ($contacts->where('jenis', 'Facebook') as $contact)
                                                <i class="icon-facebook-sign"></i>&ensp;{{ $contact->contact }}<br>
                                                @endforeach
                                                @foreach ($contacts->where('jenis', 'Line') as $contact)
                                                <i class="fab fa-line"></i>&ensp;{{ $contact->contact }}<br>
                                                @endforeach
                                                @foreach ($contacts->where('jenis', 'Instagram') as $contact)
                                                <i class="icon-instagram"></i>&ensp;{{ $contact->contact }}<br>
                                                @endforeach
                                                @foreach ($contacts->where('jenis', 'Youtube') as $contact)
                                                <i class="icon-youtube"></i>&ensp;{{ $contact->contact }}<br>
                                                @endforeach
                                                @foreach ($contacts->where('jenis', 'Website') as $contact)
                                                <i class="icon-globe"></i>&ensp;{{ $contact->contact }}<br>
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                    <div class="span2 offset1">
                                        <div class="widget">
                                            <h5 class="widgetheading">E-Mail</h5>
                                            <p>
                                                @foreach ($contacts->where('jenis', 'E-mail') as $contact)
                                                <i class="icon-envelope-alt"></i>&ensp;{{ $contact->contact }}
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="sub-footer">
                                <div class="container">
                                    <div class="row">
                                        <div class="span12">
                                            <div class="aligncenter">
                                                <p>
                                                    <span>Copyright © {{ date('Y') }} <a href="http://ketimbangngemisjakarta.org"><b>Ketimbang Ngemis Jakarta</b></a>.</> All rights reserved.</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </footer>
                        <a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bglight icon-2x active"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div id="modal-login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true">
            <div class="modal-body">
                <ul class="nav nav-tabs" id="tabLogin" style="margin-left: 0px;">
                    <li class="active"><a data-id="login" href="#login">Login</a></li>
                    <li><a data-id="register" href="#register">Register</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="login">
                        <form id="form-login" action="{{ route('login.page') }}" method="post" role="form" class="contactForm">
                            {{ csrf_field() }}
                            <div class="row" style="margin-bottom: 0px;" onkeypress="checkSubmit(event)">
                                <div class="span3 form-group" style="width: 250px;">
                                    <label for="nama">
                                        E-mail Anda:
                                        @if ($errors->has('email'))
                                            <span style="color: red;">*{{ $errors->first('email') }}</span>
                                        @endif
                                    </label>
                                    <input type="email" class="register" name="email" placeholder="E-mail Anda" value="{{ old('email') }}" />
                                </div>
                                <div class="span3 form-group" style="width: 250px;">
                                    <label for="password">
                                        Password:
                                        @if ($errors->has('password'))
                                            <span style="color: red;">*{{ $errors->first('password') }}</span>
                                        @endif
                                    </label>
                                    <input type="password" class="register" name="password" placeholder="Password Anda" value="{{ old('password') }}" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="register">
                        <div class="row">
                            <div class="span12">
                                <form id="form-register" action="{{ route('register.page') }}" method="post" role="form" class="contactForm" enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                    <div class="row" style="margin-bottom: 0px;">
                                        <div class="span3 form-group">
                                            <label for="nama">
                                                Nama Anda:
                                                @if ($errors->has('nama'))
                                                    <span style="color: red;">*{{ $errors->first('nama') }}</span>
                                                @endif
                                            </label>
                                            <input type="text" class="register" name="nama" placeholder="Nama Anda" value="{{ old('nama') }}" />
                                        </div>
                                        <div class="span3 form-group">
                                            <label for="email">
                                                E-mail Anda:
                                                @if ($errors->has('email'))
                                                    <span style="color: red;">*{{ $errors->first('email') }}</span>
                                                @endif
                                            </label>
                                            <input type="email" class="register" name="email" placeholder="E-mail Anda" value="{{ old('email') }}" />
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 0px;">
                                        <div class="span3 form-group">
                                            <label for="no_telepon">
                                                No. Telepon Anda:
                                                @if ($errors->has('no_telepon'))
                                                    <span style="color: red;">*{{ $errors->first('no_telepon') }}</span>
                                                @endif
                                            </label>
                                            <input type="text" class="register" name="no_telepon" placeholder="No. Telepon Anda" value="{{ old('no_telepon') }}" />
                                        </div>
                                        <div class="span3 form-group">
                                            <label for="tanggal_lahir">
                                                Tanggal Lahir:
                                                @if ($errors->has('tanggal_lahir'))
                                                    <span style="color: red;">*{{ $errors->first('tanggal_lahir') }}</span>
                                                @endif
                                            </label>
                                            <input type="text" class="datepicker register" name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir') }}" readonly style="background-color:white;" />
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 0px;">
                                        <div class="span3 form-group">
                                            <label for="nominal">
                                                Jenis Kelamin:
                                                @if ($errors->has('jenis_kelamin'))
                                                    <span style="color: red;">*{{ $errors->first('jenis_kelamin') }}</span>
                                                @endif
                                            </label>
                                            <select name="jenis_kelamin" class="register" style="color: black;">
                                                <option value="Laki-Laki" style="color: black;">Laki-Laki</option>
                                                <option value="Perempuan" style="color: black;">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="span3 form-group">
                                            <label for="domisili">
                                                Domisili:
                                                @if ($errors->has('domisili'))
                                                    <span style="color: red;">*{{ $errors->first('domisili') }}</span>
                                                @endif
                                            </label>
                                            <select name="domisili" class="register" style="color: black;">
                                                <option value="Jakarta Utara" style="color: black;">Jakarta Utara</option>
                                                <option value="Jakarta Timur" style="color: black;">Jakarta Timur</option>
                                                <option value="Jakarta Selatan" style="color: black;">Jakarta Selatan</option>
                                                <option value="Jakarta Barat" style="color: black;">Jakarta Barat</option>
                                                <option value="Jakarta Pusat" style="color: black;">Jakarta Pusat</option>
                                                <option value="Luar Jakarta" style="color: black;">Luar Jakarta</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 0px;">
                                        <div class="span3 form-group">
                                            <label for="foto">
                                                Foto:
                                                @if ($errors->has('foto'))
                                                    <span style="color: red;">*{{ $errors->first('foto') }}</span>
                                                @endif
                                            </label>
                                            <input type="file" name="foto" placeholder="Foto" />
                                        </div>
                                        <div class="span3 form-group">
                                            <label for="password">
                                                Password:
                                                @if ($errors->has('password'))
                                                    <span style="color: red;">*{{ $errors->first('password') }}</span>
                                                @endif
                                            </label>
                                            <input type="password" class="register" name="password" placeholder="Password" />
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 0px;">
                                        <div class="span6 form-group">
                                            <label for="alamat">Alamat:</label>
                                            <textarea name="alamat" rows="3" placeholder="Alamat">{{ old('alamat') }}</textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-theme" data-form="login" id="submit-login">Submit</button>
            </div>
        </div>
        <script src="{{ asset('page/js/jquery.js') }}"></script>
        <script src="{{ asset('page/js/jquery.easing.1.3.js') }}"></script>
        <script src="{{ asset('page/js/bootstrap.js') }}"></script>

        <script src="{{ asset('page/js/modernizr.custom.js') }}"></script>
        <script src="{{ asset('page/js/jquery.cslider.js') }}"></script>
        <script src="{{ asset('page/js/toucheffects.js') }}"></script>
        <script src="{{ asset('page/js/google-code-prettify/prettify.js') }}"></script>
        <script src="{{ asset('page/js/jquery.bxslider.min.js') }}"></script>
        <script src="{{ asset('page/js/camera/camera.js') }}"></script>
        <script src="{{ asset('page/js/camera/setting.js') }}"></script>

        <script src="{{ asset('page/js/jquery.prettyPhoto.js') }}"></script>
        <script src="{{ asset('page/js/portfolio/jquery.quicksand.js') }}"></script>
        <script src="{{ asset('page/js/portfolio/setting.js') }}"></script>

        <script src="{{ asset('page/js/jquery.flexslider.js') }}"></script>
        <script src="{{ asset('page/js/animate.js') }}"></script>
        <script src="{{ asset('page/js/inview.js') }}"></script>
        <script src="{{ asset('page/js/jquery.number.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('page/js/custom.js') }}"></script>
        <script>
            $(function () {
                $('#da-slider').cslider();
            });

            $(function () {
                $('.datepicker').datepicker({
                    format: 'dd-mm-yyyy',
                    autoclose: true
                });
            });

            $(function () {
                $(".numbers").number(true, 0);
            });

            $('#tabLogin a').click(function (e) {
                e.preventDefault();
                $(this).tab('show');

                let id = $(this).data('id');
                
                $('#submit-login').attr('data-form', id);
            });

            $('#submit-login').on('click', function() {
                let form = $(this).data('form');
                
                $('#form-' + form).submit();
            });

            $(document).ready( function () {
                $('.datatable').DataTable({
                    "bLengthChange": false
                });
            });

            function checkSubmit(e) {
                if (e && e.keyCode == 13) {
                    $('#submit-login').trigger('click');
                }
            }
        </script>
        @yield('scripts')
        <script>
            {!! session('validation') !!}
        </script>
    </div>
</body>

</html>
