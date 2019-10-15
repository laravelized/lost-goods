<?php

namespace App\Http\Controllers\Admin\Dashboard\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowIndexPageHandler extends Controller
{
    public function __invoke(Request $request)
    {
        return view('admin.dashboard.profile.index');
    }
}
