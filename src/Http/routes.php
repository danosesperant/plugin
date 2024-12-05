<?php
// src/Http/routes.php
use PluginVoiture\Http\Controllers\VoitureController;
use Illuminate\Support\Facades\Route;

Route::resource('voitures', VoitureController::class);