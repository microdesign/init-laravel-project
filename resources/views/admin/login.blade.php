@extends('admin')

@section('content')

<div class="container" style="margin-top:30px">
    <div class="col-md-12">
        <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title"><strong>Sign In </strong></h3></div>
            <div class="panel-body">
                <form action="admin" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                   <input type="text" name="email" value="{{old('email')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password   </label>
                   <input type="password" name="password" >
                  </div>
                   <input type="submit">
               </form>
            </div>
        </div>
    </div>
</div>

@stop