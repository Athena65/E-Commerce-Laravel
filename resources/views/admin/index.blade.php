  <!DOCTYPE html>
  <html>
  <head>
      <meta charset="utf-8"/>
      <title>Products</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"/>
      <style>
      footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        background-color: #f5f5f5;
        padding: 10px;
        text-align: center;
      }
      .pagination {
  display: flex;
  justify-content: center;
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
    </style>

  </head>
  <body>
  @auth
  @if(auth()->check() && auth()->user()->is_admin == 1 || auth()->check() && auth()->user()->is_admin == 2)
      <div class="container mt-2">
          <div class="row">
              <div class="col-lg-12 margin-tb">
                  <div class="pull-left">
                      <h2>Admin Panel Products</h2>
                  </div>
                  <div class="pull-right mb-2">
                      <a class="btn btn-success"href="{{route('admin.create')}}">Create Product</a>
                      <a class="btn btn-success"href="{{route('category.create')}}">Create Category</a>
                      <a class="btn btn-success"href="{{route('home.index')}}">User Panel</a>
                  </div>
              </div>
          </div>
          @if($message=Session::get('success'))
              <div class="alert alert-success">
                  <p>{{$message}}</p>
              </div>
          @endif
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Discount</th>
                      <th>Image</th>
                      <th width="280px">Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($products as $product)
                  <tr>
                      <td>{{$product->name}}</td>
                      <td>{{$product->description}}</td>
                      <td>{{$product->price}}</td>
                      <td>{{$product->discount}}</td>
                      <td> @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" alt="Product Image" width="350px" >
                          @else
                              No Image
                          @endif</td>
                      <td>
                          <form id="delete_edit"action="{{ route('admin.destroy',$product->id)}}" method="Post">
                              <a class="btn btn-primary" href="{{ route('admin.edit',$product->id)}}" >Edit</a>
                              @if(auth()->check() && auth()->user()->is_admin == 2)
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger" id="delete" >Delete</button>
                              @endif
                              
                          </form>
                          
                      </td>
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
      <footer>
      <p>&copy; 2023 Burak Tamince. All rights reserved.</p>
    </footer>
    @include('sweetalert::alert')

   @else
    <h1>Homepage</h1>
        <p class="btn btn-danger">You Dont Have Permission to view this page</p>
    @endif
  </body>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <script>
  document.getElementById('delete').addEventListener('click', function(event) {
    event.preventDefault(); // Formun otomatik olarak gönderilmesini engeller
    
    Swal.fire({
      title: 'Delete',
      text: 'Are you sure to delete company?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No',
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('delete_edit').submit(); // Formu gönder
      }
    });
  });
    </script>
    @endauth
@guest
        <h1>Homepage</h1>
        <p class="lead">You dont have permission to view this page.</p>
        @endguest
  </html>