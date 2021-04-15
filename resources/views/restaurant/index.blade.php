@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                    <h2>Resaurants List</h2>
                    {{-- <div class="make-inline">
                        <form action="{{route('restaurant.index')}}" method="get" class="make-inline ">
                            <div class="form-group make-inline">
                                <label>Menus: </label>
                                <select class="form-control" name="menu_id">
                                    <option value="0" disabled @if($filterBy==0) selected @endif>Select menu</option>
                                    @foreach ($menus as $menu)
                                    <option value="{{$menu->id}}" @if($filterBy==$menu->id) selected @endif>
                                        {{$menu->title}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group make-inline column">
                                <label class="form-check label" for="sortASC">sort ASC</label>
                                <input type="radio" class="form-check-input" name="sort" value="asc" id="sortASC" @if($sortBy=='asc' ) checked @endif>
                            </div>
                            <div class="form-group make-inline column">
                                <label class="form-check label" for="sortDESC">sort DESC</label>
                                <input type="radio" class="form-check-input" name="sort" value="desc" id="sortDESC" @if($sortBy=='desc' ) checked @endif>
                            </div>

                            <button type="submit" class="btn btn-info">Filter</button>
                        </form>

                        <a href="{{route('restaurant.index')}}" class="btn btn-info">Clear filter</a>
                    </div> --}}




                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($restaurants  as $restaurant) 
                        {{-- @foreach ($restaurants = $restaurants ->sortBy('surname') as $restaurant) (sita dedam, vietoj virsutinio, jeigu iskrt norim sortint) --}}
                        <li class="list-group-item list-line">
                            <div class="list-line__books">
                                <div class="list-line__books__title">
                                   <h4> {{$restaurant->title}} </h4>
                                </div>
                                <div class="list-line__books__author">
                                   Menu  {{$restaurant->restaurantMenu->title}} 
                                </div>
                            </div>
                            <div class="list-line__buttons">
                                <a href="{{route('restaurant.edit',[$restaurant])}}" class="btn btn-info">EDIT</a>
                                <form method="POST" action="{{route('restaurant.destroy', [$restaurant])}}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                </form>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
