<?php

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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/peta', 'MapController@index')->name('map');
Route::get('feature-info', 'MapController@getInfo')->name('feature_info');
Route::get('all-layers', 'MapController@getAllLayers')->name('all_layers');
Route::get('all-fields', 'MapController@getAllFields')->name('all_fields');
Route::get('all-values', 'MapController@getAllValues')->name('all_values');
Route::get('get-obj', 'MapController@getSpatialObject')->name('get_obj');
Route::get('home', 'MapController@home');

Auth::routes();

Route::get('main-dashboard', 'DashboardController@index')->name('main_dashboard');

Route::get('layer', 'DaftarLayerController@index')->name('data_layer');
Route::get('layer/daftar-layer', 'DaftarLayerController@getDaftarLayer')->name('daftar_layer');


Route::get('lpl', 'DaftarLplController@index')->name('data_lpl');
Route::get('lpl/daftar-lpl', 'DaftarLplController@getDaftarLayer')->name('daftar_lpl');
Route::get('lpl/prd-data', 'DaftarLplController@getPeriodeData')->name('prd_lpl');

Route::get('user', 'UserProfileController@profile')->name('user_profile');
Route::get('user/edit', 'UserProfileController@update')->name('edit_profile');
Route::get('user/list', 'UsersController@index')->name('user_list');
Route::post('user/save-profile', 'UserProfileController@store')->name('save_profile');


Route::get('data', 'DataManagementController@index')->name('data_management');
Route::get('data/newperiod-form', 'DataManagementController@formNewPeriod')->name('new_period_form');
Route::post('data/store-shp', 'DataManagementController@storeShp')->name('store_shp');
Route::post('data/newperiod-create', 'DataManagementController@createNewPeriod')->name('new_period_create');

Route::get('asistensi', 'AsistensiController@index')->name('daftar_asistensi');
Route::get('asistensi/permohonan', 'AsistensiController@permohonanAsistensi')->name('permohonan_asistensi');
Route::get('asistensi/pengajuan', 'AsistensiController@newAsistensi')->name('pengajuan_asistensi');
Route::get('asistensi/dokumen', 'AsistensiController@dokumenAsistensi')->name('dokumen_asistensi');
Route::get('asistensi/detil-formasistensi', 'AsistensiController@detilFormAsistensi')->name('detil_formasistensi');
Route::get('asistensi/detil-dokumen', 'AsistensiController@detilDokumen')->name('detildokumen_asistensi');

Route::post('asistensi/save-asistensi', 'AsistensiController@saveAsistensi')->name('save_asistensi');
Route::post('asistensi/save-dokumen-asistensi', 'AsistensiController@saveAsistensiDokumen')->name('save_dokumen_asistensi');
Route::post('asistensi/upload-permohonan-asistensi', 'AsistensiController@uploadPermohonanAsistensi')->name('upload_permohonan_asistensi');
Route::post('asistensi/delete-dokumen-asistensi', 'AsistensiController@deleteAsistensiDokumen')->name('delete_dokumen_asistensi');
Route::post('asistensi/delete-form-asistensi', 'AsistensiController@deleteAsistensiForm')->name('delete_form_asistensi');
Route::post('asistensi/verify-asistensi', 'AsistensiController@verifyAsistensi')->name('verify_asistensi');
Route::post('asistensi/verify-status-file', 'AsistensiController@verifyStatusFile')->name('verify_status_asistensi');
Route::post('asistensi/approve-request-asistensi', 'AsistensiController@approveRequestAsistensi')->name('approve_request_asistensi');

Route::get('asistensi/data-formasistensi', 'AsistensiController@getAsistensiData')->name('data_formasistensi');
Route::get('asistensi/data-dokumenasistensi', 'AsistensiController@getDokumenAsistensiData')->name('data_dokumenasistensi');

Route::get('peraturan', 'PeraturanController@index')->name('daftar_peraturan');
Route::get('peraturan/upload', 'PeraturanController@uploadPeraturan')->name('upload_peraturan');
// Route::get('peraturan/dokumen', 'PeraturanController@dokumenPeraturan')->name('dokumen_peraturan');
Route::get('peraturan/data-peraturan', 'PeraturanController@getPeraturanData')->name('data_peraturan');
Route::post('peraturan/save-peraturan', 'PeraturanController@savePeraturan')->name('save_peraturan');
Route::post('peraturan/delete-peraturan', 'PeraturanController@deletePeraturan')->name('delete_peraturan');
Route::get('peraturan/detail-peraturan', 'PeraturanController@detailPeraturan')->name('detail_peraturan');


Route::get('konsultasiteknis', 'KonsultasiTeknisController@index')->name('daftar_konsultasiteknis');
Route::get('konsultasiteknis/pengajuan', 'KonsultasiTeknisController@pengajuanKonsultasiTeknis')->name('pengajuan_konsultasiteknis');
Route::get('konsultasiteknis/detil-konsultasiteknis', 'KonsultasiTeknisController@detilKonsultasiTeknis')->name('detil_konsultasiteknis');
Route::get('konsultasiteknis/unggah-dokumennotulensi', 'KonsultasiTeknisController@unggahDokumenNotulensi')->name('unggah_dokumennotulensi');
Route::get('konsultasiteknis/jadwal-dokumennotulensi', 'KonsultasiTeknisController@jadwalKonsultasiTeknis')->name('date_konsultasiteknis');
Route::get('konsultasiteknis/daftar-pembimbing', 'KonsultasiTeknisController@daftarPembimbing')->name('daftar_pembimbing');
Route::get('konsultasiteknis/form-pembimbing', 'KonsultasiTeknisController@formPembimbing')->name('form_pembimbing');

Route::post('konsultasiteknis/save-konsultasi-teknis', 'KonsultasiTeknisController@saveKonsultasiTeknis')->name('save_konsultasi_teknis');
Route::post('konsultasiteknis/delete-konsultasi-teknis', 'KonsultasiTeknisController@deleteKonsultasiTeknis')->name('delete_konsultasi_teknis');
Route::post('konsultasiteknis/approve-konsultasi-teknis', 'KonsultasiTeknisController@approveKonsultasiTeknis')->name('approve_konsultasi_teknis');
Route::post('konsultasiteknis/save-dokumen-notulensi', 'KonsultasiTeknisController@saveDokumenNotulensi')->name('save_dokumen_notulensi');
Route::post('konsultasiteknis/save-form-pembimbing', 'KonsultasiTeknisController@saveFormPembimbing')->name('save_form_pembimbing');
Route::post('konsultasiteknis/delete-pembimbing', 'KonsultasiTeknisController@deletePembimbingTeknis')->name('delete_pembimbing_teknis');

Route::get('konsultasiteknis/data-formasistensi', 'KonsultasiTeknisController@getKonsultasiTeknisData')->name('data_konsultasiteknis');

Route::post('externalservice/save-service', 'ExternalServiceController@saveService')->name('save_external_service');
Route::get('konsultasiteknis/data-pembimbingteknis', 'KonsultasiTeknisController@getPembimbingTeknisData')->name('data_pembimbingteknis');

Route::get('alias', 'AliasFieldnameController@index')->name('alias');
Route::post('alias/save-alias-data', 'AliasFieldnameController@saveAlias')->name('save_alias');

Route::get('publikasi', 'DokumenPublikasiController@index')->name('daftar_publikasi');
Route::get('publikasi/upload', 'DokumenPublikasiController@uploadPublikasi')->name('upload_publikasi');
Route::get('publikasi/data-peraturan', 'DokumenPublikasiController@getPublikasiData')->name('data_publikasi');
Route::post('publikasi/save-peraturan', 'DokumenPublikasiController@savePublikasi')->name('save_publikasi');
Route::post('publikasi/delete-peraturan', 'DokumenPublikasiController@deletePublikasi')->name('delete_publikasi');
Route::get('publikasi/detail-peraturan', 'DokumenPublikasiController@detailPublikasi')->name('detail_publikasi');