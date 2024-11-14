@extends('layouts.main')

@section('content')
    <div class="mt-4 w-[1000px] mx-auto">
        <div class="row">
            <!-- Total Card -->
            <div class="col-md-4 justify-center rounded-[12px]">
                <div class="card border-0 shadow-sm text-white bg-[#343C6A]">
                    <div class="card-body text-center">
                        <h5 class="card-title font-bold">Total Kas</h5>
                        <p class="card-text text-2xl border-t-2">{{ number_format($total, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <!-- Pemasukan Card -->
            <div class="col-md-4 justify-center rounded-[12px]">
                <div class="card border-0 shadow-sm text-[#343C6A] bg-white">
                    <div class="card-body text-center">
                        <h5 class="card-title font-bold">Pemasukan</h5>
                        <p class="card-text text-2xl border-t-2">{{ number_format($masuk, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <!-- Pengeluaran Card -->
            <div class="col-md-4 justify-center rounded-[12px]">
                <div class="card border-0 shadow-sm text-[#343C6A] bg-white">
                    <div class="card-body text-center">
                        <h5 class="card-title font-bold">Pengeluaran</h5>
                        <p class="card-text text-2xl border-t-2">{{ number_format($keluar, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-[#F5F7FA] w-[1000px] mx-auto">
        <div class="py-2">
            <div class="flex items-center justify-between">
                <!-- Title -->
                <h2 class="text-lg text-[#343C6A] font-semibold">
                    Tabel Keuangan
                </h2>

                <!-- Search -->
                <form action="{{ route('page.keuangan') }}" method="GET" class="flex items-center">
                    <input type="text" name="search" placeholder="Search..."
                        class="form-control w-[200px] border border-gray-300 rounded-[8px]"
                        value="{{ request()->get('search') }}">
                    <button type="submit" class="h-[34px] ml-2 bg-[#343C6A] text-white px-2 rounded-[8px]">
                        Search
                    </button>
                </form>
            </div>
        </div>

        <div class="bg-[#FFFFFF] px-8 pb-3 pt-2 shadow-sm rounded-[12px]">
            @if ($keuangans->isEmpty())
                <div class="py-4 text-center text-black">
                    Belum ada data yang tersedia
                </div>
            @else
                <!-- Table -->
                <table class="table border-separate border-spacing-0">
                    <thead class="text-center">
                        <tr>
                            <th class="w-1/5">Deskripsi</th>
                            <th class="w-1/5">Tanggal</th>
                            <th class="w-1/5">Kategori</th>
                            <th class="w-1/5">Jumlah</th>
                            <th class="w-1/5">Penerima</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($keuangans as $keuangan)
                            <tr class="cursor-pointer" data-bs-toggle="modal"
                                data-bs-target="#keuanganModal-{{ $loop->index }}">
                                <td>{{ $keuangan->deskripsi }}</td>
                                <td class="text-center">{{ $keuangan->tanggal }}</td>
                                <td class="text-center">{{ $keuangan->kategori }}</td>
                                <td
                                    class="text-center font-semibold {{ $keuangan->kategori == 'Pemasukan' ? 'text-[#28A745]' : 'text-[#E3342F]' }}">
                                    Rp {{ number_format($keuangan->jumlah, 0, ',', '.') }}</td>
                                <td class="text-center">{{ $keuangan->keuanganAlumni->nama ?? '-' }}</td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="keuanganModal-{{ $loop->index }}" tabindex="-1"
                                aria-labelledby="keuanganModalLabel-{{ $loop->index }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header justify-center">
                                            <h5 class="modal-title text-center"
                                                id="keuanganModalLabel-{{ $loop->index }}">
                                                Rincian Keuangan</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Deskripsi: </strong>{{ $keuangan->deskripsi }}</p>
                                            <p><strong>Tanggal: </strong>{{ $keuangan->tanggal }}</p>
                                            <p><strong>Kategori: </strong>
                                                <span
                                                    class="px-1 rounded-1 {{ $keuangan->kategori == 'Pemasukan' ? 'text-[#064E3B] bg-[#D1FAE5]' : 'text-[#B91C1C] bg-[#FEE2E2]' }}">{{ $keuangan->kategori }}
                                                </span>
                                            </p>
                                            <p><strong>Jumlah: </strong>Rp
                                                {{ number_format($keuangan->jumlah, 0, ',', '.') }}
                                            </p>
                                            <p><strong>Penerima: </strong>{{ $keuangan->keuanganAlumni->nama ?? '-' }}
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center my-4">
        {{ $keuangans->appends(['search' => request()->get('search')])->onEachSide(2)->links('vendor.pagination.tailwind') }}
    </div>
@endsection