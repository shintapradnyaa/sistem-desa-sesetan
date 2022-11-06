<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardSekretariatController extends Controller
{
    public function index()
    {
        return view('pages.sekretariat.dashboard_sekretariat');
    }
}
