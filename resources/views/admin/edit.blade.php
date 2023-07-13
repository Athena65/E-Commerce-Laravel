<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="images/images.png">
    <title>Edit Product Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    
</head>

<body>
@auth
  @if(auth()->check() && auth()->user()->is_admin == 1 || auth()->check() && auth()->user()->is_admin == 2)
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Product</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success"href="{{route('admin.index')}}">Home Page</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{session('status')}}
        </div>
        @endif
        
        <form action="{{route('admin.create',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col md-12">
                    <div class="form-group">
                        <strong>Product Name:</strong>      
                        <input type="text" name="name"  value="{{old('name', $product->name)}}" class="form-control" >
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{$$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col md-12">
                    <div class="form-group">
                        <strong>Product Description:</strong>
                        <input type="text" name="description" value="{{old('description', $product->description)}}"   class="form-control" placeholder="Product Description">
                        @error('description')
                        <div class="alert alert-danger mt-1 mb-1">{{$$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col md-12">
                    <div class="form-group">
                        <strong>Product Price:</strong>
                        <input type="text" name="price" class="form-control" value="{{old('price', $product->price)}}"  placeholder="Product Price">
                        @error('price')
                        <div class="alert alert-danger mt-1 mb-1">{{$$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col md-12">
                    <div class="form-group">
                        <strong>Product Discount:</strong>
                        <input type="text" name="discount" class="form-control" value="{{old('discount', $product->discount)}}"  placeholder="Product Discount">
                        @error('discount')
                        <div class="alert alert-danger mt-1 mb-1">{{$$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col md-12">
                    <div class="form-group">
                        <strong>Product Image:</strong>
                        <input type="file" class="form-control" value="{{old('image', $product->image)}}"  id="image" name="image">
                        @error('image')
                        <div class="alert alert-danger mt-1 mb-1">{{$$message}}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Update Product</button>
            </div>
        </form>
    </div>
    @include('sweetalert::alert')
    @else

        <h1>Homepage</h1>
        <p class="lead">You dont have permission to view this page.</p>
     @endif
    @endauth

</body>
</html>