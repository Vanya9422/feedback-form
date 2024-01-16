<?php

use App\Http\Controllers\Client\Feedback\ListFeedbackController;
use App\Http\Controllers\Client\Feedback\StoreFeedbackController;

Route::prefix('feedback')->group(function () {
    Route::post('/', StoreFeedbackController::class);
    Route::get('/', ListFeedbackController::class);
});
