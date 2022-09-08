<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RobotController extends Controller
{
    public function index()
    {
        return view('robots.index');
    }


    public function create()
    {
        return view('robots.create');
    }


    public function store(Request $request)
    {
        $robot = $request->input('robot');
        return "Робот $robot создан и отправлен в базу";
    }


    public function show($id)
    {
        return "Функция show показывает робота с id номер $id";
    }


    public function edit($id)
    {
        return view('robots.edit', ['id'=> $id]);
    }


    public function update(Request $request, $id)
    {
        return "Робот $id принят и обновлен в базе";
    }


    public function destroy($id)
    {
        return "Робот $id удален";
    }
}
