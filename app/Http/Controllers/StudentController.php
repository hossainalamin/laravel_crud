<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Student;

class StudentController extends Controller
{
    public function index(){
        $student = Student::paginate(5);
        return view('index',["data" => $student]);
    }
}
