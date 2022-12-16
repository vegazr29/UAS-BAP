<?php
    use App\Models\view_gaji;
    use App\Models\vkaryawan;
?>

@section('title','view gaji')

@extends('layouts.main')

@section('container')
    <b><h1 style="text-align:center">view gaji</h1></b>
    <img src="https://rekreartive.com/wp-content/uploads/2018/10/Logo-UPH-Universitas-Pelita-Harapan-Original-PNG.png" alt="" style="margin:  0 0 0 35%; width:30%">
    <style>
        table tr{
            padding: 50px;
            border:3px;
        }
        table td{
            border:2px;
        }
        table th{
            border:2px;
        }
    </style>
    <h1>Nama: Vincent Ega</h1>
    <h1>NIM: 03081200029</h1>
    <table class="table">
        <thead class="table-dark">   
        <th>No</th>
            <th>Nama</th>
            <th>nomor id</th>
            <th>alamat</th>
            <th>status pernikahan</th>
            <th>jenis kelamin</th>
            <th>pengurangan gaji</th>
            <th>bonus gaji</th>
            <th>jumlah gaji</th>
        </tr>
        </thead>
      

        <?php
     
        $rows = DB::select("
        SELECT name,identification_no,address,marriage_status,gender,deduction,bonus,payslip_amount FROM vkaryawan");
        $no=1;

        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>".$no."</td>";
            echo "<td>".$row->name."</td>";
            echo "<td>".$row->identification_no."</td>";
            echo "<td>".$row->address."</td>";
            echo "<td>".$row->marriage_status."</td>";
            echo "<td>".$row->gender."</td>";
            echo "<td>".$row->deduction."</td>";
            echo "<td>".$row->bonus."</td>";
            echo "<td>".$row->payslip_amount."</td>";
            echo "</tr>";
            $no+=1;
        }
        ?>
    </table>
    <br>
    <a href="{{url('/view_gaji/pdf')}}" target="_blank">
    <button class="btn btn-success">Download PDF</button>
    </a>
@endsection