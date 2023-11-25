@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="title float-start">Add Student</h3>
                    
                </div>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success">{{session()->get('success')}}</div>
                    @endif
                    <form action="{{route('students.store')}}" method="post">
                        @csrf
                        <div class="col-md-3"></div>
                        <div class="col-md-6 m-auto">
                            <div class="mb-3">
                                <label for="forClassName">{{__('Name')}}</label>
                                <input type="text" placeholder="Name" name="name" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="forClassName">{{__('Class')}}</label>
                                <select name="class_name"  id="" class="form-select">
                                    <option value="" >Select Class</option>
                                    @foreach($class as $row)
                                        <option value="{{$row->id}}">{{$row->class_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="forClassName">{{__('Roll')}}</label>
                                <input type="number" placeholder="Roll" name="roll" class="form-control" id="">
                            </div>
                            
                            <div class="mb-3">
                                <label for="forClassName">{{__('Email')}}</label>
                                <input type="text" placeholder="Email" name="email" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Add" class="btn btn-dark">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
@endsection