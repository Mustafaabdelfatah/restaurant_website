@extends('layouts.admin')

@section('title','Edit')

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
                        <h4 class="title">Edit Category</h4>
                    </div>
                    <div class="card-content">
                        <form method="POST" action="{{ route('items.update',$item->id) }}"
                            enctype="multipart/form-data">
                            <input name="id" value="{{$item -> id}}" type="hidden">

                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12" style="padding:0 25px">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Category</label>
                                        <select class="form-control" name="category_id">
                                            @foreach($categories as $category)
                                            <option {{ $category->id == $item->category->id ? 'selected' : '' }}
                                                value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="padding:0 25px">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Name</label>
                                        <input type="text" class="form-control" value="{{ $item->name }}" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="padding:0 25px">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Description</label>
                                        <textarea class="form-control"
                                            name="description">{{ $item->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="padding:0 25px">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Price</label>
                                        <input type="number" class="form-control" value="{{ $item->price }}"
                                            name="price">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="padding:0 25px">
                                    <label class="control-label">Image</label>
                                    <input type="file" name="image" class="form-control image">
                                </div>
                            </div>

                            <div class="form-group">
                                <img src="{{ $item->image_path }}" class="img-thumbnail image-preview"
                                    style="width:100px">
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
