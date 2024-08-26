@extends('layouts.app')
@section('title', 'Data Category')

@section('content')
    <div class="table-reponsive">
        <div align="right" class="mb-3">
            <a href="{{ route('category.create') }}" class="btn btn-primary">Tambah</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    {{-- <th>Produk Qty</th> --}}
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-xs">Edit</a>
                            {{-- <a href="{{ route('category.destroy', $category->id) }}" class="btn btn-danger btn-xs">Delete</a> --}}
                            <form class="d-inline" action="{{ route('category.destroy', $category->id) }}" method="post">
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
