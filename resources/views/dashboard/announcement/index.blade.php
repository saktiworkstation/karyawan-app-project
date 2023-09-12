@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Announcement</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive col-lg-8">
        <a href="/dashboard/announcements/create" class="btn btn-primary mb-3">Create new Announcement</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($announcements as $announcement)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $announcement->title }}</td>
                        <td>{{ $announcement->author->name }}</td>
                        <td><a href="/dashboard/announcements/{{ $announcement->slug }}" class="badge bg-info">
                                <span data-feather="eye"></span>
                            </a>
                            @if ($announcement->user_id == auth()->user()->id)
                                <a href="/dashboard/announcements/{{ $announcement->slug }}/edit" class="badge bg-warning">
                                    <span data-feather="edit"></span>
                                </a>
                                <form action="/dashboard/announcements/{{ $announcement->slug }}" method="post"
                                    class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                                        <span data-feather="x-circle"></span>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
