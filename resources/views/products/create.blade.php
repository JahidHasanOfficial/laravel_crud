<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
   <div class="bg-dark py-2">
    <h1 class="text-center text-white">laravel Crud</h1>
   </div>

   <div class="container">
    <div class="row d-flex justify-content-center mt-4">
        <div class="col-md-8 d-flex justify-content-end">
            <a href="{{ route('products.index') }}" class="btn btn-dark">Back</a>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card boreder-0 shadow-lg my-4">
                <div class="card-header bg-dark">
                    <h3 class="text-white">Create Prodduct</h3>
                </div>
       <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label h5">Name:</label>
                <input type="text" value="{{ old('name') }}" class="@error('name')@enderror form-control" id="name" name="name" placeholder="Enter Name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="mb-3">
                <label for="sku" class="form-label h5">Sku:</label>
                <input type="text" value="{{ old('sku') }}" class="@error('sku')@enderror form-control" id="sku" name="sku" placeholder="Enter Sku">
                @error('sku')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label h5">Price:</label>
                <input type="text" value="{{ old('price') }}" class="@error('price')@enderror form-control" id="price" name="price" placeholder="Enter Price">
                @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label h5">Description:</label>
               <textarea name="description" class="form-control" id="" cols="" rows="5" placeholder="Enter Description">{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label h5">Image:</label>
                <input type="file" class="form-control" id="image" name="image" placeholder="Enter Image">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
       </form>

        </div>

    </div>

   </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>