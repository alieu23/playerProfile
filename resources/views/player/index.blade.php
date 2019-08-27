@extends('player.base')

@section('main')
<div align="right">
<a href="{{route('player.create')}}" class="btn btn-success btn-sm">
Add New Player</a>
</div>
@if($message = Session::get('success'))
<div class="alert alert-success">
<p>{{$message}}</p>
</div>
@endif
<table class="table table-striped table-bordered">
<tr>
<th width="10%">Image</th>
<th width="35%">First Name</th>
<th width="35%">Last Name</th>
<th width="30%">Action</th>
</tr>
@foreach($data as $row)
<tr>
<td><img src="{{URL::to('/')}}/images/{{$row->image}}" class="img-thumbnail" 
width="75" alt="profile image"></td>
<td>{{$row->firstname}}</td>
<td>{{$row->lastname}}</td>
<td>
  <a href="{{route('player.show', $row->id)}}" class="btn btn-primary">View</a>
  <a href="{{route('player.edit', $row->id)}}" class="btn btn-warning">Edit</a>
  <form action="{{route('player.destroy', $row->id)}}" method="post" style="display:inline">
  @csrf
  @method('DELETE')
  <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?');">Delete</button>

  </form>
</td>
</tr>
@endforeach
</table>
{!!$data->links()!!}
@endsection