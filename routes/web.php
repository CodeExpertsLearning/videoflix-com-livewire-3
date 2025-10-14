<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::prefix('/media')
    ->name('media.contents.')
    ->middleware('auth')->group(function() {

    Route::get(
        '/contents',
        \App\Livewire\Media\IndexContent::class)->name('index');

    Route::get(
        '/contents/create',
        \App\Livewire\Media\CreateContent::class)->name('create');

    Route::get(
        '/contents/{content}/edit',
        \App\Livewire\Media\EditContent::class)->name('edit');


    Route::get(
        '/contents/{content}/videos/upload',
        \App\Livewire\Media\VideoUpload::class)->name('videos.upload');
});

















































Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

require __DIR__.'/auth.php';
