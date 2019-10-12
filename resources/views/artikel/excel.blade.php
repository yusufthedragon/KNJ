<html>
    <body>
        <table>
            <tbody>
                <tr>
                    <td>Judul</td>
                    <td>Deskripsi</td>
                    <td>Wilayah</td>
                    <td>Cover</td>
                </tr>
                @foreach ($artikels as $key => $value)
                <tr>
                    <td style="vertical-align: top;">{{ $value->judul }}</td>
                    <td style="vertical-align: top;">{{ nl2br(e($value->deskripsi)) }}</td>
                    <td style="vertical-align: top;">{{ $value->wilayah }}</td>
                    <td>
                        <img src="{!! public_path('upload/artikel/cover/'.$value->cover) !!}">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>