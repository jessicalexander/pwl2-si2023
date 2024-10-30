<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Suppliers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Data Logs</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link" href="{{route('products.index')}}">Products</a>
              <a class="nav-link active"  aria-current="page" href="{{route('suppliers.index')}}">Suppliers</a>
              <a class="nav-link" href="{{route('transaksi.index')}}">Transaction</a>
            </div>
          </div>
        </div>
      </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <h3 class="text-center my-4">Suppliers Data</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-5m rounded">
                    <div class="card-body">
                        <a href="{{route('suppliers.create')}}" class="btn btn-md btn-success mb-3">ADD SUPPLIER</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">SUPPLIER NAME</th>
                                    <th scope="col">ADDRESS</th>
                                    <th scope="col">PHONE NUMBER</th>
                                    <th scope="col">PERSON IN CHARGE (PIC)</th>
                                    <th scope="col" style="width:20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($suppliers as $supplier)
                                <tr>
                                    <td>{{$supplier->supplier_name}}</td>
                                    <td>{{$supplier->alamat_supplier}}</td>
                                    <td>{{$supplier->no_hp}}</td>
                                    <td>{{$supplier->pic_supplier}}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{route('suppliers.destroy',$supplier->id)}}" method="POST">
                                            <a href="{{route('suppliers.show', $supplier->id)}}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{route('suppliers.edit', $supplier->id)}}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    Data Suppliers Belum Tersedia.
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{$suppliers->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon:"success",
                title: "BERHASIL",
                text: "{{ session('success')}}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL",
                text: "{{ session('error')}}",
                showConfirmButton: false,
                timer:2000
            });
        @endif
    </script>
</body>
</html>
