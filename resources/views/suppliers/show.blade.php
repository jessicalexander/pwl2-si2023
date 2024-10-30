<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Product Data</title>
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
    <div class="container mt-5 mb5">
        <div class="row">
            <h3>Show Product</h3>

            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">

                        <p>Supplier Name : {{$supplier->supplier_name}}</p>
                        <hr/>
                        <p>Alamat Su : {{$supplier->alamat_supplier}}</p>
                        <hr/>
                        <p>Supplier : {{$supplier->no_hp}}</p>
                        <hr/>
                        <p>Category : {{$supplier->pic_supplier}}</p>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="button-container">
        <button onclick="window.history.back()" class="btn-back">Kembali</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>