<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
class view_gaji extends Controller
{
    public function index()
    {
        //

        return view("view_gaji");
    }

    public function cetak_pdf(){
        $rows = DB::select("
        SELECT name,identification_no,address,marriage_status,gender,deduction,bonus,payslip_amount FROM vkaryawan");

        $logo_image = base64_encode(file_get_contents(public_path('template/dist/img/logo.png')));
        $pdf = PDF::loadview("view_gajipdf",["logo_image"=>$logo_image,"datagaji"=>$rows]);

        return $pdf->download('laporan-datakaryawan.pdf');
    }


}
