@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create new post</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/absences" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="attendence_id" class="form-label">Absen At</label>
                <select class="form-select" name="attendence_id" id="attendence_id">
                    @foreach ($attendences as $attendence)
                        @if (old('attendence_id') == $attendence->id)
                            <option value="{{ $attendence->id }}" selected>{{ $attendence->title }}</option>
                        @else
                            <option value="{{ $attendence->id }}">{{ $attendence->title }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit Absention</button>
        </form>
    </div>

    <script>
        // start slugable
        // const title = document.querySelector('#title');
        // const slug = document.querySelector('#slug');

        // title.addEventListener('change', function() {
        //     fetch('/dashboard/posts/checkSlug?title=' + title.value)
        //         .then(response => response.json())
        //         .then(data => slug.value = data.slug)
        // });
        // end slugable

        // start trix
        // document.addEventListener('trix-file-accept', function(e) {
        //     e.preventDefault();
        // })
        // end trix

        // Start img preview
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
        // End img preview
    </script>
@endsection
