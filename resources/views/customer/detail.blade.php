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
      <div class="col-md-12">
        <a href="{{route('customer.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
    <div class="row">

     <p>{{$customer->repair}}</p> 

    </div>

  </div>
@endsection
