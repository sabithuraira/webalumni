<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'user123',
            'email' => 'user123@gmail.com',
            'password' => '12345678',
        ]);

    //     DB::table('beritas')->insert([
    //         [
    //             'dokum' => 'gedung1.jpg',
    //             'judul' => 'Berita Pertama',
    //             'tanggal' => '2024-08-16',
    //             'isi' => 'Konten Pertama',
    //         ],
    //         [
    //             'dokum' => 'gedung1.jpg',
    //             'judul' => 'Berita Kedua',
    //             'tanggal' => '2024-08-12',
    //             'isi' => 'Konten Kedua',
    //         ],
    //         [
    //             'dokum' => 'gedung1.jpg',
    //             'judul' => 'CSS HANDLING',
    //             'tanggal' => '2024-08-19',
    //             'isi' => '<p><strong>Konten Kedelapan</strong></p>',
    //         ],
    //         [
    //             'dokum' => 'gedung1.jpg',
    //             'judul' => 'Berita Ketiga',
    //             'tanggal' => '2024-08-06',
    //             'isi' => 'Konten Ketiga',
    //         ]
    //     ]);

    //     DB::table('alumnis')->insert([
    //         [
    //             'profpic' => 'gedung1.jpg',
    //             'nama' => 'Hafitzy',
    //             'angkatan' => '57',
    //             'jenis_kelamin' => 'Laki-laki',
    //             'tempat_lahir' => 'Palembang',
    //             'tanggal_lahir' => '1996-07-10',
    //             'nama_pasangan' => 'Eudora',
    //         ],
    //         [
    //             'profpic' => 'gedung1.jpg',
    //             'nama' => 'Ade Octarina',
    //             'angkatan' => '61',
    //             'jenis_kelamin' => 'Perempuan',
    //             'tempat_lahir' => 'Palembang',
    //             'tanggal_lahir' => '1999-09-30',
    //             'nama_pasangan' => 'Lancelot',
    //         ],
    //         [
    //             'profpic' => 'gedung1.jpg',
    //             'nama' => 'Galank',
    //             'angkatan' => '60',
    //             'jenis_kelamin' => 'Laki-laki',
    //             'tempat_lahir' => 'Musi Rawas',
    //             'tanggal_lahir' => '1998-02-22',
    //             'nama_pasangan' => 'Wanwan',
    //         ],
    //         [
    //             'profpic' => 'gedung1.jpg',
    //             'nama' => 'Oqta',
    //             'angkatan' => '54',
    //             'jenis_kelamin' => 'Perempuan',
    //             'tempat_lahir' => 'Banyuasin',
    //             'tanggal_lahir' => '1992-07-03',
    //             'nama_pasangan' => 'Balmond',
    //         ],
    //         [
    //             'profpic' => 'gedung1.jpg',
    //             'nama' => 'Hafitzy',
    //             'angkatan' => '57',
    //             'jenis_kelamin' => 'Laki-laki',
    //             'tempat_lahir' => 'Palembang',
    //             'tanggal_lahir' => '1996-07-10',
    //             'nama_pasangan' => 'Eudora',
    //         ],
    //         [
    //             'profpic' => 'gedung1.jpg',
    //             'nama' => 'Ade Octarina',
    //             'angkatan' => '61',
    //             'jenis_kelamin' => 'Perempuan',
    //             'tempat_lahir' => 'Palembang',
    //             'tanggal_lahir' => '1999-09-30',
    //             'nama_pasangan' => 'Lancelot',
    //         ],
    //         [
    //             'profpic' => 'gedung1.jpg',
    //             'nama' => 'Galank',
    //             'angkatan' => '60',
    //             'jenis_kelamin' => 'Laki-laki',
    //             'tempat_lahir' => 'Musi Rawas',
    //             'tanggal_lahir' => '1998-02-22',
    //             'nama_pasangan' => 'Wanwan',
    //         ],
    //         [
    //             'profpic' => 'gedung1.jpg',
    //             'nama' => 'Oqta',
    //             'angkatan' => '54',
    //             'jenis_kelamin' => 'Perempuan',
    //             'tempat_lahir' => 'Banyuasin',
    //             'tanggal_lahir' => '1992-07-03',
    //             'nama_pasangan' => 'Balmond',
    //         ]
    //     ]);

    //     DB::table('keuangans')->insert([
    //         [
    //             'deskripsi' => 'Kas Hafitzy',
    //             'tanggal' => '2024-07-01',
    //             'kategori' => 'Pemasukan',
    //             'jumlah' => '10000',
    //         ],
    //         [
    //             'deskripsi' => 'Kas Oqta',
    //             'tanggal' => '2024-07-01',
    //             'kategori' => 'Pemasukan',
    //             'jumlah' => '10000',
    //         ],
    //         [
    //             'deskripsi' => 'Reuni',
    //             'tanggal' => '2024-07-01',
    //             'kategori' => 'Pengeluaran',
    //             'jumlah' => '1000000',
    //         ],
    //         [
    //             'deskripsi' => 'Kas Galank',
    //             'tanggal' => '2024-07-01',
    //             'kategori' => 'Pemasukan',
    //             'jumlah' => '10000',
    //         ],
    //         [
    //             'deskripsi' => 'Kas Hafitzy',
    //             'tanggal' => '2024-06-01',
    //             'kategori' => 'Pemasukan',
    //             'jumlah' => '10000',
    //         ],
    //         [
    //             'deskripsi' => 'Kas Oqta',
    //             'tanggal' => '2024-06-01',
    //             'kategori' => 'Pemasukan',
    //             'jumlah' => '10000',
    //         ],
    //         [
    //             'deskripsi' => 'Reuni',
    //             'tanggal' => '2024-01-01',
    //             'kategori' => 'Pengeluaran',
    //             'jumlah' => '1000000',
    //         ],
    //         [
    //             'deskripsi' => 'Kas Galank',
    //             'tanggal' => '2024-06-01',
    //             'kategori' => 'Pemasukan',
    //             'jumlah' => '10000',
    //         ],
    //         [
    //             'deskripsi' => 'Saldo Bawaan',
    //             'tanggal' => '2024-01-01',
    //             'kategori' => 'Pemasukan',
    //             'jumlah' => '10000000',
    //         ]
    //     ]);
    }
}
