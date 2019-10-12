<html>
    <body>
        <table>
            <tbody>
                <tr>
                    <td>Judul</td>
                    <td>Deskripsi</td>
                    <td>Cover</td>
                    <td>Kode Donasi</td>
                    <td>Daftar Solia</td>
                    <td>Timeline</td>
                </tr>
                @foreach ($projects as $key => $value)
                <tr>
                    <td style="vertical-align: top;">{{ $value->judul }}</td>
                    <td style="vertical-align: top;">{!! nl2br($value->deskripsi) !!}</td>
                    <td>
                        <img width="100" height="100" src="{!! public_path('upload/project/cover/'.$value->cover) !!}">
                    </td>
                    <td style="vertical-align: top;">{{ $value->kode_donasi }}</td>
                    <td style="vertical-align: top;">{!! nl2br($value->daftar_solia) !!}</td>
                    <td style="vertical-align: top;">{!! nl2br($value->timeline) !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>