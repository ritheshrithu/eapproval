<?php


use App\Notifications\Note;
use App\Notifications\mailnotification;
use App\User;
use App\SendApproval;
use App\Forward;
use Illuminate\Support\Facades\Input;
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

	Route::group(['middleware' => 'role:ADMIN'],function() {

		Route::get('/admin',function () { return view('admin.index'); });

		Route::resource('admin/permission', 'Admin\\PermissionController');

		Route::resource('admin/role', 'Admin\\RoleController');

		Route::resource('admin/user', 'Admin\\UserController');

		Route::resource('admin/approvals', 'Admin\\ShowController');

		Route::resource('admin/forwards', 'Admin\\ApprovalController');

	});

	Auth::routes();

	Route::get('/', function () { return view('welcome'); });

	Route::get('/home', 'HomeController@index')->name('home');


//INDEXES

	Route::get('/oldapprovals', 'AppShowController@index1');

	Route::get('/approvals', 'AppShowController@index2');

	Route::get('/status/','TrackController@index');


//CAPEX APPROVAL

	Route::get('/createapproval/capexapproval/new', 'CapexController@index')->name('new');

	Route::post('/createapproval/capexapproval/new','CapexController@store')->name('new');

	Route::get('/createapproval/capexapproval/{id}/newx', 'CapexController@indexcorrect')->name('newx');

	Route::post('/createapproval/capexapproval/{id}/newx','CapexController@storecorrect');

	Route::get('/oldapprovals/capexapproval/', 'CapexController@home')->name('home');

	Route::get('/drafts/capexapproval/', 'CapexDraftController@home');

	Route::get('/oldapprovals/capexapproval/{id}', 'CapexController@showold')->name('showold');

	Route::get('/oldapprovals/capexapproval/{id}/pdf', 'CapexController@PDF')->name('PDF');

	Route::get('/approvals/capexapproval/', 'CapexController@homerec')->name('homerec');

	Route::get('/approvals/capexapproval/{id}', 'CapexController@display')->name('display');

	Route::get('/approvals/capexapproval/{id}/pdf', 'CapexController@PDF')->name('PDF');

	Route::get('/approvals/capexapproval/{id}/forward', 'CapexController@forward')->name('forward');

	Route::post('/approvals/capexapproval/{id}/forward','CapexController@forwardsend');

	Route::get('/approvals/capexapproval/{id}/resend', 'CapexController@edit')->name('resend');

	Route::post('/approvals/capexapproval/{id}/resend','CapexController@editsend');

	Route::get('/status/capexapproval','TrackController@capexindex');

	Route::get('/status/capexapproval/{id}','TrackController@capexshow');


//CREDIT APPROVAL

	Route::get('/createapproval/creditapproval/new1', 'CreditController@index')->name('new1');

	Route::post('/createapproval/creditapproval/new1','CreditController@store');

	Route::get('/createapproval/creditapproval/{id}/newe', 'CreditController@indexcorrect')->name('newe');

	Route::post('/createapproval/creditapproval/{id}/newe','CreditController@storecorrect');

	Route::get('/oldapprovals/creditapproval/', 'CreditController@home')->name('home');

	Route::get('/oldapprovals/creditapproval/{id}', 'CreditController@showold')->name('showold');

	Route::get('/oldapprovals/creditapproval/{id}/pdf', 'CreditController@PDF')->name('PDF');

	Route::get('/oldapprovals/creditapproval/{id}/final', 'CreditController@final')->name('PDF');

	Route::get('/approvals/creditapproval/', 'CreditController@homerec')->name('homerec');

	Route::get('/approvals/creditapproval/{id}', 'CreditController@display')->name('display');

	Route::get('/approvals/creditapproval/{id}/pdf', 'CreditController@PDF')->name('PDF');

	Route::get('/approvals/creditapproval/{id}/forward1', 'CreditController@forward')->name('forward1');

	Route::post('/approvals/creditapproval/{id}/forward1','CreditController@forwardsend');

	Route::get('/approvals/creditapproval/{id}/resend1', 'CreditController@edit')->name('resend1');

	Route::post('/approvals/creditapproval/{id}/resend1','CreditController@editsend');

	Route::get('/status/creditapproval','TrackController@creditindex');

	Route::get('/status/creditapproval/{id}','TrackController@creditshow');


//VENDOR APPROVAL

	Route::get('/createapproval/vendorapproval/new2', 'vendorController@index')->name('new2');

	Route::post('/createapproval/vendorapproval/new2','vendorController@store');

	Route::get('/createapproval/vendorapproval/{id}/newv', 'vendorController@indexcorrect')->name('newv');

	Route::post('/createapproval/vendorapproval/{id}/newv','vendorController@storecorrect');

	Route::get('/oldapprovals/vendorapproval/', 'vendorController@home')->name('home');

	Route::get('/oldapprovals/vendorapproval/{id}', 'vendorController@showold')->name('showold');

	Route::get('/oldapprovals/vendorapproval/{id}/pdf', 'vendorController@PDF')->name('PDF');

	Route::get('/approvals/vendorapproval/', 'vendorController@homerec')->name('homerec');

	Route::get('/approvals/vendorapproval/{id}', 'vendorController@display')->name('display');

	Route::get('/approvals/vendorapproval/{id}/pdf', 'vendorController@PDF')->name('PDF');

	Route::get('/approvals/vendorapproval/{id}/forward2', 'vendorController@forward')->name('forward2');

	Route::post('/approvals/vendorapproval/{id}/forward2','vendorController@forwardsend');

	Route::get('/approvals/vendorapproval/{id}/resend2', 'vendorController@edit')->name('resend2');

	Route::post('/approvals/vendorapproval/{id}/resend2','vendorController@editsend');

	Route::get('/status/vendorapproval','TrackController@vendorindex');

	Route::get('/status/vendorapproval/{id}','TrackController@vendorshow');


//OTHER APPROVALS


	Route::get('/createapproval/otherapproval/new3', 'ApprovalController@index')->name('new3');

	Route::post('/createapproval/otherapproval/new3','ApprovalController@store');

	Route::get('/createapproval/otherapproval/{id}/newc', 'ApprovalController@indexcorrect')->name('newc');

	Route::post('/createapproval/otherapproval/{id}/newc','ApprovalController@storecorrect');

	Route::get('/oldapprovals/otherapproval/', 'ApprovalController@home')->name('home');

	Route::get('/oldapprovals/otherapproval/{id}', 'ApprovalController@showold')->name('showold');

	Route::get('/oldapprovals/otherapproval/{id}/pdf', 'ApprovalController@PDF')->name('PDF');

	Route::get('/oldapprovals/otherapproval/{id}/final', 'ApprovalController@final')->name('final');

	Route::get('/approvals/otherapproval/', 'ApprovalController@homerec')->name('homerec');

	Route::get('/approvals/otherapproval/{id}', 'ApprovalController@display')->name('display');

	Route::get('/approvals/otherapproval/{id}/pdf', 'ApprovalController@PDF')->name('PDF');

	Route::get('/approvals/otherapproval/{id}/forward3', 'ApprovalController@forward')->name('forward3');

	Route::post('/approvals/otherapproval/{id}/forward3','ApprovalController@forwardsend');

	Route::get('/approvals/otherapproval/{id}/resend3', 'ApprovalController@edit')->name('resend3');

	Route::post('/approvals/otherapproval/{id}/resend3','ApprovalController@editsend');

	Route::get('/status/otherapproval','TrackController@otherindex');

	Route::get('/status/otherapproval/{id}','TrackController@othershow');

//DEALER APPROVAL

	Route::get('/createapproval/dealerapproval/new4', 'DealerController@index')->name('new4');

	Route::post('/createapproval/dealerapproval/new4','DealerController@store');

	Route::get('/createapproval/dealerapproval/{id}/newd', 'DealerController@indexcorrect')->name('newd');

	Route::post('/createapproval/dealerapproval/{id}/newd','DealerController@storecorrect');

	Route::get('/oldapprovals/dealerapproval/', 'DealerController@home')->name('home');

	Route::get('/oldapprovals/dealerapproval/{id}', 'DealerController@showold')->name('showold');

	Route::get('/oldapprovals/dealerapproval/{id}/pdf', 'DealerController@PDF')->name('PDF');

	Route::get('/oldapprovals/dealerapproval/{id}/final', 'DealerController@final')->name('final');

	Route::get('/approvals/dealerapproval/', 'DealerController@homerec')->name('homerec');

	Route::get('/approvals/dealerapproval/{id}', 'DealerController@display')->name('display');

	Route::get('/approvals/dealerapproval/{id}/pdf', 'DealerController@PDF')->name('PDF');

	Route::get('/approvals/dealerapproval/{id}/forward4', 'DealerController@forward')->name('forward2');

	Route::post('/approvals/dealerapproval/{id}/forward4','DealerController@forwardsend');

	Route::get('/approvals/dealerapproval/{id}/resend4', 'DealerController@edit')->name('resend4');

	Route::post('/approvals/dealerapproval/{id}/resend4','DealerController@editsend');

	Route::get('/status/dealerapproval','TrackController@dealerindex');

	Route::get('/status/dealerapproval/{id}','TrackController@dealershow');


	/*Route::get('/newapproval', 'ApprovalController@names');

	Route::post('newapproval','ApprovalController@send');

	Route::get('pdf/{id}', 'ApprovalController@getPDF')->name('getPDF');

	Route::get('final/{id}', 'ApprovalController@final')->name('final');

	Route::get('forward/{id}', 'ApprovalController@forward')->name('forward');

	Route::post('forward/{id}','ApprovalController@forwardsend');

	Route::get('resend/{id}', 'ApprovalController@edit')->name('resend');

	Route::post('resend/{id}','ApprovalController@editsend');*/
