@extends('Backend.layouts.app')
@section('title', ' Multi Dimational Array')
@section('head', 'Multi Dimational Array')
@section('head_name', 'Multi Dimational Array')
@section('content')
<div class="container-fluid">
    
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Multi Dimational Array</h4><br>
                <pre>
                @php(print_r($student))
            	</pre>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection
@section('js')

@endsection