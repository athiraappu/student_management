@extends('layout')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <div class="btn-group float-right" role="group" aria-label="Basic example">
                        <a href="/{{Request::path()}}/create">
                            <button type="button" class="btn btn-secondary" title="Add New" data-original-title="Add New">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New</button>
                        </a> &nbsp;
                        <a href="{{ route('marks.index') }}">
                            <button type="button" class="btn btn-secondary" title="Marks" data-original-title="Marks">
                            <i class="fa fa-plus" aria-hidden="true"></i> Marks</button>
                        </a>
                </div>
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>Name</td>
          <td>Age</td>
          <td>Gender</td>
          <td>reporting</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $students)
        <tr>
            <td>{{$students->name}}</td>
            <td>{{$students->age}}</td>
            <td>{{$students->gender}}</td>
            <td>{{$students->teacher_name}}</td>
            <td class="text-center">
                <a href="{{ route('students.edit', $students->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('students.destroy', $students->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection