 @extends('layouts.admin')

@section('title','Add Category')

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
                        <h4 class="title">Add New Category</h4>
                    </div>
                    <div class="card-content">
                        <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12" style="margin:20px 0;padding:0 30px">
                                    <div class="form-group ">
                                        <label class="control-label"  >Name</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="margin:20px 0;padding:0 30px">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Slug</label>
                                        <input type="text" class="form-control" name="slug">
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
