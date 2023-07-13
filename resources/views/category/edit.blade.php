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
                    <h2>Edit Category</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success"href="{{route('category.index')}}">Category Home Page</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{session('status')}}
        </div>
        @endif
        
        <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            </div>
                <div class="col-xs-12 col-sm-12 col md-12">
                    <div class="form-group">
                        <strong>Product SubCategory:</strong>
                        <input type="text" name="sub_name" id="sub_name"class="form-control" >
                        @error('sub_name')
                        <div class="alert alert-danger mt-1 mb-1">{{$$message}}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Update Category</button>
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