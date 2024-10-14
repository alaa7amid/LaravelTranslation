<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('test');
});

Route::get('/language/{locale}', function ($locale) {
    // تحقق من أن اللغة صحيحة (مثلاً "en" أو "ar")
    if (! in_array($locale, ['en', 'ar'])) {
        abort(400); // إذا لم تكن اللغة صالحة، عرض خطأ 400
    }

    // تخزين اللغة في الجلسة
    Session::put('locale', $locale);

    // إعادة توجيه المستخدم إلى الصفحة السابقة أو إلى الصفحة الرئيسية
    return redirect()->back();
});

