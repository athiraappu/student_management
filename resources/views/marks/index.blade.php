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
        <a href="{{ route('marks.create') }}">
            <button type="button" class="btn btn-secondary" title="Add Mark" data-original-title="Add Mark">
            <i class="fa fa-plus" aria-hidden="true"></i> Add Mark</button>
        </a>
  </div>
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>Name</td>
          <td>Subject</td>
          <td>Term</td>
          <td>Marks</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($students_marks as $student_marks)
        <tr>
            <td>{{$student_marks->name}}</td>
            <td>{{$student_marks->subject_name}}</td>
            <td>{{$student_marks->term}}</td>
            <td>{{$student_marks->mark}}</td>
            <td class="text-center">
                <a href="{{ route('marks.edit', $student_marks->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('marks.destroy', $student_marks->id)}}" method="post" style="display: inline-block">
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