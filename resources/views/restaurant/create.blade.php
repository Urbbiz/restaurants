@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create New Restaurant</div>

               <div class="card-body">
                 <form method="POST" action="{{route('restaurant.store')}}">
                    <div class="form-group">
                        <label>Title: </label>
                        <input type="text" class="form-control" name="restaurant_title" value="{{old('restaurant_title')}}">
                        <small class="form-text text-muted">Please enter new restaurant title.</small>
                    </div>
                    
                    <div class="form-group">
                        <label>Customers: </label>
                        <input type="text" class="form-control" name="restaurant_customers" value="{{old('restaurant_customers')}}" >
                        <small class="form-text text-muted">Please enter new restaurant customers.</small>
                    </div>

                    <div class="form-group">
                        <label>Employees: </label>
                        <input type="text" class="form-control" name="restaurant_employees" value="{{old('restaurant_employees')}}" >
                        <small class="form-text text-muted">Please enter new restaurant employees.</small>
                    </div>


                     <div class="form-group">
                        <label>Menu: </label>
                        <select name="menu_id">
                            @foreach ($menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->title}}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Please please select Menu.</small>
                    </div>
                     @csrf
                     <button class="btn btn-primary" type="submit">ADD</button>
                  </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
