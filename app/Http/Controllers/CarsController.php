<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;
use App\Models\Category;

use Illuminate\Support\Facades\DB;


class CarsController extends Controller
{

    // views
    public function index(){
        $cars = Car::all()->sortBy('name');
        $categories = DB::table('categories')->offset(0)->limit(4)->get();    
        $search = request('search');      
        $category = request('category');   
        $cars_news = Car::where('category_id', Category::where('name', 'Hatch')->first()->id)->get(); 
      
        //search for name
        if ($search){
            $cars = Car::where('name', 'like','%'.$search.'%')->get();
        }
        else if ($category){
            $cars = Car::where('category_id', $category)->get();
        }
    
        return view('home', ['cars'=>$cars, 'cars_news'=>$cars_news, 'search'=>$search, 'category'=>$category, 'categories'=>$categories]);
    }

    public function cars (){
        $cars = Car::all();
        $criadores = array();
        foreach($cars as $car){
            array_push($criadores, User::where('id', $car->user_id)->first()->toArray()['name']);
        }
        return view('cars.dashboard', ['cars'=>$cars, 'criadores'=>$criadores]);
    }

    public function create (){
        $categories = Category::all();
        return view('cars.create', ['categories'=>$categories]);
    }

    public function edit ($id){
        $categories = Category::all();
        $car = Car::findOrFail($id);
        return view ('cars.edit', ['car'=>$car, 'categories'=>$categories]);
    }



    //functions

    public function update (Request $request){
        $data = $request->all();
        //image upload
        if ($request->hasfile('image') && $request->file('image')->isValid()){
            $extension = $request->image->extension();
            $name = md5($request->image->getClientOriginalName().strtotime('now') . '.' . $extension);
            $request->image->move(public_path('img/carros'), $name);
            $data['image'] = $name;
        }
     

        Car::findOrFail($request->id)->update($data);
        return redirect('/cars')->with('msg', 'Seu carro foi alterado com sucesso!');
    }

    public function destroy ($id){
        $user = auth()->user();
        $car = Car::findOrFail($id);
        
        if ($user->id != $car->user->id){
            return redirect('/cars')->with('msg', 'Você não pode deletar esse carro, pois você não é o criador do mesmo!');
        }else{
            $car->delete();
            return redirect('/cars')->with('msg', 'Seu carro foi excluido com sucesso!');
        }
    }

    public function store (Request $request){
        $car = new Car;
        $car->user_id = auth()->user()->id;
        $car->name = $request->name;
        $car->category_id = $request->category;
        $car->last_update = date('Y-m-d h:m:s');

        //image upload
        if ($request->hasfile('image') && $request->file('image')->isValid()){
            $extension = $request->image->extension();
            $name = md5($request->image->getClientOriginalName().strtotime('now') . '.' . $extension);
            $request->image->move(public_path('img/carros'), $name);
            $car->image = $name;
        }
        $car->save();
        return redirect('/cars')->with('msg', 'Seu carro foi criado com sucesso!');
    }


}
