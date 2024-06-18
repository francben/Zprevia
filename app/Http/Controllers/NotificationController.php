<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function markAsRead(Request $request)
    {
        // Obtener los IDs de notificaciones desde la solicitud
        $notificationIds = $request->input('notifications', []);

        // Marcar las notificaciones como leídas
        auth()->user()->unreadNotifications()->whereIn('id', $notificationIds)->update(['read_at' => now()]);

        // Devolver una respuesta JSON
        return response()->json(['message' => 'Notifications marked as read successfully']);
    }
}
