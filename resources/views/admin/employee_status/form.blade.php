<?php
    use App\Models\Employee;

    $employees = Employee::all();

    $employee_data = array();

    foreach ($employees as $employee) {
        $employee_data[$employee->id] = $employee->name;
    }

    $employee_data = array('' => 'Select Employee') + $employee_data;

    $json_data = json_encode($employee_data);
?>


<div class="form-group {{ $errors->has('employee_id') ? 'has-error' : ''}}">
    <label for="employee_id" class="control-label">{{ 'Employee' }}</label>
    <select onchange=onchangeEmployeeDate() required name="employee_id" class="form-control" id="employee_id" >
    @foreach (json_decode($json_data, true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($payslip->employee_id) && $payslip->employee_id == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
    {!! $errors->first('employee_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="active" class="control-label">{{ 'Active' }}</label>
    <div class="radio">
    <label><input name="status" type="radio" value="1" {{ (isset($employee) && 1 == $employee->status) ? 'checked' : '' }}> active (1)</label>
</div>
<div class="radio">
    <label><input name="status" type="radio" value="0" @if (isset($employee)) {{ (0 == $employee->status) ? 'checked' : '' }} @else {{ 'checked' }} @endif> inactive (0)</label>
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
