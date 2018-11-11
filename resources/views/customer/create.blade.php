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

    <form action="{{route('customer.store')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <strong>First name:</strong>
          <input type="text" name="fname" class="form-control" placeholder="First name">
          <strong>Last name:</strong>
          <input type="text" name="lname" class="form-control" placeholder="Last name">

        </div>
        <div class="col-md-12">
          <strong>Address</strong>
          <input type="text" name="address" class="form-control" placeholder="123 high streeet, HA1 2PQ">
          <strong>Phone</strong>
          <input type="text" name="phone" class="form-control" placeholder="07812342321">

        </div>
        <!-- <div class="col-md-12">
          <strong>Problem :</strong>
          <textarea class="form-control" placeholder="Description of problem" name="" rows="8" cols="80"></textarea>
        </div> -->

        <div class="col-md-12">
          <a href="{{route('customer.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>

  </div>
@endsection
