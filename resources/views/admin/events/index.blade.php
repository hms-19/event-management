@extends('layouts.admin-base')

@section('title','Event')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Events</h4>
                    <a href="{{ route("events.create") }}" class="btn btn-primary">Add New</a>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $key => $event)
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
                                    <td>
                                        <a href="{{ route("events.edit",['event'=> $event]) }}" class="btn btn-primary shadow btn-xs sharp ">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a onclick="if(confirm('Are you Sure?')) document.getElementById('deleteEvent{{ $event->id }}').submit();" href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp ">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form id="deleteEvent{{ $event->id }}" action="{{ route('events.delete',['event' => $event]) }}">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {!! $events->links() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
