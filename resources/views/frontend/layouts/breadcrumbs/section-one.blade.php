<div class="title text-center mb-4" id="gioithieu">
    <h2 class="text-danger fw-bold" style="font-size: 2.5rem">
        {{ $video->title }}
    </h2>
</div>
<div class="video  container">
    {{-- <iframe class="w-75 w-sm-75 w-md-50" height="545"
        src="https://www.youtube.com/embed/{{ getYouTubeVideoId($video->url) }}?si=F0KlYdbhWuXDbbaS"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> --}}
    <video width="100%" height="auto" controls autoplay muted>
        <source src="{{ showImage($video->file_path) }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>
