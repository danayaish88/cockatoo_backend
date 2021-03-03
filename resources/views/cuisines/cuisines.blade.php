@extends('layouts.app')


@section('content')

    <form action = "{{ route('save_cuisine') }}" method = "post">
    @csrf

  <div class="form-group row mt-4">
    <label for="sight_name" class="col-md-2 col-form-label"> Name</label>
    <div class="col-md-8">
      <input type="text" class="form-control" id="name" placeholder="Name" name= "name" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="sight_country" class="col-md-2 col-form-label"></label>
    <div class="col-md-8">
    <button type ="submit" class= "btn btn-primary">Save Cuisine</button>
    </div>
  </div>



    </form>

<div class= "row">
    @foreach ($cuisines as $cuisine)
    <div class = "col-md-3 mt-2 mb-2 " >
        <div class="card">
             <div class="card-body">
             {{$cuisine -> name}}
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection