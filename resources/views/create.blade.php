@extends('layout')
@section('content')
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>
<div class="card push-top">
  <div class="card-header">
    Add User
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('students.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
          </div>
          <div class="form-group">
              <label for="email">Age</label>
              <input type="number" class="form-control" name="age" maxlength="3" />
          </div>
          <div class="form-group">
              <label for="phone">Gender</label>
              <select class="form-control" name="gender" value="{{ old('gender') }}">
                <option disabled selected> Select Gender </option>
                <option value="male"> Male </option>
                <option value="female"> Female </option>
            </select>
          </div>
          <div class="form-group">
              <label for="password">Reporting</label>
              <select class="form-control" name="reporting_id" value="{{ old('reporting_id') }}"> 
                <option disabled selected> Select Reporting </option>
                @foreach($teachers as $teacher)
                <option value="{{$teacher->id}}">{{$teacher->teacher_name}}</option>
                @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Create User</button>
      </form>
  </div>
</div>
@endsection