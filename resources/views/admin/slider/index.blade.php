@extends('layouts.admin')

@section('title','Slider')

@push('css')

@endpush

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('admin.includes.alerts.success')
                @include('admin.includes.alerts.errors')

                <a href="{{ route('slider.create') }}" class="btn btn-primary">Add New Slider</a>

                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <form action="{{route('slider.index')}}" method="get" style="margin:25px 0">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="search" class="form-control"
                                        value="{{ request()->search }}" placeholder="Search By Title">
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
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @isset($sliders)
                                @foreach($sliders as $index => $slider)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->sub_title }}</td>
                                    <td> <img src="{{$slider->image_path}}" style="width:100px" class="img-thumbnail">
                                    </td>
                                    <td>{{ $slider->created_at }}</td>
                                    <td>{{ $slider->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('slider.edit',$slider->id) }}" class="btn btn-info btn-sm"><i
                                                class="material-icons">mode_edit</i></a>

                                        <form id="delete-form-{{ $slider->id }}"
                                            action="{{ route('slider.destroy',$slider->id) }}" style="display: none;"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $slider->id }}').submit();
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

                       {{ $sliders->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush
