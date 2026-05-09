@extends('fontend.layouts.app')
@section('title', 'We Garnish The Architect')
@section('content')

    <!-- Banner Style One Start -->
    <section class="banner-style-one">
        <div class="parallax" style="background-image: url({{ asset('glenn-carstens-peters-npxXWgQ33ZQ-unsplash.jpg') }});"></div>
        <div class="container">
            <div class="row">
                <div class="banner-details">
                    <h2 class="chidiya__title">News & Events</h2>
                    <p>our values and vaulted us to the top of our industry.</p>
                </div>
            </div>
        </div>
        <div class="breadcrums">
            <div class="container">
                <div class="row">
                    <ul>
                        <li>
                            <a href="{{ route('site.home') }}">
                                <i class="fa-solid fa-house"></i>
                                <p>Home</p>
                            </a>
                        </li>
                        <li class="current">
                            <p>News & Events</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Style One End -->

    <!-- Blog Style One Start -->
    <section class="gap blog-style-one our-blog-one">
        <div class="container">
            <div class="row">
                @foreach ($blogs as $b)
                    <div class="col-lg-4">
                        <div class="blog-post">
                            <div class="blog-image">
                                <figure>
                                    <img src="{{ \App\Services\Helpers::uploaded_asset($b->banner) }}" alt="blog-img-1">
                                </figure>
                                <a href="{{ route('site.blog_detail', $b->slug != null ? $b->slug : $b->id) }}">
                                    <i class="fa-solid fa-angles-right"></i>
                                </a>
                            </div>
                            <div class="blog-data">
                                <span class="blog-date">{{ date('F d, Y', strtotime($b->created_at)) }}</span>
                                <h2>
                                    <a href="{{ route('site.blog_detail', $b->slug != null ? $b->slug : $b->id) }}">{{ $b->title ?? '' }}</a>
                                </h2>
                                <div class="blog-author d-flex-all justify-content-start">
                                    <div class="author-img">
                                        <figure>
                                            <img src="{{ asset('assets/images/chidiya.svg') }}" style="width:30px;aspect-ratio:1/1;object-fit: contain;" alt="Blog Author Img">
                                        </figure>
                                    </div>
                                    <div class="details">
                                        <h3> <span>by</span> Passero</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="builty-pagination">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            @if ($blogs->lastPage() > 1)
                            @php
                                $currentQuery = app('request')->query();
                                unset($currentQuery['page']);
                            @endphp
                            <ul class="pagination">
                                @if (!($blogs->currentPage() == 1 || $blogs->currentPage() == 0))
                                    <li class="page-item  {{ $blogs->currentPage() == 1 ? ' disabled' : '' }}">
                                        <a class="page-link " {{ $blogs->currentPage() == 1 ? ' disabled' : '' }}
                                            href="{{ $blogs->url(1) . '&' . http_build_query($currentQuery) }}"><span
                                                aria-hidden="true"><i class='fa-solid fa-arrow-left-long'></i></span></a>
                                    </li>
                                @endif
                                @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                                    <?php
                                    $half_total_links = floor($blogs->lastPage() + 1 / 2);
                                    $from = $blogs->currentPage() - $half_total_links;
                                    $to = $blogs->currentPage() + $half_total_links;
                                    if ($blogs->currentPage() < $half_total_links) {
                                        $to += $half_total_links - $blogs->currentPage();
                                    }
                                    if ($blogs->lastPage() - $blogs->currentPage() < $half_total_links) {
                                        $from -= $half_total_links - ($blogs->lastPage() - $blogs->currentPage()) - 1;
                                    }
                                    ?>
                                    @if ($from < $i && $i < $to)
                                        <li class="page-item  {{ $blogs->currentPage() == $i ? ' active' : '' }}">
                                            <a class="page-link  {{ $blogs->currentPage() == $i ? ' active' : '' }}"
                                                href="{{ $blogs->url($i) . '&' . http_build_query($currentQuery) }}">{{ $i }}</a>
                                        </li>
                                    @endif
                                @endfor
                                @if (!($blogs->currentPage() == $blogs->lastPage()))
                                    <li
                                        class="page-item  {{ $blogs->currentPage() == $blogs->lastPage() ? ' disabled' : '' }}">
                                        <a class="page-link  {{ $blogs->currentPage() == $blogs->lastPage() ? ' disabled' : '' }}"
                                            href="{{ $blogs->url($blogs->lastPage()) . '&' . http_build_query($currentQuery) }}"><span
                                                aria-hidden="true"><i class='fa-solid fa-arrow-right-long'></i></span></a>
                                    </li>
                                @endif
                            </ul>
                        @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Style One End -->



@endsection
