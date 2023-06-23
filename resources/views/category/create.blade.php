<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Create Category</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>

</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Add Category</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success"href="{{route('admin.index')}}">Admin Panel</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{session('status')}}
        </div>
        @endif
        <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col md-12">
                    <div class="form-group">
                        <strong>Category Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Category Name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{$$message}}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3" >Create Category</button>
            </div>
        </form>
    </div>
    @include('sweetalert::alert')
</body>

</html>