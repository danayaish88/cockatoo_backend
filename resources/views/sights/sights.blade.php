@extends('layouts.app')


@section('content')

    <form action = "{{ route('save-sight') }}" method = "post">
    @csrf

  <div class="form-group row mt-4">
    <label for="sight_name" class="col-md-2 col-form-label"> Name</label>
    <div class="col-md-8">
      <input type="text" class="form-control" id="sight_name" placeholder="Name" name= "sight_name" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="sight_city" class="col-md-2 col-form-label"> City</label>
    <div class="col-md-8">
      <input type="text" class="form-control" id="sight_city" placeholder="City" name = "sight_city" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="sight_country" class="col-md-2 col-form-label"> Country</label>
    <div class="col-md-8">
      <input type="text" class="form-control" id="sight_country" placeholder="Country" name = "sight_country" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="sight_country" class="col-md-2 col-form-label"></label>
    <div class="col-md-8">
    <button type ="submit" class= "btn btn-primary">Save Sight</button>
    </div>
  </div>



    </form>



<div class= "row">
    @foreach ($sights as $sight)
    <div class = "col-md-3 mt-2 mb-2 " >
        <div class="card">
             <div class="card-body">
             {{$sight -> name}}
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection