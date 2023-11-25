@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="title float-start">All Class</h3>
                    <a href="{{route('classes.create')}}" class="btn btn-dark float-end fs-5">Add Class</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>S.L</th>
                            <th>Class Name</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($data as $key=>$row)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$row->class_name}}</td>
                            <td>
                                <a href="#" class="btn btn-dark">Edit</a>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
@endsection
