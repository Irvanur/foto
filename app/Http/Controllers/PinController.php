<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Http\Request;

class PinController extends Controller
{
    public function getdatapin(Request $request, $id){
        $dataUser = User::where('id', $id)->first();
        return response()->json([
            'dataUser'      => $dataUser
        ], 200);
    }

    public function getdata(Request $request){
        $explore = Foto::with('likefotos')->withCount(['likefotos', 'comments'])->where('id_user', $request->idUser)->paginate();
        return response()->json([
            'data' => $explore,
            'statuscode' => 200, // Added comma here
            'idUser' => auth()->user()->id 
        ]);
    }
}
