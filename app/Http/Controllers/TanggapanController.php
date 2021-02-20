<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Administrator,Masyarakat,Tanggapan,Pengaduan};
use Carbon\Carbon;

class TanggapanController extends Controller
{
	//Tanggapan dari petugas 
    public function petugasTanggapanCreate($id)
    {
    	$tanggapan_detail = Pengaduan::with('masyarakat')->find($id);
    	return view('petugas.tanggapan',compact('tanggapan_detail'));
    }

    public function petugasTanggapanStore(Request $request)
    {
    	// $data_tanggapan = $request->validate([
    	// 	'petugas_id' => 'required',
    	// 	'tanggal_tanggapan' => 'required',
    	// 	'tanggapan' => 'required',
    	// 	'petugas_id' => 'required'
    	// ]);
    	$data_tanggapan = new Tanggapan();
    	$data_tanggapan->pengaduan_id = $request->get('pengaduan_id');
    	$data_tanggapan->tanggapan = $request->get('tanggapan');
    	$data_tanggapan->petugas_id = Auth()->guard('petugas')->user()->id;
    	$data_tanggapan->tanggal_tanggapan = $request->get('tanggal_tanggapan');
    	$data_tanggapan->save();
    	return redirect()->route('petugas.pengaduan')->with('success','Ditanggapi !');
    }
}
