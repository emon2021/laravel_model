@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="title float-start">Add Class</h3>
                    
                </div>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success">{{session()->get('success')}}</div>
                    @endif
                    @if(session()->has('exist'))
                        <div class="alert alert-danger">{{session()->get('exist')}}</div>
                    @endif
                    <form action="{{route('classes.store')}}" method="post">
                        @csrf
                        <div class="col-md-3"></div>
                        <div class="col-md-6 m-auto">
                            <div class="mb-3">
                                <label for="forClassName">{{__('Class Name')}}</label>
                                <input type="text" placeholder="Class Name" name="class_name" class="form-control" id="">
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