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
                    <td style="border: 1px solid black; padding: 3px;">Judul</td>
                    <td style="border: 1px solid black; padding: 3px;">Deskripsi</td>
                    <td style="border: 1px solid black; padding: 3px;">Wilayah</td>
                    <td style="border: 1px solid black; padding: 3px;">Cover</td>
                </tr>
                @foreach ($artikels as $key => $value)
                <tr>
                    <td style="border: 1px solid black; padding: 3px;">{{ $value->judul }}</td>
                    <td style="border: 1px solid black; padding: 3px; width: 25%;">{!! nl2br($value->deskripsi) !!}</td>
                    <td style="border: 1px solid black; padding: 3px;">{{ $value->wilayah }}</td>
                    <td style="border: 1px solid black; padding: 3px;">
                        <img width="150" height="100" src="{!! public_path('upload/artikel/cover/'.$value->cover) !!}">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>