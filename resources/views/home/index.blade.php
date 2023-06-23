@extends('layouts.app-master')

@section('content')
<!doctype html>
<html lang="en">
<head>
    <title>Table 06</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
              .ftco-section {
            padding: 60px 0;
        }

        .heading-section {
            font-size: 28px;
            margin-bottom: 30px;
        }

        .table-wrap {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        .table th,
        .table td {
            padding: 12px 15px;
            vertical-align: middle;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody tr:hover {
            background-color: #f5f5f5;
        }

        .table tbody .alert td {
            background-color: #fff6f6;
        }

        .table tbody td {
            font-weight: 400;
        }
        .pagination ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
        }

        .pagination li {
        display: inline-block;
        margin: 0 5px;
        }

        .pagination li a {
        display: block;
        padding: 5px 10px;
        text-decoration: none;
        border: 1px solid #ccc;
        border-radius: 5px;
        }

        .pagination li a.active {
        background-color: #ccc;
        color: #fff;
        }

        .pagination li a.disabled {
        opacity: 0.6;
        pointer-events: none;
        }
        footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        background-color: #f5f5f5;
        padding: 10px;
        text-align: center;
      }

    </style>
    <script>
    function filterTable(category) {
        var rows = document.querySelectorAll('.table tbody tr');

        for (var i = 0; i < rows.length; i++) {
            var row = rows[i];
            var rowCategory = row.cells[1].textContent; // İkinci sütunda kategori bilgisi yer alıyor

            if (category === 'all' || rowCategory === category) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        }
    }
    </script>
</head>
<body>
<div class="bg-light p-5 rounded">
        @auth
        <h1>Dashboard</h1>
        @if(auth()->check() && auth()->user()->is_admin == 1 || auth()->check() && auth()->user()->is_admin == 2)
            <a class="btn btn-success" href="{{ route('admin.index') }}">Admin Panel</a>
           @endif
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-4">
                <h2 class="heading-section">Burak Tobacco</h2>
            </div>
        </div>
        <div class="row">
        <div class="col-xs-12 col-sm-12 col md-12">
            <div class="form-group">
                 <strong>Choose Product Category:</strong>
                <select onchange="filterTable(this.value)"class="form-control" aria-label="Default select example"  name="category" id="category" >
                <option value="all">All Products</option>
                <option value="Cigarettes">Cigarettes</option>
                 <option value="Puro and Pipo">Puro and Pipo</option>
                 <option value="Tobacco Aromas">Tobacco Aromas</option>
            </select>
            
            </div>
         </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <h3 class="h5 mb-4 text-center">Products</h3>
                <div class="table-wrap">
                    <table class="table">
                        <thead class="thead-primary">
                        <tr>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Discount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr class="alert" role="alert">
                                <td>
                                @if($product->image)
                                        <a href="{{ route('product.show', $product->id) }}">
                                       <img src="{{ asset('storage/'.$product->image) }}" alt="Product Image"width="350px">
                                        @else
                                            No Image
                                @endif
                                </td>
                                <td>{{$product->category->name}}</td>
                                <td>
                                    <div class="email">
                                        <span>{{ $product->name }}</span>

                                    </div>
                                </td>
                                <td>{{ $product->description }}</td>
                                <td><s>${{ $product->price }}</s></td>
                                <td>${{ $product->discount }}</td>
                            </tr>
                        @endforeach
                        <div class="pagination" style="display:table-footer-group">
                      <ul>
                          <li><a href="{{ $products->previousPageUrl() }}" class="{{ $products->currentPage() == 1 ? 'disabled' : '' }}">Previous</a></li>
                          @for ($i = 1; $i <= $products->lastPage(); $i++)
                              <li><a href="{{ $products->url($i) }}" class="{{ $products->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a></li>
                          @endfor
                          <li><a href="{{ $products->nextPageUrl() }}" class="{{ $products->currentPage() == $products->lastPage() ? 'disabled' : '' }}">Next</a></li>
                      </ul>
                  </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <footer>
      <p>&copy; 2023 Burak Tamince. All rights reserved.</p>
    </footer>
</section>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
@endauth
@guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
</body>
</html>