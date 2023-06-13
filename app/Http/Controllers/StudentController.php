<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Category;
use Illuminate\Http\Request;
use DateTime;

class StudentController extends Controller
{
    public function __construct(){
        $this->middleware('auth.user');
    }
    //
    public function create(){
        return view('student/create');
    }
    public function edit(){
        return view('student/edit');
    }
    public function delete(){
        return view('student/delete');}

    public function get(Request $req){//request
        // $student= array(

        //     "name" => $req->name,
        //     "id" => $req->id,
        //     "dob" => $req->dob
        // );
        // $student = (object)$student;
        // $cg=3.59;
        // return var_dump($student);
        if(!$req->session()->get('user')){
            return redirect()->route('login');
        }
        $student =Student::where('id','=', decrypt($req->id))
        ->select('name', 'id', 'phone', 'uid') //select option
        ->first(); //only take one object. Otherwise "get" will take array of objects. if result is only one first is better. for multiple rows get is needed.
        // return $student;
        return view('student.get')->with('std', $student);
        // ->with('cg', $cg);
    }
    public function list(){
        // $students=[];
        // for($i=0; $i<=10; $i++){
        //     $date = new DateTime();
        //     $date=$date->format('d/m/Y H:i:s');
        //     $student = array(
        //         "name"=>"Student $i",
        //         "id"=>$i,
        //         "dob"=>$date
        //     );
        //     $students[]=(object)$student;

        // }

             $students=Student::all();//select * from students
             
            //$students=Student::where('cgpa', '>', '3.5') //multiple where
            // ->where('dept', '=', 'cs') // where dept='cs'
            //->get();


// return $students;
        return view('student.list')
        ->with('students', $students);
    }
    // public function st_head(){
    //     // $categories=Category::all();
    //     $students=Student::all();
    //     return view('student.head');
    // }
}
