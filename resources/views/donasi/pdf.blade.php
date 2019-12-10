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
                    <td colspan="7">&nbsp;</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; padding: 3px;">Nama</td>
                    <td style="border: 1px solid black; padding: 3px;">Email</td>
                    <td style="border: 1px solid black; padding: 3px;">Jenis</td>
                    <td style="border: 1px solid black; padding: 3px;">Tanggal</td>
                    <td style="border: 1px solid black; padding: 3px;">Bukti</td>
                    <td style="border: 1px solid black; padding: 3px;">Nominal</td>
                    <td style="border: 1px solid black; padding: 3px;">Status</td>
                </tr>
                @foreach ($donasis as $key => $value)
                <tr>
                    <td style="border: 1px solid black; padding: 3px;">{{ $value->nama }}</td>
                    <td style="border: 1px solid black; padding: 3px;">{{ $value->email }}</td>
                    <td style="border: 1px solid black; padding: 3px;">{{ $value->jenis_donasi }}</td>
                    <td style="border: 1px solid black; padding: 3px;">{{ Carbon::parse($value->tanggal_transfer)->format('d-m-Y') }}</td>
                    <td style="border: 1px solid black; padding: 3px; width: 20%;">
                        <img width="100" height="100" src="{!! public_path('upload/donasi/bukti/'.$value->bukti_transfer) !!}">
                    </td>
                    <td style="border: 1px solid black; padding: 3px;">{{ $value->nominal }}</td>
                    <td style="border: 1px solid black; padding: 3px;">
                        @if ($value->status_persetujuan == 0)
                            Butuh Persetujuan
                        @elseif ($value->status_persetujuan == 1)
                            Disetujui
                        @else
                            Ditolak
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>