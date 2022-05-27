<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class LessonController extends Controller
{
    public function show($id){

        $students = Student::find($id);
        return view('lesson.show', [
            'name'=>$students['name'],
            'lessons'=>$students->lessons,
            'title'=> 'Уроки',
            'meta'=>'meta http-equiv="Content-Type" content="text/html;charset=UTF-8"',
        ]);
    }
}
