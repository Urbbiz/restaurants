@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Add new menu</div>
               <div class="card-body">
                <form method="POST" action="{{route('menu.store')}}">
                <div class="form-group">
                        <label>Title: </label>
                        <input type="text" class="form-control" name="menu_title" value="{{old('menu_title')}}">
                        <small class="form-text text-muted">Please enter menu title.</small>
                    </div>
                    <div class="form-group">
                        <label>Price : </label>
                        <input type="text" class="form-control" name="menu_price"  value="{{old('menu_price')}}">
                        <small class="form-text text-muted">Please enter menu price.</small>
                    </div>
                    <div class="form-group">
                        <label>Weight : </label>
                        <input type="text" class="form-control" name="menu_weight"  value="{{old('menu_weight')}}">
                        <small class="form-text text-muted">Please enter menu wight.</small>
                    </div>
                     <div class="form-group">
                        <label>Meat : </label>
                        <input type="text" class="form-control" name="menu_meat"  value="{{old('menu_meat')}}">
                        <small class="form-text text-muted">Please enter menu meat.</small>
                    </div>
                    <div class="form-group">
                        <label>About </label>
                        <textarea name="menu_about"  id="summernote">{{old('menu_about')}} </textarea>
                        <small class="form-text text-muted">About this menu.</small>
                    </div>
                    @csrf
                    <button class="btn btn-primary" type="submit">ADD</button>
                    </form>
               </div>
           </div>
       </div>
   </div>
</div>
<script>
$(document).ready(function() {
   $('#summernote').summernote();
 });
</script>

@endsection