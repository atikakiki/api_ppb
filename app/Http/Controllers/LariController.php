<?php

namespace App\Http\Controllers;

use App\Models\Lari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use DB;

class LariController extends Controller
{
    public function getRiwayatLari(){
        $id_user = auth()->user()->id;
        $data['riwayat_lari'] = DB::table('riwayat_lari')->where('id_user',$id_user)->get();
        return response()->json($data);
    }

    public function createLari(Request $request){
        // $id_user = auth()->user()->id;
        $validator = Validator::make($request->all(), [
            'koordinat_awal' => 'required|string',
            'koordinat_akhir' => 'required|string',
            'ss_bb' => 'required',
        ]);

        if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
        }

        $save_track = Lari::create([
            'koordinat_awal' => $request->get('koordinat_awal'),
            'koordinat_akhir' => $request->get('koordinat_akhir'),
            'id_user' => auth()->user()->id,
            'ss_bb' => $request->get('ss_bb'),
        ]);
        // $save = DB::table();
        if ($save_track) {
            return response()->json([
                'success' => true,
                'message' => 'Track berhasil ditambahkan'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat track!'
            ], 500);
        } 
    }

    public function updateStep(Request $request, $id_exercise){
        // $id_exercise = $request->id_exercise;
        $step = $request->step;
        $id_user = auth()->user()->id;
        $update_step = Lari::where('id_exercise',$id_exercise)->where('id_user',$id_user)->update([
            'steps' => $request->get('step'),
        ]);
        // $update_step = Lari::save();
        if ($update_step) {
            return response()->json([
                'success' => true,
                'message' => 'Step berhasil di update'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal update step!'
            ], 500);
        } 
    }

    public function finishTrack($id_exercise){
        $id_user = auth()->user()->id;
        $finish_track = Lari::where('id_exercise',$id_exercise)->where('id_user',$id_user)->update([
            // 'steps' => $request->get('step'),
            'status' => true,
        ]);
        if ($finish_track) {
            return response()->json([
                'success' => true,
                'message' => 'Track selesai dan berhasil disimpan'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan track'
            ], 500);
        } 
    }

    public function deleteTrack($id_exercise){
        // $id_exercise = $request->id_exercise;
        // $step = $request->step;
        $id_user = auth()->user()->id;
        $delete_track = Lari::where('id_exercise',$id_exercise)->where('id_user',$id_user)->delete();
        // $update_step = Lari::save();
        if ($delete_track) {
            return response()->json([
                'success' => true,
                'message' => 'Track berhasil dihapus'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus track'
            ], 500);
        } 
    }

 
}
