<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        // $employee = Employee::all();
        $employee = DB::table('employees')
        ->select("employees.*","departments.*")
        ->join('departments','departments.ID','=','employees.ID')
        ->get();
        return view('employee.index',compact('employee'));
        // $employee = Employee::with('department')->get();
        // $post = Employee::orderBy('FIRSTNAME', 'ASC')->paginate(6);
        // return view('employee.index', compact('employee'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $department = Department::all();
        return view('employee.create', ['department' => $department]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'FIRSTNAME' => 'required',
            'LASTNAME' => 'required',
            'GENDER' => 'required',
            'ADDRESS' => 'required',
            'DOB' => 'required',
            'STATUS' => 'required',
            'DEPT_ID' => 'required',
        ]);

        $employee = new Employee();
        $employee->ID = $request->get('ID');
        $employee->FIRSTNAME = $request->get('FIRSTNAME');
        $employee->LASTNAME = $request->get('LASTNAME');
        $employee->GENDER = $request->get('GENDER');
        $employee->ADDRESS = $request->get('ADDRESS');
        $employee->DOB = $request->get('DOB');
        $employee->STATUS = $request->get('STATUS');
        $employee->DEPT_ID = $request->get('DEPT_ID');

        $employee->save();

        if ($employee) {
            Session::flash('success', 'Data Employee Berhasil Ditambahkan');
            return redirect('daftarEmployee');
        } else {
            Session::flash('failed', 'Data Employee Gagal Ditambahkan');
            return redirect()->route('employee.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $ID)
    {
        $employee = Employee::find($ID);
        $department = Department::all();

        return view('employee.update', ['employee' => $employee, 'department' => $department]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $ID)
    {
        $employee = Employee::find($ID);
        $employee->FIRSTNAME = $request->FIRSTNAME;
        $employee->LASTNAME = $request->LASTNAME;
        $employee->GENDER = $request->GENDER;
        $employee->ADDRESS = $request->ADDRESS;
        $employee->DOB = $request->DOB;
        $employee->STATUS = $request->STATUS;
        $employee->DEPT_ID = $request->DEPT_ID;


        $employee->save();

        return redirect('daftarEmployee');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ID)
    {
        Employee::find($ID)->delete();
        return redirect('daftarEmployee');
    }
    
}
