
@extends('layouts.backend_master')
@section('content')
    <div class="page-body">


        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>All Product ({{ $products->count() }} )</h5>
                                <form class="d-inline-flex">
                                    <a href="" class="align-items-center btn btn-theme">
                                        <i data-feather="plus-square"></i>Add New
                                    </a>
                                </form>
                            </div>

                            <div class="table-responsive Product-table">
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Product Name</th>
                                            <th>Date</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->product_name }}
                                                    @foreach ( App\Models\Product_photo::where('product_id',$product->id)->get() as $product_photo)
                                                   <img width="100" src="{{ asset('uploads/product_photos') }}/{{$product_photo->product_photos  }}" alt="">
                                                    @endforeach

                                                </td>

                                                <td>{{ $product->created_at }} </td>

                                                <td>
                                                   ---
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan='6' class="text-center text-danger">No Product to show</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-info p-3">
                            <div class="title-header option-title">
                                <h5 class="text-white"> Product Recycale Bin </h5>

                            </div>
                        </div>
                        <div class="card-body">


                            <div class="table-responsive Product-table">
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Product Name</th>
                                            <th>Date</th>

                                            <th>Product Icon</th>
                                            <th>Slug</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        {{-- @forelse ($deleted_categories as $deleted_Product)
                                            <tr>
                                                <td>{{ $deleted_Product->id }}</td>
                                                <td>{{ $deleted_Product->Product_name }}</td>

                                                <td>{{ $deleted_Product->created_at }} </td>


                                                <td>
                                                    <div class="Product-icon">
                                                        <img src="{{ asset('uploads/Product_icons') }}/{{ $deleted_Product->Product_icon }}"
                                                            class="img-fluid" alt="not found">
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="">{{ $deleted_Product->Product_slug }}</a>
                                                </td>

                                                <td>
                                                    <ul>

                                                        <li>
                                                                <a href="{{ route('Product.restore',$deleted_Product->id) }}" class="btn btn-sm btn-danger">
                                                                   Restore
                                                                </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('Product.parmanent.delete',$deleted_Product->id) }}" class="btn btn-sm btn-secondary">
                                                                Parmanent Delete
                                                               </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan='6' class="text-center text-danger">No Product to show</td>
                                            </tr>
                                        @endforelse --}}

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

