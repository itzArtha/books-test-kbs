<?php

use App\Actions\Actions\Book\DeleteBook;
use App\Actions\Actions\Book\IndexBook;
use App\Actions\Actions\Book\ShowBook;
use App\Actions\Actions\Book\StoreBook;
use App\Actions\Actions\Book\UpdateBook;
use Illuminate\Support\Facades\Route;

Route::prefix('books')->group(function() {
    Route::get('/', IndexBook::class);
    Route::get('{book}', ShowBook::class);
    Route::post('/', StoreBook::class);
    Route::patch('{book}', UpdateBook::class);
    Route::delete('{book}', DeleteBook::class);
});