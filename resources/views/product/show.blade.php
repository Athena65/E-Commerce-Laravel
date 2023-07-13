@extends('layouts.app-master')

@section('content')
<style>
footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        background-color: #f5f5f5;
        padding: 10px;
        text-align: center;
      }
      </style>
    <div class="container">
    <div class="pull-right mb-2">
                    <a class="btn btn-success"href="{{route('home.index')}}">Home Page</a>
    </div>
    <h1>Product Details</h1>
    <div class="row shadow-lg p-3 mb-5 bg-body rounded" >
        <div class="col-md-6  " >
            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}" alt="Product Image" class="img-fluid">
            @else
                No Image
            @endif
        </div>

        <div class="col-md-6">
            <h2 class="p-3 mb-2 bg-warning text-dark"> {{ $product->name }}</h2>
            <p class="p-3 mb-2 bg-danger text-white">{{ $product->description }}</p>
            <p class="p-3 mb-2 bg-info text-dark"><s>Price: ${{ $product->price }}</s></p>
    </br></br>
            <p class="p-3 mb-2 bg-danger text-white">This Product Created with Natural Components </p>
        </div>
        <div class="col-md-6">
            <div class="p-3 mb-2 bg-danger text-white">Remember Tobacco Products Kills</div>
        </div>
    </div>
        </div>
        <footer>

        </footer>
        <footer>
            <p>&copy; 2023 All rights reserved.</p>
        </footer>
@endsection
