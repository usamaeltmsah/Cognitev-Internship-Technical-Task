<?php
/**
 * Created by PhpStorm.
 * User: usama
 * Date: 5/21/19
 * Time: 2:38 AM
 */
?>
<!--Extend templates in Laravel-->
@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <br>
            <h3 align="center">ADD DATA</h3>
            <br>

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{\Session::get('success')}}</p>
                </div>

            @endif
            <form method="post" action="{{url('data')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <input type="text" name="country" class="form-control" placeholder="Country">
                </div>
                <div class="form-group">
                    <input type="text" name="budget" class="form-control" placeholder="Budget">
                </div>
                <div class="form-group">
                    <input type="text" name="goal" class="form-control" placeholder="Goal">
                </div>
                <div class="form-group">
                    <input type="text" name="category" class="form-control" placeholder="Category">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection