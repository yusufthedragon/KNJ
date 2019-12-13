<html>
    <body>
        <table>
            <tbody>
                <tr>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>No. Telepon</td>
                    <td>Jenis Donasi</td>
                    <td>Tanggal Transfer</td>
                    <td>Bank</td>
                    <td>Bukti Transfer</td>
                    <td>Nominal</td>
                    <td>Status Persetujuan</td>
                </tr>
                @foreach ($donasis as $key => $value)
                <tr>
                    <td style="vertical-align: top;">{{ $value->nama }}</td>
                    <td style="vertical-align: top;">{{ $value->email }}</td>
                    <td style="vertical-align: top;">{{ $value->no_telepon }}</td>
                    <td style="vertical-align: top;">{{ $value->jenis_donasi }}</td>
                    <td style="vertical-align: top;">{{ Carbon::parse($value->tanggal_transfer) }}</td>
                    <td style="vertical-align: top;">{{ $value->bank }}</td>
                    <td>
                        <img width="100" height="100" src="{!! public_path('upload/donasi/bukti/'.$value->bukti_transfer) !!}">
                    </td>
                    <td style="vertical-align: top;">{{ $value->nominal }}</td>
                    <td style="vertical-align: top;">
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