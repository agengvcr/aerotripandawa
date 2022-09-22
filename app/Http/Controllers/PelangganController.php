<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PelangganController extends Controller
{
    public function getIndex(Request $request){
        $model = DB::select("select * from pelanggan where pelanggan_active = '1'");

        return view('pelanggan.index')->with('model',$model);
    }

    public function postSave(Request $request){
        try {
            DB::table('pelanggan')->insert(
                [
                    'pelanggan_nama' => $request->input('name'),
                    'pelanggan_telepon' => $request->input('phone'),
                    'pelanggan_alamat' => $request->input('address'),
                    'pelanggan_active' => 1,
                    'pelanggan_jenis' => $request->input('genre')
                ]
            );

            return redirect()->action('PelangganController@getIndex')->with('successMessage','Berhasil Disimpan');
        } catch (\Exception $th) {
            return redirect()->action('PelangganController@getIndex')->with('errorMesage','Terjadi Kesalahan');
        }
        
    }
}
