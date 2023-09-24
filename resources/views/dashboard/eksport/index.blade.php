<table style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th style="padding: 8px; border: 1px solid #dddddd; text-align: left;">No</th>
            <th style="padding: 8px; border: 1px solid #dddddd; text-align: left;">Tanggal</th>
            <th style="padding: 8px; border: 1px solid #dddddd; text-align: left;">No Unit</th>
            <th style="padding: 8px; border: 1px solid #dddddd; text-align: left;">Nama</th>
            <th style="padding: 8px; border: 1px solid #dddddd; text-align: left;">Jam Mulai</th>
            <th style="padding: 8px; border: 1px solid #dddddd; text-align: left;">Jam Selesai</th>
            <th style="padding: 8px; border: 1px solid #dddddd; text-align: left;">Km Mulai</th>
            <th style="padding: 8px; border: 1px solid #dddddd; text-align: left;">Km Selesai</th>
            <th style="padding: 8px; border: 1px solid #dddddd; text-align: left;">Lama Tempuh</th>
            <th style="padding: 8px; border: 1px solid #dddddd; text-align: left;">Kilometer Tempuh</th>
            <th style="padding: 8px; border: 1px solid #dddddd; text-align: left;">Tujuan Penggunaan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($penggunaanUnit as $penggunaan_unit)
        <tr>
            <td style="padding: 8px; border: 1px solid #dddddd; text-align: left;">
                {{ $loop->iteration }}
            </td>
            <td style="padding: 8px; border: 1px solid #dddddd; text-align: left;">
                {{ $penggunaan_unit->tanggal_pembuatan }}
            </td>
            <td style="padding: 8px; border: 1px solid #dddddd; text-align: left;">
                {{ $penggunaan_unit->unitDropdown }}
            </td>
            <td style="padding: 8px; border: 1px solid #dddddd; text-align: left;">
                {{ $penggunaan_unit->driverDropdown }}
            </td>
            <td style="padding: 8px; border: 1px solid #dddddd; text-align: left;">
                {{ $penggunaan_unit->jam_first }}
            </td>
            <td style="padding: 8px; border: 1px solid #dddddd; background-color: #f2f2f2; text-align: left;">
                {{ $penggunaan_unit->jam_last }}
            </td>
            <td style="padding: 8px; border: 1px solid #dddddd; text-align: left;">
                {{ $penggunaan_unit->km_first }}
            </td>
            <td style="padding: 8px; border: 1px solid #dddddd; text-align: left;">
                {{ $penggunaan_unit->km_last }}
            </td>
            <td style="padding: 8px; border: 1px solid #dddddd; text-align: left;">
                {{ Carbon\Carbon::parse($penggunaan_unit->jam_first)->diffInHours(Carbon\Carbon::parse($penggunaan_unit->jam_last)) }} jam {{ Carbon\Carbon::parse($penggunaan_unit->jam_first)->diffInMinutes(Carbon\Carbon::parse($penggunaan_unit->jam_last)) % 60 }} menit
            </td>
            <td style="padding: 8px; border: 1px solid #dddddd; text-align: left;">
                {{ $penggunaan_unit->km_last - $penggunaan_unit->km_first }} km
            </td>
            <td style="padding: 8px; border: 1px solid #dddddd; text-align: left;">
                {{ $penggunaan_unit->tujuan_penggunaan }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
