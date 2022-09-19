    <table align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
        <thead align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
            <tr align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                <th scope="col" align="center" rowspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">No.</th>
                <th scope="col" align="center" rowspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Desa</th>
                <th scope="col" align="center" rowspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Jumlah Lokasi Hewan</th>
                <th scope="col" align="center" rowspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Total Hewan Ternak</th>
                <th scope="col" align="center" colspan="{{ count($daftarHewan) }}"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Jumlah Hewan Ternak</th>
            </tr>
            <tr align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                @foreach ($daftarHewan as $hewan)
                    <th scope="col" align="center"
                        style="vertical-align: center;border: 1px solid black;font-weight : bold">{{ $hewan->nama }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($daftarJumlahHewan as $jumlah)
                <tr style="vertical-align: center;border: 1px solid black;">
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $loop->iteration }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $jumlah['desa'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $jumlah['lokasi_hewan'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $jumlah['jumlah'] }}</td>
                    @foreach ($jumlah['hewan'] as $hewan)
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $hewan['jumlah'] }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
