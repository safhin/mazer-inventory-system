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
                    <h3>Categories</h3>
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
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create category</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form class="form form-horizontal" action="{{ route('supplier.update', $supplier->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Supplier Name</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="supplier_name" class="form-control" name="name" placeholder="Name" value="{{ $supplier->name }}">
                                            @if ($errors->has('name'))
                                            <p style="color: red">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label>Supplier email</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="category_email" class="form-control" name="email" placeholder="Email" value="{{ $supplier->email }}">
                                            @if ($errors->has('email'))
                                            <p style="color: red">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label>Address</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="address" class="form-control" name="address" placeholder="Address" value="{{ $supplier->address }}">
                                            @if ($errors->has('address'))
                                            <p style="color: red">{{ $errors->first('address') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="phone" class="form-control" name="phone" placeholder="Phone" value="{{ $supplier->phone }}">
                                            @if ($errors->has('phone'))
                                            <p style="color: red">{{ $errors->first('phone') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label>Details</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="details" class="form-control" name="details" placeholder="Details" value="{{ $supplier->details }}">
                                            @if ($errors->has('details'))
                                            <p style="color: red">{{ $errors->first('details') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Update Suppliers</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <x-admin.footer/>
@endsection