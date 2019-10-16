<?php


namespace App\Http\Controllers\User\Found\My;

use App\Http\Controllers\Controller;
use App\Modules\LostGoods\Models\LostGood;
use App\Services\Session\NotificationKeys;
use Illuminate\Http\Request;

class DeleteFoundHandler extends Controller
{
    public function __invoke(Request $request, $lostGoodId)
    {
        try {
            $lostGood = LostGood::where('id', $lostGoodId)->first();
            $lostGood->delete();

            return back()
                ->with(NotificationKeys::SUCCESS, __('messages.notifications.found_has_been_deleted'));

        } catch (\Exception $exception) {
            return back()
                ->with(NotificationKeys::EXCEPTION, $exception->getMessage());
        }
    }
}
