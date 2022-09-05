<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
    //this method used to protected all routs 
    // public function _construct(){
    //     $this->middleware('auth');
    // }
    public function index(){
        // get data from a database - SELECT QUERY
        // $pizzas = Pizza::all();
        // $pizzas = Pizza::orderBy('name','desc')->get();
        //$pizzas = Pizza::where('type','Hawaiian ')->get();
        $pizzas = Pizza::latest()->get();

        return view('pizzas.index', [ //take array and variables and send it to pizzas view(page)
            'pizzas' => $pizzas
        ]);
    }

    public function show($id){
        $pizza = Pizza::findOrFail($id); //SELECT * FROM pizzahouse WHERE id=$id -> if no result show 404 Error
        
        //use the $id variable to query the db for a record
        return view('pizzas.show', ['pizza' => $pizza]);
    }

    public function create(){
        return view('pizzas.create');
    }

    public function store(){
        $pizza = new Pizza();
        //get data from the form and assign it to each property
        $pizza->name = request('name');
        $pizza->type = request('type');
        $pizza->base = request('base');
        $pizza->toppings = request('toppings');

        $pizza->save(); //INSERT INTO pizzas VALUES('name','type','base');
        
        return redirect('/')->with('msg','Thanks for your order');
    }

    public function destroy($id){
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();
        return redirect('/pizzas');
    }
}
