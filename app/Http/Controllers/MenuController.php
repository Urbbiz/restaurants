<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Validator;

class MenuController extends Controller
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

    public function index(Request $request)
    {

         // $restaurant = $request->sort ? Restaurant::orderBy('title')->get() : Restaurant::all();
         if ('title' == $request->sort) {
            $menus = Menu::orderBy('title')->get();
        }
        elseif ('weight' == $request->sort) {
            $menus = Menu::orderBy('weight')->get();
        }
        else {
            $menus = Menu::all();
            $menus= $menus ->sortBy('price') ;
           
        }
        // $restaurant = Restaurant::all();
        // $restaurant = Restaurant::orderBy('title')->get();
        return view('menu.index', ['menus' => $menus]);
    }

    // public function index()
    // {
    //     $menus = Menu::all();
    //     return view('menu.index', ['menus' => $menus]);
 
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('menu.create', ['menus' => $menus]);
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
           'menu_title' => ['required','regex:/^[A-Z][a-zA-z\s\'\-]*[a-z]$/', 'min:3', 'max:150'],
           'menu_price' => ['required', 'numeric', 'min:0','max:200000'],
           'menu_weight' => ['required','numeric', 'min:0', 'max:100000'], 
           'menu_meat' => ['required','numeric','lt:menu_weight', 'min:0', 'max:100000'],
           'menu_about' => ['required', 'min:3', 'max:2000'],
           
             ],
             [

             ]
            
       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }
      

        $menu = new Menu;
       $menu->title = $request->menu_title;
       $menu->price = $request->menu_price;
       $menu->weight = $request->menu_weight;
       $menu->meat = $request->menu_meat;
       $menu->about = $request->menu_about;
       $menu->save();
       return redirect()->route('menu.index')->with('success_message', 'Menu created!');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        // $menu = Menu::all();
        return view('menu.edit', ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $validator = Validator::make(
            $request->all(),
             [
           'menu_title' => ['required','regex:/^[A-Z][a-zA-z\s\'\-]*[a-z]$/', 'min:3', 'max:150'],
           'menu_price' => ['required', 'numeric', 'min:0','max:200000'],
           'menu_weight' => ['required','numeric', 'min:0', 'max:100000'], 
           'menu_meat' => ['required','numeric','lt:menu_weight', 'min:0', 'max:100000'],
           'menu_about' => ['required', 'min:3', 'max:2000'],
           
             ],
             [

             ]
            
       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }
      

        
       $menu->title = $request->menu_title;
       $menu->price = $request->menu_price;
       $menu->weight = $request->menu_weight;
       $menu->meat = $request->menu_meat;
       $menu->about = $request->menu_about;
       $menu->save();
       return redirect()->route('menu.index')->with('success_message', 'Menu updated!');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if($menu->menuRestaurant->count() !==0){
            // return 'Trinti negalima, nes turi knygų';
            return redirect()->back()->with('info_message', 'Cannot delete menu, because it linked to restaurant');
        }
        $menu->delete();
        return redirect()->route('menu.index')->with('success_message', 'Menu deleted!');
    
    }
}
