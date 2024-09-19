@extends('adminlte::page')



@section('content')






<div class="col-md-12">

    <div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Create Now </h3>
    </div>
    
    
    <form id="quickForm" novalidate="novalidate">
    <div class="card-body">
    <div class="form-group">
    <label for="exampleInputEmail1">Create New</label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Create New">
    </div>
    <div class="form-group">
        <label>Priority</label>
        <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="25" tabindex="-1" aria-hidden="true">
        <option disabled="disabled" data-select2-id="49">California (disabled)</option>
        <option data-select2-id="50">High</option>
        <option data-select2-id="51">Medium</option>
        <option data-select2-id="52">Low</option>
    </div>

   
    {{-- <form action="#"> --}}
        <h1>dat ands </h1>
        <label for="datetime">Choose date and time:</label><br>
        <input type="datetime-local" id="datetime" name="datetime"><br><br>
       
    {{-- </form> --}}
    <script>
        // This is to prevent selecting a past date and time
        const datetimeInput = document.getElementById('datetime');
        const now = new Date().toISOString().slice(0, 16);
        datetimeInput.min = now;
    </script>






     
    <div class="form-group mb-0">
    <div class="custom-control custom-checkbox">
    <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
    {{-- <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label> --}}
    </div>
    </div>
    </div>
    
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>
    
    </div>









@stop