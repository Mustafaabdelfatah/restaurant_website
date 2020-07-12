 @extends('layouts.admin')

@section('title','Edit Category')

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
                        <form method="POST" action="{{ route('categories.update',$category->id) }}"
                            enctype="multipart/form-data">
                            <input name="id" value="{{$category->id}}" type="hidden">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12" style="padding:0 25px">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $category->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="padding:0 25px">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Slug</label>
                                        <input type="text" class="form-control" name="slug"
                                            value="{{ $category->slug }}">
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('categories.index') }}" class="btn btn-danger">Back</a>
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
