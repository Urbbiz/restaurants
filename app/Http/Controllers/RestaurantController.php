<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Menu;
use Illuminate\Http\Request;
use Validator;

class RestaurantController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('restaurant.index', ['restaurants' => $restaurants]);
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('restaurant.create');
        $menus = Menu::orderBy('title')->get();
        return view('restaurant.create', ['menus' => $menus->sortBy('title')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
             [
           'restaurant_title' => ['required','regex:/^[\pL\s\-]+$/u', 'min:3', 'max:100'],
           'restaurant_customers' => ['required', 'numeric', 'min:0','max:1000'],
           'restaurant_employees' => ['required', 'numeric', 'min:0','max:1000'],
           'menu_id' => ['required',],
            ],
            [
            'restaurant_title.required' => 'Title cannot be empty!',
            'restaurant_title.required' => 'Title cannot be empty',
            'restaurant_title.regex' => 'be kableliu',
            ]
       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }

        $restaurant = new Restaurant;
    $restaurant->title = $request->restaurant_title;
    $restaurant->customers = $request->restaurant_customers;
    $restaurant->employees = $request->restaurant_employees;
    $restaurant->menu_id = $request->menu_id;
    $restaurant->save();
    return redirect()->route('restaurant.index')->with('success_message', 'New restaurant added!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        // return view('restaurant.edit', ['restaurant' => $restaurant]);

        $menus = Menu::orderBy('title')->get();
        return view('restaurant.edit', ['restaurant' => $restaurant,'menus' => $menus->sortBy('title')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $validator = Validator::make(
            $request->all(),
             [
           'restaurant_title' => ['required','regex:/^[\pL\s\-]+$/u', 'min:3', 'max:100'],
           'restaurant_customers' => ['required', 'numeric', 'min:0','max:1000'],
           'restaurant_employees' => ['required', 'numeric', 'min:0','max:1000'],
           'menu_id' => ['required',],
            ],
            [
            'restaurant_title.required' => 'Title cannot be empty!',
            'restaurant_title.required' => 'Title cannot be empty',
            'restaurant_title.regex' => 'be kableliu',
            ]
       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }

        
    $restaurant->title = $request->restaurant_title;
    $restaurant->customers = $request->restaurant_customers;
    $restaurant->employees = $request->restaurant_employees;
    $restaurant->menu_id = $request->menu_id;
    $restaurant->save();
    return redirect()->route('restaurant.index')->with('success_message', 'New restaurant added!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
