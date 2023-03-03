<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notification = Auth::user()->notification()->paginate(10);
        Auth::user()->unreadnotification->markAsRead();
        return view('notification.index', compact('notification'));
    }

    public function read(Request $request)
    {
        $notificationId = $request->input('notification_id');
        Auth::user()->notification()->where('id', $notificationId)->update(['read_at' => now()]);
        return response()->json(['success' => true]);
    }

    public function markNotificationAsRead($id)
    {
        $notification = Auth::user()->notification()->where('id', $id)->first();
        if ($notification) {
            $notification->markAsRead();
            $notification->delete();
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        // Retrieve the notification
        $notification = Auth::user()->notification()->findOrFail($id);

        // Mark the notification as read
        $notification->markAsRead();

        // Delete the notification
        $notification->delete();

        // Return a success response
        return response()->json(['success' => true]);
    }
}
