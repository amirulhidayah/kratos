<table>
    <tr>
        <td colspan="3">Intervensi :</td>
        <td>Manusia</td>
    </tr>
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
        <tr>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col">No.</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col">OPD</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col">Perencanaan</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col">Realisasi</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col">Persentase
                Realisasi</th>
        </tr>
    </thead>
    <tbody>
        @php
            $perencanaan = 0;
            $realisasi = 0;
            $persentase = 0;
        @endphp
        @foreach ($tabelManusia as $manusia)
            <tr>
                <th style="vertical-align: center;border: 1px solid black;" align="center" scope="row">
                    {{ $loop->iteration }}</th>
                <td style="vertical-align: center;border: 1px solid black;" align="center">{{ $manusia['opd'] }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center">{{ $manusia['perencanaan'] }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center">{{ $manusia['realisasi'] }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center">
                    {{ $manusia['persentase'] == '-' ? '-' : $manusia['persentase'] . '%' }}
                </td>
            </tr>
            @php
                $perencanaan += $manusia['perencanaan'];
                $realisasi += $manusia['realisasi'];
            @endphp
        @endforeach
        @if (Auth::user()->role != 'OPD')
            <tr>
                <th style="vertical-align: center;border: 1px solid black;" align="center" scope="row"
                    colspan="2">Total</th>
                <td style="vertical-align: center;border: 1px solid black;" align="center">{{ $perencanaan }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center">{{ $realisasi }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center">
                    {{ $perencanaan == 0 ? 0 : round(($realisasi / $perencanaan) * 100, 2) }} %
                </td>
            </tr>
        @endif
    </tbody>
</table>
