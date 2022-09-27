<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PelangganController extends Controller
{
    public function getIndex(Request $request){
        $model = DB::select("select * 
        from pelanggan 
        left join(
            select 
            coalesce(sum(movement_out - movement_in),0) as laststock,
            max(movement_date) as lastdate,
            movement_pelanggan_id
            from movement 
            where movement_active = '1'
            group by movement_pelanggan_id
        ) as stock 
            on movement_pelanggan_id = pelanggan_id
        where pelanggan_active = '1'");

        return view('pelanggan.index')->with('model',$model);
    }

    public function getModalTambah(Request $request){  
        return view('pelanggan.tambah');
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

    public function getModalEdit(Request $request){
        $model = DB::selectOne("select * from pelanggan where pelanggan_id = ? and pelanggan_active = '1'",[$request->input('id')]);      

        return view('pelanggan.edit')->with('model',$model);
    }

    public function postEdit(Request $request){
        
        try {
            DB::table('pelanggan')
            ->where('pelanggan_id',$request->input('id'))
            ->update([
                    'pelanggan_nama' => $request->input('name'),
                    'pelanggan_telepon' => $request->input('phone'),
                    'pelanggan_alamat' => $request->input('address'),
                    'pelanggan_jenis' => $request->input('genre')
            ]);
            return redirect()->action('PelangganController@getIndex')->with('successMessage','Berhasil Di Ubah');
        } catch (\Throwable $th) {
            
        }
    }

    public function postDelete(Request $request){
        try {
            //code...
            DB::table('pelanggan')
            ->where('pelanggan_id',$request->input('id'))
            ->update([
                    'pelanggan_active' => 0,
            ]);

            return redirect()->action('PelangganController@getIndex')->with('successMessage','Berhasil Di Hapus');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
        
    }

    public function postOrder(Request $request){
        try {
            //
            DB::table('movement')->insert(
                [
                    'movement_date' => $request->input('date'),
                    'movement_in' => $request->input('in') ? : 0,
                    'movement_out' => $request->input('out') ? : 0,
                    'movement_active' => 1,
                    'movement_pelanggan_id' => $request->input('id')
                ]
            );

            return redirect()->action('PelangganController@getIndex')->with('successMessage','Berhasil Di Ubah');

        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function getModalOrder(Request $request){
        $id = $request->input('id');
        $galon = DB::selectOne("
            select 
            sum(movement_out - movement_in) as laststock,
            max(movement_date) as lastdate 
            from movement 
            where movement_pelanggan_id =?
            and movement_active = '1'
            group by movement_pelanggan_id ",[$id]);
        
        $history = DB::select("
            select * from movement where movement_pelanggan_id = ? and movement_active = '1' order by movement_date
        ",[$id]);

        $profil = DB::selectOne("
        select * 
        from pelanggan 
        where pelanggan_id = ? and pelanggan_active = '1'",[$request->input('id')]);      


        $data = new \stdClass();
        $data->laststock = isset($galon->laststock) ? $galon->laststock : 0;
        $data->lastdate = isset($galon->lastdate) ? $galon->lastdate: null;
        $data->history = $history;
        $data->profil = $profil;
        $data->utang = 0;

        return view('pelanggan.order')->with('model',$data);
    }   
    
}
