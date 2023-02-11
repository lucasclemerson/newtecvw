<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;
use App\Models\Category;


class CarsController extends Controller
{

    // views
    
    public function index(){
        $cars = Car::all()->sortBy('name');
        $search = request('search');

        if ($search)
        {
            $cars = Car::where([
                ['name', 'like', '%'.$search.'%']
            ])->get();
            $cars->sortBy('name');
        }
        return view('home', ['cars'=>$cars, 'search'=>$search]);
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


    //functions

    public function destroy ($id){
        $user = auth()->user();
        $car = Car::findOrFail($id);
        
        if ($user->id != $car->user->id){
            return redirect('/dashboard')->with('msg', 'Você não pode deletar esse carro, pois você não é o criador do mesmo!');
        }else{
            $car->delete();
            return redirect('/dashboard')->with('msg', 'Seu carro foi excluido com sucesso!');
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
