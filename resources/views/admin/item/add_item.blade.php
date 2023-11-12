@extends('admin.user-master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Booked Your Meal</h5>
        </div>
        <form action="{{ route('admin.item.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">

                                <input type="text" name="Title" class="form-control digits" placeholder="Title">
                                @error('Title')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <input type="text" name="Description" class="form-control digits"
                                    placeholder="Description">
                                @error('Description')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                                <input class="form-control digits" type="text" name="Price" placeholder="Price">
                                @error('Price')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input class="form-control digits" type="file" name="Image" placeholder="Image">
                                @error('Image')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-sm-9 offset-sm-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <input type="reset" class="btn btn-light" value="Cancel">
                </div>
            </div>
        </form>
    </div>
@endsection
