<?php

namespace App\Http\Controllers;

use App\Amis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotificationspushController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->ajax()) {
            $user_id = Auth::id();

            /* Liste des demandes d'amis */
            $list = Amis::where('user2', '=', $user_id)
                ->where('pending', '=', 0)
                ->get();
            $size = sizeof($list);

            /* Renvoie notif:yes si il y a au moins une demande en attente. */
            if($size == 0) {
                return response()->json(['notif'=>'no'],200);
            }
            else {
                return response()->json(['notif'=>'yes'],200);
            }
        }
        abort(404);
    }
}
