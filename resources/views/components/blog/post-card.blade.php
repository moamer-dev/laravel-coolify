<div class="card mb-4 card-lift hover-elevate-up parent-hover">
    <a href="{{ route('post-view', ['slug' => $post->slug]) }}">
        <img src="{{ feature_image_or_default($post->image) }}" class="card-img-top" alt="blogpost ">
    </a>
    <div class="card-body">
        <a href="{{ route('post-view', ['slug' => $post->slug]) }}"
            class="fs-5 mb-2 fw-semibold d-block text-gray-800">{{ $post->category->name }}</a>
        <h3><a href="{{ route('post-view', ['slug' => $post->slug]) }}" class="text-gray-800">{{ $post->title }}</a></h3>
    </div>
</div>
