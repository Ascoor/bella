<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Auth::user()->notifications()->paginate(10);
        Auth::user()->unreadNotifications->markAsRead();
        return view('notifications.index', compact('notifications'));
    }

    public function read(Request $request)
    {
        $notificationId = $request->input('notification_id');
        Auth::user()->notifications()->where('id', $notificationId)->update(['read_at' => now()]);
        return response()->json(['success' => true]);
    }

    public function markNotificationAsRead($id)
    {
        $notification = Auth::user()->notifications()->where('id', $id)->first();
        if ($notification) {
            $notification->markAsRead();
            $notification->delete();
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        // Retrieve the notification
        $notification = Auth::user()->notifications()->findOrFail($id);

        // Mark the notification as read
        $notification->markAsRead();

        // Delete the notification
        $notification->delete();

        // Return a success response
        return response()->json(['success' => true]);
    }
}
