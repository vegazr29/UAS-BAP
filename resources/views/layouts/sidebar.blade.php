<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <?php
        $User_Menu = '
        <li class="nav-item">
            <a href="/admin/user" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                User
                </p>
            </a>
        </li>';
        $Attendance_Menu = '
        <li class="nav-item">
            <a href="/admin/attendance" class="nav-link">
                <i class="nav-icon fas fa-user-edit"></i>
                <p>
                Attendance
                </p>
            </a>
        </li>
        ';
        $BPJS_Menu = '
        <li class="nav-item">
            <a href="/admin/bpjs_data" class="nav-link">
                <i class="nav-icon far fa-id-card"></i>
                <p>
                BPJS Karyawan
                </p>
            </a>
        </li>
        ';

        $Employee_Menu = '
        <li class="nav-item">
            <a href="/admin/employee" class="nav-link">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>
                Employee
                </p>
            </a>
        </li>
        ';

        $Contract_Menu = '
        <li class="nav-item">
            <a href="/admin/contract" class="nav-link">
                <i class="nav-icon fas fa-user-plus"></i>
                <p>
                Contract
                </p>
            </a>
        </li>';

        $Payslip_Menu = '
        <li class="nav-item">
            <a href="/admin/payslip" class="nav-link">
                <i class="nav-icon fas fa-hand-holding-usd"></i>
                <p>
                Payslip
                </p>
            </a>
        </li>
        ';

        $employee_status = '
        <li class="nav-item">
            <a href="/admin/employee_status" class="nav-link">
                <i class="nav-icon fas fa-hand-holding-usd"></i>
                <p>
                employee status
                </p>
            </a>
        </li>
        ';

        $view_gaji = '
        <li class="nav-item">
            <a href="/view_gaji" class="nav-link">
                <i class="nav-icon fas fa-hand-holding-usd"></i>
                <p>
                view gaji
                </p>
            </a>
        </li>
        ';


        if ($session->role == 'payroll'){
            echo $User_Menu;
            echo $BPJS_Menu;
            echo $Contract_Menu;
            echo $Employee_Menu;
            echo $Attendance_Menu;
            echo $Payslip_Menu;
            echo $employee_status;
            echo $view_gaji;
        }

        if ($session->role == 'hr'){
            echo $Attendance_Menu;
            echo $Employee_Menu;
            echo $Contract_Menu;
        }

        if ($session->role == 'bpjs_hr'){
            echo $Employee_Menu;
            echo $BPJS_Menu;
        }

    ?>
</ul>