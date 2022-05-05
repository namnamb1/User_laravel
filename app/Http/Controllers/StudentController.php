<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $list = Student::all();
        return view('student.index', compact('list'));
    }
}
