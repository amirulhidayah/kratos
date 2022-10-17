    <table align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
        <thead align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
            <tr align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">No.</th>
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
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">RT
                </th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">RW</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Alamat</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Jumlah Anak</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Anak</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daftarOrangTua as $orangTua)
                <tr style="vertical-align: center;border: 1px solid black;">
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $loop->iteration }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $orangTua->nama_ibu ?? '-' }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $orangTua->nik_ibu ?? '-' }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $orangTua->nama_ayah ?? '-' }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $orangTua->nik_ayah ?? '-' }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $orangTua->desa->kecamatan->nama }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $orangTua->desa->nama }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $orangTua->rt ?? '-' }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $orangTua->rw ?? '-' }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $orangTua->alamat ?? '-' }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ count($orangTua->anak) }}</td>
                    @if (count($orangTua->anak) > 0)
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            @foreach ($orangTua->anak as $anak)
                                {{ $loop->iteration . '. ' . $anak->nama . ' (' . $anak->nik . ')' }}
                                @if (!$loop->last)
                                    <br>
                                @endif
                            @endforeach
                        </td>
                    @else
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            -</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
