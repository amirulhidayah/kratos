    <table align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
        <thead align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
            <tr align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                <th scope="col" align="center" rowspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">No.</th>
                <th scope="col" align="center" rowspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Nama Lokasi</th>
                <th scope="col" align="center" rowspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Desa</th>
                <th scope="col" align="center" rowspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Deskripsi</th>
                <th scope="col" align="center" rowspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Latitude</th>
                <th scope="col" align="center" rowspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Longitude</th>
                <th scope="col" align="center" rowspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Total Hewan</th>
                <th scope="col" align="center" colspan="{{ count($daftarHewan) }}"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Jumlah Hewan Ternak</th>
                <th scope="col" align="center" rowspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Pemilik Lokasi</th>
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
            @foreach ($jumlahLokasiHewan as $jumlah)
                <tr style="vertical-align: center;border: 1px solid black;">
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $loop->iteration }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $jumlah['nama'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $jumlah['desa'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $jumlah['deskripsi'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $jumlah['latitude'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $jumlah['longitude'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $jumlah['total_hewan'] }}</td>
                    @foreach ($jumlah['jumlah_hewan'] as $hewan)
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $hewan['jumlah'] }}</td>
                    @endforeach
                    <td style="vertical-align: center;border: 1px solid black;">
                        @forelse ($jumlah['pemilik'] as $pemilik)
                            <p>- {{ $pemilik['pemilik'] }}</p>
                        @empty
                            -
                        @endforelse
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
