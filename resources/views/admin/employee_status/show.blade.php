<?php
    use App\Models\Employee;

    $employees = Employee::all();

    $employee_data = array();

    foreach ($employees as $employee) {
        $employee_data[$employee->id] = $employee->name;
    }

    $employee_data = array('' => 'Select Employee') + $employee_data;
?>
<script>
    window.onload = function(){
        onchangeEmployeeDate();
    }

    function onchangeEmployeeDate(){
        var employee_id = "{{ $employee->id }}";

        if (employee_id != '' && date_from != '' && date_to != '') {
            jQuery.ajax({
            type:'GET',
            url:'/admin/compute_payslip',
            data: {"employee_id":employee_id, "date_from": date_from, "date_to": date_to},
            success: function (obj, textstatus) {
                console.log(obj);
                if( !('error' in obj) ){
                    insertData(obj);
                }
                else {
                    console.log(obj.error);
                }
            }
            })
        }
    }
    </script>
@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">employee_status {{ $employee_status->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/employee_status') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/employee_status/' . $employee_status->id . '/edit') }}" title="Edit employee_status"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/employee_status' . '/' . $employee_status->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete employee_status" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $employee_status->id }}</td>
                                    </tr>
                                    <tr><th> Employee Id </th><td> {{ $employee_status->employee_id }} </td></tr><tr><th> Status </th><td> {{ $employee_status->status }} </td></tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
