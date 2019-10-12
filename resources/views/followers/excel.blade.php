<html>
    <body>
        <table>
            <tbody>
                <tr></tr>
                <tr>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>No. Telepon</td>
                    <td>Domisili</td>
                    <td>Foto</td>
                </tr>
                @foreach ($followers as $key => $value)
                <tr>
                    <td>{{ $value->nama }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->no_telepon }}</td>
                    <td>{{ $value->domisili }}</td>
                    <td>
                        <img width="150" height="100" src="{!! public_path('upload/followers/foto/'.$value->foto) !!}">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>