<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Supplier</title>
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
            <div class="col-md-12">
                <h3>Edit Supplier</h3>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('suppliers.update', $data['supplier']->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">SUPPLIER NAME</label>
                                <input type="text" class="form-control @error('supplier_name') is-invalid @enderror" name="supplier_name" placeholder="Masukkan Nama Supplier"
                                value="{{ old('supplier_name', $data['supplier']->supplier_name) }}">

                                {{-- Error message untuk supplier_name --}}
                                @error('supplier_name')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                                {{-- End error supplier_name --}}
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">PIC Name</label> <!-- Diubah dari Contact Person ke PIC Name -->
                                <input type="text" class="form-control @error('pic_supplier') is-invalid @enderror" name="pic_supplier" placeholder="Masukkan Nama PIC"
                                value="{{ old('pic_supplier', $data['supplier']->pic_supplier) }}">

                                {{-- Error message untuk pic_name --}}
                                @error('pic_name')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                                {{-- End error pic_name --}}
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">PHONE</label>
                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" placeholder="Masukkan Nomor Telepon"
                                value="{{ old('no_hp', $data['supplier']->no_hp) }}">

                                {{-- Error message untuk phone --}}
                                @error('no_hp')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                                {{-- End error phone --}}
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Alamat Supplier</label>
                                <textarea class="form-control @error('alamat_supplier') is-invalid @enderror" name="alamat_supplier" rows="3" placeholder="Masukkan Alamat Supplier">{{ old('alamat_supplier', $data['supplier']->alamat_supplier) }}</textarea>

                                {{-- Error message untuk address --}}
                                @error('alamat_supplier')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                                {{-- End error address --}}
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="button-container">
        <button onclick="window.history.back()" class="btn-back">Kembali</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
