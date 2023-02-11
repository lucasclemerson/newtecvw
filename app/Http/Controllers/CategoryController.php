<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Car;

class CategoryController extends Controller
{
    
    public function categorys(){
        $categories = Category::all();
        return view ('category.dashboard', ['categories'=>$categories]);
    }

    public function create (){
        return view ('category.create');
    }

    public function edit ($id){
        $category = Category::findOrFail($id);
        return view ('category.edit', ['category'=>$category]);
    }

    //functions 

    public function update(Request $request){
        $data = $request->all();
        Category::findOrFail($request->id)->update($data);
        return redirect('/categorys')->with('msg', 'Sua categoria foi alterado com sucesso!');
    }

    public function store (Request $request){
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return redirect('/categorys')->with('msg', 'Sua categoria foi criada com sucesso!');
    }

    public function destroy ($id){
        $cars_with_category = Car::where('category_id', $id)->get();
        if (count($cars_with_category) > 0){
            return redirect('/categorys')->with('msg', 'Sua categoria possui carros vinculados, melhor não apagar!');  
        }else{
            $category = Category::where('id', $id)->delete();
            return redirect('/categorys')->with('msg', 'Sua categoria foi deletada com sucesso!');
        }
    }
}
