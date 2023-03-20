<?php


use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

Route::get('/', [App\Http\Controllers\Controller::class,'getDataforStart']);
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    App\Http\Controllers\Controller::setlocale($locale);
    return redirect()->back();
});
Route::post('login', [App\Http\Controllers\LoginController::class, 'authenticate'])->name('login');
Route::post('register', [App\Http\Controllers\RegisterController::class, 'register'])->name('register');
Route::get('logoutGET', [App\Http\Controllers\LoginController::class, 'logout']);
Route::get('download', function () {
    return view('welcome',[
        'download_page'=>true,
    ]);
});
Route::get('char_ranking', [App\Http\Controllers\RankingController::class, 'getDataPlayer']);
Route::get('guild_ranking', [App\Http\Controllers\RankingController::class, 'getDataGuild']);
Route::get('minime_ranking', [App\Http\Controllers\RankingController::class, 'getDataMinime']);
Route::get('forgot-password', function () {
    return view('welcome',[
        'forget_password'=>true,
    ]);
})->middleware('guest')->name('forget.password.get');

Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->middleware('guest')->name('reset.password.get');

Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->middleware('throttle:10,1')->name('forget.password.post');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->middleware('guest')->name('reset.password.post');

/*Route::get('faq', function () {
    return view('welcome',[
        'faq_page'=>true,
    ]);
});*/

Route::get('/proto_{type}_{subtype}_{race}', [App\Http\Controllers\ProtoController::class, 'getProto']);
Route::get('/protoAll_{type}_{subtype}_{race}', [App\Http\Controllers\ProtoController::class, 'getProtoAll']);
Route::get('/protoAll_name', [App\Http\Controllers\ProtoController::class, 'getProtoAllName']);
Route::get('/protoAll_vnum', [App\Http\Controllers\ProtoController::class, 'getProtoAllVnum']);
Route::get('detailview_{vnum}', [App\Http\Controllers\ProtoController::class, 'getDetailView']);

Route::get('change-mail', [App\Http\Controllers\UserController::class, 'changeMailGET']);
Route::get('change-password', [App\Http\Controllers\UserController::class, 'changePasswordGET']);
Route::post('change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->middleware('throttle:1,1')->name('change.password');
Route::post('change-mail', [App\Http\Controllers\UserController::class, 'changeMail'])->middleware('throttle:1,1')->name('change.mail');
Route::post('add-mail', [App\Http\Controllers\UserController::class, 'addMail'])->middleware('throttle:1,1')->name('add.mail');

Route::get('add-question', [App\Http\Controllers\UserController::class, 'addQuestionGET']);
Route::post('add-question', [App\Http\Controllers\UserController::class, 'addQuestion'])->name('add.question');

Route::get('change-pin',[App\Http\Controllers\UserController::class, 'changePinGET']);
Route::post('change-pin', [App\Http\Controllers\UserController::class, 'changePin'])->name('change.pin');

Route::get('forgot-pin',[App\Http\Controllers\UserController::class, 'forgotPinGET'])->name('forgot.pin');
Route::post('forgot-pin', [App\Http\Controllers\UserController::class, 'forgotPin'])->name('forgot.pin.post');

Route::post('security-question', [App\Http\Controllers\Controller::class, 'securityQuestion'])->middleware('throttle:1,1')->name('security.question');
Route::post('security-question-check', [App\Http\Controllers\Controller::class, 'securityQuestionCheck'])->middleware('throttle:1,1')->name('check.question');

Route::get('mob-drop-metin',function (){
    $mobs = App\Http\Controllers\ProtoController::readmobDrop(0);
    return view('welcome', [
        'mobdrop' => true,
        'MobData' => $mobs,
    ]);
});
Route::get('mob-drop-monster',function (){
    $mobs = App\Http\Controllers\ProtoController::readmobDrop(1);
    return view('welcome', [
        'mobdrop' => true,
        'MobData' => $mobs,
    ]);
});
Route::get('mob-drop-boss',function (){
    $mobs = App\Http\Controllers\ProtoController::readmobDrop(2);
    return view('welcome', [
        'mobdrop' => true,
        'MobData' => $mobs,
    ]);
});
/*Route::get('test', function () {
    return view('welcome',[
        'test'=>true,
    ]);
});*/
Route::post('user', [App\Http\Controllers\UserController::class, 'unstuckPOST']);
Route::get('user', [App\Http\Controllers\UserController::class, 'index']);

Route::get('donation', function () {
    return view('welcome',[
        'donation_page'=>true,
    ]);
});
Route::post('donation', [App\Http\Controllers\PaymentController::class, 'checkall'])/*->middleware('throttle:1,2')*/->name('donation.all');

Route::any('/{any}', [App\Http\Controllers\Controller::class,'routeError'])->where('any', '.*');
