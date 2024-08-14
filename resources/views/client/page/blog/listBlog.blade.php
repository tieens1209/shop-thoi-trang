@extends('layout.client')
@section('content')

<!-- Blog -->
<div class="blog">
    <!-- Container -->
    <div class="container">
      <!-- Title -->
      <h1 class="blog__title">World of Utero</h1>
      <!-- End title -->
      <!-- Bar -->
      <div class="blog__bar d-flex align-items-center">
        <!-- Categories -->
        <ul class="blog__categories">
          <li><a href="#" class="active">Latest</a></li>
          <li><a href="#">Inspiration</a></li>
          <li><a href="#">Lookbook</a></li>
          <li><a href="#">Life style</a></li>
          <li><a href="#">Tips & Tricks</a></li>
          <li><a href="#">Others</a></li>
        </ul>
        <!-- End categories -->
        <!-- Search -->
        <div class="blog__search">
          <form>
            <input type="text" class="blog-search__input" placeholder="Search in blog" />
            <button type="submit" class="blog-search__button"><i class="lnil lnil-search-alt"></i></button>
          </form>
        </div>
        <!-- End search -->
      </div>
      <!-- End bar -->
      <!-- Featured articles -->
      <div class="featured-articles js-featured-articles">
        <!-- Article -->
        @foreach ($blogs as $blog)
        <div class="featured-article">
          <!-- Link -->
          <a href="{{route('detailBlog', $blog->id)}}" class="featured-article__link"></a>
          <!-- End link -->
          <!-- Image -->
          <div class="featured-article__image">
            <img
              alt="Image"
              data-sizes="auto"
              data-srcset="{{ asset('storage/images/blogs/' . $blog->image->srcImage) }} 400w,
              {{ asset('storage/images/blogs/' . $blog->image->srcImage) }} 800w"
              src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
              class="lazyload lazy-effect" />
          </div>
          <!-- End image -->
          <!-- Content -->
          <div class="featured-article__content">
            <!-- Post meta -->
            <ul class="featured-article__meta">
              
              <li>{{ \Carbon\Carbon::parse($blog->created_at)->format('d.m.Y') }}</li>
            </ul>
            <!-- End post meta -->     
            <!-- Title -->
            <h4 class="featured-article__title">{{$blog->title}}</h4>
            <!-- End title -->
            <!-- Description -->
            <div class="featured-article__description">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...
            </div>  
            <!-- End description -->
          </div>
          <!-- End content -->
        </div>
        @endforeach
        <!-- End article -->
        
      </div>
      <!-- End featured articles -->
      <!-- Newsletter -->
      <div class="blog-newsletter">
        <!-- D-flex -->
        <div class="blog-newsletter__d-flex d-flex align-items-end">
          <!-- Left -->
          <div class="blog-newsletter__left">
            <!-- Title -->
            <h4 class="blog-newsletter__title">Join Our List</h4>
            <!-- End title -->
            <!-- Description -->
            <div class="blog-newsletter__description">
              Signup to be the first to hear about exclusive deals,<br>
              special offers and upcoming collections
            </div>
            <!-- End description -->
          </div>
          <!-- End left -->
          <!-- Right -->
          <div class="blog-newsletter__right">
            <!-- Modern newsletter -->
            <div class="modern-newsletter">
              <!-- Newsletter -->
              <form class="modern-newsletter__form">
                <!-- Icon -->
                <i class="modern-newsletter__icon lnil lnil-envelope-alt"></i>
                <!-- End icon -->
                <!-- Newsletter input -->
                <input type="email" class="modern-newsletter__input" placeholder="Enter your mail address">
                <!-- End newsletter input -->
                <!-- Newsletter button -->
                <button type="submit" class="modern-newsletter__button">Subscribe</button>
                <!-- End Newsletter button -->
              </form>
              <!-- End newsletter -->
            </div>  
            <!-- End modern newsletter -->
          </div>
          <!-- End right -->
        </div>
        <!-- End d-flex -->
      </div> 
      <!-- End newsletter -->
      <!-- Line 1 px -->
      <hr />
      <!-- End line 1 px -->
      <!-- Our journal -->
      <div class="our-journal">
        <!-- Title -->
        <h4 class="our-journal__title">Latest Articles</h4>
        <!-- End Title -->
        <!-- Posts -->
        <div class="row js-latest-articles-carousel">
          <!-- Post -->
          @foreach ($blogs as $blog)
          <div class="col-lg-6 our-journal__post">
            <!-- Post image -->
            <div class="our-journal__post-image">
              <a href="{{route('detailBlog', $blog->id)}}">
                <img
                  alt="Image"
                  data-sizes="auto"
                  data-srcset="{{ asset('storage/images/blogs/' . $blog->image->srcImage) }} 400w,
                  {{ asset('storage/images/blogs/' . $blog->image->srcImage) }} 800w"
                  src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                  class="lazyload lazy-effect" />
              </a>
            </div>
            <!-- End post image -->
            <!-- Post info -->
            <div class="our-journal__post-info">
              <!-- Post details -->
              <div class="our-journal__post-details">
                <!-- Post title -->
                <h5 class="our-journal__post-title"><a href="post.html">{{$blog->title}}</a></h5>
                <!-- End post title -->
                <!-- Post meta -->
                <ul class="our-journal__post-meta">
                  <li><a href="blog.html">Inspiration</a></li>
                  <li>{{ \Carbon\Carbon::parse($blog->created_at)->format('d.m.Y') }}</li>
                </ul>
                <!-- End post meta -->                
              </div>
              <!-- End post details -->
            </div>
            <!-- End post info -->
          </div>
          @endforeach
          <!-- End post -->
          
        </div>
        <!-- End posts -->
      </div>
      <!-- End our journal -->
      

@endsection