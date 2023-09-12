@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Attendence</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/attendences/{{ $attendence->slug }}" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    required autofocus value="{{ old('title', $attendence->title) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control  @error('slug') is-invalid @enderror" id="slug"
                    name="slug" required value="{{ old('slug', $attendence->slug) }}">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">update attendence</button>
        </form>
    </div>

    <script>
        // // start slugable
        // const title = document.querySelector('#title');
        // const slug = document.querySelector('#slug');

        // title.addEventListener('change', function() {
        //     fetch('/dashboard/posts/checkSlug?title=' + title.value)
        //         .then(response => response.json())
        //         .then(data => slug.value = data.slug)
        // });
        // // end slugable

        // // start trix
        // document.addEventListener('trix-file-accept', function(e) {
        //     e.preventDefault();
        // })
        // // end trix

        // // Start img preview
        // function previewImage() {
        //     const image = document.querySelector('#image');
        //     const imgPreview = document.querySelector('.img-preview');

        //     imgPreview.style.display = 'block';

        //     const oFReader = new FileReader();
        //     oFReader.readAsDataURL(image.files[0]);

        //     oFReader.onload = function(oFREvent) {
        //         imgPreview.src = oFREvent.target.result;
        //     }
        // }
        // // End img preview
    </script>
@endsection
