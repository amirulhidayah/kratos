<table>
    <tr>
        <td colspan="3">Anggaran Intervensi :</td>
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
        <tr class="text-center">
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col" rowspan="2">No.
            </th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col" rowspan="2">OPD
            </th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col" colspan="3">
                Nilai Anggaran</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col" colspan="3">
                Penggunaan Anggaran</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col" colspan="3">
                Persentase Penggunaan Anggaran</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col" colspan="3">
                Sisa Anggaran</th>
        </tr>
        <tr class="text-center">
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col">DAU</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col">DAK</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col">Total</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col">DAU</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col">DAK</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col">Total</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col">DAU</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col">DAK</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col">Total</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col">DAU</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col">DAK</th>
            <th style="vertical-align: center;border: 1px solid black;" align="center" scope="col">Total</th>
        </tr>
    </thead>
    <tbody>
        @php
            $perencanaanDau = 0;
            $perencanaanDak = 0;
            $perencanaan = 0;
            $realisasiDau = 0;
            $realisasiDak = 0;
            $realisasi = 0;
            $sisaDau = 0;
            $sisaDak = 0;
            $sisa = 0;
        @endphp
        @foreach ($tabelAnggaranSemua as $anggaranSemua)
            <tr>
                <th style="vertical-align: center;border: 1px solid black;" align="center" scope="row"
                    class="text-center">{{ $loop->iteration }}</th>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-nowrap">
                    {{ $anggaranSemua['opd'] }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">
                    Rp. {{ number_format($anggaranSemua['perencanaanDau'], 0, ',', '.') }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">
                    Rp. {{ number_format($anggaranSemua['perencanaanDak'], 0, ',', '.') }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">
                    Rp. {{ number_format($anggaranSemua['perencanaan'], 0, ',', '.') }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">
                    Rp. {{ number_format($anggaranSemua['realisasiDau'], 0, ',', '.') }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">
                    Rp. {{ number_format($anggaranSemua['realisasiDak'], 0, ',', '.') }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">
                    Rp. {{ number_format($anggaranSemua['realisasi'], 0, ',', '.') }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">
                    {{ $anggaranSemua['persentaseDau'] == '-' ? '-' : $anggaranSemua['persentaseDau'] . ' %' }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">
                    {{ $anggaranSemua['persentaseDak'] == '-' ? '-' : $anggaranSemua['persentaseDak'] . ' %' }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">
                    {{ $anggaranSemua['persentase'] == '-' ? '-' : $anggaranSemua['persentase'] . ' %' }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">
                    Rp.
                    {{ number_format($anggaranSemua['perencanaanDau'] - $anggaranSemua['realisasiDau'], 0, ',', '.') }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">
                    Rp.
                    {{ number_format($anggaranSemua['perencanaanDak'] - $anggaranSemua['realisasiDak'], 0, ',', '.') }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">
                    Rp.
                    {{ number_format($anggaranSemua['perencanaan'] - $anggaranSemua['realisasi'], 0, ',', '.') }}
                </td>
            </tr>
            @php
                $perencanaanDau += $anggaranSemua['perencanaanDau'];
                $perencanaanDak += $anggaranSemua['perencanaanDak'];
                $perencanaan += $anggaranSemua['perencanaan'];
                $realisasiDau += $anggaranSemua['realisasiDau'];
                $realisasiDak += $anggaranSemua['realisasiDak'];
                $realisasi += $anggaranSemua['realisasi'];
                $sisaDau += $anggaranSemua['perencanaanDau'] - $anggaranSemua['realisasiDau'];
                $sisaDak += $anggaranSemua['perencanaanDak'] - $anggaranSemua['realisasiDak'];
                $sisa += $anggaranSemua['perencanaan'] - $anggaranSemua['realisasi'];
            @endphp
        @endforeach
        @if (Auth::user()->role != 'OPD')
            <tr class="text-nowrap fw-bold">
                <th style="vertical-align: center;border: 1px solid black;" align="center" scope="row"
                    colspan="2" class="text-center">Total</th>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">Rp.
                    {{ number_format($perencanaanDau, 0, ',', '.') }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">Rp.
                    {{ number_format($perencanaanDak, 0, ',', '.') }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">Rp.
                    {{ number_format($perencanaan, 0, ',', '.') }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">Rp.
                    {{ number_format($realisasiDau, 0, ',', '.') }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">Rp.
                    {{ number_format($realisasiDak, 0, ',', '.') }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">Rp.
                    {{ number_format($realisasi, 0, ',', '.') }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">
                    {{ $perencanaanDau == 0 ? 0 : round(($realisasiDau / $perencanaanDau) * 100, 2) }}
                    %
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">
                    {{ $perencanaanDak == 0 ? 0 : round(($realisasiDak / $perencanaanDak) * 100, 2) }}
                    %
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-center">
                    {{ $perencanaan == 0 ? 0 : round(($realisasi / $perencanaan) * 100, 2) }}
                    %
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">Rp.
                    {{ number_format($sisaDau, 0, ',', '.') }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">Rp.
                    {{ number_format($sisaDak, 0, ',', '.') }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">Rp.
                    {{ number_format($sisa, 0, ',', '.') }}</td>
            </tr>
        @endif
    </tbody>
</table>
