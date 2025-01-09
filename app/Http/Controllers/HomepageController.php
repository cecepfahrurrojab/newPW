<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Tampilkan halaman homepage.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('homepage');
    }
}
