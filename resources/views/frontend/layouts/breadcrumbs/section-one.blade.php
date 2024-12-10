<div class="title text-center mb-4" id="gioithieu">
    <h2 class="text-danger fw-bold" style="font-size: 2.5rem">
        {{$video->title}}
    </h2>
</div>
<div class="video d-flex justify-content-center container">
    <iframe class="w-75 w-sm-75 w-md-50" height="545"
        src="https://www.youtube.com/embed/{{ getYouTubeVideoId($video->url) }}?si=F0KlYdbhWuXDbbaS"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
</div>
