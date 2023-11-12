@extends('admin.user-master')

@section('content')
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-3">Edit Item</h5>
        </div>
        <form action="{{ route('admin.item.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body" style="color: #fff">
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="Title" class="form-control digits" value="{{ $product->Title }}" placeholder="Title">
                            </div>
                            @error('Title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <input type="text" name="Description" class="form-control digits" value="{{ $product->Description }}" placeholder="Description">
                            </div>
                            @error('Description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                                <input class="form-control digits" type="text" name="Price" value="{{ $product->Price }}" placeholder="Price">
                            </div>
                            @error('Price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input class="form-control digits" type="file" name="Image" placeholder="Image">
                            </div>
                            @error('Image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-3">
                            @if ($product->Image)
                                <img src="{{ asset($product->Image) }}" alt="Current Image" style="max-width: 50px; max-height: 50px;">
                            @else
                                <p>No image selected</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-sm-9 offset-sm-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.item.view_all_item') }}" class="btn btn-light">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection
