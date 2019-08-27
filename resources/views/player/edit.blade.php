@extends('player.base')

@section('main')
<div align="right">
<a href="{{route('player.index')}}" class="btn btn-default">Back</a>
</div>
<br>
<form action="{{route('player.update', $data->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method('PATCH')

<div class="form-group">
  <label for="firstname" class="col-md-4 text-right">First Name</label>
  <div class="col-md-8">
    <input type="text" name="firstname" value="{{$data->firstname}}" class="form-control input-lg">
  </div>
</div>

<div class="form-group">
  <label for="lastname" class="col-md-4 text-right">Last Name</label>
  <div class="col-md-8">
    <input type="text" name="lastname" value="{{$data->lastname}}" class="form-control input-lg">
  </div>
</div>

<div class="col-md-8">
    <input type="file" name="image" >
    <img src="{{URL::to('/')}}/images/{{$data->image}}" class="img-thumbnail" width="100">
    <input type="hidden" name="hidden_image" value="{{$data->image}}">

</div>

<div class="form-group">
  <label for="address" class="col-md-4 text-right">Address</label>
  <div class="col-md-8">
    <input type="text" name="address" value="{{$data->address}}" class="form-control input-lg">
  </div>
</div>

<div class="form-group">
  <label for="phone" class="col-md-4 text-right">Phone</label>
  <div class="col-md-8">
    <input type="text" name="phone" value="{{$data->phone}}" class="form-control input-lg">
  </div>
</div>

<div class="form-group">
  <label for="dob" class="col-md-4 text-right">Date of Birth</label>
  <div class="col-md-8">
    <input type="date" name="dob" value="{{$data->dob}}" class="form-control input-lg">
  </div>
</div>

<div class="form-group">
   <label for="position">Position</label>
   <select name="position" class="form-control input-lg col-md-8" value="{{$data->position}}">
   <option value="Goal Keeper">Goal Keeper</option>
   <option value="Central Defender">Central Defender</option>
   </select>
   </div>

   <div class="form-group">
  <label for="height" class="col-md-4 text-right">Height</label>
  <div class="col-md-8">
    <input type="text" name="height" value="{{$data->height}}" class="form-control input-lg">
  </div>
</div>
<br> <br> 
<div class="form-group text-center">
   <input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit">
</div>
</form>

@endsection