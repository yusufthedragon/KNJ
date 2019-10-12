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
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; padding: 3px;">Nama</td>
                    <td style="border: 1px solid black; padding: 3px;">Jabatan</td>
                    <td style="border: 1px solid black; padding: 3px;">Pendapat</td>
                    <td style="border: 1px solid black; padding: 3px;">Foto</td>
                </tr>
                @foreach ($kepengurusans as $key => $value)
                <tr>
                    <td style="border: 1px solid black; padding: 3px;">{{ $value->nama }}</td>
                    <td style="border: 1px solid black; padding: 3px;">{{ $value->jabatan }}</td>
                    <td style="border: 1px solid black; padding: 3px;">{!! nl2br($value->pendapat) !!}</td>
                    <td style="border: 1px solid black; padding: 3px;">
                        <img width="150" height="100" src="{!! public_path('upload/kepengurusan/foto/'.$value->foto) !!}">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>