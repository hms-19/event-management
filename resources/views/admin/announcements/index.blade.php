@extends('layouts.admin-base')

@section('title','Announcements')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Announcements</h4>
                    <a href="{{ route("announcements.create") }}" class="btn btn-primary">Add New</a>
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
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Updated at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($announcements as $key => $announcement)
                                    <tr>
                                        <td>{{ $announcement->id }}</td>
                                        <td>
                                            <img src="{{ asset(''.$announcement->image) }}" alt="" style="width:100px;height:60px;object-fit:cover">
                                        </td>
                                        <td>{{ $announcement->title }}</td>
                                        <td>{{ $announcement->category }}</td>
                                        <td>{{ Carbon\Carbon::parse($announcement->created_at)->format('d-m-Y') }}</td>
                                        <td>
                                            <a href="{{ route("announcements.edit",['announcement'=> $announcement]) }}" class="btn btn-primary shadow btn-xs sharp ">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a onclick="if(confirm('Are you Sure?')) document.getElementById('deleteAnnouncement{{ $announcement->id }}').submit();" href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp ">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form id="deleteAnnouncement{{ $announcement->id }}" action="{{ route('announcements.delete',['announcement' => $announcement]) }}">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {!! $announcements->links() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
