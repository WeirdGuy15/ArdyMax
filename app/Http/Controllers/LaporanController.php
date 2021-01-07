<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\laporan;
use DB;

use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index()
    {
    	$laporan=laporan::all();
    	$kategori = DB::table('kategori_mkns')->get();

    	return view('menuadmin.laporan',['data_laporan' => $laporan, 'kategori'=>$kategori]);
    }

    public function delete($id)
    {
    	$laporan= laporan::find($id);
    	$laporan->delete($laporan);
    	return redirect()->back();
    }

    public function export(Carbon $date)
    {

        return Excel::download(new LaporanExport, 'laporanArdyMax.xlsx');
    }
}
