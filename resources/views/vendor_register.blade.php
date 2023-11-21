@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
           <div class="card-header">
          Apply to become a vendor
           </div>
                <div class="card-body">
                    @if(session('success'))
                     <div class="alert alert-success">
                       {{ session('success') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('vendor.register.post') }}">
                        @csrf
                        <div class="mb-3">
                          <label  class="form-label">Company Name</label>
                          <input type="text" class="form-control" name="name" value="{{ old('name') }}" >
                          @error('name')
                          <small class="text-danger">{{ $message }}</small>
                          @enderror


                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            @error('email')
                          <small class="text-danger">{{ $message }}</small>
                          @enderror


                          </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Password</label>
                          <input type="password" class="form-control" name="password" >
                          @error('password')
                          <small class="text-danger">{{ $message }}</small>
                          @enderror

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" >
                          </div>

                        <button type="submit" class="btn btn-primary">Apply</button>
                      </form>
                      <p>
                      Allready have an vendor account?
                        <a href="{{ route ('login') }}"> Login</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
