@extends('layouts.app')

@section('content')
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Products</h3>
                <p class="text-subtitle text-muted">For user to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Table</li>
                    </ol>
                </nav>
            </div>
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
    </div>
    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Manage Products</h4>
                    </div>
                    <div class="card-content">
                        <!-- table hover -->
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>TITLE</th>
                                        <th>DESCRIPTION</th>
                                        <th>SUPPLIER</th>
                                        <th>MODEL</th>
                                        <th>PRICE</th>
                                        <th>CATEGORY</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ $product->suppliers->name }}</td>
                                            <td>{{ $product->model }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->categories->name }}</td>
                                            <td>
                                                <center>
                                                    <a href="{{ route('product.edit', $product->id ) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="Update">
                                                        <i class="bi bi-pencil" aria-hidden="true"></i>
                                                    </a>
                                                    <form class="cate_delete" action="{{ route('product.delete', $product->id ) }}" method="post">
                                                        @csrf 
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                                    </form>
                                                </center>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<x-admin.footer/>
@endsection