@extends('layouts.app')
@section('content')
<div class="wrapper create-pizza">
    <h1>Create a New Pizza</h1>
    <form action="/pizzas" method="POST">
        @csrf
        <label>Yuor name:</label>
        <input type="text" id="name" name="name">
        <label>choose pizza type:</label>
        <select name="type" id="type"> 
            <option value="margarita">Margarita</option>
            <option value="hawaiian">Hawaiian</option>
            <option value="veg Supreme">Veg Supreme</option>
            <option value="volcano">Volcano</option>
        </select>
        <label for="base">Choose crust:</label>
        <select name="base" id="base">
          <option value="thick">Thick</option>
          <option value="thin & crispy">Thin & Crispy</option>
          <option value="cheese crust">Cheese Crust</option>
          <option value="garlic crust">Garlic Crust</option>
        </select>
        <fieldset>
            <label>Extratoppings</label>
            <input type="checkbox" name="toppings[]" value="mushrooms">Mushrooms<br />
            <input type="checkbox" name="toppings[]" value="peppers">Peppers<br />
            <input type="checkbox" name="toppings[]" value="garlic">Garlic<br />
            <input type="checkbox" name="toppings[]" value="olives">Olives<br />
        </fieldset>
        <input type="submit" value="Order Pizza">
    </form>
</div>
@endsection