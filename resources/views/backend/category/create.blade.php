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
                                    <h5>Category Information</h5>
                                </div>

                                <form class="theme-form theme-form-2 mega-form" enctype="multipart/form-data" method="POST" action="{{ route('category.store') }}">
                                    @csrf
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Category Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text"
                                                placeholder="Category Name" name="category_name">
                                                @error('category_name')
                                              <small class="text-danger"> {{ $message }} </small>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title  col-sm-3 mb-0">Category Details</label>
                                        <div class="col-sm-9">
                                           <textarea name="category_details" class="form-control" id=""  rows="4">

                                           </textarea>
                                           @error('category_details')
                                           <small class="text-danger"> {{ $message }} </small>
                                             @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Category Icon</label>
                                        <div class="col-sm-9">
                                            <input name="category_icon" class="form-control" type="file"
                                                placeholder="Category Icon">
                                                @error('category_icon')
                                                <small class="text-danger"> {{ $message }} </small>
                                                  @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">

                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary" > Add New Category</button>
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
