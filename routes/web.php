<?php

use App\Http\Requests\RegUserValidation;
use App\Models\RegistrationUser;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {


    $reservation = null;

    $randomcode = random_int(0, 1000);
    $transaction = null;

    if (empty(request()->all())) {
        return  redirect()->route('filament.admin.auth.login');
    }

    if (request()->reservation) {
        $reservation = Reservation::find(request()->reservation);
    }

    if (request()->payment_transactions_for_object && request()->payment_transactions_for_id && request()->payment_transactions_type) {
    }

    return view('welcome', [
        'reservation' => $reservation,
        'transaction' => $transaction,
        'code' => $randomcode
    ]);
})->name('default');


Route::post('reg_client_transaction', function () {

    return view('welcome', [
        'reservation' => null,
        'transaction' => null,
        'code' => 000,
        'greate' => 'успешно зарегистрирован пользователь осталось только подтвердить у Администратора назвава свой код:' . 000
    ]);
})->name('reg.client.transaction');


Route::post('/reg_user_reservation', function (RegUserValidation $request) {

    RegistrationUser::create([
        'reservation_id' => $request->reservation_id,
        'phone' => $request->phone,
        'name' => $request->name,
        'confirmation_code' => $request->code,
        'cofirm' => false
    ]);

    return view('welcome', [
        'reservation' => null,
        'transaction' => null,
        'code' => $request->code,
        'greate' => 'успешно зарегистрирован пользователь осталось только подтвердить у Администратора назвава свой код:' . $request->code
    ]);
})->name('reg.user.reservation');
