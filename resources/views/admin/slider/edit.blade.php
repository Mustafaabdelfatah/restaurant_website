@extends('layouts.admin')

@section('title','Edit Slider')

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
                        <h4 class="title">Edit</h4>
                    </div>
                    <div class="card-content">
                        <form method="POST" action="{{ route('slider.update',$slider->id) }}"
                            enctype="multipart/form-data">
                            <input name="id" value="{{$slider -> id}}" type="hidden">

                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12" style="padding:0 25px">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Title</label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ $slider->title }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="padding:0 25px">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Sub Title</label>
                                        <input type="text" class="form-control" name="sub_title"
                                            value="{{ $slider->sub_title }}">
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
                                <img src="{{ $slider->image_path }}" class="img-thumbnail image-preview"
                                    style="width:100px">
                            </div>
                            <a href="{{ route('slider.index') }}" class="btn btn-danger">Back</a>
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
