<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;use Illuminate\Contracts\Auth\Authenticatable;

class NotificationController extends Controller
{
    /**
     * Mark a notification as read.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function markAsRead(Request $request, $id)
    {
        /** @var Authenticatable|null $user */
        $user = $request->user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized.'], 401);
        }

        $notification = $user->notifications()->where('id', $id)->first();

        if ($notification) {
            $notification->markAsRead();
            return response()->json(['message' => 'Notification marked as read.']);
        } else {
            return response()->json(['error' => 'Notification not found.'], 404);
        }
    }

    /**
     * Get the count of unread notifications for the authenticated user.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getNotificationsCount(Request $request)
    {
        /** @var Authenticatable|null $user */
        $user = $request->user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized.'], 401);
        }

        $count = $user->unreadNotifications->count();
        return response()->json(['count' => $count]);
    }
}
