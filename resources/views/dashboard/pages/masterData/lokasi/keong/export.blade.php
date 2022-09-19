    <table align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
        <thead align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
            <tr align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">No.</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Nama</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Desa</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Deskripsi</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Latitude</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Longitude</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Pemilik Lahan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lokasiKeong as $keong)
                <tr style="vertical-align: center;border: 1px solid black;">
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $loop->iteration }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $keong->nama }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $keong->desa->nama }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $keong->deskripsi }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $keong->latitude }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $keong->longitude }}</td>
                    <td style="vertical-align: center;border: 1px solid black;">
                        @forelse ($keong->pemilikLokasiKeong as $pemilik)
                            <p>- {{ $pemilik->penduduk->nama }}</p>
                        @empty
                            <p>-</p>
                        @endforelse
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
