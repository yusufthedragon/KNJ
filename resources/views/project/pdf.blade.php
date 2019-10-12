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
                    <td colspan="6">&nbsp;</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; padding: 3px;">Judul</td>
                    <td style="border: 1px solid black; padding: 3px;">Deskripsi</td>
                    <td style="border: 1px solid black; padding: 3px;">Cover</td>
                    <td style="border: 1px solid black; padding: 3px;">Kode Donasi</td>
                    <td style="border: 1px solid black; padding: 3px;">Daftar Solia</td>
                    <td style="border: 1px solid black; padding: 3px;">Timeline</td>
                </tr>
                @foreach ($projects as $key => $value)
                <tr>
                    <td style="border: 1px solid black; padding: 3px;">{{ $value->judul }}</td>
                    <td style="border: 1px solid black; padding: 3px; width: 25%;">{!! nl2br($value->deskripsi) !!}</td>
                    <td style="border: 1px solid black; padding: 3px;">
                        <img width="100" height="100" src="{!! public_path('upload/project/cover/'.$value->cover) !!}">
                    </td>
                    <td style="border: 1px solid black; padding: 3px;">{{ $value->kode_donasi }}</td>
                    <td style="border: 1px solid black; padding: 3px;">{!! nl2br($value->daftar_solia) !!}</td>
                    <td style="border: 1px solid black; padding: 3px;">{!! nl2br($value->timeline) !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>