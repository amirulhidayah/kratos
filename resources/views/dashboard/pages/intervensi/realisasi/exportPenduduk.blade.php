<table align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
    <thead align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
        <tr align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
            <th scope="col" align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">No.
            </th>
            <th scope="col" align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                Tanggal Pembuatan Laporan</th>
            <th scope="col" align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                Sasaran Intervensi</th>
            <th scope="col" align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                Nama Ibu</th>
            <th scope="col" align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                Nama Anak</th>
            <th scope="col" align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                Kecamatan</th>
            <th scope="col" align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                Desa</th>
            {{-- <th scope="col" align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                Status</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($dataPenduduk as $item)
            <tr style="vertical-align: center;border: 1px solid black;">
                <td style="vertical-align: center;border: 1px solid black;" align="center">
                    {{ $loop->iteration }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center">
                    {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="left">
                    {{ $item->sasaran_intervensi }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center">
                    {{ $item->orangTua->nama_ibu }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center">
                    {{ isset($item->anak) ? $item->anak->nama : '-' }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center">
                    {{ $item->orangTua->desa->kecamatan->nama }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="center">
                    {{ $item->orangTua->desa->nama }}</td>

                {{-- <td style="vertical-align: center;border: 1px solid black;" align="center">
                    @if ($item->status == 0)
                        Menunggu Konfirmasi
                    @elseif ($item->status == 1)
                        Disetujui
                    @elseif ($item->status == 2)
                        Ditolak
                    @endif
                </td> --}}
            </tr>
        @endforeach
    </tbody>
</table>
