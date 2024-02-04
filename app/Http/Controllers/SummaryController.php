<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function index()
    {
        $employee = Employee::all();
        $total = Employee::count();
        $cont = Employee::where('STATUS', 'cont')->count();
        $emp = Employee::where('STATUS', 'emp')->count();
        $not_act = Employee::where('STATUS', 'not_act')->count();

        return view('employee.summary', compact('total', 'cont', 'emp', 'not_act'));
    }
}
