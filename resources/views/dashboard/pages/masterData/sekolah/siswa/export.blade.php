    <table>
        <tr>
            <td style="vertical-align: center;font-weight : bold">Sekolah : </td>
            <td style="vertical-align: center;font-weight : bold">{{ $sekolah->nama }}</td>
        </tr>
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
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Tempat Lahir</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Tanggal Lahir</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Agama</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Golongan Darah</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Kewarganegaraan</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Nomor Paspor</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Nomor Kitap</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Alamat</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Desa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daftarSiswa as $siswa)
                <tr style="vertical-align: center;border: 1px solid black;">
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $loop->iteration }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $siswa->penduduk->nama }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $siswa->penduduk->nik }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $siswa->penduduk->jenis_kelamin }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $siswa->penduduk->tempat_lahir }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ \Carbon\Carbon::parse($siswa->penduduk->tanggal_lahir)->format('d-m-Y') }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $siswa->penduduk->agama }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $siswa->penduduk->golongan_darah }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $siswa->penduduk->kewarganegaraan }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $siswa->penduduk->no_paspor }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $siswa->penduduk->no_kitap }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $siswa->penduduk->alamat }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $siswa->penduduk->desa->nama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
