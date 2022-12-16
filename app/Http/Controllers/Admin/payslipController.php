<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\payslip;
use Illuminate\Http\Request;

class payslipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $payslip = payslip::where('employee_id', 'LIKE', "%$keyword%")
                ->orWhere('contract_id', 'LIKE', "%$keyword%")
                ->orWhere('currency', 'LIKE', "%$keyword%")
                ->orWhere('start_date', 'LIKE', "%$keyword%")
                ->orWhere('end_date', 'LIKE', "%$keyword%")
                ->orWhere('deduction', 'LIKE', "%$keyword%")
                ->orWhere('bonus', 'LIKE', "%$keyword%")
                ->orWhere('payslip_amount', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $payslip = payslip::latest()->paginate($perPage);
        }

        return view('admin.payslip.index', compact('payslip'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.payslip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        payslip::create($requestData);

        return redirect('admin/payslip')->with('flash_message', 'payslip added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $payslip = payslip::findOrFail($id);

        return view('admin.payslip.show', compact('payslip'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $payslip = payslip::findOrFail($id);

        return view('admin.payslip.edit', compact('payslip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $payslip = payslip::findOrFail($id);
        $payslip->update($requestData);

        return redirect('admin/payslip')->with('flash_message', 'payslip updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        payslip::destroy($id);

        return redirect('admin/payslip')->with('flash_message', 'payslip deleted!');
    }

    /**
     * Compute the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public static function compute($request)
    {
        $view = payslip::onchangeEmployee($request);

        return $view;
    }
}
