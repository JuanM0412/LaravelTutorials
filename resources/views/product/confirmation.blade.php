@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row justify-content-center"> 
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card mx-auto">
            <div class="card-body text-center">
                <p>Product {{ $viewData["product"] }} was successfully created.</p>
            </div>
        </div>
    </div>
</div>
@endsection