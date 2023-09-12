@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h2>{{ $announcement->title }}</h2>
                <a href="/dashboard/announcements" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all
                    Announcements</a>

                @if ($announcement->user_id == auth()->user()->id)
                    <a href="/dashboard/announcements/{{ $announcement->slug }}/edit" class="btn btn-warning"><span
                            data-feather="edit"></span>
                        Edit</a>
                    <form action="/dashboard/announcements/{{ $announcement->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                            <span data-feather="x-circle"></span> Delete
                        </button>
                    </form>
                @endif

                <div style="max-height: 350px; overflow: hidden;">
                    <img src="https://source.unsplash.com/850x400/?personal" class="img-fluid mt-3" height="400"
                        alt="">
                </div>

                <article class="my-3 fs-5">
                    {!! $announcement->body !!}
                </article>
            </div>
        </div>
    </div>
@endsection
