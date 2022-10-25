<table>
    <tr>
        <td colspan="3">Tahun :</td>
        <td>
            @php
                if ($tahun != '' && $tahun != 'Semua') {
                    echo $tahun;
                } else {
                    echo 'Semua';
                }
            @endphp
        </td>
    </tr>
</table>

<table class="table table-bordered mt-3">
    <thead>
        <tr style="vertical-align: center;border: 1px solid black;" align="center">
            <th scope="col" style="vertical-align: center;border: 1px solid black;" align="center">No.</th>
            <th scope="col" style="vertical-align: center;border: 1px solid black;" align="center">OPD</th>
            <th scope="col" style="vertical-align: center;border: 1px solid black;" align="center">Perencanaan</th>
            <th scope="col" style="vertical-align: center;border: 1px solid black;" align="center">Realisasi</th>
            <th scope="col" style="vertical-align: center;border: 1px solid black;" align="center">Persentase
                Realisasi</th>
        </tr>
    </thead>
    <tbody>
        @php
            $perencanaan = 0;
            $realisasi = 0;
            $persentase = 0;
        @endphp
        @foreach ($tabel['tabel'] as $tbl)
            <tr>
                <th scope="row" style="vertical-align: center;border: 1px solid black;" align="center">
                    {{ $loop->iteration }}</th>
                <td style="vertical-align: center;border: 1px solid black;" align="center">{{ $tbl['opd'] }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center">{{ $tbl['perencanaan'] }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center">{{ $tbl['realisasi'] }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center">
                    {{ $tbl['persentase'] == '-' ? '-' : $tbl['persentase'] . '%' }}</td>
            </tr>
            @php
                $perencanaan += $tbl['perencanaan'];
                $realisasi += $tbl['realisasi'];
            @endphp
        @endforeach
        @if (Auth::user()->role != 'OPD')
            <tr>
                <th scope="row" colspan="2" style="vertical-align: center;border: 1px solid black;"
                    align="center">Total</th>
                <td style="vertical-align: center;border: 1px solid black;" align="center">{{ $perencanaan }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center">{{ $realisasi }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center">
                    {{ $perencanaan == 0 ? 0 : round(($realisasi / $perencanaan) * 100, 2) }} %
                </td>
            </tr>
        @endif

    </tbody>
</table>
