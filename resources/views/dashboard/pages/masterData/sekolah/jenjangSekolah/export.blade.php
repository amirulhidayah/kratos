    <table align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
        <thead align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
            <tr align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                <th scope="col" align="center" rowspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">No.</th>
                <th scope="col" align="center" rowspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Jenjang</th>
                <th scope="col" align="center" colspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Jumlah Data</th>
                <th scope="col" align="center" colspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Jumlah Siswa Berdasarkan
                    Jenis Kelamin</th>
                @foreach ($daftarDesa as $namaDesa)
                    <th scope="col" align="center" colspan="4"
                        style="vertical-align: center;border: 1px solid black;font-weight : bold">DESA
                        {{ $namaDesa->nama }}
                    </th>
                @endforeach
            </tr>
            <tr align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Jumlah Sekolah</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Jumlah Siswa</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Laki-Laki</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Perempuan</th>
                @foreach ($daftarDesa as $namaDesa)
                    <th scope="col" align="center"
                        style="vertical-align: center;border: 1px solid black;font-weight : bold">Jumlah Sekolah</th>
                    <th scope="col" align="center"
                        style="vertical-align: center;border: 1px solid black;font-weight : bold">Jumlah Siswa</th>
                    <th scope="col" align="center"
                        style="vertical-align: center;border: 1px solid black;font-weight : bold">Laki - Laki</th>
                    <th scope="col" align="center"
                        style="vertical-align: center;border: 1px solid black;font-weight : bold">Perempuan</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($daftarJumlahData as $jumlah)
                <tr style="vertical-align: center;border: 1px solid black;">
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $loop->iteration }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $jumlah['jenjang'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $jumlah['jumlah_sekolah'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $jumlah['total_siswa'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $jumlah['siswa_laki'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $jumlah['siswa_perempuan'] }}</td>
                    @foreach ($jumlah['desa'] as $jumlahDesa)
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $jumlahDesa['jumlah_sekolah'] }}</td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $jumlahDesa['total_siswa'] }}</td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $jumlahDesa['siswa_laki'] }}</td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $jumlahDesa['siswa_perempuan'] }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
