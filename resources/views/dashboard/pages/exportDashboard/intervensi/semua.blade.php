<table>
    <tr>
        <td colspan="3">Intervensi :</td>
        <td>Semua</td>
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
        <tr class="text-center" style="vertical-align: center;border: 1px solid black;" align="center">
            <th scope="col" style="vertical-align: center;border: 1px solid black;" align="center">No.</th>
            <th scope="col"style="vertical-align: center;border: 1px solid black;" align="center">OPD</th>
            <th scope="col" style="vertical-align: center;border: 1px solid black;" align="center">Perencanaan</th>
            <th scope="col"style="vertical-align: center;border: 1px solid black;" align="center">Realisasi</th>
            <th scope="col"style="vertical-align: center;border: 1px solid black;" align="center">Persentase
                Realisasi</th>
        </tr>
    </thead>
    <tbody>
        @php
            $perencanaan = 0;
            $realisasi = 0;
        @endphp
        @foreach ($tabelKeong as $keong)
            @php
                $keongPersentase = 0;
                $manusiaPersentase = 0;
                $hewanPersentase = 0;
            @endphp
            <tr>
                <th scope="row" style="vertical-align: center;border: 1px solid black;" align="center">
                    {{ $loop->iteration }}</th>
                <td style="vertical-align: center;border: 1px solid black;" align="center">{{ $keong['opd'] }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center">
                    {{ $keong['perencanaan'] + $tabelManusia[$loop->index]['perencanaan'] + $tabelHewan[$loop->index]['perencanaan'] }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center">
                    {{ $keong['realisasi'] + $tabelManusia[$loop->index]['realisasi'] + $tabelHewan[$loop->index]['realisasi'] }}
                </td>
                @php
                    if ($keong['persentase'] != '-') {
                        $keongPersentase = $keong['persentase'];
                    }

                    if ($tabelManusia[$loop->index]['persentase'] != '-') {
                        $manusiaPersentase = $tabelManusia[$loop->index]['persentase'];
                    }

                    if ($tabelHewan[$loop->index]['persentase'] != '-') {
                        $hewanPersentase = $tabelHewan[$loop->index]['persentase'];
                    }
                @endphp
                <td style="vertical-align: center;border: 1px solid black;" align="center">
                    @if ($keong['perencanaan'] == 0)
                        -
                    @else
                        {{ round((($keong['realisasi'] + $tabelManusia[$loop->index]['realisasi'] + $tabelHewan[$loop->index]['realisasi']) / ($keong['perencanaan'] + $tabelManusia[$loop->index]['perencanaan'] + $tabelHewan[$loop->index]['perencanaan'])) * 100, 2) }}
                        %
                    @endif

                </td>
            </tr>
            @php
                $perencanaan += $keong['perencanaan'] + $tabelManusia[$loop->index]['perencanaan'] + $tabelHewan[$loop->index]['perencanaan'];
                $realisasi += $keong['realisasi'] + $tabelManusia[$loop->index]['realisasi'] + $tabelHewan[$loop->index]['realisasi'];
            @endphp
        @endforeach
        @if (Auth::user()->role != 'OPD')
            <tr>
                <th scope="row" colspan="2" style="vertical-align: center;border: 1px solid black;"
                    align="center">Total</th>
                <td style="vertical-align: center;border: 1px solid black;" align="center">{{ $perencanaan }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center">{{ $realisasi }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center">
                    {{ $perencanaan == 0 ? 0 : round(($realisasi / $perencanaan) * 100, 2) }}
                    %
                </td>
            </tr>
        @endif
    </tbody>
</table>
