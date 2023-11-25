@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="title float-start">All Student</h3>
                    <a href="{{route('students.create')}}" class="btn btn-dark float-end fs-5">Add Students</a>
                </div>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success">{{session()->get('success')}}</div>
                    @endif
                    @if(session()->has('update'))
                        <div class="alert alert-success">{{session()->get('update')}}</div>
                    @endif
                    <table class="table table-striped">
                        <tr>
                            <th>S.L</th>
                            <th>Name</th>
                            <th>Class Name</th>
                            <th>Roll</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        @foreach($student as $key => $row)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->class_name}}</td>
                                <td>{{$row->roll}}</td>
                                <td>{{$row->email}}</td>
                                <td>
                                    <a href="{{route('students.edit',$row->id)}}" class="btn btn-dark float-start">{{__('Edit')}}</a>
                                    <form action="{{route('students.destroy')}}" class="float-end" method="post">
                                        @csrf
                                        <input type="hidden" value="{{$row->id}}" name="hidden_id">
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                    </form>
                                    
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
@endsection
