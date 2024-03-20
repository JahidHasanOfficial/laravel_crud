<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>laravel Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
   <div class="bg-dark py-2">
    <h1 class="text-center text-white">laravel Crud</h1>
   </div>

   <div class="container">
    <div class="row d-flex justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
            <a href="{{ route('products.create') }}" class="btn btn-dark">Create Prodduct</a>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        @if (session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        <div class="col-md-10">
            <div class="card boreder-0 shadow-lg my-4">
                <div class="card-header bg-dark">
                    <h3 class="text-white"> Prodduct List</h3>
                </div>

                <div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Name</th>
                            <th scope="col">Sku</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Created_at</th>
                            {{-- <th scope="col">Description</th>
                            <th scope="col">Image</th> --}}
                            <th scope="col" class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($products as $product )
                          <tr>
                            <th scope="row">{{ $loop->index+1 }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                              <img src="{{ asset('uploads/products/' . $product->image) }}" width="50px" height="50px" alt="" style="border-radius: 50%;">
                          </td>
                          
                            <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d M Y H:i:s') }}</td>
                           
                            <td class="text-center">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('products.view', $product->id) }}" class="btn btn-primary">View</a>
                               
                               
                                <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this product?')) { document.getElementById('delete-product-form-{{ $product->id }}').submit(); }" class="btn btn-danger">Delete</a>

                                <form id="delete-product-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                </form>
                                
                            </td>
                            
                          </tr>
                              
                          @endforeach
                        </tbody>
                      </table>
                </div>
       

        </div>

    </div>

   </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>


<script>
  function deleteProduct(id){
   if (confirm('Are you sure?')){
    document.getElementById('delete-product-form-'+id).submit();
   }
  }
</script>