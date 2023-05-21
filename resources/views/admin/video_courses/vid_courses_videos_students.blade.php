@extends('layouts.admin')
@section('content')
    <div class="row">

        @forelse ($videos as $video)
            <div class="col-12 col-md-4 col-lg-3">
                <div class="single-video card  rounded-3 pt-3">
                    <div class="card-header d-flex justify-content-center">
                        <iframe class="" width="330" height="180" src="{{ $video->video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen style="border-radius: 10px"></iframe>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <h6 class="fw-normal">Class #{{ $video->class_no }}</h6>
                            <h5>{{ $video->video_title }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center">
                <p class="">No Videos Found</p>
            </div>
        @endforelse
    </div>
@endsection

@section('style')
    <style>
        .slot-day {
            display: none;
        }

        form .error {
            font-size: .9em;
            color: #dc3545;
            display: none;
        }
    </style>
@endsection

@section('script')
    {{-- @if (session('addSuccess'))
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '{{ session('addSuccess') }}',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
        @endif --}}

    {{-- @if (session('dltSuccess'))
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '{{ session('dltSuccess') }}',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
        @endif --}}
    <script>
        // class video
        $('.edit-video').click(function() {
            let id = $(this).data('id');
            let url = "{{ route('admin.video.edit', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                method: 'get',
                url: url,
                success: function(response) {
                    $('#editVideo').modal('show');
                    $('#editVideo .modal-body').html(response);
                }
            })
        });

        $('#edit-video-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                method: 'POST',
                url: "{{ route('admin.video.update') }}",
                data: $(this).serialize(),
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $('.delete-video').click(function() {
            let id = $(this).data('id');
            let url = "{{ route('admin.video.delete', ':id') }}";
            url = url.replace(':id', id);
            delete_warning(url);
        });
    </script>
@endsection
