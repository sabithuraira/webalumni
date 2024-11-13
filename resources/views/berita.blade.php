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

<body class="bg-[#F5F7FA]">
    <div class="container mt-4 bg-[#FFFFFF] rounded-[12px] shadow-sm w-[700px]">
        @if ($beritas->isEmpty())
            <div class="py-4 text-center text-black">
                Belum ada data yang tersedia
            </div>
        @else
            @foreach ($beritas as $berita)
                <div class="row py-3 cursor-pointer {{ $loop->last ? '' : 'border-b border-gray-300' }}"
                    data-bs-toggle="modal" data-bs-target="#beritaModal-{{ $loop->index }}">
                    <div class="col-auto">
                        <!-- Image -->
                        <img src="{{ asset('storage/' . $berita->dokum) }}" alt="Image for {{ $berita->judul }}"
                            class="w-[100px] h-[48px]">
                    </div>
                    <div class="col ms-3">
                        <div class="font-semibold text-[#343C6A]">{{ $berita->judul }}</div>
                        <div class="flex items-center text-[#343C6A] text-[12px]">
                            <img src="/img/calendar.svg" alt="Icon" class="mr-1"
                                style="width: 14px; height: 14px;">
                            {{ $berita->tanggal }}
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="beritaModal-{{ $loop->index }}" tabindex="-1"
                    aria-labelledby="beritaModalLabel-{{ $loop->index }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header flex items-center relative">
                                <h5 class="modal-title flex-1 text-center" id="beritaModalLabel-{{ $loop->index }}">
                                    {{ $berita->tanggal }}</h5>
                                <button type="button" class="btn-close absolute right-5" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="font-bold text-center">{{ $berita->judul }}</div>
                                <div class="flex justify-center my-3">
                                    <img src="{{ asset('storage/' . $berita->dokum) }}" alt="Dokumentasi Pribadi"
                                        class="h-[150px] w-[225px]">
                                </div>
                                <div>{!! $berita->isi !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <!-- Pagination -->
    <div class="flex justify-center my-4">
        {{ $beritas->onEachSide(2)->links('vendor.pagination.bootstrap-4') }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
