<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardWargaController;
use App\Http\Controllers\DashboardBendesaController;
use App\Http\Controllers\DashboardKelihanController;
use App\Http\Controllers\Warga\KematianWargaController;
use App\Http\Controllers\DashboardSekretariatController;
use App\Http\Controllers\Bendesa\KematianBendesaController;
use App\Http\Controllers\Kelihan\KematianKelihanController;
use App\Http\Controllers\Bendesa\PernikahanBendesaController;
use App\Http\Controllers\Kelihan\PernikahanKelihanController;
use App\Http\Controllers\Sekretariat\KematianSekretariatController;
use App\Http\Controllers\Bendesa\SuratMasukProposalBendesaController;
use App\Http\Controllers\Bendesa\SuratMasukUndanganBendesaController;
use App\Http\Controllers\Sekretariat\PernikahanSekretariatController;
use App\Http\Controllers\Bendesa\SuratKeluarProposalBendesaController;
use App\Http\Controllers\Bendesa\SuratKeluarUndanganBendesaController;
use App\Http\Controllers\Bendesa\SuratMasukKeputusanBendesaController;
use App\Http\Controllers\Kelihan\SuratKeluarUndanganKelihanController;
use App\Http\Controllers\Bendesa\SuratKeluarKeputusanBendesaController;
use App\Http\Controllers\Kelihan\SuratKeluarKeputusanKelihanController;
use App\Http\Controllers\Sekretariat\SuratMasukProposalSekretariatController;
use App\Http\Controllers\Sekretariat\SuratMasukUndanganSekretariatController;
use App\Http\Controllers\Sekretariat\SuratKeluarProposalSekretariatController;
use App\Http\Controllers\Sekretariat\SuratKeluarUndanganSekretariatController;
use App\Http\Controllers\Sekretariat\SuratMasukKeputusanSekretariatController;

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
    return view('dashboard1');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout');
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['CekUserLogin:1']], function () {
        // Dashboard
        Route::get('/dashboard_bendesa', [DashboardBendesaController::class, 'index']);
        //Route Data Kematians
        Route::get('/index_data_kematian_bendesa', [KematianBendesaController::class, 'index']);
        Route::get('/create_data_kematian_bendesa', [KematianBendesaController::class, 'create']);
        Route::post('/store_data_kematian_bendesa', [KematianBendesaController::class, 'store']);
        Route::get('/show_data_kematian_bendesa/{id}', [KematianBendesaController::class, 'show']);
        Route::get('/edit_data_kematian_bendesa/{id}', [KematianBendesaController::class, 'edit']);
        Route::post('/update_data_kematian_bendesa/{id}', [KematianBendesaController::class, 'update']);
        Route::get('/delete_data_kematian_bendesa/{id}', [KematianBendesaController::class, 'delete']);

        //expport pdf
        Route::get('export_pdf_kematian', [KematianBendesaController::class, 'export_pdf_kematian'])->name('export_pdf_kematian');

        Route::get('/index_data_pernikahan_bendesa', [PernikahanBendesaController::class, 'index']);
        Route::get('/create_data_pernikahan_bendesa', [PernikahanBendesaController::class, 'create']);
        Route::post('/store_data_pernikahan_bendesa', [PernikahanBendesaController::class, 'store']);
        Route::get('/show_data_pernikahan_bendesa/{id}', [PernikahanBendesaController::class, 'show']);
        Route::get('/edit_data_pernikahan_bendesa/{id}', [PernikahanBendesaController::class, 'edit']);
        Route::post('/update_data_pernikahan_bendesa/{id}', [PernikahanBendesaController::class, 'update']);
        Route::get('/delete_data_pernikahan_bendesa/{id}', [PernikahanBendesaController::class, 'delete']);

        //Route Data Surat Keluar Undangan
        Route::get('/index_sk_undangan_bendesa', [SuratKeluarUndanganBendesaController::class, 'index']);
        Route::get('/create_sk_undangan_bendesa', [SuratKeluarUndanganBendesaController::class, 'create']);
        Route::post('/store_sk_undangan_bendesa', [SuratKeluarUndanganBendesaController::class, 'store']);
        Route::get('/edit_sk_undangan_bendesa/{id}', [SuratKeluarUndanganBendesaController::class, 'edit']);
        Route::post('/update_sk_undangan_bendesa/{id}', [SuratKeluarUndanganBendesaController::class, 'update']);
        Route::get('/delete_sk_undangan_bendesa/{id}', [SuratKeluarUndanganBendesaController::class, 'delete']);

        //Route Data Surat Keluar Keputusan
        Route::get('/index_sk_keputusan_bendesa', [SuratKeluarKeputusanBendesaController::class, 'index']);
        Route::get('/create_sk_keputusan_bendesa', [SuratKeluarKeputusanBendesaController::class, 'create']);
        Route::post('/store_sk_keputusan_bendesa', [SuratKeluarKeputusanBendesaController::class, 'store']);
        Route::get('/edit_sk_keputusan_bendesa/{id}', [SuratKeluarKeputusanBendesaController::class, 'edit']);
        Route::post('/update_sk_keputusan_bendesa/{id}', [SuratKeluarKeputusanBendesaController::class, 'update']);
        Route::get('/delete_sk_keputusan_bendesa/{id}', [SuratKeluarKeputusanBendesaController::class, 'delete']);

        //Route Data Surat Keluar Proposal
        Route::get('/index_sk_proposal_bendesa', [SuratKeluarProposalBendesaController::class, 'index']);
        Route::get('/create_sk_proposal_bendesa', [SuratKeluarProposalBendesaController::class, 'create']);
        Route::post('/store_sk_proposal_bendesa', [SuratKeluarProposalBendesaController::class, 'store']);
        Route::get('/edit_sk_proposal_bendesa/{id}', [SuratKeluarProposalBendesaController::class, 'edit']);
        Route::post('/update_sk_proposal_bendesa/{id}', [SuratKeluarProposalBendesaController::class, 'update']);
        Route::get('/delete_sk_proposal_bendesa/{id}', [SuratKeluarProposalBendesaController::class, 'delete']);

        //Route Data Surat Masuk Keputusan
        Route::get('/index_sm_keputusan_bendesa', [SuratMasukKeputusanBendesaController::class, 'index']);
        Route::get('/create_sm_keputusan_bendesa', [SuratMasukKeputusanBendesaController::class, 'create']);
        Route::post('/store_sm_keputusan_bendesa', [SuratMasukKeputusanBendesaController::class, 'store']);
        Route::get('/edit_sm_keputusan_bendesa/{id}', [SuratMasukKeputusanBendesaController::class, 'edit']);
        Route::post('/update_sm_keputusan_bendesa/{id}', [SuratMasukKeputusanBendesaController::class, 'update']);
        Route::get('/delete_sm_keputusan_bendesa/{id}', [SuratMasukKeputusanBendesaController::class, 'delete']);

        //Route Data Surat Masuk Proposal
        Route::get('/index_sm_proposal_bendesa', [SuratMasukProposalBendesaController::class, 'index']);
        Route::get('/create_sm_proposal_bendesa', [SuratMasukProposalBendesaController::class, 'create']);
        Route::post('/store_sm_proposal_bendesa', [SuratMasukProposalBendesaController::class, 'store']);
        Route::get('/edit_sm_proposal_bendesa/{id}', [SuratMasukProposalBendesaController::class, 'edit']);
        Route::post('/update_sm_proposal_bendesa/{id}', [SuratMasukProposalBendesaController::class, 'update']);
        Route::get('/delete_sm_proposal_bendesa/{id}', [SuratMasukProposalBendesaController::class, 'delete']);

        //Route Data Surat Masuk Undangan
        Route::get('/index_sm_undangan_bendesa', [SuratMasukUndanganBendesaController::class, 'index']);
        Route::get('/create_sm_undangan_bendesa', [SuratMasukUndanganBendesaController::class, 'create']);
        Route::post('/store_sm_undangan_bendesa', [SuratMasukUndanganBendesaController::class, 'store']);
        Route::get('/edit_sm_undangan_bendesa/{id}', [SuratMasukUndanganBendesaController::class, 'edit']);
        Route::post('/update_sm_undangan_bendesa/{id}', [SuratMasukUndanganBendesaController::class, 'update']);
        Route::get('/delete_sm_undangan_bendesa/{id}', [SuratMasukUndanganBendesaController::class, 'delete']);
    });

    Route::group(['middleware' => ['CekUserLogin:2']], function () {
        // Dashboard
        Route::get('/dashboard_sekretariat', [DashboardSekretariatController::class, 'index']);
        //Route Data Kematians
        Route::get('/index_data_kematian_sekretariat', [KematianSekretariatController::class, 'index']);
        Route::get('/create_data_kematian_sekretariat', [KematianSekretariatController::class, 'create']);
        Route::post('/store_data_kematian_sekretariat', [KematianSekretariatController::class, 'store']);
        Route::get('/show_data_kematian_sekretariat/{id}', [KematianSekretariatController::class, 'show']);
        Route::get('/edit_data_kematian_sekretariat/{id}', [KematianSekretariatController::class, 'edit']);
        Route::post('/update_data_kematian_sekretariat/{id}', [KematianSekretariatController::class, 'update']);
        Route::get('/delete_data_kematian_sekretariat/{id}', [KematianSekretariatController::class, 'delete']);

        // //expport pdf
        // Route::get('export_pdf_kematian', [KematianController::class, 'export_pdf_kematian'])->name('export_pdf_kematian');

        Route::get('/index_data_pernikahan_sekretariat', [PernikahanSekretariatController::class, 'index']);
        Route::get('/create_data_pernikahan_sekretariat', [PernikahanSekretariatController::class, 'create']);
        Route::post('/store_data_pernikahan_sekretariat', [PernikahanSekretariatController::class, 'store']);
        Route::get('/show_data_pernikahan_sekretariat/{id}', [PernikahanSekretariatController::class, 'show']);
        Route::get('/edit_data_pernikahan_sekretariat/{id}', [PernikahanSekretariatController::class, 'edit']);
        Route::post('/update_data_pernikahan_sekretariat/{id}', [PernikahanSekretariatController::class, 'update']);
        Route::get('/delete_data_pernikahan_sekretariat/{id}', [PernikahanSekretariatController::class, 'delete']);

        //Route Data Surat Keluar Undangan
        Route::get('/index_sk_undangan_sekretariat', [SuratKeluarUndanganSekretariatController::class, 'index']);
        Route::get('/create_sk_undangan_sekretariat', [SuratKeluarUndanganSekretariatController::class, 'create']);
        Route::post('/store_sk_undangan_sekretariat', [SuratKeluarUndanganSekretariatController::class, 'store']);
        Route::get('/edit_sk_undangan_sekretariat/{id}', [SuratKeluarUndanganSekretariatController::class, 'edit']);
        Route::post('/update_sk_undangan_sekretariat/{id}', [SuratKeluarUndanganSekretariatController::class, 'update']);
        Route::get('/delete_sk_undangan_sekretariat/{id}', [SuratKeluarUndanganSekretariatController::class, 'delete']);

        //Route Data Surat Keluar Keputusan
        Route::get('/index_sk_keputusan_sekretariat', [SuratKeluarKeputusanSekretariatController::class, 'index']);
        Route::get('/create_sk_keputusan_sekretariat', [SuratKeluarKeputusanSekretariatController::class, 'create']);
        Route::post('/store_sk_keputusan_sekretariat', [SuratKeluarKeputusanSekretariatController::class, 'store']);
        Route::get('/edit_sk_keputusan_sekretariat/{id}', [SuratKeluarKeputusanSekretariatController::class, 'edit']);
        Route::post('/update_sk_keputusan_sekretariat/{id}', [SuratKeluarKeputusanSekretariatController::class, 'update']);
        Route::get('/delete_sk_keputusan_sekretariat/{id}', [SuratKeluarKeputusanSekretariatController::class, 'delete']);

        //Route Data Surat Keluar Proposal
        Route::get('/index_sk_proposal_sekretariat', [SuratKeluarProposalSekretariatController::class, 'index']);
        Route::get('/create_sk_proposal_sekretariat', [SuratKeluarProposalSekretariatController::class, 'create']);
        Route::post('/store_sk_proposal_sekretariat', [SuratKeluarProposalSekretariatController::class, 'store']);
        Route::get('/edit_sk_proposal_sekretariat/{id}', [SuratKeluarProposalSekretariatController::class, 'edit']);
        Route::post('/update_sk_proposal_sekretariat/{id}', [SuratKeluarProposalSekretariatController::class, 'update']);
        Route::get('/delete_sk_proposal_sekretariat/{id}', [SuratKeluarProposalSekretariatController::class, 'delete']);

        //Route Data Surat Masuk Keputusan
        Route::get('/index_sm_keputusan_sekretariat', [SuratMasukKeputusanSekretariatController::class, 'index']);
        Route::get('/create_sm_keputusan_sekretariat', [SuratMasukKeputusanSekretariatController::class, 'create']);
        Route::post('/store_sm_keputusan_sekretariat', [SuratMasukKeputusanSekretariatController::class, 'store']);
        Route::get('/edit_sm_keputusan_sekretariat/{id}', [SuratMasukKeputusanSekretariatController::class, 'edit']);
        Route::post('/update_sm_keputusan_sekretariat/{id}', [SuratMasukKeputusanSekretariatController::class, 'update']);
        Route::get('/delete_sm_keputusan_sekretariat/{id}', [SuratMasukKeputusanSekretariatController::class, 'delete']);

        //Route Data Surat Masuk Proposal
        Route::get('/index_sm_proposal_sekretariat', [SuratMasukProposalSekretariatController::class, 'index']);
        Route::get('/create_sm_proposal_sekretariat', [SuratMasukProposalSekretariatController::class, 'create']);
        Route::post('/store_sm_proposal_sekretariat', [SuratMasukProposalSekretariatController::class, 'store']);
        Route::get('/edit_sm_proposal_sekretariat/{id}', [SuratMasukProposalSekretariatController::class, 'edit']);
        Route::post('/update_sm_proposal_sekretariat/{id}', [SuratMasukProposalSekretariatController::class, 'update']);
        Route::get('/delete_sm_proposal_sekretariat/{id}', [SuratMasukProposalSekretariatController::class, 'delete']);

        //Route Data Surat Masuk Undangan
        Route::get('/index_sm_undangan_sekretariat', [SuratMasukUndanganSekretariatController::class, 'index']);
        Route::get('/create_sm_undangan_sekretariat', [SuratMasukUndanganSekretariatController::class, 'create']);
        Route::post('/store_sm_undangan_sekretariat', [SuratMasukUndanganSekretariatController::class, 'store']);
        Route::get('/edit_sm_undangan_sekretariat/{id}', [SuratMasukUndanganSekretariatController::class, 'edit']);
        Route::post('/update_sm_undangan_sekretariat/{id}', [SuratMasukUndanganSekretariatController::class, 'update']);
        Route::get('/delete_sm_undangan_sekretariat/{id}', [SuratMasukUndanganSekretariatController::class, 'delete']);
    });

    Route::group(['middleware' => ['CekUserLogin:3']], function () {
        // Dashboard
        Route::get('/dashboard_kelihan', [DashboardKelihanController::class, 'index']);
        //Route Data Kematians
        Route::get('/index_data_kematian_kelihan', [KematianKelihanController::class, 'index']);
        Route::get('/create_data_kematian_kelihan', [KematianKelihanController::class, 'create']);
        Route::post('/store_data_kematian_kelihan', [KematianKelihanController::class, 'store']);
        Route::get('/show_data_kematian_kelihan/{id}', [KematianKelihanController::class, 'show']);
        Route::get('/edit_data_kematian_kelihan/{id}', [KematianKelihanController::class, 'edit']);
        Route::post('/update_data_kematian_kelihan/{id}', [KematianKelihanController::class, 'update']);
        Route::get('/delete_data_kematian_kelihan/{id}', [KematianKelihanController::class, 'delete']);

        // //expport pdf
        // Route::get('export_pdf_kematian', [KematianKelihanController::class, 'export_pdf_kematian'])->name('export_pdf_kematian');

        Route::get('/index_data_pernikahan_kelihan', [PernikahanKelihanController::class, 'index']);
        Route::get('/show_data_pernikahan_kelihan/{id}', [PernikahanKelihanController::class, 'show']);
        Route::get('/delete_data_pernikahan_kelihan/{id}', [PernikahanKelihanController::class, 'delete']);

        //Route Data Surat Keluar Undangan
        Route::get('/index_sk_undangan_kelihan', [SuratKeluarUndanganKelihanController::class, 'index']);
        Route::get('/show_sk_undangan_kelihan/{id}', [SuratKeluarUndanganKelihanController::class, 'show']);

        //Route Data Surat Keluar Keputusan
        Route::get('/index_sk_keputusan_kelihan', [SuratKeluarKeputusanKelihanController::class, 'index']);
        Route::get('/show_sk_keputusan_kelihan/{id}', [SuratKeluarKeputusanKelihanController::class, 'show']);
    });

    // Route::group(['middleware' => ['CekUserLogin:4']], function () {
    //     // Dashboard
    //     Route::get('/dashboard_warga', [DashboardWargaController::class, 'index']);
    //     //Route Data Kematians
    //     Route::get('/index_data_kematian_warga', [KematianWargaController::class, 'index']);
    //     Route::get('/show_data_kematian/{id}', [KematianWargaController::class, 'show']);

    //     // //expport pdf
    //     // Route::get('export_pdf_kematian', [KematianWargaController::class, 'export_pdf_kematian'])->name('export_pdf_kematian');

    //     Route::get('/index_data_pernikahan', [PernikahanController::class, 'index']);
    //     Route::get('/create_data_pernikahan', [PernikahanController::class, 'create']);
    //     Route::post('/store_data_pernikahan', [PernikahanController::class, 'store']);
    //     Route::get('/show_data_pernikahan/{id}', [PernikahanController::class, 'show']);
    //     Route::get('/edit_data_pernikahan/{id}', [PernikahanController::class, 'edit']);
    //     Route::post('/update_data_pernikahan/{id}', [PernikahanController::class, 'update']);
    //     Route::get('/delete_data_pernikahan/{id}', [PernikahanController::class, 'delete']);

    //     //Route Data Surat Keluar Undangan
    //     Route::get('/index_sk_undangan', [SuratKeluarUndanganController::class, 'index']);
    //     Route::get('/create_sk_undangan', [SuratKeluarUndanganController::class, 'create']);
    //     Route::post('/store_sk_undangan', [SuratKeluarUndanganController::class, 'store']);
    //     Route::get('/edit_sk_undangan/{id}', [SuratKeluarUndanganController::class, 'edit']);
    //     Route::post('/update_sk_undangan/{id}', [SuratKeluarUndanganController::class, 'update']);
    //     Route::get('/delete_sk_undangan/{id}', [SuratKeluarUndanganController::class, 'delete']);

    //     //Route Data Surat Keluar Keputusan
    //     Route::get('/index_sk_keputusan', [SuratKeluarKeputusanController::class, 'index']);
    //     Route::get('/create_sk_keputusan', [SuratKeluarKeputusanController::class, 'create']);
    //     Route::post('/store_sk_keputusan', [SuratKeluarKeputusanController::class, 'store']);
    //     Route::get('/edit_sk_keputusan/{id}', [SuratKeluarKeputusanController::class, 'edit']);
    //     Route::post('/update_sk_keputusan/{id}', [SuratKeluarKeputusanController::class, 'update']);
    //     Route::get('/delete_sk_keputusan/{id}', [SuratKeluarKeputusanController::class, 'delete']);
    // });
});
