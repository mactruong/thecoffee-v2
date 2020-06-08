@extends('layouts.index')

@section('main')

	<div class="error">
	    <div class="jumbotron">
	        <div class="container">
	            <h1>404 Not Found</h1>
	            @if(Session::has('message'))
	            <p> {!!Session::get('message')!!} ...</p>
	            @endif
	        </div>
	    </div>
	</div>

@stop()