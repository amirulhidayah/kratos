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
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Berat Badan Lahir (Kg)
                </th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Panjang Badan Lahir (Cm)
                </th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Nama Ibu</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">NIK Ibu</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Nama Ayah</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">NIK Ayah</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Kecamatan</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Desa</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daftarAnak as $anak)
                <tr style="vertical-align: center;border: 1px solid black;">
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $loop->iteration }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $anak->nama }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $anak->nik }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $anak->jenis_kelamin }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ \Carbon\Carbon::parse($anak->tanggal_lahir)->format('d-m-Y') }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $anak->bb_lahir ?? '-' }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $anak->tb_lahir ?? '-' }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $anak->orangTua->nama_ibu ?? '-' }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $anak->orangTua->nik_ibu ?? '-' }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $anak->orangTua->nama_ayah ?? '-' }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $anak->orangTua->nik_ayah ?? '-' }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $anak->orangTua->desa->kecamatan->nama ?? '-' }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $anak->orangTua->desa->nama ?? '-' }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $anak->orangTua->alamat ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
