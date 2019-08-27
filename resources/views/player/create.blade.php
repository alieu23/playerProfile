@extends('player.base')

@section('main')
<div class="row" style="margin-top:60px;">

<div class="col-sm-6">
 <ul class="">

 </div>
 
<div class="col-sm-6">
<h2>Player Registeration Form</h2>
@if($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif
<form action="{{route('player.store')}}" enctype="multipart/form-data"
 method="post">
   @csrf 
   <div class="form-group">
   <label for="firstname">First Name</label>
   <input type="text" name="firstname" class='form-control input-lg'>
   </div>
  
   <div class="form-group">
   <label for="lastname">Last Name</label>
   <input type="text" name="lastname" class='form-control input-lg'>
   </div>

   <div class="form-group">
   <label for="image">Profile Picture</label>
   <input type="file" name="image" class="form-control">
   </div>
  
   <div class="form-group">
   <label for="address">Address</label>
   <input type="text" name="address" class='form-control input-lg'>
   </div>

   <div class="form-group">
   <label for="phone">Phone</label>
   <input type="phone" name="phone" class='form-control input-lg'>
   </div>
  
   <div class="form-group">
   <label for="dob">Date of Birth</label>
   <input type="date" name="dob" class='form-control input-lg'>
   </div>

   <div class="form-group">
   <label for="position">Position</label>
   <select name="position" class="form-control">
   <option value="Goal Keeper">Goal Keeper</option>
   <option value="Central Defender">Defender</option>
   <option value="midfielder">Midfielder</option>
   <option value="winger">Winger</option>
   <option value="striker">Striker</option>
   
   </select>
   </div>

   <div class="form-group">
   <label for="height">Heigth</label>
   <input type="text" name="height" class='form-control input-lg'>
   </div>
  
   <div>
    <input type="submit" value="Add Player" name="add" 
    class="btn btn-primary input-lg">
   </div>
   
 </form>
 </div>
 
 </div>
@endsection