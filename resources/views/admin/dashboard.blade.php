  @extends('layouts.admin')
  @section('title','Dahboard')
  @inject('category','App\Models\Category')
  @inject('item','App\Models\Item')
  @inject('slider','App\Models\Slider')
  @inject('reservation','App\Models\Reservation')
  @inject('contact','App\Models\Contact')

  @section('content')

  <div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card card-stats">
                      <div class="card-header card-header-warning card-header-icon">
                          <div class="card-icon">
                              <i class="material-icons">content_copy</i>
                          </div>
                          <p class="card-category"> Category/ Item</p>
                          <h3 class="card-title">
                          {{$category->count()}} / {{$item->count()}}
                          </h3>
                      </div>
                      <div class="card-footer">
                          <div class="stats">
                              <i class="material-icons text-danger">info</i>
                              <a href="javascript:;"> Total Categories And Items</a>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card card-stats">
                      <div class="card-header card-header-success card-header-icon">
                          <div class="card-icon">
                              <i class="material-icons">Slideshow</i>
                          </div>
                          <p class="card-category">Slider Count</p>
                          <h3 class="card-title">{{$slider->count()}}</h3>
                      </div>
                      <div class="card-footer">
                          <div class="stats">
                              <i class="material-icons">date_range</i>
                               <a href="{{route('slider.index')}}">Get More Details </a>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card card-stats">
                      <div class="card-header card-header-danger card-header-icon">
                          <div class="card-icon">
                              <i class="material-icons">info_outline</i>
                          </div>
                          <p class="card-category">Reservation</p>
                          <h3 class="card-title">{{$reservation->status === 0 ? '$reservation->count()' :'  confirmed'}}</h3>
                      </div>
                      <div class="card-footer">
                          <div class="stats">
                              <i class="material-icons">local_offer</i> Not Confirmed Reservation
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card card-stats">
                      <div class="card-header card-header-info card-header-icon">
                          <div class="card-icon">
                              <i class="fa fa-twitter"></i>
                          </div>
                          <p class="card-category">Contact</p>
                          <h3 class="card-title">{{$contact->count()}}</h3>
                      </div>
                      <div class="card-footer">
                          <div class="stats">
                              <i class="material-icons">update</i> Just Updated
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
                <div class="col-md-12">
                    @include('admin.includes.alerts.success')
                    @include('admin.includes.alerts.errors')
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Reservations</h4>
                        </div>
                        <div class="card-content table-responsive">
                            <table id="table" class="table"  cellspacing="0" width="100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($reservations as $key=>$reservation)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $reservation->name }}</td>
                                        <td>{{ $reservation->phone }}</td>
                                        <th>
                                            @if($reservation->status == true)
                                                <span class="label label-info">Confirmed</span>
                                            @else
                                                <span class="label label-danger">not Confirmed yet</span>
                                            @endif

                                        </th>
                                        <td>
                                            @if($reservation->status == false)
                                                <form id="status-form-{{ $reservation->id }}" action="{{ route('reservation.status',$reservation->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                </form>
                                                <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('Are you verify this request by phone?')){
                                                        event.preventDefault();
                                                        document.getElementById('status-form-{{ $reservation->id }}').submit();
                                                        }else {
                                                        event.preventDefault();
                                                        }"><i class="material-icons">done</i></button>
                                            @endif
                                            <form id="delete-form-{{ $reservation->id }}" action="{{ route('reservation.destory',$reservation->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $reservation->id }}').submit();
                                                    }else {
                                                    event.preventDefault();
                                                    }"><i class="material-icons">delete</i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

      </div>
  </div>

  @endsection

