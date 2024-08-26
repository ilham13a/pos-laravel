@extends('layouts.app')
@section('title', 'Transaksi Penjualan')

@section('content')
    <form action="">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="">Kode Transaksi</label>
                    <input type="text" class="form-control" readonly value="" name="kode_transaksi">
                </div>
                <div class="mb-3">
                    <label for="">Kategori Produk</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">Pilih Kategori Produk</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Qty Produk</label>
                    <input type="number" class="form-control" placeholder="Qty Produk" id="product_qty">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="">Tanggal Transaksi</label>
                    <input type="text" class="form-control" readonly value="<?php echo date('d/M/Y'); ?>"
                        name="tanggal_transaksi">
                </div>
                <div class="mb-3">
                    <label for="">Nama Produk</label>
                    <select class="form-control" name="" id="product_id">
                        <option value="">Pilih Produk</option>
                    </select>
                </div>
            </div>
        </div>
        <input type="hidden" id="product_price">
        <input type="hidden" id="product_name">
        <div class="table-transaction mt-5">
            <div align="right" class="mb-3">
                <button type="button" class="btn btn-primary tambah-produk">Tambah Produk</button>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Sub Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <div class="row mt-2">
                <div class="col-sm-8">
                    <h3>Total Harga</h3>
                </div>
                <div class="col-sm-4">
                    <h4 class="total_price"></h4>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-8">
                    <h3>Telah Dibayar</h3>
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="dibayar">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-8">
                    <h3>Kembali</h3>
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" readonly id="kembalian">
                </div>
            </div>
        </div>
    </form>

@endsection
