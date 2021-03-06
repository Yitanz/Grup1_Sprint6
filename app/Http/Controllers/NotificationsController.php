<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\User;

class NotificationsController extends Controller
{
    /**
     * Acció que s'encarrega de marcar les notificacions com a llegides.
     * Si la crida es fa en ajax, retornarà una resporta.
     * En cas contrari retornarà la pàgina de notificacions
     *
     * @param  int  $user_id
     * @param  Request  $request
     */
    public function destroy($user_id, Request $request)
    {
        $user = User::findOrFail($user_id);
        $user->unreadNotifications->map(function($n) use($request) {
            if($n->id == $request->get('notification_uuid')){
                $n->markAsRead();
            }
        });
        if(!$request->has('crida_ajax')){
          $id_notificacio = $request->get('notification_uuid');
          return redirect('/notificacions')->with('id_notificacio', $id_notificacio);
        }else{
          return "Okxd";
        }
    }

}
