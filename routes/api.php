<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix("v1")
->group(__DIR__."/api/v1/api.php");