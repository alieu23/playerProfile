@extends('player.base')

@section('main')
<div align="right">
    <a href="{{route('player.index')}}" class="btn btn-default">Back</a>
  </div>
<div class="jumbotron" align="center">
  
  <br>
  <img src="{{URL::to('/')}}/images/{{$data->image}}" class="img-thumbnail" style="width:200px;">
  <p>Name: {{ $data->firstname }} {{ $data->lastname }}</p>  

  <p>DoB: {{ $data->dob }}</p>
  <p>Address: {{ $data->address }}</p>
  <p>DoB: {{ $data->phone }}</p>
  <p>DoB: {{ $data->dob }}</p>
  <p>DoB: {{ $data->height }} m</p>
</div>
@endsection