<?php

namespace App\Http\Controllers;

use App\Exports\RekapExport;
use App\Nomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;




class RekapController extends Controller
{
    public function index()
    {
        return view('rekap.list');
    }
    public function sort(Request $request)
    {
        $default = $request->daterange;
        $startDate = Str::before($request->daterange, ' -');
        $endDate = Str::after($request->daterange, '- ');

        switch ($request->submit) {
            case 'table':

                $data = Nomer::get()

                    ->where('status', 1)
                    ->whereBetween('date', [$startDate, $endDate]);

                return view('rekap.list', compact('data', 'default'));
                break;
            case 'download':
                $data = Nomer::get()
                    // ->where('poli_id', auth()->user()->id)
                    ->where('status', 1)
                    ->whereBetween('date', [$startDate, $endDate]);

                return Excel::download(new RekapExport(), 'rekap.xlsx');

                break;
        }
    }
    public function export_excel()
    {
        $rekap = DB::table('nomers')->get()->where('poli_id', auth()->user()->id)->toArray();
        $rekap_array[] = array('user_id', 'dokter_id', 'poli_id');
        foreach ($rekap as $rek) {
            $rekap_array[] = array(
                'Pasien'  => $rek->user_id,
                'Dokter'   => $rek->dokter_id,
                'Poli'    => $rek->poli_id,

            );
        }
        Excel::create('Rekap Data Poli', function ($excel) use ($rekap_array) {
            $excel->setTitle('Rekap Data');
            $excel->sheet('Rekap Data', function ($sheet) use ($rekap_array) {
                $sheet->fromArray($rekap_array, null, 'A1', false, false);
            });
        })->download('xlsx');
        // return Excel::download(new RekapExport, 'rekap.xlsx');
    }
}
