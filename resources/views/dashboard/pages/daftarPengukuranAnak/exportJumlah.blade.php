    @if (count($tabelJumlah['tabelDesa']) > 1)
        <table>
            <tr>
                <td colspan="2" style="vertical-align: center;font-weight : bold">
                    {{ $tabelJumlah['wilayah'] }} : </td>
                <td colspan="2" style="vertical-align: center;font-weight : bold">
                    {{ $tabelJumlah['nama_wilayah'] }}</td>
            </tr>
        </table>
    @endif

    <table align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
        <thead align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
            <tr align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                <th scope="col" align="center" rowspan="3"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">No.</th>
                <th scope="col" align="center" rowspan="3"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Desa</th>
                <th scope="col" align="center" rowspan="3"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Kecamatan</th>
                <th scope="col" align="center" rowspan="3"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Total Anak</th>
                <th scope="col" align="center" colspan="2" rowspan="2"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Berdasarkan Jenis Kelamin
                <th scope="col" align="center" colspan="12"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Kategori BB / U
                </th>
                <th scope="col" align="center" colspan="12"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Kategori TB / U
                </th>
                <th scope="col" align="center" colspan="18"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Kategori BB / TB
                </th>
                <th scope="col" align="center" rowspan="3"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Total Belum Melakukan
                    Pengukuran </th>
            </tr>
            <tr align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                <th scope="col" align="center" colspan="3"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Sangat Kurang</th>
                <th scope="col" align="center" colspan="3"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Kurang</th>
                <th scope="col" align="center" colspan="3"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Berat Badan Normal</th>
                <th scope="col" align="center" colspan="3"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Berat Badan Lebih</th>
                <th scope="col" align="center" colspan="3"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Sangat Pendek</th>
                <th scope="col" align="center" colspan="3"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Pendek</th>
                <th scope="col" align="center" colspan="3"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Normal</th>
                <th scope="col" align="center" colspan="3"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Tinggi</th>
                <th scope="col" align="center" colspan="3"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Gizi Buruk</th>
                <th scope="col" align="center" colspan="3"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Gizi Kurang</th>
                <th scope="col" align="center" colspan="3"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Gizi Baik</th>
                <th scope="col" align="center" colspan="3"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Beresiko Gizi Lebih</th>
                <th scope="col" align="center" colspan="3"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Gizi Lebih</th>
                <th scope="col" align="center" colspan="3"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Obesitas</th>
            </tr>
            <tr align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Laki-Laki</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Perempuan</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Laki-Laki</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Perempuan</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Total</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Laki-Laki</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Perempuan</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Total</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Laki-Laki</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Perempuan</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Total</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Laki-Laki</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Perempuan</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Total</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Laki-Laki</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Perempuan</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Total</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Laki-Laki</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Perempuan</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Total</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Laki-Laki</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Perempuan</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Total</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Laki-Laki</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Perempuan</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Total</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Laki-Laki</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Perempuan</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Total</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Laki-Laki</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Perempuan</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Total</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Laki-Laki</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Perempuan</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Total</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Laki-Laki</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Perempuan</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Total</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Laki-Laki</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Perempuan</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Total</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Laki-Laki</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Perempuan</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tabelJumlah['tabelDesa'] as $desa)
                <tr style="vertical-align: center;border: 1px solid black;">
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $loop->iteration }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $desa['desa'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $desa['kecamatan'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $desa['total']['total'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $desa['total']['laki'] }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $desa['total']['perempuan'] }}</td>
                    @foreach ($desa['bbU'] as $bbu)
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $bbu['laki'] }}</td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $bbu['perempuan'] }}</td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $bbu['total'] }}</td>
                    @endforeach
                    @foreach ($desa['tbU'] as $tbu)
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $tbu['laki'] }}</td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $tbu['perempuan'] }}</td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $tbu['total'] }}</td>
                    @endforeach
                    @foreach ($desa['bbTb'] as $bbTb)
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $bbTb['laki'] }}</td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $bbTb['perempuan'] }}</td>
                        <td style="vertical-align: center;border: 1px solid black;" align="center">
                            {{ $bbTb['total'] }}</td>
                    @endforeach
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $desa['total']['belumUkur'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
