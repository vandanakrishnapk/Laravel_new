<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class HomeController extends Controller
{

    public function index()
    {
        $student= Student::latest()->paginate(5);
    
        return view('students.index',compact('student'))
            ->with('i',(request()->input('page', 1) - 1) * 5);
    }

 
    public function create()
    {
        return view('students.create');  
    }

 
    public function store(Request $request)
    {
     $request->validate([
        'name' => 'required',
        'date_of_birth' => 'required',
        'class' => 'required',
        'division' =>'required',
        'photo' => 'required|mimes:pdf,xlx,csv,jpeg,png,jpg|max:2048',
     ]);
    $student=$request->all();
    if($request->hasfile('photo'))
    {
        $fileName=time().$request->file('photo')->getClientoriginalName();
        $path=$request->file('photo')->storeAs('images',$fileName,'public');
        $student["photo"]='/storage/'.$path;Student::create($student);
    }
   
    return redirect()->route('students.index')->with('success','created successfully');   
    }


    public function show(Student $student)
    {
        return view('students.show',compact('student'));
    }


    public function edit(Student $student)
    {
        return view('students.edit',compact('student'));
    }

 
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'date_of_birth' => 'required',
            'class' => 'required',
            'division' =>'required',
            'photo' => 'required|mimes:pdf,xlx,csv,jpeg,png,jpg|max:2048',
         ]);
         $data =['name' => $request->name,
                  'date_of_birth' => $request->date_of_birth,
                  'class' => $request->class,
                  'division' =>$request->division,
                  'photo' => $request->photo];
     
         if($request->hasfile('photo'))
         {
            $destination=public_path('/storage/'. '$student->photo');
            if(File::exists($destination))
            {
                unlink($destination); 
            }
        
         $fileName=time().$request->file('photo')->getClientoriginalName();
         $path=$request->file('photo')->storeAs('images',$fileName,'public');
         $data["photo"]='/storage/'.$path; 
         $student->update($data);    
        }
        $student->update($data);
       return redirect()->route('students.index')->with('success','updated successfully');
    }

    public function destroy(Student $student)
    {
      $student->delete();
      return redirect()->route('students.index')->with('success','deleted successfuly');
    }

  
}
