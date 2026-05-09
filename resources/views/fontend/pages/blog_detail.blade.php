@extends('fontend.layouts.app')
@section('title', 'About - ')
@section('content')


  <!-- Banner Style One Start -->
  <section class="banner-style-one">
    <div class="parallax" style="background-image: url({{asset('glenn-carstens-peters-npxXWgQ33ZQ-unsplash.jpg')}});"></div>
    <div class="container">
      <div class="row">
        <div class="banner-details">
          <h2>{{ $blog->title }}</h2>
          <p>{{ $blog->short_description }}</p>
        </div>
      </div>
    </div>
    <div class="breadcrums">
      <div class="container">
        <div class="row">
          <ul>
            <li>
              <a href="{{route('site.home')}}">
                <i class="fa-solid fa-house"></i>
                <p>Home</p>
              </a>
            </li>
            <li class="current">
              <p>{{ $blog->title }}</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- Banner Style One End -->

  <!-- Blog Style Three Start -->
  <section class="gap blog-style-one blog-detail detail-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="blog-post ">
            <div class="blog-data">
            
              <div class="blog-author d-flex-all justify-content-start">
                <div class="author-img">
                  <figure>
                    <img src="{{ asset('assets/images/chidiya.svg') }}" style="width:40px;aspect-ratio:1/1;object-fit: contain;"  alt="Blog Author Img">
                  </figure>
                </div>
                <div class="details">
                  <h3> <span>by</span> Passero</h3>
                </div>
              </div>
            </div>
            
            <div class="blog-image">
              <figure class="light-bg-color text-center">
                <img src="{{ \App\Services\Helpers::uploaded_asset($blog->banner) }}" style="max-height: 400px;width:auto;" alt="Blog Style Two 1">
              </figure>
            </div>
            <div class="blog-data">
              <span class="blog-date">{{ date('F d, Y', strtotime($blog->created_at)) }}</span>
              
            </div>
            
            {!! $blog->description !!}
            <div class="category shape social-medias">
              <p>
                Share this:
              </p>
                <ul>
                    <li class="twitter"><a class="twitter"
                        href="https://twitter.com/intent/tweet?text={{ url()->current() }}">Twitter</a></li>
                <li class="facebook"><a class="facebook"
                        href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}">Facebook</a></li>
                <li class="pinterest"><a class="googleplus"
                        href="https://pinterest.com/pin/create/button/?url=&media=&description={{ url()->current() }}">Printerest</a></li>
                <li class="twitter"><a class="in"
                        href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ $blog->title ?? '' }}&summary={{ $blog->short_description ?? '' }}&source=">Linkedin</a></li>
                </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <aside class="sidebar">
            <div class="box recent-posts">
              <h3>Recent Posts</h3>
              <ul>
                @foreach ($related as $r)
                <li>
                    <p>{{$r->title}}</p>
                    <a href="{{ route('site.blog_detail', $r->slug != null ? $r->slug : $r->id) }}">
                      <i class="fa-solid fa-arrow-up-long"></i>
                    </a>
                  </li>
                @endforeach
                @foreach ($latest as $l)
                <li>
                    <p>{{$l->title}}</p>
                    <a href="{{ route('site.blog_detail', $l->slug != null ? $l->slug : $l->id) }}">
                      <i class="fa-solid fa-arrow-up-long"></i>
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>
            <div class="box categories">
              <h3>Categories</h3>
              <ul>
                @foreach ($blog_category as $c)
                <li>
                    <a href="{{ route('site.news', $c->slug != null ? $c->slug : $c->id) }}">
                      <p>{{$c->category_name}}</p>
                    </a>
                  </li>
                @endforeach
                
              </ul>
            </div>
            
          </aside>
        </div>
      </div>
    </div>
  </section>
  <!-- Blog Style Three End -->



@endsection
