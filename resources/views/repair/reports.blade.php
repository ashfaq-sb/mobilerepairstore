@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2>View Reports</h2>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> there where some problems with your input.<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

       <form method="POST" action="{{route('repair.reports')}}">
       @csrf
      <div class="row">
        <div class="col-md-12">
          <label>From : <input type="text/submit/hidden/button/etc" class="form-control" name="from" value="" id="datepicker"></label>
          <label>To : <input type="text/submit/hidden/button/etc" class="form-control"name="to" value="" id="datepicker2"></label>
          <label>Total Price : <input type="text/submit/hidden/button/etc" class="form-control" name="price" value="£{{$price}}"></label>

          <label>
      <input type="checkbox" class="form-control" name="pending"> Pending
    </label>
        </div>
        
        <div class="col-md-12">
          <a href="{{route('repair.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-info">Show</button>
        </div>
      </div>


      <div class="row">
        <div class="table-responsive">
          <br>
    <table class="table table-hover table-striped">
      <tr>
        <th width = "50px"><b>No.</b></th>
        <th>Date</th>        
        <th>Brand Model</th>
        <th>Price</th>
        <th>IMEI</th>
        <th>Type</th>
        <th>Description</th>
        <th>Status</th>
        <th>Customer</th>
        <th width = "180px">Action</th>
      </tr>

      @foreach ($repairs as $repair)
        <tr>
          <td><b>{{$repair->id}}.</b></td>
          <td>{{$repair->created_at}}</td>
          <td>{{$repair->brand}} {{$repair->model}}</td>
          <td>{{$repair->price}}</td>
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
          @endif
          </td>
          <td>{{$repair->customer->fname}} {{$repair->customer->lname}}</td>

          <td>
              <a class="btn btn-sm btn-success" href="{{route('repair.show',$repair->id)}}">Show</a>

          </td>
        </tr>
      @endforeach
    </table>

{!!$repairs->links() !!}
        </div>
      </div>

  </div>
@endsection
