<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="icon" href="/img/haisstis.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container bg-[#FFFFFF] shadow-sm my-4 rounded-[12px] py-4 px-8 mx-auto w-[1000px]">
        <!-- Title -->
        <div class="text-[#343C6A] font-semibold border-b-2 border-[#343C6A] w-fit">
            Riwayat Pendidikan
        </div>
        <!-- Table -->
        @if ($pendidikans->isEmpty())
            <div class="py-4 text-center text-black">
                Belum ada data yang tersedia
            </div>
        @else
            <table class="bg-[#F5F7FA] mt-4 table border-separate border-spacing-0">
                <thead class="text-center">
                    <tr>
                        <th class="w-1/5">Periode</th>
                        <th class="w-2/5">Jenjang Pendidikan</th>
                        <th class="w-2/5">Nama Sekolah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendidikans as $pendidikan)
                        <tr class="text-center">
                            <td>{{ $pendidikan->mulai_tahun }} - {{ $pendidikan->selesai_tahun }}</td>
                            <td>{{ $pendidikan->jenjang }}</td>
                            <td>{{ $pendidikan->sekolah }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
