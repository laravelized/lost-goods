<?php

namespace App\Http\Controllers\User\Lost\My;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteLostRequest;
use App\Modules\LostGoods\Models\LostGood;
use App\Services\Session\NotificationKeys;
use Illuminate\Http\Request;

class DeleteLostHandler extends Controller
{
    public function __invoke(DeleteLostRequest $request, $lostGoodId)
    {
        try {
            $lostGood = LostGood::where('id', $lostGoodId)->firstOrFail();

            $lostGood->delete();

            return back()
                ->with(NotificationKeys::SUCCESS, __('messages.notifications.lost_deleted'));

        } catch (\Exception $exception) {
            return back()
                ->with(NotificationKeys::EXCEPTION, $exception->getMessage());
        }
    }
}
