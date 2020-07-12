@extends('layouts.admin')

@section('title','Create')

@push('css')

@endpush

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('admin.includes.alerts.success')
                @include('admin.includes.alerts.errors')

                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Add New Item</h4>
                    </div>
                    <div class="card-content">
                        <form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-12" style="margin:20px 0;padding:0 30px">
                                    <div class="form-group">
                                        <label style="margin-bottom:20px">Choose Category</label>
                                        <select name="category_id" class="form-control">
                                            <option value="">All Categories</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="margin:20px 0;padding:0 30px">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Name</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="margin:20px 0;padding:0 30px">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Description</label>
                                        <textarea class="form-control" name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="margin:20px 0;padding:0 30px">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Price</label>
                                        <input type="number" class="form-control" name="price">
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                    <div class="col-md-12" style="margin:20px 0">
                                        <label class="control-label" style="padding:0 10px">Image</label>
                                        <input type="file" style="color:#ddd" class="image" name="image">
                                    </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12" style="margin:20px 0">
                                    <div class="form-group label-floating">
                                        <img src="{{asset('backend/img/items/default.png')}}" class="img-thumbnail image-preview" style="width:100px">
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('items.index') }}" class="btn btn-danger">Back</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush
