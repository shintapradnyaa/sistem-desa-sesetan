<?php

namespace App\Http\Controllers;

class DashboardBendesaController extends Controller
{
    public function index()
    {
        return view('pages.bendesa.dashboard_bendesa');
    }
}
