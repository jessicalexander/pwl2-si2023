<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('image');
            $table->foreignId('supplier_id')->nullable()->index();
            $table->string('title');
            $table->foreignId('product_category_id')->nullable()->index();
            $table->text('description');
            $table->bigInteger('price');
            $table->integer('stock')->default(0);
            $table->timestamps();

        });

        Schema::create('category_product', function (Blueprint $table) {
            $table->id();
            $table->string('product_category_name');
            $table->timestamps();

        });

        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name');
            $table->string('alamat_supplier');
            $table->string('no_hp');
            $table->string('pic_supplier');
            $table->timestamps();

        });

        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kasir');
            $table->timestamps();

        });

        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_transaksi')->nullable()->index();
            $table->foreignId('id_product')->nullable()->index();
            $table->integer('jumlah');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('necessary_tables');
    }
};
