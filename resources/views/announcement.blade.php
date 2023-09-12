@extends('layouts.main')

@section('container')
    <h2 class="mt-3">Newest!</h2>
    {{-- Card --}}
    @if ($announcements->count())
        @foreach ($announcements as $announcement)
            <div class="row d-flex bg-dark text-white py-3 mt-4 rounded">
                <div class="col-md-3">
                    <div class="justify-content-start" style="width: 18rem;">
                        <img src="https://source.unsplash.com/230x370/?personal" class="rounded border border-secondary"
                            alt="...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="justify-content-end">
                        <h3>{{ $announcement->title }}</h3>
                        <p>{!! $announcement->body !!}</p>
                    </div>
                    <h6 class="mb-2 text-secondary">{{ $announcement->created_at->diffForHumans() }}</h6>
                </div>
            </div>
        @endforeach
        {{-- Card --}}
    @else
        <p class="text-center fs-4">No Post Found.</p>
    @endif

@endsection
