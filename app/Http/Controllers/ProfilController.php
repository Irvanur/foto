<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use App\Models\LikeFoto;
use Illuminate\Http\Request;

class ProfilController extends Controller
{

    public function editProfile($id){
        $user = User::find($id);
        return view('page.edit-profile', compact('user'));
    }

    public function getdataprofile(Request $request){
        $data = auth()-> user();
        return response()->json([
            'data' => $data
        ],200);
    }
    
    public function getdata(Request $request){
        $explore = Foto::with('likefotos')->withCount(['likefotos', 'comments'])->where('id_user', auth()->id())->paginate(4);
        return response()->json([
            'datapost'  =>$explore,
            'statuscode'    => 200,
            'id'        =>auth()->user()->id,
        ]);
    }

    public function likesfoto(Request $request){
        try {
            $request->validate([
                'idfoto' => 'required'
            ]);

            $existignLike = LikeFoto::where('id_foto', $request->idfoto)->where('id_user', auth()->user()->id)->first(); 
            if(!$existignLike){
                $dataSimpan = [
                    'id_foto'       => $request->idfoto,
                    'id_user'       => auth()->user()->id
                ];
                Likefoto::create($dataSimpan);
            }else{
                Likefoto::where('id_foto', $request->idfoto)->where('id_user', auth()->user()->id)->delete();
            }

            return response()->json('Data berhasil di simpan', 200);
        } catch (\Throwable $th) {
            return response()->json('Somenting went wrong', 500);
        }
    }

    public function update(Request $request){
        $user = auth()->user();
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $extensi = $picture->getClientOriginalExtension();
            $filename = 'users'. now()->timestamp.'.'. $extensi;
            $picture->move('assets', $filename);
            $user->picture = $filename; 
        }else{
            $picture = $user->picture;
        }

        $user->nama_lengkap = $request->nama_lengkap;
        $user->alamat = $request->alamat;

        $user->save();

        return redirect()->back()->with('success','Profil berhasil diperbarui');
    }
}