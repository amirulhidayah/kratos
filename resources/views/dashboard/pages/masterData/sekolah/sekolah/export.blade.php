    <table align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
        <thead align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
            <tr align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                <th scope="col" align="center" rowspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">No.</th>
                <th scope="col" align="center" rowspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Nama Sekolah</th>
                <th scope="col" align="center" rowspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Jenis Sekolah</th>
                <th scope="col" align="center" rowspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Desa</th>
                <th scope="col" align="center" rowspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Jumlah Siswa</th>
                <th scope="col" align="center" colspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Jumlah Siswa Berdasarkan
                    Jenis Kelamin</th>
            </tr>
            <tr align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Laki-Laki</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Perempuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daftarJumlahData as $jumlah)
                <tr style="vertical-align: center;border: 1px solid black;">
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $loop->iteration }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $jumlah['sekolah'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $jumlah['jenis'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $jumlah['desa'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $jumlah['total_siswa'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $jumlah['siswa_laki'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $jumlah['siswa_perempuan'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
