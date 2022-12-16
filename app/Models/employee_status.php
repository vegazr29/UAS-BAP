<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employee_status extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employee_statuses';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['employee_id', 'status'];

    static function checkView($employee_id)
    {
        #This function is used to check if view is exist or not
        #If exist, return the view else, create the view and return the view

        $employeeContractView = payslip::searchView($employee_id);
        return $employeeContractView;
    }

    static function searchView($employee_id)
    {
        try{
            $view = DB::select(
            'SELECT
                employees.id as employee_id,
                employees.name as employee_name,
                contracts.id as contract_id,
                contracts.currency as currency,
                COALESCE(contracts.wages, 0) as wages,
                COALESCE(contracts.pph21, 0) as pph21,
                COALESCE(contracts.food, 0) as food,
                COALESCE(contracts.transport,0) as transport,
                COALESCE(contracts.work_day,0) as work_day,
                COALESCE(bpjs.cost,0) as bpjs_cost
            FROM employees
            LEFT JOIN contracts ON employees.contract_id = contracts.id
            LEFT JOIN bpjs_datas bpjs ON contracts.bpjs_category_id = bpjs.id
            WHERE contracts.active = 1 AND bpjs.active = 1 AND employees.id = ?', [$employee_id]);
            return $view;
        }
        catch(Exception $e){
            return false;
        }
    }

    
}
