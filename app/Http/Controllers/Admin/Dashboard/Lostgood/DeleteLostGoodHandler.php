<?php

namespace App\Http\Controllers\Admin\Dashboard\Lostgood;

use App\Http\Controllers\Controller;
use App\Modules\LostGoods\Models\LostGood;
use App\Services\Session\NotificationKeys;
use Illuminate\Http\Request;

class DeleteLostGoodHandler extends Controller
{
    public function __invoke(Request $request, $lostGoodId)
    {
        $lostGood = LostGood::where('id', $lostGoodId)->firstOrFail();
        $lostGood->delete();

        return back()
            ->with(NotificationKeys::SUCCESS, __('messages.notifications.data_deleted'));
    }
}
