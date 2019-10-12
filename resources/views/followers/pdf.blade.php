<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style>
            table, tr, td {
                page-break-inside: avoid;
                vertical-align: top;
            }
        </style>
    </head>
    <body style="font-size: 11px; font-family: Arial, Helvetica, sans-serif;">
        <table style="width: 100%; max-width: 100%; border-collapse: collapse; border-spacing: 0; word-wrap:break-word; table-layout: fixed;">
            <tbody>
                <tr>
                    <td colspan="5">&nbsp;</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; padding: 3px; width: 20%;">Nama</td>
                    <td style="border: 1px solid black; padding: 3px; width: 25%;">Email</td>
                    <td style="border: 1px solid black; padding: 3px; width: 18%;">No. Telepon</td>
                    <td style="border: 1px solid black; padding: 3px; width: 18%;">Domisili</td>
                    <td style="border: 1px solid black; padding: 3px; width: 20%;">Foto</td>
                </tr>
                @foreach ($followers as $key => $value)
                <tr>
                    <td style="border: 1px solid black; padding: 3px;">{{ $value->nama }}</td>
                    <td style="border: 1px solid black; padding: 3px;">{{ $value->email }}</td>
                    <td style="border: 1px solid black; padding: 3px;">{{ $value->no_telepon }}</td>
                    <td style="border: 1px solid black; padding: 3px;">{{ $value->domisili }}</td>
                    <td style="border: 1px solid black; padding: 3px;">
                        <img width="100" height="100" src="{!! public_path('upload/followers/foto/'.$value->foto) !!}">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>