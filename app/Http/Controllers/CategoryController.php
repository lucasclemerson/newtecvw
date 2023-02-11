<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
    public function categorys(){
        $categories = Category::all();
        return view ('category.dashboard', ['categories'=>$categories]);
    }

    public function create (){
        return view ('category.create');
    }

    //functions 

    public function store (Request $request){
        $category = new Category;
        $category = $request->name;
        $category->save();
       

        /*
        return redirect('/categorys')->with('msg', 'Sua categoria foi criada com sucesso!');
        */
    }
}
