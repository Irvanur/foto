<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Comment;
use App\Models\Likefoto;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function getdata(Request $request){
        if($request->cari !== 'null'){
            $explore = Foto::with('likefotos')->where('judul_foto','like','%'.$request->cari.'%')->orderBy('id', 'DESC')->withCount(['likefotos', 'comments'])->paginate();
        } else {
            $explore = Foto::with('likefotos')->orderBy('id', 'DESC')->withCount(['likefotos', 'comments'])->paginate();
        }
        
        return response()->json([
            'data' => $explore,
            'statuscode' => 200, // Added comma here
            'idUser' => auth()->user()->id 
        ]);
    }

    public function likefotos(Request $request){
        // $datanya = [
        //     'id_foto'       => $request->idfoto,
        //     'id_user'       => auth()->user()->id
        // ];
        // return response()->json('Data berhasil di simpan', 200);
        try {
            $request->validate([
                'idfoto' => 'required'
            ]);

            $existingLike = Likefoto::where('id_foto', $request->idfoto)->where('id_user', auth()->user()->id)->first();
            if(!$existingLike){
                $dataSimpan = [
                'id_foto'   => $request->idfoto,
                'id_user'   => auth()->user()->id
                ];
                Likefoto::create($dataSimpan);
            } else {
                Likefoto::where('id_foto', $request->idfoto)->where('id_user', auth()->user()->id)->delete();
            }

            return response()->json('Data berhasil di simpan', 200);
        } catch (\Throwable $th) {
            return response()->json('Something went wrong', 500);
            //throw $th
        }
    }

    public function detail($id) {
        $photo = Foto::where('id', $id)->first();

        return view('page.detail', compact('photo')); 
    }

    public function getdatadetail(Request $request, $id){
        $dataDetailFoto   = Foto::with('user')->where('id', $id)->firstOrFail();
        return response()->json([
            'dataDetailFoto'    => $dataDetailFoto
        ], 200);
    }

    public function ambildatakomentar(Request $request, $id){
        $ambilkomentar = Comment::with('user')->where('id_foto', $id)->get();
        return response()->json([
            'data'     => $ambilkomentar,
        ], 200,);
    }

    public function kirimkomentar(Request $request){
        try {
            $request->validate([
                'idfoto'        =>  'required',
                'isi_komentar'  =>  'required'
            ]);
            $dataStoreKomentar = [
                'id_user'       => auth()->user()->id,
                'id_foto'       => $request->idfoto,
                'isi_komentar'  => $request->isi_komentar,

            ];
            comment::create($dataStoreKomentar);
            return response()->json([
                'data'          => 'Data Berhasil di simpan',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json('Data komentar gagal di simpan', 500,);
        }
    }

}