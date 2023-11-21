@extends('layouts.backend_master')
@section('content')
    <div class="page-body">


        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>All Category ({{ $categories->count() }} )</h5>
                                <form class="d-inline-flex">
                                    <a href="{{ route('category.create') }}" class="align-items-center btn btn-theme">
                                        <i data-feather="plus-square"></i>Add New
                                    </a>
                                </form>
                            </div>

                            <div class="table-responsive category-table">
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Category Name</th>
                                            <th>Date</th>

                                            <th>Category Icon</th>
                                            <th>Slug</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->category_name }}</td>

                                                <td>{{ $category->created_at }} </td>


                                                <td>
                                                    <div class="category-icon">
                                                        <img src="{{ asset('uploads/category_icons') }}/{{ $category->category_icon }}"
                                                            class="img-fluid" alt="not found">
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="">{{ $category->category_slug }}</a>
                                                </td>

                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('category.show', $category->id) }}">
                                                                <i class="ri-eye-line"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="{{ route('category.edit', $category->id) }}">
                                                                <i class="ri-pencil-line"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <form action="{{ route('category.destroy', $category->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-secondary">
                                                                    Deactive
                                                                </button>

                                                            </form>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan='6' class="text-center text-danger">No category to show</td>
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
                                <h5 class="text-white"> Category Recycale Bin </h5>

                            </div>
                        </div>
                        <div class="card-body">


                            <div class="table-responsive category-table">
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Category Name</th>
                                            <th>Date</th>

                                            <th>Category Icon</th>
                                            <th>Slug</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($deleted_categories as $deleted_category)
                                            <tr>
                                                <td>{{ $deleted_category->id }}</td>
                                                <td>{{ $deleted_category->category_name }}</td>

                                                <td>{{ $deleted_category->created_at }} </td>


                                                <td>
                                                    <div class="category-icon">
                                                        <img src="{{ asset('uploads/category_icons') }}/{{ $deleted_category->category_icon }}"
                                                            class="img-fluid" alt="not found">
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="">{{ $deleted_category->category_slug }}</a>
                                                </td>

                                                <td>
                                                    <ul>

                                                        <li>
                                                                <a href="{{ route('category.restore',$deleted_category->id) }}" class="btn btn-sm btn-danger">
                                                                   Restore
                                                                </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('category.parmanent.delete',$deleted_category->id) }}" class="btn btn-sm btn-secondary">
                                                                Parmanent Delete
                                                               </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan='6' class="text-center text-danger">No category to show</td>
                                            </tr>
                                        @endforelse

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
