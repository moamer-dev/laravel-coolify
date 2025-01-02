<div class="mb-17">
    <div class="d-flex flex-stack mb-5">
        <h3 class="text-gray-900">مواضيع ذات صلة</h3>
    </div>
    <div class="separator separator-dashed mb-9"></div>
    <div class="row g-10">
        @foreach ($related_posts as $related_post)
            <div class="col-md-3">
                @include('components.blog.post-card', ['post' => $related_post])
            </div>
        @endforeach
    </div>
</div>
