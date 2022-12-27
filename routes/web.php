<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\DashboardWargaController;
use App\Http\Controllers\Bendesa\ProfileBendesaController;
use App\Http\Controllers\warga\DashboardRegisterWargaController;
use App\Http\Controllers\Kelihan\ProfileKelihanController;
use App\Http\Controllers\Bendesa\KematianBendesaController;
use App\Http\Controllers\Kelihan\KematianKelihanController;
use App\Http\Controllers\Bendesa\DashboardBendesaController;
use App\Http\Controllers\Kelihan\DashboardKelihanController;
use App\Http\Controllers\Bendesa\PernikahanBendesaController;
use App\Http\Controllers\Kelihan\PernikahanKelihanController;
use App\Http\Controllers\Sekretariat\ProfileSekretariatController;
use App\Http\Controllers\Sekretariat\KematianSekretariatController;
use App\Http\Controllers\Sekretariat\DashboardSekretariatController;
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
use App\Http\Controllers\Sekretariat\SuratKeluarKeputusanSekretariatController;
use App\Http\Controllers\warga\PernikahanWargaController;
use App\Http\Controllers\warga\ProfileWargaController;

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

// Route::get('/', function () {
//     return view('pages.warga.dashboard_warga');
// });

Route::group(['prefix' => '/'], function () {
    route::get('', [DashboardWargaController::class, 'index']);
});


Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout');
    Route::get('register', 'index_register');
    Route::post('proses_register', 'proses_register');
});

Route::controller(LupaPasswordController::class)->group(function () {
    Route::get('lupa_password', 'index');
    Route::post('lupa_password/proses', 'proses');
    Route::get('lupa_password/edit/{token}', 'edit');
    Route::post('lupa_password/update', 'update');
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['CekUserLogin:1']], function () {
        // Dashboard
        Route::get('/dashboard_bendesa', [DashboardBendesaController::class, 'index']);
        //Route Data Kematians
        Route::group(['prefix' => 'kematian_bendesa'], function () {
            Route::get('', [KematianBendesaController::class, 'index']);
            Route::get('/detail/{id}', [KematianBendesaController::class, 'show']);
            Route::get('/edit/{id}', [KematianBendesaController::class, 'edit']);
            Route::post('/update/{id}', [KematianBendesaController::class, 'update']);
            Route::get('/delete/{id}', [KematianBendesaController::class, 'delete']);
        });

        Route::group(['prefix' => 'pernikahan_bendesa'], function () {
            Route::get('', [PernikahanBendesaController::class, 'index']);
            Route::get('/detail/{id}', [PernikahanBendesaController::class, 'show']);
        });

        Route::group(['prefix' => 'sk_keputusan_bendesa'], function () {
            //Route Data Surat Keluar Keputusan
            Route::get('', [SuratKeluarKeputusanBendesaController::class, 'index']);
            Route::get('/detail/{id}', [SuratKeluarKeputusanBendesaController::class, 'show']);
        });

        Route::group(['prefix' => 'sk_undangan_bendesa'], function () {
            //Route Data Surat Keluar Undangan
            Route::get('', [SuratKeluarUndanganBendesaController::class, 'index']);
            Route::get('/detail/{id}', [SuratKeluarUndanganBendesaController::class, 'show']);
        });

        Route::group(['prefix' => 'sk_proposal_bendesa'], function () {
            //Route Data Surat Keluar Proposal
            Route::get('', [SuratKeluarProposalBendesaController::class, 'index']);
            Route::get('/detail/{id}', [SuratKeluarProposalBendesaController::class, 'show']);
        });
        Route::group(['prefix' => 'sm_keputusan_bendesa'], function () {
            //Route Data Surat Masuk Keputusan
            Route::get('', [SuratMasukKeputusanBendesaController::class, 'index']);
            Route::get('/detail/{id}', [SuratMasukKeputusanBendesaController::class, 'show']);
        });

        Route::group(['prefix' => 'sm_undangan_bendesa'], function () {
            //Route Data Surat Masuk Undangan
            Route::get('', [SuratMasukUndanganBendesaController::class, 'index']);
            Route::get('/detail/{id}', [SuratMasukUndanganBendesaController::class, 'show']);
        });

        Route::group(['prefix' => 'sm_proposal_bendesa'], function () {
            //Route Data Surat Masuk Proposal
            Route::get('', [SuratMasukProposalBendesaController::class, 'index']);
            Route::get('/detail/{id}', [SuratMasukProposalBendesaController::class, 'show']);
        });

        Route::group(['prefix' => 'kelola_pengguna'], function () {
            Route::get('', [LoginController::class, 'indexPengguna']);
            Route::get('/create', [LoginController::class, 'create']);
            Route::post('/store', [LoginController::class, 'store']);
            Route::get('/detail/{id}', [LoginController::class, 'show']);
            Route::get('/delete/{id}', [LoginController::class, 'delete']);
        });
        Route::group(['prefix' => 'edit_profile_bendesa'], function () {
            Route::get('', [ProfileBendesaController::class, 'index']);
            Route::get('/edit/{id}', [ProfileBendesaController::class, 'edit']);
            Route::post('/update/{id}', [ProfileBendesaController::class, 'update']);
        });

        Route::group(['prefix' => 'change_password_bendesa'], function () {
            Route::get('/edit/{id}', [ProfileBendesaController::class, 'edit_password']);
            Route::post('/update/{id}', [ProfileBendesaController::class, 'update_password']);
        });
    });

    Route::group(['middleware' => ['CekUserLogin:2']], function () {
        // Dashboard
        Route::get('/dashboard_sekretariat', [DashboardSekretariatController::class, 'index']);
        Route::group(['prefix' => 'kematian_sekretariat'], function () {
            //Route Data Kematians
            Route::get('/', [KematianSekretariatController::class, 'index']);
            Route::get('/create', [KematianSekretariatController::class, 'create']);
            Route::post('/store', [KematianSekretariatController::class, 'store']);
            Route::get('/detail/{id}', [KematianSekretariatController::class, 'show']);
            Route::get('/edit/{id}', [KematianSekretariatController::class, 'edit']);
            Route::post('/update/{id}', [KematianSekretariatController::class, 'update']);
            Route::get('/delete/{id}', [KematianSekretariatController::class, 'delete']);
        });

        Route::group(['prefix' => 'pernikahan_sekretariat'], function () {
            Route::get('', [PernikahanSekretariatController::class, 'index']);
            Route::get('/create', [PernikahanSekretariatController::class, 'create']);
            Route::post('/store', [PernikahanSekretariatController::class, 'store']);
            Route::get('/detail/{id}', [PernikahanSekretariatController::class, 'show']);
            Route::get('/edit/{id}', [PernikahanSekretariatController::class, 'edit']);
            Route::post('/update/{id}', [PernikahanSekretariatController::class, 'update']);
            Route::get('/delete/{id}', [PernikahanSekretariatController::class, 'delete']);
        });

        Route::group(['prefix' => 'sk_undangan_sekretariat'], function () {
            //Route Data Surat Keluar Undangan
            Route::get('', [SuratKeluarUndanganSekretariatController::class, 'index']);
            Route::get('/create', [SuratKeluarUndanganSekretariatController::class, 'create']);
            Route::post('/store', [SuratKeluarUndanganSekretariatController::class, 'store']);
            Route::get('/detail/{id}', [SuratKeluarUndanganSekretariatController::class, 'show']);
            Route::get('/edit/{id}', [SuratKeluarUndanganSekretariatController::class, 'edit']);
            Route::post('/update/{id}', [SuratKeluarUndanganSekretariatController::class, 'update']);
            Route::get('/delete/{id}', [SuratKeluarUndanganSekretariatController::class, 'delete']);
        });
        Route::group(['prefix' => 'sk_keputusan_sekretariat'], function () {
            //Route Data Surat Keluar Keputusan
            Route::get('', [SuratKeluarKeputusanSekretariatController::class, 'index']);
            Route::get('/create', [SuratKeluarKeputusanSekretariatController::class, 'create']);
            Route::post('/store', [SuratKeluarKeputusanSekretariatController::class, 'store']);
            Route::get('/detail/{id}', [SuratKeluarKeputusanSekretariatController::class, 'show']);
            Route::get('/edit/{id}', [SuratKeluarKeputusanSekretariatController::class, 'edit']);
            Route::post('/update/{id}', [SuratKeluarKeputusanSekretariatController::class, 'update']);
            Route::get('/delete/{id}', [SuratKeluarKeputusanSekretariatController::class, 'delete']);
        });

        Route::group(['prefix' => 'sk_proposal_sekretariat'], function () {
            //Route Data Surat Keluar Proposal
            Route::get('', [SuratKeluarProposalSekretariatController::class, 'index']);
            Route::get('/create', [SuratKeluarProposalSekretariatController::class, 'create']);
            Route::post('/store', [SuratKeluarProposalSekretariatController::class, 'store']);
            Route::get('/detail/{id}', [SuratKeluarProposalSekretariatController::class, 'show']);
            Route::get('/edit/{id}', [SuratKeluarProposalSekretariatController::class, 'edit']);
            Route::post('/update/{id}', [SuratKeluarProposalSekretariatController::class, 'update']);
            Route::get('/delete/{id}', [SuratKeluarProposalSekretariatController::class, 'delete']);
        });
        Route::group(['prefix' => 'sm_keputusan_sekretariat'], function () {
            //Route Data Surat Masuk Keputusan
            Route::get('', [SuratMasukKeputusanSekretariatController::class, 'index']);
            Route::get('/create', [SuratMasukKeputusanSekretariatController::class, 'create']);
            Route::post('/store', [SuratMasukKeputusanSekretariatController::class, 'store']);
            Route::get('/detail/{id}', [SuratMasukKeputusanSekretariatController::class, 'show']);
            Route::get('/edit/{id}', [SuratMasukKeputusanSekretariatController::class, 'edit']);
            Route::post('/update/{id}', [SuratMasukKeputusanSekretariatController::class, 'update']);
            Route::get('/delete/{id}', [SuratMasukKeputusanSekretariatController::class, 'delete']);
        });

        Route::group(['prefix' => 'sm_proposal_sekretariat'], function () {
            //Route Data Surat Masuk Proposal
            Route::get('', [SuratMasukProposalSekretariatController::class, 'index']);
            Route::get('/create', [SuratMasukProposalSekretariatController::class, 'create']);
            Route::post('/store', [SuratMasukProposalSekretariatController::class, 'store']);
            Route::get('/detail/{id}', [SuratMasukProposalSekretariatController::class, 'show']);
            Route::get('/edit/{id}', [SuratMasukProposalSekretariatController::class, 'edit']);
            Route::post('/update/{id}', [SuratMasukProposalSekretariatController::class, 'update']);
            Route::get('/delete/{id}', [SuratMasukProposalSekretariatController::class, 'delete']);
        });
        Route::group(['prefix' => 'sm_undangan_sekretariat'], function () {
            //Route Data Surat Masuk Undangan
            Route::get('', [SuratMasukUndanganSekretariatController::class, 'index']);
            Route::get('/create', [SuratMasukUndanganSekretariatController::class, 'create']);
            Route::post('/store', [SuratMasukUndanganSekretariatController::class, 'store']);
            Route::get('/detail/{id}', [SuratMasukUndanganSekretariatController::class, 'show']);
            Route::get('/edit/{id}', [SuratMasukUndanganSekretariatController::class, 'edit']);
            Route::post('/update/{id}', [SuratMasukUndanganSekretariatController::class, 'update']);
            Route::get('/delete/{id}', [SuratMasukUndanganSekretariatController::class, 'delete']);
        });
        Route::group(['prefix' => 'edit_profile_sekretariat'], function () {
            Route::get('', [ProfileSekretariatController::class, 'index']);
            Route::get('/edit/{id}', [ProfileSekretariatController::class, 'edit']);
            Route::post('/update/{id}', [ProfileSekretariatController::class, 'update']);
        });

        Route::group(['prefix' => 'change_password_sekretariat'], function () {
            Route::get('/edit/{id}', [ProfileSekretariatController::class, 'edit_password']);
            Route::post('/update/{id}', [ProfileSekretariatController::class, 'update_password']);
        });
    });

    Route::group(['middleware' => ['CekUserLogin:3']], function () {
        // Dashboard
        Route::get('/dashboard_kelihan', [DashboardKelihanController::class, 'index']);
        Route::group(['prefix' => 'kematian_kelihan'], function () {
            //Route Data Kematians
            Route::get('', [KematianKelihanController::class, 'index']);
            Route::get('/create', [KematianKelihanController::class, 'create']);
            Route::post('/store', [KematianKelihanController::class, 'store']);
            Route::get('/detail/{id}', [KematianKelihanController::class, 'show']);
            Route::get('/edit/{id}', [KematianKelihanController::class, 'edit']);
            Route::post('/update/{id}', [KematianKelihanController::class, 'update']);
            Route::get('/delete/{id}', [KematianKelihanController::class, 'delete']);
        });

        Route::group(['prefix' => 'pernikahan_kelihan'], function () {
            Route::get('', [PernikahanKelihanController::class, 'index']);
            Route::get('/detail/{id}', [PernikahanKelihanController::class, 'show']);
        });

        //Route Data Surat Keluar Undangan
        Route::group(['prefix' => 'sk_undangan_kelihan'], function () {
            Route::get('', [SuratKeluarUndanganKelihanController::class, 'index']);
            Route::get('/detail/{id}', [SuratKeluarUndanganKelihanController::class, 'show']);
        });
        Route::group(['prefix' => 'sk_keputusan_kelihan'], function () {
            //Route Data Surat Keluar Keputusan
            Route::get('', [SuratKeluarKeputusanKelihanController::class, 'index']);
            Route::get('/detail/{id}', [SuratKeluarKeputusanKelihanController::class, 'show']);
        });

        Route::group(['prefix' => 'edit_profile'], function () {
            Route::get('', [ProfileKelihanController::class, 'index']);
            Route::get('/edit/{id}', [ProfileKelihanController::class, 'edit']);
            Route::post('/update/{id}', [ProfileKelihanController::class, 'update']);
        });

        Route::group(['prefix' => 'change_password'], function () {
            Route::get('/edit/{id}', [ProfileKelihanController::class, 'edit_password']);
            Route::post('/update/{id}', [ProfileKelihanController::class, 'update_password']);
        });
    });

    Route::group(['middleware' => ['CekUserLogin:4']], function () {
        // Dashboard
        Route::get('/dashboard_login_warga', [DashboardRegisterWargaController::class, 'index']);

        Route::group(['prefix' => 'pernikahan_warga'], function () {
            Route::get('', [PernikahanWargaController::class, 'index']);
            Route::post('/store', [PernikahanWargaController::class, 'store']);
            Route::get('/detail/{id}', [PernikahanWargaController::class, 'show']);
            Route::get('/edit/{id}', [PernikahanWargaController::class, 'edit']);
            Route::post('/update/{id}', [PernikahanWargaController::class, 'update']);
            Route::get('/delete/{id}', [PernikahanWargaController::class, 'delete']);
        });

        // //Route Data Surat Keluar Undangan
        // Route::group(['prefix' => 'sk_undangan_kelihan'], function () {
        //     Route::get('', [SuratKeluarUndanganKelihanController::class, 'index']);
        //     Route::get('/detail/{id}', [SuratKeluarUndanganKelihanController::class, 'show']);
        // });
        // Route::group(['prefix' => 'sk_keputusan_kelihan'], function () {
        //     //Route Data Surat Keluar Keputusan
        //     Route::get('', [SuratKeluarKeputusanKelihanController::class, 'index']);
        //     Route::get('/detail/{id}', [SuratKeluarKeputusanKelihanController::class, 'show']);
        // });

        Route::group(['prefix' => 'edit_profile_warga'], function () {
            Route::get('', [ProfileWargaController::class, 'index']);
            Route::get('/edit/{id}', [ProfileWargaController::class, 'edit']);
            Route::post('/update/{id}', [ProfileWargaController::class, 'update']);
        });

        Route::group(['prefix' => 'change_password_warga'], function () {
            Route::get('/edit/{id}', [ProfileWargaController::class, 'edit_password']);
            Route::post('/update/{id}', [ProfileWargaController::class, 'update_password']);
        });
    });
});
