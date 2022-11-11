<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employee::latest()->paginate(5);
    
        return view('employees.index',compact('employee'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }     

    public function create()
    {
        return view('employees.create');
    }    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'designation' => 'required',
            'department' => 'required',
        ]);
    
        Employee::create($request->all());
     
        return redirect()->route('employees.index')
                        ->with('success','created successfully.');
    }
     

    public function show(Employee $employee)
    {
        return view('employees.show',compact('employee'));
    } 
     
 
    public function edit(Employee $employee)
    {
        return view('employees.edit',compact('employee'));
    }
    
 
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'designation' => 'required',
            'department' => 'required',
        ]);
    
        $employee->update($request->all());
    
        return redirect()->route('employees.index')
                        ->with('success','updated successfully');
    }
    
  
    public function destroy(Employee $employee)
    {
        $employee->delete();
    
        return redirect()->route('employees.index')
                        ->with('success','deleted successfully');
    }
}
