        <table>
            <tbody>
                @if ($jenisKelamin && $jenisKelamin != 'semua')
                    <tr>
                        <th scope="col" colspan="4">Jenis
                            Kelamin</th>
                        <th scope="col" align="center">:</th>
                        <th scope="col" colspan="12">{{ $jenisKelamin }}</th>
                    </tr>
                @endif
                @if ($bbU != 'semua')
                    <tr>
                        <th scope="col" colspan="4">BB / U</th>
                        <th scope="col" align="center">:</th>
                        <th scope="col" colspan="12">{{ $bbU }}</th>
                    </tr>
                @endif
                @if ($tbU != 'semua')
                    <tr>
                        <th scope="col" colspan="4">TB / U</th>
                        <th scope="col" align="center">:</th>
                        <th scope="col" colspan="12">{{ $tbU }}</th>
                    </tr>
                @endif
                @if ($bbTb != 'semua')
                    <tr>
                        <th scope="col" colspan="4">BB / TB</th>
                        <th scope="col" align="center">:</th>
                        <th scope="col" colspan="12">{{ $bbTb }}</th>
                    </tr>
                @endif
                @if ($jenisFilter == 'wilayah')
                    @if ($kecamatan)
                        <tr>
                            <th scope="col" colspan="4">Kecamatan</th>
                            <th scope="col" align="center">:</th>
                            <th scope="col" colspan="12">{{ $kecamatan->nama }}</th>
                        </tr>
                    @endif
                    @if ($desa)
                        <tr>
                            <th scope="col" colspan="4">Desa</th>
                            <th scope="col" align="center">:</th>
                            <th scope="col" colspan="12">{{ $desa->nama }}</th>
                        </tr>
                    @endif
                @endif
                @if ($jenisFilter == 'pelayanan_kesehatan')
                    @if ($puskesmas)
                        <tr>
                            <th scope="col" colspan="4">PUSKESMAS</th>
                            <th scope="col" align="center">:</th>
                            <th scope="col" colspan="12">{{ $puskesmas->nama }}</th>
                        </tr>
                    @endif
                    @if ($posyandu)
                        <tr>
                            <th scope="col" colspan="4">POSYANDU</th>
                            <th scope="col" align="center">:</th>
                            <th scope="col" colspan="12">{{ $posyandu->nama }}</th>
                        </tr>
                    @endif
                @endif
            </tbody>
        </table>

        <table align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
            <thead align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                <tr align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                    <th scope="col" align="center"
                        style="vertical-align: center;border: 1px solid black;font-weight : bold">No.</th>
                    <th scope="col" align="center"
                        style="vertical-align: center;border: 1px solid black;font-weight : bold">Nama</th>
                    <th scope="col" align="center"
                        style="vertical-align: center;border: 1px solid black;font-weight : bold">NIK</th>
                    <th scope="col" align="center"
                        style="vertical-align: center;border: 1px solid black;font-weight : bold">Jenis Kelamin</th>
                    <th scope="col" align="center"
                        style="vertical-align: center;border: 1px solid black;font-weight : bold">Tanggal Lahir</th>
                    <th scope="col" align="center"
                        style="vertical-align: center;border: 1px solid black;font-weight : bold">Tanggal Pengukuran
                    </th>
                    <th scope="col" align="center"
                        style="vertical-align: center;border: 1px solid black;font-weight : bold">Usia Saat Ukur
                    </th>
                    <th scope="col" align="center"
                        style="vertical-align: center;border: 1px solid black;font-weight : bold">Berat (Kg)</th>
                    <th scope="col" align="center"
                        style="vertical-align: center;border: 1px solid black;font-weight : bold">Tinggi (Cm)</th>
                    <th scope="col" align="center"
                        style="vertical-align: center;border: 1px solid black;font-weight : bold">Lingkar Lengan Atas
                    </th>
                    <th scope="col" align="center"
                        style="vertical-align: center;border: 1px solid black;font-weight : bold">BB / U</th>
                    <th scope="col" align="center"
                        style="vertical-align: center;border: 1px solid black;font-weight : bold">TB / U</th>
                    <th scope="col" align="center"
                        style="vertical-align: center;border: 1px solid black;font-weight : bold">BB / TB</th>
                    <th scope="col" align="center"
                        style="vertical-align: center;border: 1px solid black;font-weight : bold">PUSKESMAS</th>
                    <th scope="col" align="center"
                        style="vertical-align: center;border: 1px solid black;font-weight : bold">POSYANDU</th>
                    <th scope="col" align="center"
                        style="vertical-align: center;border: 1px solid black;font-weight : bold">Kecamatan</th>
                    <th scope="col" align="center"
                        style="vertical-align: center;border: 1px solid black;font-weight : bold">Desa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarPengukuranAnak as $pengukuranAnak)
                    <tr style="vertical-align: center;border: 1px solid black;">
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $loop->iteration }}</td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $pengukuranAnak->nama }}</td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $pengukuranAnak->nik }}</td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $pengukuranAnak->jenis_kelamin }}</td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ \Carbon\Carbon::parse($pengukuranAnak->tanggal_lahir)->format('d-m-Y') }}</td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $pengukuranAnak->pengukuranAnakTerakhir ? \Carbon\Carbon::parse($pengukuranAnak->pengukuranAnakTerakhir->tanggal_pengukuran)->format('d-m-Y') : '-' }}
                        </td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $pengukuranAnak->pengukuranAnakTerakhir->usia_saat_ukur ?? '-' }}</td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $pengukuranAnak->pengukuranAnakTerakhir->berat ?? '-' }}</td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $pengukuranAnak->pengukuranAnakTerakhir->tinggi ?? '-' }}</td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $pengukuranAnak->pengukuranAnakTerakhir->lila ?? '-' }}</td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $pengukuranAnak->pengukuranAnakTerakhir->bb_u ?? '-' }}</td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $pengukuranAnak->pengukuranAnakTerakhir->tb_u ?? '-' }}</td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $pengukuranAnak->pengukuranAnakTerakhir->bb_tb ?? '-' }}</td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $pengukuranAnak->pengukuranAnakTerakhir->puskesmas->nama ?? '-' }}</td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $pengukuranAnak->pengukuranAnakTerakhir->posyandu->nama ?? '-' }}</td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $pengukuranAnak->orangTua->desa->kecamatan->nama ?? '-' }}</td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $pengukuranAnak->orangTua->desa->nama ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
