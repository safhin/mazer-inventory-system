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
                    <h3>Create Products</h3>
                    <p class="text-subtitle text-muted">Multiple form layout you can use</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Layout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- // Basic multiple Column Form section start -->
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Multiple Column</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('product.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" id="title" class="form-control" placeholder="Title" name="title" value="{{ old('title') }}">
                                                @if ($errors->has('title'))
                                                    <p style="color: red">{{ $errors->first('title') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="text" id="price" class="form-control" placeholder="Price" name="price" value="{{ old('price') }}">
                                                @if ($errors->has('price'))
                                                    <p style="color: red">{{ $errors->first('price') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="supplier">Supplier</label>
                                                <select class="form-control" name="supplier_id" id="supplier">
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('supplier_id'))
                                                    <p style="color: red">{{ $errors->first('supplier_id') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="model">Model</label>
                                                <input type="text" id="model" class="form-control" name="model" placeholder="Model" value="{{ old('model') }}">
                                                    @if ($errors->has('model'))
                                                        <p style="color: red">{{ $errors->first('model') }}</p>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" name="description" id="description" cols="30" rows="3">{{ old('description') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="description">Categories</label>
                                                <select class="form-control" name="category_id" id="category">
                                                    <option>Select Category</option>
                                                    @foreach ($categories as $cat)
                                                        <option class="form-control" value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Create</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic multiple Column Form section end -->
    </div>
    <x-admin.footer/>
@endsection