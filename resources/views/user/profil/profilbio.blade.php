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
    <div class="container bg-[#FFFFFF] shadow-sm mt-4 rounded-[12px] py-4 mx-auto w-[1000px]">
        <!-- Title -->
        <div class="text-[#343C6A] font-semibold border-b-2 border-[#343C6A] w-fit">
            Profil Anda
        </div>

        <div class="row d-flex">
            <!-- Profpic -->
            <div class="col-md-3 position-relative d-flex justify-content-center align-items-center">
                <img src="{{ asset('storage/' . $alumni->profpic) }}" alt="Profpic" class="h-[100px] w-[100px]">
            </div>

            <!-- Bio -->
            <div class="col-md-9 d-flex pt-4">
                <div class="row w-100">
                    <!-- Bio Kiri -->
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="block font-semibold mb-1">Nama</label>
                            <div class="bg-gray-100 border border-gray-300 rounded px-2 py-1">{{ $alumni->nama }}</div>
                        </div>
                        <div class="mb-2">
                            <label class="block font-semibold mb-1">Angkatan</label>
                            <div class="bg-gray-100 border border-gray-300 rounded px-2 py-1">{{ $alumni->angkatan }}
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="block font-semibold mb-1">Jenis Kelamin</label>
                            <div class="bg-gray-100 border border-gray-300 rounded px-2 py-1">
                                {{ $alumni->jenis_kelamin }}</div>
                        </div>
                    </div>

                    <!-- Bio Kanan -->
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="block font-semibold mb-1">Tempat Lahir</label>
                            <div class="bg-gray-100 border border-gray-300 rounded px-2 py-1">
                                {{ $alumni->tempat_lahir }}</div>
                        </div>
                        <div class="mb-2">
                            <label class="block font-semibold mb-1">Tanggal Lahir</label>
                            <div class="bg-gray-100 border border-gray-300 rounded px-2 py-1">
                                {{ $alumni->tanggal_lahir }}</div>
                        </div>
                        <div class="mb-2">
                            <label class="block font-semibold mb-1">Nama Pasangan</label>
                            <div class="bg-gray-100 border border-gray-300 rounded px-2 py-1">
                                {{ $alumni->nama_pasangan }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
