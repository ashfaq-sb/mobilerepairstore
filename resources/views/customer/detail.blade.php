@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Customer Details</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <strong> Name : </strong> {{ $customer->fname }} {{ $customer->lname }}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Address : </strong> {{ $customer->address }}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Phone : </strong> {{ $customer->phone }}
        </div>
      </div>
     
    </div>
    <hr>
    <div class="row">
         
    <h1> Device Information</h1>
    <table class="table table-hover table-sm">
      <tr>
        <th width = "50px"><b>No.</b></th>
        <th >Brand</th>
        <th>Model</th>
        <th>IMEI</th>
        <th>Type</th>
        <th>Description</th>
        <th>Status</th>
        <th width = "180px">Action</th>
      </tr>

      @foreach ($customer->repair as $repair)
        <tr>
          <td><b>{{$repair->id}}.</b></td>
          <td>{{$repair->brand}}</td>
          <td>{{$repair->model}}</td>
          <td>{{$repair->imei}}</td>
          <td>{{$repair->type}}</td>
          <td>{{$repair->discription}}</td>
          <td>
          @if($repair->status === 1 )
          <div class="alert alert-success" role="alert">
            Done
          </div>
          @else
          <div class="alert alert-danger" role="alert">
            Pending
          </div>
        </td>
          @endif
          <td>
              <a class="btn btn-sm btn-success" href="{{route('repair.show',$repair->id)}}">Show</a>
          </td>
        </tr>
      @endforeach
    </table>
      
       <div class="col-md-12">
        <a href="{{route('customer.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>

  </div>
@endsection
