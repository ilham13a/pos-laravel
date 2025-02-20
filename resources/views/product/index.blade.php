@extends('layouts.app')
@section('title', 'Data Produk')

@section('content')
    <div class="table-reponsive">
        <div align="right" class="mb-3">
            <a href="{{ route('product.create') }}" class="btn btn-primary">Tambah</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Nama Produk</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $product->category->category_name }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->product_qty }}</td>
                        <td>{{ $product->product_price }}</td>
                        <td>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-xs">Edit</a>
                            {{-- <a href="{{ route('product.destroy', $product->id) }}" class="btn btn-danger btn-xs">Delete</a> --}}
                            <form class="d-inline" action="{{ route('product.destroy', $product->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-xs btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
