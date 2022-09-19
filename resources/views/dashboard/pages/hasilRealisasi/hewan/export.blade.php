    <table align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
        <thead align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
            <tr align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">No.</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Nama
                    Lokasi Hewan Ternak</th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">List Sub
                    Indikator Intervensi
                </th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">List OPD
                </th>
                <th scope="col" align="center"
                    style="vertical-align: center;border: 1px solid black;font-weight : bold">Tanggal Intervensi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataRealisasi as $item)
                <tr style="vertical-align: center;border: 1px solid black;">
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        {{ $loop->iteration }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="left">
                        {{ $item->nama }}</td>
                    <td style="vertical-align: center;border: 1px solid black;" align="left">
                        @forelse ($item->listIndikator as $item2)
                            <p>{{ $loop->iteration }}. {{ $item2->perencanaanHewan->sub_indikator }}</p>
                        @empty
                            <p>-</p>
                        @endforelse
                    </td>
                    <td style="vertical-align: center;border: 1px solid black;" align="left">
                        @forelse ($item->listIndikator as $item2)
                            <p>{{ $loop->iteration }}. {{ $item2->perencanaanHewan->opd->nama }}</p>
                            @if ($item2->perencanaanHewan->opdTerkaitHewan)
                                @foreach ($item2->perencanaanHewan->opdTerkaitHewan as $item3)
                                    <p>-{{ $item3->opd->nama }}</p>
                                @endforeach
                            @endif
                        @empty
                            <p>-</p>
                        @endforelse
                    </td>
                    <td style="vertical-align: center;border: 1px solid black;" align="center">
                        @forelse ($item->listIndikator as $item2)
                            <p>{{ $loop->iteration }}.
                                {{ Carbon\Carbon::parse($item2->realisasiHewan->created_at)->translatedFormat('d F Y') }}
                            </p>
                        @empty
                            <p>-</p>
                        @endforelse
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
