@extends('layouts.backend_master')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Product Add Form</h5>
                                    </div>
                                    @if (session('success'))
                                        <div class="alert alert-primary">{{ session('success') }}</div>
                                    @endif
                                    <form class="theme-form theme-form-2 mega-form" enctype="multipart/form-data"
                                        method="POST" action="{{ route('product.store') }}">
                                        @csrf
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Category Name</label>
                                            <div class="col-sm-9">
                                                <select class="form-select" name="category_id" id="">
                                                    <option value="">Select ONe Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->category_name }}
                                                        </option>
                                                    @endforeach


                                                </select>

                                            </div>

                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title  col-sm-3 mb-0">Product Name</label>
                                            <div class="col-sm-9">
                                                <input name="product_name" class="form-control" type="text"
                                                    placeholder="Product Name">

                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title  col-sm-3 mb-0">Product Short Details</label>
                                            <div class="col-sm-9">
                                                <textarea name="product_short_details" class="form-control" id="" rows="2">

                                           </textarea>
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title  col-sm-3 mb-0">Product Long Details</label>
                                            <div class="col-sm-9">
                                                <textarea name="product_long_details" class="form-control" id="" rows="4">

                                           </textarea>
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title  col-sm-3 mb-0">Addition Information</label>
                                            <div class="col-sm-9">
                                                <textarea name="product_additional_info" class="form-control" id="" rows="4">

                                           </textarea>
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title  col-sm-3 mb-0">Care Instructions</label>
                                            <div class="col-sm-9">
                                                <textarea name="product_care_instructions" class="form-control" id="" rows="4">

                                           </textarea>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product Photos</label>
                                            <div class="col-sm-9">
                                                <input name="product_photos[]" class="form-control" type="file"
                                                    multiple>
                                                @error('category_icon')
                                                    <small class="text-danger"> {{ $message }} </small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">

                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-primary"> Add New Product</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
