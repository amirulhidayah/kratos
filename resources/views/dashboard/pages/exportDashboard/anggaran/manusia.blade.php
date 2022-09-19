<table>
    <tr>
        <td colspan="3">Anggaran Intervensi :</td>
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
        @foreach ($tabelAnggaranManusia as $anggaranManusia)
            <tr>
                <th style="vertical-align: center;border: 1px solid black;" align="center" scope="row"
                    class="text-center">{{ $loop->iteration }}</th>
                <td style="vertical-align: center;border: 1px solid black;" align="center" class="text-nowrap">
                    {{ $anggaranManusia['opd'] }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">
                    Rp.
                    {{ number_format($anggaranManusia['perencanaanDau'], 0, ',', '.') }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">
                    Rp.
                    {{ number_format($anggaranManusia['perencanaanDak'], 0, ',', '.') }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">
                    Rp. {{ number_format($anggaranManusia['perencanaan'], 0, ',', '.') }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">
                    Rp. {{ number_format($anggaranManusia['realisasiDau'], 0, ',', '.') }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">
                    Rp. {{ number_format($anggaranManusia['realisasiDak'], 0, ',', '.') }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">
                    Rp. {{ number_format($anggaranManusia['realisasi'], 0, ',', '.') }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">
                    {{ $anggaranManusia['persentaseDau'] == '-' ? '-' : $anggaranManusia['persentaseDau'] . ' %' }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">
                    {{ $anggaranManusia['persentaseDak'] == '-' ? '-' : $anggaranManusia['persentaseDak'] . ' %' }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">
                    {{ $anggaranManusia['persentase'] == '-' ? '-' : $anggaranManusia['persentase'] . ' %' }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">
                    Rp.
                    {{ number_format($anggaranManusia['perencanaanDau'] - $anggaranManusia['realisasiDau'], 0, ',', '.') }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">
                    Rp.
                    {{ number_format($anggaranManusia['perencanaanDak'] - $anggaranManusia['realisasiDak'], 0, ',', '.') }}
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center"
                    class="text-center text-nowrap">
                    Rp.
                    {{ number_format($anggaranManusia['perencanaan'] - $anggaranManusia['realisasi'], 0, ',', '.') }}
                </td>
            </tr>
            @php
                $perencanaanDau += $anggaranManusia['perencanaanDau'];
                $perencanaanDak += $anggaranManusia['perencanaanDak'];
                $perencanaan += $anggaranManusia['perencanaan'];
                $realisasiDau += $anggaranManusia['realisasiDau'];
                $realisasiDak += $anggaranManusia['realisasiDak'];
                $realisasi += $anggaranManusia['realisasi'];
                $sisaDau += $anggaranManusia['perencanaanDau'] - $anggaranManusia['realisasiDau'];
                $sisaDak += $anggaranManusia['perencanaanDak'] - $anggaranManusia['realisasiDak'];
                $sisa += $anggaranManusia['perencanaan'] - $anggaranManusia['realisasi'];
            @endphp
        @endforeach
        @if (Auth::user()->role != 'OPD')
            <tr class="fw-bold text-nowrap">
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
