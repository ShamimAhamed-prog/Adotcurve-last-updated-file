<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\StartupController;
use App\Http\Controllers\Backend\StartupDashboardController;
use App\Http\Controllers\Backend\InvestorController;
use App\Http\Controllers\Backend\InvestorDashboardController;
use App\Http\Controllers\Backend\InvestorRegisterController;
use App\Http\Controllers\Backend\StartupRegisterController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\MessageController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/', [PostController::class, 'index'])->name('landing.page');

//Frontend Routes
Route::get('/about', [PageController::class, 'about'])->name('frontend.about');
Route::get('/mission', [PageController::class, 'missionVision'])->name('frontend.mission');
Route::get('/ventureEducation', [PageController::class, 'ventureEducation'])->name('frontend.ventureEducation');

//Backend Routes
//Admin routes
Route::get('login/admin', [AdminController::class, 'adminLoginForm'])->name('admin.login.form');
Route::post('admin_login', [AdminController::class, 'adminLogin'])->name('admin.login');
Route::get('admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
Route::get('startup/manager', [AdminController::class, 'startupManager'])->name('startup.manager');
Route::get('investor/manager', [AdminController::class, 'investorManager'])->name('investor.manager');
Route::get('edit/startup/{id}', [AdminController::class, 'editStartup']);
Route::put('update_startup', [AdminController::class, 'update_Startup'])->name('update_startup');
Route::get('edit/investor/{id}', [AdminController::class, 'editInvestor']);
Route::put('update_investor', [AdminController::class, 'update_Investor'])->name('update_investor');
Route::get('admin/email', [AdminController::class, 'adminEmail']);
Route::post('admin/email/sent', [AdminController::class, 'sentEmail'])->name('admin/email/sent');
Route::get('admin/founder', [AdminController::class, 'manageFounder']);
Route::get('edit/founder/{id}', [AdminController::class, 'editFounder']);
Route::put('update_founder', [AdminController::class, 'update_Founder'])->name('update_founder');
Route::post('founder_register', [AdminController::class, 'FounderRegister'])->name('founder_register');
Route::get('admin/founder/profile/{id}', [AdminController::class, 'FounderProfile']);
Route::get('admin/startupProjects', [AdminController::class, 'StartupProject']);
Route::get('edit/projects/{id}', [AdminController::class, 'editProject']);
Route::put('update_project', [AdminController::class, 'update_Project'])->name('update_project');
Route::get('admin/startupFunds', [AdminController::class, 'StartupFund'])->name('startup_funds');
Route::get('admin/investorfunds', [AdminController::class, 'InvestorFund'])->name('investor_funds');
Route::get('admin/startupFunds/pdf', [AdminController::class, 'pdf']);
Route::get('approved/{id}', [AdminController::class, 'ApprovedFund']);
Route::get('canceled/{id}', [AdminController::class, 'CanceledFund']);
Route::get('admin/blogpost', [PostController::class, 'create']);
Route::post('post_create', [PostController::class, 'store'])->name('post_create');
Route::get('singleblog/{id}', [PostController::class, 'SinglePost']);
Route::get('blog/list', [PostController::class, 'BlogList']);
Route::get('active/{id}', [PostController::class, 'Activeblog']);
Route::get('deactive/{id}', [PostController::class, 'Deactiveblog']);
Route::get('admin/blogcategory', [AdminController::class, 'BlogCategories']);
Route::post('blog_categories', [AdminController::class, 'BlogCategoriesStore'])->name('blog_categories');
Route::get('admin/appointment', [AdminController::class, 'Appoinment']);
Route::get('admin/appointmentcopy', [AdminController::class, 'Appoinmentcopy']);
Route::post('admin/addappointment', [AdminController::class, 'AddAppoinment'])->name('addappointment');
Route::get('admin/startupappointmentlist', [AdminController::class, 'StartupApointmentList'])->name('startupappointmentlist');
Route::get('admin/investorappointmentlist', [AdminController::class, 'InvestorApointmentList'])->name('investorappointmentlist');
Route::post('appointmentadd', [AdminController::class, 'AddAppoinment']);
Route::get('approved_startup/{id}', [AdminController::class, 'ApprovedStartupAppointment']);
Route::get('canceled/{id}', [AdminController::class, 'CanceledStartupAppointment']);
Route::get('approved_investor/{id}', [AdminController::class, 'ApprovedInvestorAppointment']);
Route::get('canceled/{id}', [AdminController::class, 'CanceledInvestorAppointment']);

//Admin Dashboard Delete
Route::get('admin-startup-delete/{id}', [AdminController::class, 'deleteStartup'])->name('admin.startup.delete');
Route::get('admin-investor-delete/{id}', [AdminController::class, 'deleteInvestor'])->name('admin.investor.delete');
Route::get('admin-founder-delete/{id}', [AdminController::class, 'deleteFounder'])->name('admin.founder.delete');
Route::get('admin-project-delete/{id}', [AdminController::class, 'deleteProject'])->name('admin.project.delete');



//-----------------------------------------------------------Admin Messages--------------------------------------------------------------------------
//Admin  to Startup
Route::get('admin/startup/view', [MessageController::class, 'startupView'])->name('admin.startup.view');
Route::post('admin/startup/message/store', [MessageController::class, 'startupMessageStore'])->name('admin.startup.message.store');
Route::get('admin/startup/message/inbox', [MessageController::class, 'startupMessageInbox'])->name('admin.startup.message.inbox');
Route::get('admin/startup/message/conversation/{startup_id}',[MessageController::class, 'startupConversation'])->name('admin.startup.message.conversation');
Route::post('admin/startup/message/conversation/send',[MessageController::class, 'sendStartupMessage'])->name('admin.startup.message.sendMessage');
//Admin To Investor
Route::get('admin/investor/view', [MessageController::class, 'investorView'])->name('admin.investor.view');
Route::post('admin/investor/message/store', [MessageController::class, 'investorMessageStore'])->name('admin.investor.message.store');
Route::get('admin/investor/message/inbox', [MessageController::class, 'investorMessageInbox'])->name('admin.investor.message.inbox');
Route::get('admin/investor/message/conversation/{investor_id}',[MessageController::class, 'investorConversation'])->name('admin.investor.message.conversation');
Route::post('admin/investor/message/conversation/send',[MessageController::class, 'sendInvestorMessage'])->name('admin.investor.message.sendMessage');


//-------------------------------------------------------------startup Messages---------------------------------------------------------------------------
// Startup To Admin
Route::get('startup/admin/view', [MessageController::class, 'adminView'])->name('startup.admin.view');
Route::post('startup/admin/message/store', [MessageController::class, 'adminMessageStore'])->name('startup.admin.message.store');
Route::get('startup/admin/inbox', [MessageController::class, 'adminInbox'])->name('startup.admin.message.inbox');
Route::get('startup/admin/conversation/{admin_id}',[MessageController::class, 'adminConversation'])->name('startup.admin.message.conversation');
Route::post('startup/admin/conversation/send',[MessageController::class, 'sendAdminMessage'])->name('startup.admin.message.sendMessage');

// Startup To Investor Message
Route::get('startup/investor/view', [MessageController::class, 'startupInvestorView'])->name('startup.investor.view');
Route::post('startup/investor/message/store', [MessageController::class, 'startupInvestorMessageStore'])->name('startup.investor.message.store');
Route::get('startup/investor/inbox', [MessageController::class, 'startupInvestorInbox'])->name('startup.investor.message.inbox');
Route::get('startup/investor/conversation/{investor_id}',[MessageController::class, 'startupInvestorConversation'])->name('startup.investor.message.conversation');
Route::post('startup/investor/conversation/send',[MessageController::class, 'startupSendInvestorMessage'])->name('startup.investor.message.sendMessage');
//-------------------------------------------------------------Investor Messages---------------------------------------------------------------------------
//Investor To Admin
Route::get('investor/admin/view', [MessageController::class, 'investorAdminView'])->name('investor.admin.view');
Route::post('investor/admin/message/store', [MessageController::class, 'InvestorAdminMessageStore'])->name('investor.admin.message.store');
Route::get('investor/admin/inbox', [MessageController::class, 'investorAdminInbox'])->name('investor.admin.message.inbox');
Route::get('investor/admin/conversation/{admin_id}',[MessageController::class, 'investorAdminConversation'])->name('investor.admin.message.conversation');
Route::post('investor/admin/conversation/send',[MessageController::class, 'investorSendAdminMessage'])->name('investor.admin.message.sendMessage');

//Investor To Startup
Route::get('investor/startup/view', [MessageController::class, 'investorStartupView'])->name('investor.startup.view');
Route::post('investor/startup/message/store', [MessageController::class, 'InvestorStartupMessageStore'])->name('investor.startup.message.store');
Route::get('investor/startup/inbox', [MessageController::class, 'investorStartupInbox'])->name('investor.startup.message.inbox');
Route::get('investor/startup/conversation/{startup_id}',[MessageController::class, 'investorStartupConversation'])->name('investor.startup.message.conversation');
Route::post('investor/startup/conversation/send',[MessageController::class, 'investorSendStartupMessage'])->name('investor.startup.message.sendMessage');



Route::group(['middleware' => 'admin'], function () {

    Route::get('admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('logout', [AdminController::class,'logout']);
});


//Startup Routes
Route::get('login/startup', [StartupController::class, 'startupLoginForm'])->name('startup.login.form');
Route::post('startup_login', [StartupController::class, 'startupLogin'])->name('startup.login');
Route::get('register/startup', [StartupRegisterController::class, 'startupRegisterForm'])->name('startup.register.form');
Route::post('startup_register', [StartupRegisterController::class, 'StartupRegister'])->name('startup_register');
Route::get('startup/profile', [StartupController::class, 'startupProfile']);
Route::post('startup_profile', [StartupController::class, 'startupProfileupdate'])->name('startup_profile');
Route::get('startup/projects', [StartupController::class, 'ManageProjects']);
Route::post('startup_projects_register', [StartupController::class, 'ProjectsAdd'])->name('startup_projects_register');
Route::get('startup/funds', [StartupController::class, 'ManageFunds']);
Route::post('startup_funds_register', [StartupController::class, 'FundsAdd'])->name('startup_funds_register');
Route::match(array('GET', 'POST'), 'startup/appointment',[StartupController::class, 'StartupAppointment']);
Route::get('book/appointment/{id}', [StartupController::class, 'bookAppointment']);
Route::post('startup_Appointment_book', [StartupController::class, 'AppointmentBooking'])->name('startup_Appointment_book');
Route::get('startup/appointmentlist', [StartupController::class, 'AppointmentList']);



Route::group(['middleware' => 'startup'], function () {

    Route::get('startup/dashboard', [StartupDashboardController::class, 'startupDashboard'])->name('startup.dashboard');
    Route::get('startup/logout', [StartupController::class, 'logoutStartup'])->name('startup.logout');
});


//Investor Routes
Route::get('login/investor', [InvestorController::class, 'investorLoginForm'])->name('investor.login.form');
Route::post('investor_login', [InvestorController::class, 'investorLogin'])->name('investor.login');
Route::get('register/investor', [InvestorRegisterController::class, 'investorRegisterForm'])->name('investor.register.form');
Route::post('investor_register', [InvestorRegisterController::class, 'InvestorRegister'])->name('investor_register');
Route::get('investor/profile', [InvestorController::class, 'investorProfile']);
Route::get('investor/projects', [InvestorController::class, 'ManageProjects']);
Route::get('investor/funds', [InvestorController::class, 'ManageFunds']);
Route::post('investor_raise_fund', [InvestorController::class, 'RaiseFund'])->name('investor_raise_fund');
Route::match(array('GET', 'POST'), 'investor/appointment',[InvestorController::class, 'InvestorAppointment'])->name('test.app.data');
Route::get('book/appointment/{id}', [InvestorController::class, 'bookAppointment']);
Route::post('investor_Appointment_book', [InvestorController::class, 'AppointmentBooking'])->name('investor_Appointment_book');
Route::get('investor/appointmentlist', [InvestorController::class, 'InvestorAppointmentList']);



Route::group(['middleware' => 'investor'], function () {


    Route::get('investor/dashboard', [InvestorDashboardController::class, 'investorDashboard'])->name('investor.dashboard');
});


Auth::routes();



