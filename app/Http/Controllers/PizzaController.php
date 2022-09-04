<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index(){
        // get data from a database
        $pizzas = [
            ['type' => 'hawaiian', 'base' => 'cheesy crust'],
            ['type' => 'volcano', 'base' => 'garlic crust'],
            ['type' => 'veg supreme', 'base' => 'thin & crispy']
        ];

        //grab the variable from url string and assign it to $name var
        $name = request('name');

        return view('pizzas', [ //take array and variables and send it to pizzas view(page)
            'pizzas' => $pizzas,
            'name' => $name, //way #1 
            'age' => request('age') //way #2
        ]);
    }

    public function show($id){
        //use the $id variable to query the db for a record
        return view('details', ['id' => $id]);
    }
}
