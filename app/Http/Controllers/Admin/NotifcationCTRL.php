<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotificationCTRL extends Controller
{
    public function markNotificationAsRead($notificationId)
    {
        $userId = Auth::id();

        $notification = DB::table('notifications')
            ->where('id', $notificationId)
            ->where('notifiable_id', $userId)
            ->whereNull('read_at')
            ->first();

        if ($notification) {
            DB::table('notifications')
                ->where('id', $notificationId)
                ->update(['read_at' => Carbon::now()]);

            return response()->json(['status' => 'success', 'message' => 'Notification marked as read']);
        }

        return response()->json(['status' => 'error', 'message' => 'Notification not found or already read'], 404);
    }

    public function getUnreadCount()
    {
        $userId = Auth::id();

        $unreadCount = DB::table('notifications')
            ->where('notifiable_id', $userId)
            ->whereNull('read_at')
            ->count();

        return response()->json(['unreadCount' => $unreadCount]);
    }
}
