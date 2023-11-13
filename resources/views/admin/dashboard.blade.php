@extends('layouts.admin-base')

@section('title','Dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
                        <img src="{{ asset('assets/frontend/images/users.png') }}" width="55px" height="50px" style="object-fit: :cover; margin-right: 10px" alt="">
                        <div class="media-body">
                            <p class="mb-1">Total User</p>
                            <div id="buy-total-prices"><h4 class="mb-0">{{ $total_user }}</h4></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
                        <img src="{{ asset('assets/frontend/images/admin.png') }}" width="55px" height="50px" style="object-fit: :cover; margin-right: 10px" alt="">
                        <div class="media-body">
                            <p class="mb-1">Total Admin</p>
                            <div id="buy-total-prices"><h4 class="mb-0">{{ $total_admin }}</h4></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
                        <img src="{{ asset('assets/frontend/images/users.png') }}" width="55px" height="50px" style="object-fit: :cover; margin-right: 10px" alt="">
                        <div class="media-body">
                            <p class="mb-1">Total Pre Foundation User</p>
                            <div id="buy-total-prices"><h4 class="mb-0">{{ $total_pre_foundation_user }}</h4></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
                        <img src="{{ asset('assets/frontend/images/users.png') }}" width="55px" height="50px" style="object-fit: :cover; margin-right: 10px" alt="">
                        <div class="media-body">
                            <p class="mb-1">Total Foundation User</p>
                            <div id="buy-total-prices"><h4 class="mb-0">{{ $total_foundation_user }}</h4></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
                        <img src="{{ asset('assets/frontend/images/users.png') }}" width="55px" height="50px" style="object-fit: :cover; margin-right: 10px" alt="">
                        <div class="media-body">
                            <p class="mb-1">Total HD & Bachelor User</p>
                            <div id="buy-total-prices"><h4 class="mb-0">{{ $total_hd_bachelor_user }}</h4></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
                        <img src="{{ asset('assets/frontend/images/announcements.png') }}" width="55px" height="50px" style="object-fit: :cover; margin-right: 10px" alt="">
                        <div class="media-body">
                            <p class="mb-1">Total Announcement</p>
                            <div id="buy-total-prices"><h4 class="mb-0">{{ $total_announcement }}</h4></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Comming One Time Events</h4>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                            <strong>Success!</strong> {{ session('success') }}
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Program</th>
                                    <th>Time</th>
                                    <th>Charges</th>
                                    <th>Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($one_time_events as $key => $event)
                                    <td>{{ $event->id }}</td>
                                    <td>{{ $event->title }}</td>
                                    <td><?= $event->is_one_time == 1 ? Carbon\Carbon::parse($event->date)->format('d-m-Y') : $event->day ?></td>
                                    <td>
                                        @if ($event->program == 'pre-foundation')
                                            <div class="badge badge-info">{{ $event->program }}</div>                                                                                                     
                                        @elseif ($event->program == 'foundation')
                                            <div class="badge badge-warning">{{ $event->program }}</div> 
                                        @elseif ($event->program == 'hd-bachelor')
                                            <div class="badge badge-secondary">{{ $event->program }}</div>                                                                                                            
                                        @else
                                            <div class="badge badge-success">{{ $event->program }}</div>                                                                                                            
                                        @endif
                                    </td>
                                    <td>
                                        {{ $event->start_time }} - {{ $event->end_time }}
                                    </td>
                                    <td>
                                        {{ $event->charges }}
                                    </td>
                                    <td>
                                        {{ $event->location }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {!! $one_time_events->links() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Long Time Events</h4>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                            <strong>Success!</strong> {{ session('success') }}
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Program</th>
                                    <th>Time</th>
                                    <th>Charges</th>
                                    <th>Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($long_time_events as $key => $event)
                                    <td>{{ $event->id }}</td>
                                    <td>{{ $event->title }}</td>
                                    <td><?= $event->is_one_time == 1 ? Carbon\Carbon::parse($event->date)->format('d-m-Y') : $event->day ?></td>
                                    <td>
                                        @if ($event->program == 'pre-foundation')
                                            <div class="badge badge-info">{{ $event->program }}</div>                                                                                                     
                                        @elseif ($event->program == 'foundation')
                                            <div class="badge badge-warning">{{ $event->program }}</div> 
                                        @elseif ($event->program == 'hd-bachelor')
                                            <div class="badge badge-secondary">{{ $event->program }}</div>                                                                                                            
                                        @else
                                            <div class="badge badge-success">{{ $event->program }}</div>                                                                                                            
                                        @endif
                                    </td>
                                    <td>
                                        {{ $event->start_time }} - {{ $event->end_time }}
                                    </td>
                                    <td>
                                        {{ $event->charges }}
                                    </td>
                                    <td>
                                        {{ $event->location }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {!! $long_time_events->links() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
