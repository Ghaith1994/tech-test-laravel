<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;


$app_version = env('APP_VERSION', 'v1');

Route::group(['prefix' => $app_version, 'middleware' => []], function () {
    Route::apiResources([
        'articles' => ArticleController::class,
    ]);
});
