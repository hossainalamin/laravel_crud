<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Student;

class StudentController extends Controller
{
    public function index(){
        $student = Student::SimplePaginate(5);
        return view('index',["data" => $student]);
    }
    public function add(Request $req){
        $req->validate([
            "name"   => "required | max:100",
            "course" => "required | min:5",
            "fee"    => "required | min:3"
        ]);
        $object = new Student();
        $object->name = $req->name;
        $object->course = $req->course;
        $object->fee = $req->fee;
        if($object->save()){
            return redirect("student")->with('data','Record saved');
        }else{
            return view("add");
        }   
    }
    public function getById($id){
        $student_id = Student::find($id);
        return view("edit",["data"=>$student_id]);
    }
    public function update(Request $req){
        $student_id = Student::find($req->id);
        $req->validate([
            "name"   => "required | max:100",
            "course" => "required | min:5",
            "fee"    => "required | min:3"
        ]);
        $student_id->name   = $req->name;
        $student_id->course = $req->course;
        $student_id->fee    = $req->fee;
        if($student_id->save()){
            return redirect("student")->with('data','Record updated');
        }
    }
}
