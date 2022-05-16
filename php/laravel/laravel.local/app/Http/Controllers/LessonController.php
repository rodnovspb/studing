<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class LessonController extends Controller
{
    public function show(){
        $students = Student::find(6);
        dump($students['name']);
        foreach ($students->lessons as $lesson){
            dump($lesson['lesson']);
        }
    }
}
