@extends('home')
   @section('content')

   <div class="container">
    
    <div class="card">
      <div class="card-header">
      <p class="card-text">Create Service</p>
      </div>
      <div class="card-body" style="background-color: #bce2ff;">
        <h4 class="card-title"> </h4>
     
        
        <form action="{{route('services.store')}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

    
    
    
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control"name="name" >
      </div>
      <div class="form-group">

                                    <p class="h-blue">{{__('Doctor')}}</p>
                                    <select class="border-0 outline-none" name="doctor_name">
                                         @foreach ($doctors as $item )

                                        <option value="{{ $item->name }}"  >
                                            {{$item->name}}</option>

                                        @endforeach
                                    </select>
                                </div>


    
      <div class="form-group">
        <label for="cost">Cost</label>
        <input type="number" class="form-control"name="cost" >
      </div>
      <button type="submit" class="btn btn-primary">Create Service</button>
    </form>
    
      </div>
      <div class="card-footer text-muted">
        Footer
      </div>
    </div>
    
    

@endsection
