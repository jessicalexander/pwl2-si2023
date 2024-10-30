<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Add New Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .button-container {
        position: fixed;
        bottom: 20px;
        left: 0;
        right: 0;
        text-align: center;
        padding: 0 20px;
    }

    .btn-back {
        background-color: #0d6efd;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-back:hover {
        background-color: #0b5ed7;
    }
</style>
<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="cold-md-12">
                <h3>Edit Product</h3>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{route('products.update', $data['product']->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">IMAGE</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            
                                                        {{-- error message untuk img --}}
                                                        @error('image')
                                                        <div class="alert alert-danger mt-2">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                    {{-- end error img --}}
                            </div>

                            <div class="form-group mb-3">
                                <label for="product_category_id">Product Category</label>
                                <select class="form-control" id="product_category_id" name="product_category_id">
                                    <option value="">-- Select Category Product --</option>
                                    @foreach ($data['categories_'] as $c)
                                        <option value="{{$c->id}}">
                                        @if(old("product_category_id", $data['product']->product_category_id)==$c->id) selected @endif
                                        {{$c->product_category_name}}</option>
                                    @endforeach
                                </select>
                            {{-- error for product_category_id --}}
                            @error('product_category_id')
                            <div class="alert alert-danger mt-2">
                                {{$message}}
                            </div>
                            @enderror
                            {{-- end error product category --}}

                            </div>
                            <div class="form-group mb-3">
                                <label for="supplier_id">Supplier</label>
                                <select class="form-control" id="supplier_id" name="supplier_id">
                                    <option value="">-- Select Supplier --</option>
                                    @foreach ($data['suppliers_'] as $s)
                                        <option value="{{$s->id}}"
                                            @if(old("supplier_id", $data["product"]->supplier_id)==$s->id) selected @endif>
                                            {{$s->supplier_name}}</option>
                                    @endforeach
                                </select>

                            {{-- error message untuk supplier_id --}}
                            @error('supplier_id')
                                <div class="alert alert-danger mt-2">
                                    {{$message}}
                                </div>
                            @enderror
                            {{-- end error supplier_id --}}

                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">TITLE</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Masukan Judul Product"
                                value="{{old('title', $data['product']->title)}}">

                            {{-- error message untuk title --}}
                            @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{$message}}
                                </div>
                            @enderror
                            {{-- end error title --}}
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">DESCRIPTION</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" placeholder="Masukan Deskripsi Product">
                                {{old('description', $data['product']->description)}}</textarea>

                            {{-- error message untuk desc --}}
                            @error('description')
                                <div class="alert alert-danger mt-2">
                                    {{$message}}
                                </div>
                            @enderror
                            {{-- end error desc --}}
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">PRICE</label>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Masukan Price Product"
                                        value="{{old('price', $data['product']->price)}}">

                            {{-- error message untuk desc --}}
                            @error('price')
                                <div class="alert alert-danger mt-2">
                                    {{$message}}
                                </div>
                            @enderror
                            {{-- end error desc --}}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">STOCK</label>
                                        <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" placeholder="Masukan Stock Product"
                                        value="{{old('stock', $data['product']->stock)}}">

                                {{-- error message untuk desc --}}
                                @error('stock')
                                    <div class="alert alert-danger mt-2">
                                        {{$message}}
                                    </div>
                                @enderror
                                {{-- end error desc --}}
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
                            <buttont type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="button-container">
        <button onclick="window.history.back()" class="btn-back">Kembali</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
</body>