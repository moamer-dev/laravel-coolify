<div class="menu menu-sub menu-sub-dropdown menu-column w-100 w-sm-350px" data-kt-menu="true">
    <div class="card">
        <div class="card-header">
            <div class="card-title">التكنولوجيات</div>
        </div>
        <div class="card-body py-5">
            <div class="mh-450px scroll-y me-n5 pe-5">
                <div class="row g-2">
                    @if ($user->technologies->isEmpty())
                        <div class="col-12">
                            <div class="text-center text-muted fs-6">قم بتحديد مسارك التعليمي أولاً</div>
                        </div>
                    @endif
                    @foreach ($user->technologies as $technology)
                        <div class="col-4">
                            <a href="{{ route('technology-view', $technology->slug) }}"
                                class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                <img src="{{ photo_or_default($technology->image) }}" class="w-25px h-25px mb-2"
                                    alt="" />
                                <span class="fw-semibold">{{ $technology->name }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
