<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Prodduct Details Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
   <div class="bg-dark py-2">
    <h1 class="text-center text-white">laravel Crud</h1>
   </div>

   <div class="container">
    <div class="row d-flex justify-content-center mt-4">
        <div class="col-md-8 d-flex justify-content-end">
            <a href="{{ route('products.index') }}" class="btn btn-dark">Back to Home Page</a>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card boreder-0 shadow-lg my-4">
                <div class="card-header bg-dark">
                    <h3 class="text-white"> Prodduct Details Page</h3>
                </div>
       
        <div class="card-body">
            <div class="mb-3">
                <h4><b><strong>Name:</strong></b> {{ $product->name }}</h4>
               

            </div>
            <div class="mb-3">
                <h4><b><strong>Sku:</strong></b> {{ $product->sku }}</h4>  
            </div>
            <div class="mb-3">
                <h4><b><strong>Price:</strong></b> {{ $product->price }}</h4>
            </div>
            <div class="mb-3">
                <h4><b><strong>Description:</strong></b> {{ $product->description }}</h4>
            </div>
           
            <div class="mb-3">
                <h4><b><strong>Image:</strong></b></h4>
                <div class="text-center">
                    <img class="t" src="{{ asset('/uploads/products/'.$product->image) }}" width="500" height="300" alt="">
                </div>
            </div>
            <div class="mb-3">
                <h4><b><strong>Date & Time:</strong></b> {{ \Carbon\Carbon::parse($product->created_at)->format('d M Y H:i:s') }}</h4>  
            </div>
           
        </div>
       </form>

        </div>

    </div>

   </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>