@extends('layouts.admin')

@section('title','Add New Slider')

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
                        <h4 class="title">Add New Slider</h4>
                    </div>
                    <div class="card-content">
                        <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12" style="margin:20px 0;padding:0 30px">
                                    <div class="form-group ">
                                        <label class="control-label"  style="padding:0 10px">Title</label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="margin:20px 0;padding:0 30px">
                                    <div class="form-group label-floating">
                                        <label class="control-label"  style="padding:0 10px">Sub Title</label>
                                        <input type="text" class="form-control" name="sub_title">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                    <div class="col-md-12" style="margin:20px 0;padding:0 30px">
                                        <label class="control-label" style="padding:0 10px">Image</label>
                                        <input type="file" style="color:#ddd" class="image" name="image">
                                    </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12" style="margin:20px 0;padding:0 30px">
                                    <div class="form-group label-floating">
                                        <img src="{{asset('backend/img/slider/default.png')}}" class="img-thumbnail image-preview" style="width:100px">
                                    </div>
                                </div>
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
