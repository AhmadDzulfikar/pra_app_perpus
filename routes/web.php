<?php

use App\Http\Controllers\Admin\AdministratorController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DatabukuController;
use App\Http\Controllers\Admin\IdentitasController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PeminjamanController as AdminPeminjamanController;
use App\Http\Controllers\Admin\PenerbitController;
use App\Http\Controllers\Admin\Pesan;
use App\Http\Controllers\Admin\PesanController as AdminPesanController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\PeminjamanController;
use App\Http\Controllers\User\PengembalianController;
use App\Http\Controllers\User\PesanController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\UserRegister;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

//tidak bisa kembali ke login dengan cara hapus url
Route::get('/home', function () {
    if (Auth::user()->role == 'admin') {

        return redirect()->route('admin.dashboard');
    }
    if (Auth::user()->role == 'user') {

        return redirect()->route('user.dashboard');
    }
})->middleware('auth');

Route::post('/register', [UserRegister::class, 'userRegister'])->name('user.register');

//Admin
Route::middleware(['auth', 'role:admin'])->prefix('/admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    //- - - - - - - - - MasterData - - - - - - - - - -
    //                [ Anggota ]  
    Route::get('/anggota', [AnggotaController::class, 'indexAnggota'])->name('admin.anggota');
    Route::post('/tambah-anggota', [AnggotaController::class, 'storeAnggota'])->name('admin.tambah_anggota');
    Route::put('/edit/anggota/{id}', [AnggotaController::class, 'updateAnggota'])->name('admin.update.anggota');
    Route::delete('/hapus/anggota/{id}', [AnggotaController::class, 'deleteAnggota']);
    Route::put('/update_status/{id}', [AnggotaController::class, 'update_status'])->name('admin.update_status');

    //                [ Penerbit ]  
    Route::get('/penerbit', [PenerbitController::class, 'indexPenerbit'])->name('admin.penerbit');
    Route::post('/tambah-penerbit', [PenerbitController::class, 'storePenerbit'])->name('admin.tambah_penerbit');
    Route::put('/edit/penerbit/{id}', [PenerbitController::class, 'updatePenerbit'])->name('admin.update_penerbit');
    Route::post('/update_status/{id}', [PenerbitController::class, 'updateStatus'])->name('admin.update_status_penerbit');
    Route::delete('/hapus/penerbit/{id}', [PenerbitController::class, 'deletePenerbit']);

    //                [ Administrator ]  
    Route::get('/administrator', [AdministratorController::class, 'indexAdministrator'])->name('admin.administrator');
    Route::post('/tambah-admin', [AdministratorController::class, 'storeAdministrator'])->name('admin.tambah_admin');
    Route::put('/edit/admin/{id}', [AdministratorController::class, 'updateAdmin'])->name('admin.update_admin');
    Route::delete('/hapus/admin/{id}', [AdministratorController::class, 'deleteAdmin']);

    //                [ Data Peminjaman ] 
    Route::get('/data-peminjaman', [AdminPeminjamanController::class, 'indexPeminjaman'])->name('admin.peminjaman');

    //- - - - - - - - - Katalog Buku - - - - - - - - - -
    //                [ Data Buku ] 
    Route::get('/buku', [DatabukuController::class, 'indexBuku'])->name('admin.buku');
    Route::post('/tambah-buku', [DatabukuController::class, 'storeBuku'])->name('admin.tambah_buku');
    Route::put('/edit/buku/{id}', [DatabukuController::class, 'updateBuku'])->name('admin.update.buku');
    Route::delete('/hapus/buku/{id}', [DatabukuController::class, 'deleteBuku']);
    //                [ Kategori ] 
    Route::get('/kategori', [KategoriController::class, 'indexKategori'])->name('admin.kategori');
    Route::post('/tambah-kategori', [KategoriController::class, 'storeKategori'])->name('admin.tambah_kategori');
    Route::put('/edit/kategori/{id}', [KategoriController::class, 'updateKategori'])->name('admin.update_kategori');
    Route::delete('/hapus/kategori/{id}', [KategoriController::class, 'deleteKategori']);

    //- - - - - - - - - Cetak Laporan- - - - - - - - - -
    //                [ Laporan PDF]
    Route::get('/index', [LaporanController::class, 'index'])->name('admin.index');
    Route::post('/laporan-pdf', [LaporanController::class, 'laporan_pdf'])->name('admin.lap_pdf');

    Route::post('/peminjaman', [LaporanController::class, 'laporan_pdf'])->name('admin.laporan_peminjaman');
    Route::post('/pengembalian', [LaporanController::class, 'laporan_pdf'])->name('admin.laporan_pengembalian');
    Route::post('/laporan_user', [LaporanController::class, 'laporan_pdf'])->name('admin.laporan_user');
    //                [ Laporan Excel]
    Route::post('laporan-excel', [LaporanController::class, 'laporan_excel'])->name('admin.laporan_excel');
    Route::post('/excel-pengembalian', [LaporanController::class, 'excelPengembalian'])->name('admin.excel_pengembalian');
    Route::post('/excel-user', [LaporanController::class, 'excelUser'])->name('admin.excel_user');

    //                [ Identitas Applikasi]
    Route::get('/indexIdentitas', [IdentitasController::class, 'indexIdentitas'])->name('admin.identitas');
    Route::put('/edit/identitas', [IdentitasController::class, 'updateIdentitas'])->name('admin.update_identitas');

    //- - - - - - - - - Pesan - - - - - - - - - -
    Route::get('/pesan-masuk', [AdminPesanController::class, 'pesanMasuk'])->name('admin.pesan_masuk');
    Route::post('/admin-status', [AdminPesanController::class, 'admin_status'])->name('admin.ubah_status');

    Route::get('/pesan-terkirim', [AdminPesanController::class, 'pesanTerkirim'])->name('admin.pesan_terkirim');
    Route::post('/kirim-pesan', [AdminPesanController::class, 'kirimPesan'])->name('admin.kirim_pesan');
});     

//User
Route::middleware(['auth', 'role:user'])->prefix('/user')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');

    //Pesan
    Route::get('/pesan-terkirim', [PesanController::class, 'pesan_terkirim'])->name('user.pesan_terkirim');
    Route::post('/kirim-pesan', [PesanController::class, 'kirim_pesan'])->name('user.kirim_pesan');

    Route::get('/pesan-masuk', [PesanController::class, 'pesan_masuk'])->name('user.pesan_masuk');
    Route::post('/ubah-status', [PesanController::class, 'ubah_status'])->name('user.ubah_status');

    //Peminjaman
    Route::get('riwayat-peminjaman', [PeminjamanController::class, 'riwayatPeminjaman'])->name('user.riwayat_peminjaman');

    Route::get('form-peminjaman', [PeminjamanController::class, 'peminjamanForm'])->name('user.form_peminjaman');
    Route::post('form-dari-dashboard', [PeminjamanController::class, 'formDasboard'])->name('user.form_peminjaman_dashboard');
    Route::post('submit-form', [PeminjamanController::class, 'submitForm'])->name('user.submit_peminjaman');

    //Pengembalian
    Route::get('riwayat-pengembalian', [PengembalianController::class, 'riwayatPengembalian'])->name('user.riwayat_pengembalian');

    Route::get('form-pengembalian', [PengembalianController::class, 'form_pengembalian'])->name('user.form_pengembalian');
    Route::post('submit-pengembalian', [PengembalianController::class, 'submit_pengembalian'])->name('user.submit_pengembalian');

    //PROFILE
    Route::get('profile', [ProfileController::class, 'profile'])->name('user.profile');
    Route::put('gambar', [ProfileController::class, 'gambar'])->name('user.gambar');
});
