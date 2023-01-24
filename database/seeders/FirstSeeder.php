<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Buku;
use App\Models\Identitas;
use App\Models\Pemberitahuan;
use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Pesan;


class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //USER
        User::Create([
            'kode' => 'Admin1',
            // 'nis'    => '203910',
            'fullname'    => 'Zikri Ramdhan',
            'username' => 'Zikri',
            'password'    => Hash::make("password"),
            // 'kelas'    => 'XII-RPL',
            // 'alamat' => 'JL.BUNGA SARI',
            // 'verif'    => '',
            'role' => 'admin',
            'join_date'    => '2023-01-06',
            // 'terakhir_login' => '2023-01-06',
            'foto' => '',
        ]);

        User::Create([
            'kode' => 'AA001',
            'nis'    => '0056378',
            'fullname'    => 'Zuanu Silamndra',
            'username' => 'Zuan',
            'password'    => Hash::make("password"),
            'kelas'    => 'XII - RPL',
            'alamat' => 'JL. Manunggal IX No. 98',
            // 'verif'    => '',
            'role' => 'user',
            'join_date'    => '2023-01-06',
            // 'terakhir_login' => '',
            'foto' => '',
        ]);

        User::Create([
            'kode' => 'AA002',
            'nis'    => '0054238',
            'fullname'    => 'Keanu Cifsar',
            'username' => 'Kean',
            'password'    => Hash::make("password"),
            'kelas'    => 'XII - AKL 1',
            'alamat' => 'Jl. Kewangi Munggang',
            // 'verif'    => '',
            'role' => 'user',
            'join_date'    => '2023-01-06',
            // 'terakhir_login' => '',
            'foto' => '',
        ]);

        User::Create([
            'kode' => 'Admin2',
            // 'nis'    => '203910',
            'fullname'    => 'Zed_AdminPerpus',
            'username' => 'Zed',
            'password'    => Hash::make("password"),
            // 'kelas'    => 'XII-RPL',
            // 'alamat' => 'JL.BUNGA SARI',
            // 'verif'    => '',
            'role' => 'admin',
            'join_date'    => '2023-01-06',
            // 'terakhir_login' => '2023-01-06',
            'foto' => '',
        ]);

        //KATEGORI
        Kategori::create([
            'kode' => 'Fantasi',
            'nama' => 'Fantasi',
        ]);

        Kategori::create([
            'kode' => 'Life',
            'nama' => 'Life',
        ]);

        Kategori::create([
            'kode' => 'Money Management',
            'nama' => 'Money Management',
        ]);

        //PENERBIT
        Penerbit::create([
            'kode' => 'erlangga',
            'nama'    => 'Erlangga',
            // 'verif' => 'intermedia',
        ]);

        Penerbit::create([
            'kode' => 'bse',
            'nama'    => 'BSE',
            // 'verif' => '',
        ]);

        Penerbit::create([
            'kode' => 'intermedia',
            'nama'    => 'Intermedia',
            // 'verif' => '',
        ]);

        //BUKU
        Buku::create([
            'judul' => 'Cara Membuat Puding',
            'kategori_id' => '1',
            'penerbit_id' => '1',
            'pengarang' => 'Johannes',
            'tahun_terbit' => '2017',
            // 'isbn' => '',
            'j_buku_baik' => '12',
            'j_buku_rusak' => '4',
            'foto' => '',
        ]);

        Buku::create([
            'judul' => 'Jago ngoding dalam 5 menit',
            'kategori_id' => '1',
            'penerbit_id' => '1',
            'pengarang' => 'Nur ali',
            'tahun_terbit' => '2017',
            // 'isbn' => '',
            'j_buku_baik' => '12',
            'j_buku_rusak' => '4',
            'foto' => '',
        ]);

        Buku::create([
            'judul' => 'Ensiklopedia anak',
            'kategori_id' => '2',
            'penerbit_id' => '2',
            'pengarang' => 'Robert',
            'tahun_terbit' => '2018',
            // 'isbn' => '',
            'j_buku_baik' => '12',
            'j_buku_rusak' => '6',
            'foto' => '',
        ]);

        Buku::create([
            'judul' => 'Sejarah Dinosaurus',
            'kategori_id' => '3',
            'penerbit_id' => '3',
            'pengarang' => 'Zidni',
            'tahun_terbit' => '2019',
            // 'isbn' => '',
            'j_buku_baik' => '12',
            'j_buku_rusak' => '2',
            'foto' => '',
        ]);

        //PEMINJAMAN
        Peminjaman::create([
            'user_id' => '2',
            'buku_id' => '1',
            'tgl_peminjaman' => '2023-01-06',
            // 'tgl_pengembalian' => '',
            'kondisi_buku_saat_dipinjam' => 'baik',
            // 'kondisi_buku_saat_dikembalikan' => '',
            // 'denda' => '',
        ]);

        Peminjaman::create([
            'user_id' => '3',
            'buku_id' => '2',
            'tgl_peminjaman' => '2021-03-09',
            // 'tgl_pengembalian' => '',
            'kondisi_buku_saat_dipinjam' => 'rusak',
            // 'kondisi_buku_saat_dikembalikan' => '',
            'denda' => '1000',
        ]);

        Peminjaman::create([
            'user_id' => '1',
            'buku_id' => '3',
            'tgl_peminjaman' => '2023-01-09',
            // 'tgl_pengembalian' => '',
            'kondisi_buku_saat_dipinjam' => 'baik',
            // 'kondisi_buku_saat_dikembalikan' => '',
            // 'denda' => '0',
        ]);

        //PESAN
        Pesan::create([
            'penerima_id' => '1',
            'pengirim_id' => '2',
            'judul' => 'Buku Dipinjam',
            'isi' => 'Buku sedang dipinjam, harap dikembalikan tanggal 30',
            'status' => 'terkirim',
            'tgl_kirim' => '2023-01-21',
        ]);

        Pesan::create([
            'penerima_id' => '1',
            'pengirim_id' => '2',
            'judul' => 'Buku telah dipinjam',
            'isi' => 'Terimakasih telah meminjam buku diperpus',
            'status' => 'terkirim',
            'tgl_kirim' => '2023-01-21',
        ]);

        Pesan::create([
            'penerima_id' => '2',
            'pengirim_id' => '1',
            'judul' => 'Anda merusakan buku',
            'isi' => 'Anda kena denda 10000',
            'status' => 'dibaca',
            'tgl_kirim' => '2023-01-16',
        ]);

        Pesan::create([
            'penerima_id' => '2',
            'pengirim_id' => '4',
            'judul' => 'Congratullations!!!',
            'isi' => 'You already read 15 book in a month, go to library to take your rewards!',
            'status' => 'dibaca',
            'tgl_kirim' => '2023-01-16',
        ]);

        //PEMBERITAHUAN
        Pemberitahuan::create([
            'isi'    => 'Maaf server sedang maintance',
            // 'level_user'	=> '',
            'status' => 'aktif',
        ]);

        Pemberitahuan::create([
            'isi'    => 'Maaf perpus tutup sampai tanggal 20',
            // 'level_user'	=> '',
            'status' => 'nonaktif',
        ]);

        Pemberitahuan::create([
            'isi'    => 'Pengambilan buku paket sampai tanggal 30',
            // 'level_user'	=> '',
            'status' => 'aktif',
        ]);

        //IDENTITAS
        identitas::create([
            'nama_app'    => 'PERPUS SMKN 10 JAKARTA',
            'alamat_app' => 'JL. SMEAN 6, Cawang, Kramat Jati',
            'email_app'    => 'Diana12@gmail.com',
            'nomor_hp'    => '82918298493d',
            'foto' => '',
        ]);
    }
}
