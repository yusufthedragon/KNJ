<html>
    <body>
        <table>
            <tbody>
                <tr></tr>
                <tr>
                    <td>Nama</td>
                    <td>Jabatan</td>
                    <td>Pendapat</td>
                    <td>Foto</td>
                </tr>
                @foreach ($kepengurusans as $key => $value)
                <tr>
                    <td>{{ $value->nama }}</td>
                    <td>{{ $value->jabatan }}</td>
                    <td style="vertical-align: middle;">{!! nl2br(e($value->pendapat)) !!}</td>
                    <td>
                        <img width="150" height="100" src="{!! public_path('upload/kepengurusan/foto/'.$value->foto) !!}">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>