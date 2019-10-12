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
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; padding: 3px;">Nama</td>
                    <td style="border: 1px solid black; padding: 3px;">Email</td>
                </tr>
                @foreach ($users as $key => $value)
                <tr>
                    <td style="border: 1px solid black; padding: 3px;">{{ $value->nama }}</td>
                    <td style="border: 1px solid black; padding: 3px;">{{ $value->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>