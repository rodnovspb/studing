<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        DB::transaction(function (){
            try {
                DB::update("UPDATE posts SET created_at = ? WHERE created_at IS NULL", [NOW()]);
                DB::update("UPDATE posts SET updated_at = ? WHERE updated_at IS NULL", [NOW()]);

            } catch (\Exception $e) {
                DB::rollBack();
                echo $e->getMessage();
            }
        });


    }

    public function test()
    {
        return __METHOD__;
    }


}
