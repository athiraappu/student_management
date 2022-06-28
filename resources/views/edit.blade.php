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
    Edit & Update
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
      <form method="post" action="{{ route('students.update', $student->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" value="{{ $student->name }}"/>
          </div>
          <div class="form-group">
              <label for="age">Age</label>
              <input type="number" class="form-control" name="age" value="{{ $student->age }}"/>
          </div>
          <div class="form-group">
              <label for="phone">Gender</label>
              <select class="form-control" name="gender" required>
                <option disabled selected> Select Gender </option>
                <option value="male" <?php if($student->gender == "male"){ echo "selected"; }?> > Male </option>
                <option value="female"  <?php if($student->gender == "female"){ echo "selected";}?> > Female </option>
            </select>
          </div>
          <div class="form-group">
              <label for="password">Reporting</label>
             <select class="form-control" name="reporting_id" value="{{ old('reporting_id') }}" required> 
                <option disabled selected> Select Reporting </option>
                @foreach($teachers as $teacher)
                <option value="{{$teacher->id}}" <?php if($student->reporting_id == $teacher->id){ echo "selected"; }?>>{{$teacher->teacher_name}}</option>
                @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Update User</button>
      </form>
  </div>
</div>
@endsection