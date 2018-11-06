@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>New Repair</h3>
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

    <form action="{{route('repair.store')}}" method="post">
      @csrf
      <div class="row">
          <div class="col-md-6">
              <strong>Brand:</strong>
              <input type="text" name="brand" class="form-control" >
              <strong>Mode:</strong>
              <input type="text" name="model" class="form-control">
              <strong>IMEI # </strong>
              <input type="text" name="imei" class="form-control">
              <strong>Type</strong>
              <input type="text" name="type" class="form-control" placeholder="Repair, Unlock, Software">
              <strong>Discription</strong>
              <textarea class="form-control" placeholder="Description of problem" name="discription" rows="8" cols="80"></textarea>
              <strong>Parts that need to be changed</strong>
              <input type="text" name="parts" class="form-control" >
              <strong>Price</strong>
              <input type="text" name="price" class="form-control" >


            </div>
            <div class="col-md-6">
                <strong>First name:</strong>
                <input type="text" name="fname" class="form-control" placeholder="First name">
                <strong>Last name:</strong>
                <input type="text" name="lname" class="form-control" placeholder="Last name">


                <strong>Address</strong>
                <input type="text" name="address" class="form-control" placeholder="123 high streeet, HA1 2PQ">
                <strong>Phone</strong>
                <input type="text" name="phone" class="form-control" placeholder="07812342321">

            </div>


        </div>



        <div class="row">
            <div class="col-md-12">
              <a href="{{route('repair.index')}}" class="btn btn-sm btn-success">Back</a>
              <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </div>
        </div>

    </form>




  </div>
@endsection
