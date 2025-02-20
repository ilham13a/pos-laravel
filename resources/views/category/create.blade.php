@extends('layouts.app')
@section('title', 'Tambah Category')

@section('content')
    <form action="{{ route('category.store') }}" method="post">
        @csrf
        <div class="mb-3 row">
            <div class="col-sm-2">
                <label for="" class="form-label">Nama</label>
            </div>
            <div class="col-sm-3">
                <input required type="text" class="form-control" name="category_name" placeholder="Nama Lengkap">
            </div>
        </div>
        {{-- <div class="mb-3 row">
            <div class="col-sm-2">
                <label for="" class="form-label">Aksi</label>
            </div>
            <div class="col-sm-3">
                <input required type="email" class="form-control" name="email" placeholder="Email">
            </div>
        </div> --}}
        {{-- <div class="mb-3 row">
            <div class="col-sm-2">
                <label for="" class="form-label">Password *</label>
            </div>
            <div class="col-sm-3">
                <input required type="password" class="form-control" name="password" placeholder="Password">
            </div>
        </div> --}}
        <div class="mb-3 row">
            <div class="col-sm-10">
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>
    </form>
@endsection
