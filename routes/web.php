<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');

    // $users = DB::select('select * from users');
    // $user = DB::insert('insert into users (name, email, password) values(?,?,?)',['Umar Imam', 'umar.dachias@gmail.com','Password']);
    // dd($user);
    // $users = DB::select('select *from users where email=?',['omardachia@gmail.com']);
    // $user = DB::update("update users set email = 'umar@gmail.com' where id=2");
   $users = DB::table('users')->where("id",2)->get(); 
    dd($users);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
