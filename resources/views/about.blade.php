<<<<<<< HEAD
@extends('adminlte::page') @section('content') 
<section class="content pb-3">
  <div class="container-fluid h-100">
    <div class="card card-row card-secondary">
      <div class="card-header">
        <h3 class="card-title"> Backlog </h3>
      </div>
      <div class="card-body">
        <div class="card card-info card-outline">
          <div class="card-header">
            <h5 class="card-title">Create Labels</h5>
            <div class="card-tools">
              <a href="#" class="btn btn-tool btn-link">#3</a>
              <a href="#" class="btn btn-tool">
                <i class="fas fa-pen"></i>
              </a>
            </div>
          </div>
          <div class="card-body">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="customCheckbox1" disabled="">
              <label for="customCheckbox1" class="custom-control-label">Bug</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="customCheckbox2" disabled="">
              <label for="customCheckbox2" class="custom-control-label">Feature</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="customCheckbox3" disabled="">
              <label for="customCheckbox3" class="custom-control-label">Enhancement</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="customCheckbox4" disabled="">
              <label for="customCheckbox4" class="custom-control-label">Documentation</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="customCheckbox5" disabled="">
              <label for="customCheckbox5" class="custom-control-label">Examples</label>
            </div>
          </div>
        </div>
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="card-title">Create Issue template</h5>
            <div class="card-tools">
              <a href="#" class="btn btn-tool btn-link">#4</a>
              <a href="#" class="btn btn-tool">
                <i class="fas fa-pen"></i>
              </a>
            </div>
          </div>
          <div class="card-body">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="customCheckbox1_1" disabled="">
              <label for="customCheckbox1_1" class="custom-control-label">Bug Report</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="customCheckbox1_2" disabled="">
              <label for="customCheckbox1_2" class="custom-control-label">Feature Request</label>
            </div>
          </div>
        </div>
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="card-title">Create PR template</h5>
            <div class="card-tools">
              <a href="#" class="btn btn-tool btn-link">#6</a>
              <a href="#" class="btn btn-tool">
                <i class="fas fa-pen"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="card card-light card-outline">
          <div class="card-header">
            <h5 class="card-title">Create Actions</h5>
            <div class="card-tools">
              <a href="#" class="btn btn-tool btn-link">#7</a>
              <a href="#" class="btn btn-tool">
                <i class="fas fa-pen"></i>
              </a>
            </div>
          </div>
          <div class="card-body">
            <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
          </div>
        </div>
      </div>
    </div>
    <div class="card card-row card-primary">
      <div class="card-header">
        <h3 class="card-title"> To Do </h3>
      </div>
      <div class="card-body">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="card-title">Create first milestone</h5>
            <div class="card-tools">
              <a href="#" class="btn btn-tool btn-link">#5</a>
              <a href="#" class="btn btn-tool">
                <i class="fas fa-pen"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card card-row card-default">
      <div class="card-header bg-info">
        <h3 class="card-title"> In Progress </h3>
      </div>
      <div class="card-body">
        <div class="card card-light card-outline">
          <div class="card-header">
            <h5 class="card-title">Update Readme</h5>
            <div class="card-tools">
              <a href="#" class="btn btn-tool btn-link">#2</a>
              <a href="#" class="btn btn-tool">
                <i class="fas fa-pen"></i>
              </a>
            </div>
          </div>
          <div class="card-body">
            <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
          </div>
        </div>
      </div>
    </div>
    <div class="card card-row card-success">
      <div class="card-header">
        <h3 class="card-title"> Done </h3>
      </div>
      <div class="card-body">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="card-title">Create repo</h5>
            <div class="card-tools">
              <a href="#" class="btn btn-tool btn-link">#1</a>
              <a href="#" class="btn btn-tool">
                <i class="fas fa-pen"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> 
=======
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









>>>>>>> 3fd06a7bb8280ccdcb205334db1c4777cccb23e0
@stop