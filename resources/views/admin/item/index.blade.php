 @extends('layouts.admin')

@section('title','Items')

@push('css')

@endpush

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('admin.includes.alerts.success')
                @include('admin.includes.alerts.errors')

                <a href="{{ route('items.create') }}" class="btn btn-primary">Add New Item</a>

                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <form action="{{route('items.index')}}" method="get" style="margin:25px 0">
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
                                <th>Image</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @isset($items)
                                @foreach($items as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td> <img src="{{$item->image_path}}" style="width:100px" class="img-thumbnail">
                                    </td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('items.edit',$item->id) }}" class="btn btn-info btn-sm"><i
                                                class="material-icons">mode_edit</i></a>

                                        <form id="delete-form-{{ $item->id }}"
                                            action="{{ route('items.destroy',$item->id) }}" style="display: none;"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $item->id }}').submit();
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

                       {{ $items->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush


