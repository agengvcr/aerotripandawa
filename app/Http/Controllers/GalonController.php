<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GalonController extends Controller
{
    //

    public function index(Request $request){
        $model = DB::select("
            select 
                movement_date,
                sum(movement_out) as total_out,
                sum(movement_in) as total_in
            from movement
            join pelanggan
                on pelanggan_id = movement_pelanggan_id
                and pelanggan_active = '1'
            where movement_active = '1'
            group by movement_date
        ");

        return view('galon.index')
        ->with('model',$model);
    }

    public function postDelete(Request $request){

        try {
            //code...
            DB::table('movement')
            ->where('movement_id',$request->input('id'))
            ->update([
                    'movement_active' => '0',
            ]);

            return redirect()->action('PelangganController@getIndex')->with('successMessage','Berhasil Di Hapus');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
        
    }
}
