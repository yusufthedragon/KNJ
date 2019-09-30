@extends('page.header')
@section('content')
<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="inner-heading">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('page') }}">Home</a> <i class="icon-angle-right"></i></li>
                        <li class="active">Donasi {{ $jenis }}</li>
                    </ul>
                    <h2>Donasi {{ $jenis }}</h2>
                    <p>
                        @if ($jenis == 'Biasa')
                            Donasi biasa, ya donasi biasa. bukan donasi luar biasa
                        @elseif ($jenis == 'Amanah')
                            Donasi amanah, ya donasi amanah. donasi yang diamanahkan
                        @elseif ($jenis == 'Project')
                            Donasi project, ya donasi project. donasi cuma buat seru-seruan
                        @endif
                    </p>
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
                    <input type="hidden" name="jenis_donasi" value="{{ $jenis }}">
                    <div class="row">
                        <div class="span6 form-group">
                            <label for="nama">
                                Nama Anda:
                                @if ($errors->has('nama'))
                                    <span style="color: red;">*{{ $errors->first('nama') }}</span>
                                @endif
                            </label>
                            <input type="text" name="nama" placeholder="Nama Anda" value="{{ old('nama') }}" />
                        </div>
                        <div class="span6 form-group">
                            <label for="email">
                                E-mail Anda:
                                @if ($errors->has('email'))
                                    <span style="color: red;">*{{ $errors->first('email') }}</span>
                                @endif
                            </label>
                            <input type="email" name="email" placeholder="E-mail Anda" value="{{ old('email') }}" />
                        </div>
                        <div class="span6 form-group">
                            <label for="no_telepon">
                                No. Telepon Anda:
                                @if ($errors->has('no_telepon'))
                                    <span style="color: red;">*{{ $errors->first('no_telepon') }}</span>
                                @endif
                            </label>
                            <input type="text" name="no_telepon" placeholder="No. Telepon Anda" value="{{ old('no_telepon') }}" />
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
                        @if ($jenis == 'Project')
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
                        <div class="span12 form-group">
                            <label for="bukti_transfer">
                                Bukti Transfer:
                                @if ($errors->has('bukti_transfer'))
                                    <span style="color: red;">*{{ $errors->first('bukti_transfer') }}</span>
                                @endif
                            </label>
                            <input type="file" name="bukti_transfer" placeholder="Bukti Transfer" />
                        </div>
                        @endif
                        <div class="span12 form-group">
                            <label for="catatan">Catatan:</label>
                            <textarea name="catatan" rows="3" placeholder="Catatan">{{ old('catatan') }}</textarea>
                        </div>
                        @if ($jenis == 'Amanah')
                            <div class="span12 form-group">
                                <div class="solidline"></div>
                                <p>
                                    Silahkan isi nomor urut solia beserta nominal donasi yang ingin di berikan.
                                </p>
                            </div>
                            <div id="solias">
                                <div class="offset2 span4 aligncenter">
                                    <div class="input-prepend">
                                        <span class="add-on" style="min-height: 26px; padding-top: 8px;">Nominal:</span>
                                        <input type="text" name="nominal_solia[]" style="width: 200px;" placeholder="Nominal">
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
                    `<input type="text" name="nominal_solia[]" style="width: 200px;" placeholder="Nominal">` +
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
        });

        $(document).on('click', '.remove_solia', function() {
            let id = $(this).data('id');

            $('.solia_' + id).remove();
        });
    </script>
@endsection
