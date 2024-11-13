<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="icon" href="/img/haisstis.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-[#F5F7FA]">
    @include('user.navbar')

    <div class="mt-4 bg-[#F5F7FA] w-[700px] mx-auto">
        <div class="pb-2">
            <div class="flex items-center justify-between">
                <!-- Title -->
                <h2 class="text-lg text-[#343C6A] font-semibold">
                    Daftar Alumni
                </h2>

                <!-- Search -->
                <form action="{{ route('page.alumni') }}" method="GET" class="flex items-center">
                    <input type="text" name="search" placeholder="Search..."
                        class="form-control w-[200px] border border-gray-300 rounded-[8px]"
                        value="{{ request()->get('search') }}">
                    <button type="submit" class="h-[34px] ml-2 bg-[#343C6A] text-white px-2 rounded-[8px]">
                        Search
                    </button>
                </form>
            </div>
        </div>

        <!-- Table -->
        <div class="bg-[#FFFFFF] px-8 pb-3 pt-2 shadow-sm rounded-[12px]">
            @if ($alumnis->isEmpty())
                <div class="py-4 text-center text-black">
                    Belum ada data yang tersedia
                </div>
            @else
                <table class="table border-separate border-spacing-0">
                    <thead class="text-center">
                        <tr>
                            <th class="w-3/12">Nama</th>
                            <th class="w-1/12">Angkatan</th>
                            <th class="w-2/12">Jenis Kelamin</th>
                            <th class="w-1/12">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alumnis as $alumni)
                            <tr class="cursor-pointer"
                                onclick="window.location='{{ route('show.alumni', ['id' => $alumni->id]) }}'">
                                <td>{{ $alumni->nama }}</td>
                                <td class="text-center">{{ $alumni->angkatan }}</td>
                                <td class="text-center">{{ $alumni->jenis_kelamin }}</td>
                                <td class="text-center"><p class="mx-3 rounded-1 {{ $alumni->status == 'Aktif' ? 'text-[#064E3B] bg-[#D1FAE5]' : 'text-gray-600 bg-gray-100' }}">{{ $alumni->status }}</p></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <!-- Pagination-->
    <div class="flex justify-center my-4">
        {{ $alumnis->appends(['search' => request()->get('search')])->onEachSide(2)->links('vendor.pagination.tailwind') }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
