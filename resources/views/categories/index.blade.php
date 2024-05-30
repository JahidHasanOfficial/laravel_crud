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
            <a href="{{ route('categories.create') }}" class="btn btn-dark">Create Category</a>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        @if (session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        <div class="col-md-10">
            <div class="card boreder-0 shadow-lg my-4">
                <div class="card-header bg-dark">
                    <h3 class="text-white"> Category List</h3>
                </div>

                <div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Category_Name</th>

                            <th scope="col">Created_at</th>

                            <th scope="col" class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($categories as $category )
                          <tr>
                            <th scope="row">{{ $loop->index+1 }}</th>
                            <td>{{ $category->name }}</td>



                            <td>{{ \Carbon\Carbon::parse($category->created_at)->format('d M Y H:i:s') }}</td>

                            <td class="text-center">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>



                                <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this product?')) { document.getElementById('delete-product-form-{{ $category->id }}').submit(); }" class="btn btn-danger">Delete</a>

                                <form id="delete-product-form-{{ $category->id }}" action="{{ route('categories.destroy', $category->id) }}" method="POST">
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
