 @extends('layouts.admin')

@section('title','Category')

@push('css')

@endpush

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('admin.includes.alerts.success')
                @include('admin.includes.alerts.errors')

                <a href="{{ route('categories.create') }}" class="btn btn-primary">Add New Category</a>

                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <form action="{{route('categories.index')}}" method="get" style="margin:25px 0">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="search" class="form-control"
                                        value="{{ request()->search }}" placeholder="Search">
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>
                                        Search
                                    </button>
                                </div>
                            </div>

                        </form><!-- end of form -->
                    </div>

                    <div class="card-content table-responsive">

                        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead class="text-primary">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @isset($categories)
                                @foreach($categories as $index => $category)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>{{ $category->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-info btn-sm"><i
                                                class="material-icons">mode_edit</i></a>

                                        <form id="delete-form-{{ $category->id }}"
                                            action="{{ route('categories.destroy',$category->id) }}" style="display: none;"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $category->id }}').submit();
                                                }else {
                                                    event.preventDefault();
                                                        }"><i class="material-icons">delete</i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                @endisset
                            </tbody>
                        </table>

                       {{ $categories->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush
