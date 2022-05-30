<?php

namespace App\View\Components\Other;

use Illuminate\View\Component;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class Menu extends Component
{
    public  $class;
    public $id;


    public function __construct($class, $id)
    {
        $this->class = $class;
        $this->id = $id;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $posts = DB::table('posts')
            ->orderBy('likes', 'desc')
            ->limit(5)
            ->get();
        $categories = Category::all();
        return view('components.other.menu', [
            'categories' => $categories,
            'posts'=> $posts,
        ]);
    }
}
