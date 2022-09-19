    <table align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
        <thead align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
            <tr align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                <th scope="col" align="center" rowspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">No.</th>
                <th scope="col" align="center" rowspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Desa</th>
                <th scope="col" align="center" rowspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Total Penduduk</th>
                <th scope="col" align="center" colspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Berdasarkan Jenis Kelamin
                <th scope="col" align="center" colspan="6"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Berdasarkan Umur
                <th scope="col" align="center" colspan="10"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Berdasarkan Pendidikan
                    Terakhir
                </th>
                <th scope="col" align="center" colspan="8"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Berdasarkan Pekerjaan
                </th>
            </tr>
            <tr align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Laki-Laki</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Perempuan</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Bayi Dua Tahun (0 - 24
                    Bulan)</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Bayi Lima Tahun (24 - 60
                    Bulan)</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Anak (5 - 12 Tahun)</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Remaja (12 - 18 Tahun)
                </th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Dewasa (> 18 Tahun)</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Lansia (> 60 Tahun)</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Tidak Sekolah</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">SD</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">SMP</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">SMA</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Diploma 1</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Diploma 2</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Diploma 3</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Diploma 4 / S1</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">S2</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">S3</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Tidak Bekerja</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Ibu Rumah Tangga</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Karyawan Swasta</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">PNS / TNI-POLRI</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Wiraswasta / Wirausaha
                </th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Petani / Pekebun</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Pekerjaan Tidak Tetap
                </th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Pelajar / Mahasiswa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daftarJumlahPenduduk as $penduduk)
                <tr style="vertical-align: center;border: 1px solid black;">
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $loop->iteration }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['desa'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['total_penduduk'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['penduduk_laki_laki'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['penduduk_perempuan'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['baduta'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['balita'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['anak'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['remaja'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['dewasa'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['lansia'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['tidak_sekolah'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['sd'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['smp'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['sma'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['diploma_1'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['diploma_2'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['diploma_3'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['s1'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['s2'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['s3'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['tidak_bekerja'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['irt'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['karyawan_swasta'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['pns'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['wiraswasta'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['petani'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['pekerjaan_tidak_tetap'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $penduduk['pelajar'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
