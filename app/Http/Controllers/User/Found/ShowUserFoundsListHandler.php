<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 26/09/19
 * Time: 19:26
 */

namespace App\Http\Controllers\User\Found;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowUserFoundsListHandler extends Controller
{
    public function __invoke(Request $request)
    {
        return view('user.found.list');
    }
}
