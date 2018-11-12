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

       <div class="col-md-12">
       <form method="POST" class="form-inline" action="{{route('repair.reports')}}">
       @csrf
          <div class="form-group">
            <label>From : <input type="text/submit/hidden/button/etc" class="form-control" placeholder="2018/03/19" name="from" value="" id="datepicker"></label>
          </div>
          <div class="form-group">
            <label>To : <input type="text/submit/hidden/button/etc" class="form-control"name="to" placeholder="2018/04/29" value="" id="datepicker2"></label>
          </div>
          <div class="form-group">
            <label>Total Price : <input type="text/submit/hidden/button/etc" class="form-control" name="price" value="£{{$price}}"></label>
            <label>Total Repairs : <input type="text/submit/hidden/button/etc" class="form-control col-sm-2" name="total" value="{{$total}}"></label>
          </div>
          <div class="form-group">
            
          </div>
          <div class="form-group">
            <label>
              <input type="checkbox" class="checkbox form-control" name="pending"> Show Pending
            </label>
          </div>
      </div>
        
        <div class="col-md-12">
          <a href="{{route('repair.getReports')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-info"> Show</button>
        </div>
      </div>

 </div>

  <div class="container-fluid">
        <div class="table-responsive">
          <br>
          <table class="table table-hover table-bordered table-striped">
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
@endsection
