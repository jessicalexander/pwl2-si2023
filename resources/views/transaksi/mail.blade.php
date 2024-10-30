<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Form</title>
</head>

<body>
    <div class="contain" style="margin: auto; width: 50%; padding: 10px;">
        <div class="heading"><h1 style="text-align: center;">Invoice Pembelian</h1></div>
        <div class="detail">
            <h2>Nama Kasir: {{ $transaksi->nama_kasir }}</h2>
            <p>Tanggal Transaksi: {{ $transaksi->transaksi_created }}</p>

            <div class="tables">
                <table style="width: 100%; border: 1px solid white; border-collapse: collapse;" width="100%">
                    <thead>
                        <tr>
                            <th style="border: 1px solid white; border-collapse: collapse; background-color: #96D4D4; padding: 10px;" bgcolor="#96D4D4">Nama Produk</th>
                            <th style="border: 1px solid white; border-collapse: collapse; background-color: #96D4D4; padding: 10px;" bgcolor="#96D4D4">Harga</th>
                            <th style="border: 1px solid white; border-collapse: collapse; background-color: #96D4D4; padding: 10px;" bgcolor="#96D4D4">Qty</th>
                            <th style="border: 1px solid white; border-collapse: collapse; background-color: #96D4D4; padding: 10px;" bgcolor="#96D4D4">Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td style="border: 1px solid white; border-collapse: collapse; background-color: #96D4D4; padding: 10px;" bgcolor="#96D4D4">{{ $product->title }}</td>
                            <td style="border: 1px solid white; border-collapse: collapse; background-color: #96D4D4; padding: 10px;" bgcolor="#96D4D4">{{ "Rp.".number_format($product->price,2,',','.') }}</td>
                            <td style="border: 1px solid white; border-collapse: collapse; background-color: #96D4D4; padding: 10px;" bgcolor="#96D4D4">{{ $product->quantity }}</td>
                            <td style="border: 1px solid white; border-collapse: collapse; background-color: #96D4D4; padding: 10px;" bgcolor="#96D4D4">{{ "Rp".number_format($product->total_price, 2, ',', '.') }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td style="border: 1px solid white; border-collapse: collapse; background-color: #96D4D4; padding: 10px;" bgcolor="#96D4D4"></td>
                            <td style="border: 1px solid white; border-collapse: collapse; background-color: #96D4D4; padding: 10px;" bgcolor="#96D4D4"></td>
                            <td style="border: 1px solid white; border-collapse: collapse; background-color: #96D4D4; padding: 10px;" bgcolor="#96D4D4"><strong>Total Harga:</strong></td>
                            <td style="border: 1px solid white; border-collapse: collapse; background-color: #96D4D4; padding: 10px;" bgcolor="#96D4D4"><strong>{{ "Rp".number_format($transaksi->total_harga, 2, ',', '.') }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>