@extends('page.header')
@section('content')
<section id="inner-headline" style="margin-bottom: -25px;">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="inner-heading">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('page') }}">Home</a> <i class="icon-angle-right"></i></li>
                        <li class="active">Donasi {{ ucwords($jenis) }}</li>
                    </ul>
                    <h2>Konfirmasi Donasi {{ ucwords($jenis) }}</h2>
                    <p style="text-align: justify;">
                        @if ($jenis == 'biasa')
                            Donasi biasa merupakan donasi yang bisa kalian kirimkan kapanpun melalui nomor rekening kami tanpa ada batas waktu. Donasi tersebut akan diberikan kepada solia saat eksekusi (pemberian donasi).
                        @elseif ($jenis == 'amanah')
                            Donasi yang diberikan khusus untuk sosok mulia yang di inginkan oleh Donatur.
                        @elseif ($jenis == 'project')
                            Donasi yang diberikan khusus untuk project yang sedang membuka open donasi.
                        @endif
                    </p>
                    <br>
                    @if (Auth::user() === null)
                        Sudah punya akun? Silahkan <a style="font-weight: bold; cursor: pointer;" href="#modal-login" data-toggle="modal">login</a>.
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<section id="content">
    <div class="container">
        <div class="row">
            <div class="span12">
                <form action="{{ route('donasi.store') }}" method="post" role="form" class="contactForm" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis_donasi" value="{{ ucwords($jenis) }}">
                    <div class="row">
                        <div class="span6 form-group">
                            <label for="nama">
                                Nama Anda:
                                @if ($errors->has('nama'))
                                    <span style="color: red;">*{{ $errors->first('nama') }}</span>
                                @endif
                            </label>
                            <input type="text" name="nama" placeholder="Nama Anda" value="{{ Auth::user() !== null ? Auth::user()->nama : old('nama') }}" />
                        </div>
                        <div class="span6 form-group">
                            <label for="email">
                                E-mail Anda:
                                @if ($errors->has('email'))
                                    <span style="color: red;">*{{ $errors->first('email') }}</span>
                                @endif
                            </label>
                            <input type="email" name="email" placeholder="E-mail Anda" value="{{ Auth::user() !== null ? Auth::user()->email : old('email') }}" />
                        </div>
                        <div class="span6 form-group">
                            <label for="no_telepon">
                                No. Telepon Anda:
                                @if ($errors->has('no_telepon'))
                                    <span style="color: red;">*{{ $errors->first('no_telepon') }}</span>
                                @endif
                            </label>
                            <input type="text" name="no_telepon" placeholder="No. Telepon Anda" value="{{ Auth::user() !== null ? Auth::user()->no_telepon : old('no_telepon') }}" />
                        </div>
                        <div class="span6 form-group">
                            <label for="tanggal_transfer">
                                Tanggal Transfer:
                                @if ($errors->has('tanggal_transfer'))
                                    <span style="color: red;">*{{ $errors->first('tanggal_transfer') }}</span>
                                @endif
                            </label>
                        <input type="text" class="datepicker" name="tanggal_transfer" placeholder="Tanggal Transfer" value="{{ old('tanggal_transfer') }}" readonly style="background-color:white;" />
                        </div>
                        <div class="span6 form-group">
                            <label for="bank">
                                Bank Anda:
                                @if ($errors->has('bank'))
                                    <span style="color: red;">*{{ $errors->first('bank') }}</span>
                                @endif
                            </label>
                            <input type="text" name="bank" placeholder="Bank Anda" value="{{ old('bank') }}" />
                        </div>
                        <div class="span6 form-group">
                            <label for="nominal">
                                Nominal:
                                @if ($errors->has('nominal'))
                                    <span style="color: red;">*{{ $errors->first('nominal') }}</span>
                                @endif
                            </label>
                            <input type="text" name="nominal" placeholder="Nominal" value="{{ old('nominal') }}" class="numbers" />
                        </div>
                        @if ($jenis == 'project')
                        <div class="span6 form-group">
                            <label for="project_id">
                                Nama Project:
                                @if ($errors->has('project_id'))
                                    <span style="color: red;">*{{ $errors->first('project_id') }}</span>
                                @endif
                            </label>
                            <select name="project_id" style="color: black;">
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}" style="color: black;">{{ $project->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="span6 form-group">
                            <label for="bukti_transfer">
                                Bukti Transfer:
                                @if ($errors->has('bukti_transfer'))
                                    <span style="color: red;">*{{ $errors->first('bukti_transfer') }}</span>
                                @endif
                            </label>
                            <input type="file" name="bukti_transfer" placeholder="Bukti Transfer" />
                        </div>
                        @else
                        <div class="span6 form-group">
                            <label for="bukti_transfer">
                                Bukti Transfer:
                                @if ($errors->has('bukti_transfer'))
                                    <span style="color: red;">*{{ $errors->first('bukti_transfer') }}</span>
                                @endif
                            </label>
                            <input type="file" name="bukti_transfer" placeholder="Bukti Transfer" />
                        </div>
                        @if ($jenis == 'amanah')
                            <div class="span6 form-group">
                                <label for="bukti_transfer">
                                    Donasi akan diberikan kepada:
                                    @if ($errors->has('bukti_transfer'))
                                        <span style="color: red;">*{{ $errors->first('bukti_transfer') }}</span>
                                    @endif
                                </label>
                                <label class="radio inline">
                                    <input type="radio" name="pemberian_donasi" id="semua_solia" value="Semua Solia" checked>
                                    Semua Solia
                                </label>
                                <label class="radio inline">
                                    <input type="radio" name="pemberian_donasi" id="beberapa_solia" value="Beberapa Solia">
                                    Beberapa Solia
                                </label>
                            </div>
                        @endif
                        @endif
                        <div class="span12 form-group">
                            <label for="catatan">Catatan:</label>
                            <textarea name="catatan" rows="3" placeholder="Catatan">{{ old('catatan') }}</textarea>
                        </div>
                        @if ($jenis == 'amanah')
                            <div class="span12 form-group daftar_solia" hidden>
                                <div class="solidline"></div>
                                <p>
                                    Silahkan isi nomor urut solia beserta nominal donasi yang ingin di berikan.
                                </p>
                            </div>
                            <div id="solias" class="daftar_solia" hidden>
                                <div class="offset2 span4 aligncenter">
                                    <div class="input-prepend">
                                        <span class="add-on" style="min-height: 26px; padding-top: 8px;">Nominal:</span>
                                        <input type="text" class="numbers" name="nominal_solia[]" style="width: 200px;" placeholder="Nominal">
                                    </div>
                                </div>
                                <div class="span4 aligncenter">
                                    <div class="input-prepend">
                                        <span class="add-on" style="min-height: 26px; padding-top: 8px;">Untuk Solia Ke:</span>
                                        <input type="text" name="nomor_solia[]" style="width: 200px;" placeholder="Solia Ke">
                                    </div>
                                </div>
                                <div class="span2" style="padding-top: 5px;">
                                    <button type="button" class="btn btn-primary" id="add_solia">+</button>
                                </div>
                            </div>
                            @if ($artikel !== null)
                                <div class="span12 form-group">
                                    <p>{{ $artikel->deskripsi }}</p>
                                </div>
                            @endif
                        @endif
                        <div class="span12">
                            <div class="solidline"></div>
                            <div class="text-center">
                                <button class="btn btn-theme btn-medium margintop10" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script>
        let solia_id = 1;

        $(document).on('click', '#add_solia', function() {
            var html = '';

            html += `<div class="offset2 span4 aligncenter solia_${solia_id}">` +
                `<div class="input-prepend">` +
                    `<span class="add-on" style="min-height: 26px; padding-top: 8px;">Nominal:</span>` +
                    `<input type="text" class="numbers" name="nominal_solia[]" style="width: 200px;" placeholder="Nominal">` +
                `</div>` +
            `</div>` +
            `<div class="span4 aligncenter solia_${solia_id}">` +
                `<div class="input-prepend">` +
                    `<span class="add-on" style="min-height: 26px; padding-top: 8px;">Untuk Solia Ke:</span>` +
                    `<input type="text" name="nomor_solia[]" style="width: 200px;" placeholder="Solia Ke">` +
                `</div>` +
            `</div>` +
            `<div class="span2 solia_${solia_id}" style="padding-top: 5px;">` +
                `<button type="button" class="btn btn-danger remove_solia" data-id="${solia_id}">x</button>` +
            `</div>`;

            $('#solias').append(html);
            solia_id++;

            $(".numbers").number(true, 0);
        });

        $(document).on('click', '.remove_solia', function() {
            let id = $(this).data('id');

            $('.solia_' + id).remove();
        });

        $(document).on('click', "input[name='pemberian_donasi']", function() {
            if ($(this).val() == "Semua Solia") {
                $(".daftar_solia").hide();
            } else {
                $(".daftar_solia").show();
            }
        });
    </script>
@endsection
