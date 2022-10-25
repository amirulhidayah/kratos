<table align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
    <thead align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
        <tr align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
            <th scope="col" align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">No.
            </th>
            <th scope="col" align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                Status</th>
            <th scope="col" align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                Nama</th>
            <th scope="col" align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                List Sub
                Indikator
            </th>
            <th scope="col" align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                List OPD
            </th>
            <th scope="col" align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                Tanggal Intervensi
            </th>
            <th scope="col" align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                Kecamatan
            </th>
            <th scope="col" align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                Desa
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataRealisasi as $item)
            <tr style="vertical-align: center;border: 1px solid black;">
                <td style="vertical-align: center;border: 1px solid black;" align="center">
                    {{ $loop->iteration }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="left">
                    {{ $item['status'] }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="left">
                    {{ $item['penduduk'] }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="left">
                    @forelse ($item['sub_indikator'] as $item2)
                        <p>{{ $loop->iteration }}. {{ $item2['nama'] }}</p>
                    @empty
                        <p>-</p>
                    @endforelse
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="left">
                    @forelse ($item['sub_indikator'] as $item2)
                        @php
                            $no = $loop->iteration;
                        @endphp
                        @foreach ($item2['opd'] as $item3)
                            @if ($loop->iteration == 1)
                                <p>{{ $no }}. {{ $item3 }}</p>
                            @else
                                <p>-{{ $item3 }}</p>
                            @endif
                        @endforeach
                    @empty
                        <p>-</p>
                    @endforelse
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="center">
                    @forelse ($item['sub_indikator'] as $item2)
                        <p>{{ $loop->iteration }}.
                            {{ \Carbon\Carbon::parse($item2['tanggal_intervensi'])->format('d-m-Y') }}
                        </p>
                    @empty
                        <p>-</p>
                    @endforelse
                </td>
                <td style="vertical-align: center;border: 1px solid black;" align="left">
                    {{ $item['nama_kecamatan'] }}</td>
                <td style="vertical-align: center;border: 1px solid black;" align="left">
                    {{ $item['nama_desa'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
