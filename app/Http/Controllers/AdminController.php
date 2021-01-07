<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\Kategori_mkn;
use App\Models\Jadwal;

class AdminController extends Controller
{
    public function index(Carbon $date)
    {
    	$year = $date->year; 
        $kategori = Kategori_mkn::all();
        $jadwal = Jadwal::whereDate('tgl_resepsi', '>' ,Carbon::now())->orderBy('tgl_resepsi','asc')->limit(5)->get();
        $ranking = DB::table('jdwl')
                 ->select('paket', DB::raw('count(*) as total'))
                 ->groupBy('paket')
                 ->orderBy('paket', 'desc')
                 ->limit(5)
                 ->get();

        $jan = DB::table('jdwl')->whereYear('tgl_resepsi', $year)->whereMonth('tgl_resepsi', 1)->count();
        $feb = DB::table('jdwl')->whereYear('tgl_resepsi', $year)->whereMonth('tgl_resepsi', 2)->count();
        $mar = DB::table('jdwl')->whereYear('tgl_resepsi', $year)->whereMonth('tgl_resepsi', 3)->count();
        $apr = DB::table('jdwl')->whereYear('tgl_resepsi', $year)->whereMonth('tgl_resepsi', 4)->count();
        $may = DB::table('jdwl')->whereYear('tgl_resepsi', $year)->whereMonth('tgl_resepsi', 5)->count();
        $jun = DB::table('jdwl')->whereYear('tgl_resepsi', $year)->whereMonth('tgl_resepsi', 6)->count();
        $jul = DB::table('jdwl')->whereYear('tgl_resepsi', $year)->whereMonth('tgl_resepsi', 7)->count();
        $ags = DB::table('jdwl')->whereYear('tgl_resepsi', $year)->whereMonth('tgl_resepsi', 8)->count();
        $sep = DB::table('jdwl')->whereYear('tgl_resepsi', $year)->whereMonth('tgl_resepsi', 9)->count();
        $oct = DB::table('jdwl')->whereYear('tgl_resepsi', $year)->whereMonth('tgl_resepsi', 10)->count();
        $nov = DB::table('jdwl')->whereYear('tgl_resepsi', $year)->whereMonth('tgl_resepsi', 11)->count();
        $des = DB::table('jdwl')->whereYear('tgl_resepsi', $year)->whereMonth('tgl_resepsi', 12)->count();

        $data = [];
        array_push($data, $jan, $feb, $mar, $apr, $may, $jun, $jul, $ags, $sep, $oct, $nov, $des);
                  
        return view('menuadmin.dashboard', ['kategori'=>$kategori, 'data_jadwal'=>$jadwal, 'ranking'=>$ranking,
    	'jan'=>$jan,'feb'=>$feb,'mar'=>$mar,'apr'=>$apr,'may'=>$may,'jun'=>$jun,'jul'=>$jul,'ags'=>$ags,
    	'sep'=>$sep,'oct'=>$oct,'nov'=>$nov,'des'=>$des]);
    }

    public function chart()
    {
    	$jan = DB::table('jdwl')->whereYear('tgl_resepsi', $year)->whereMonth('tgl_resepsi', 1)->count();
        $feb = DB::table('jdwl')->whereYear('tgl_resepsi', $year)->whereMonth('tgl_resepsi', 2)->count();
        $mar = DB::table('jdwl')->whereYear('tgl_resepsi', $year)->whereMonth('tgl_resepsi', 3)->count();
        $apr = DB::table('jdwl')->whereYear('tgl_resepsi', $year)->whereMonth('tgl_resepsi', 4)->count();
        $may = DB::table('jdwl')->whereYear('tgl_resepsi', $year)->whereMonth('tgl_resepsi', 5)->count();
        $jun = DB::table('jdwl')->whereYear('tgl_resepsi', $year)->whereMonth('tgl_resepsi', 6)->count();
        $jul = DB::table('jdwl')->whereYear('tgl_resepsi', $year)->whereMonth('tgl_resepsi', 7)->count();
        $ags = DB::table('jdwl')->whereYear('tgl_resepsi', $year)->whereMonth('tgl_resepsi', 8)->count();
        $sep = DB::table('jdwl')->whereYear('tgl_resepsi', $year)->whereMonth('tgl_resepsi', 9)->count();
        $oct = DB::table('jdwl')->whereYear('tgl_resepsi', $year)->whereMonth('tgl_resepsi', 10)->count();
        $nov = DB::table('jdwl')->whereYear('tgl_resepsi', $year)->whereMonth('tgl_resepsi', 11)->count();
        $des = DB::table('jdwl')->whereYear('tgl_resepsi', $year)->whereMonth('tgl_resepsi', 12)->count();

        $data = [];
        array_push($data, $jan, $feb, $mar, $apr, $may, $jun, $jul, $ags, $sep, $oct, $nov, $des);

        return response()->json(['data'=>$data]);
    }
}
