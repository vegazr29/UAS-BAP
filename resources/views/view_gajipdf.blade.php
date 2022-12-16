<html>


    <b><h1 style="text-align:center">view gaji</h1></b>
    <?php
    echo '<img src="data:image/png;base64,' . $logo_image . '" width="100px"/>';     
    ?>
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
     
        $no=1;

        foreach ($datagaji as $row) {
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
</html>