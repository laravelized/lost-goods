<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 19/09/19
 * Time: 22:29
 */

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowDashboardPageHandler extends Controller
{
    public function __construct()
    {
    }

    public function __invoke(Request $request)
    {
        return view('admin.dashboard.index');
    }
}
