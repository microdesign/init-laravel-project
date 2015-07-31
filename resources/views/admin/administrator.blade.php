@extends('admin')

@section('content')

@include('admin.nav')
<div class="clearfix"></div>
<div class="container">
     Number of registered users: {{$users}}
     
     <br />
     <br />
     <br />
     <table class="table table-bordered table-condensed">
        @foreach($users_daily as $user_daily)
            <tr>
                <td>{{$user_daily->data}}</td>
                <td>{{$user_daily->number}} registers</td>
            </tr>
        @endforeach
     </table>
</div>
@stop