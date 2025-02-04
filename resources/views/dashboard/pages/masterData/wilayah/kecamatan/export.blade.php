    <table align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
        <thead align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
            <tr align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">No.</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Nama</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Kode</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Luas Km<sup>2</sup></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daftarKecamatan as $kecamatan)
                <tr style="vertical-align: center;border: 1px solid black;">
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $loop->iteration }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $kecamatan->nama }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $kecamatan->kode }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $kecamatan->luas }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
