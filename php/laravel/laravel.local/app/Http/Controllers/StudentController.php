<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;

class StudentController extends Controller
{
    public function show(){
        $lessons = Lesson::find(3);
        dump($lessons['lesson']);
        $students = $lessons->students;
        foreach ($students as $student){
            dump($student['name']);
        }
    }
}
