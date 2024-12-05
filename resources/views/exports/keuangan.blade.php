<table>
    <thead>
        <tr>
            <th>Deskripsi</th>
            <th>Tanggal</th>
            <th>Kategori</th>
            <th>Jumlah</th>
            <th>Penerima</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $keuangan)
            <tr>
                <td>{{ $keuangan->deskripsi }}</td>
                <td>{{ $keuangan->tanggal }}</td>
                <td>{{ $keuangan->kategori }}</td>
                <td>Rp {{ number_format($keuangan->jumlah, 0, ',', '.') }}</td>
                <td>{{ $keuangan->keuanganAlumni->nama ?? '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>