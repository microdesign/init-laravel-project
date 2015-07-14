<!DOCTYPE html>
<html lang="en">
<head>
	@include('partials.meta')
</head>
<body class="@yield('body_class', 'default-body')">

    @if($messages::check())
       {{$messages::get()}}
    @endif
    
    @include('partials.nav')
	
	@yield('content')

	@include('partials.footer')
	
	@yield('scripts')
</body>
</html>
