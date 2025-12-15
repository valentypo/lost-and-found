<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
    return view('dashboard', [
        'lostItems' => auth()->user()->lostItems,
        'foundItems' => auth()->user()->foundItems
    ]);
}

}