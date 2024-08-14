@extends('layout.client')
@section('content')
    <!-- Title -->
    <div class="container">
        <h4 class="home-title">A specialist label creating luxury essentials.</h4>
    </div>
    <!-- End title -->
    <!-- Banner -->
    <div class="container">
        
        <div id="bannerCarousel" class="carousel slide block-finder__body" data-ride="carousel" data-interval="3000"
            style="height: 300px; position: relative;">
            <div class="carousel-inner" style="height: 100%;">
                @foreach ($banners as $index => $banner)
                    <div class="carousel-item @if ($index == 0) active @endif"
                        style="background-image: url('{{ asset('storage/images/products/' . $banner->srcImage) }}'); height: 100%; background-size: cover; background-position: center;">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#bannerCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#bannerCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>

    <!-- End banner -->

    <!-- Line 1 px -->
    <div class="container">
        <hr />
    </div>
    <!-- End line 1 px -->
    <!-- Home products -->
    <div class="home-products home-products--type-5">
        <!-- Container -->
        <div class="container">
            <!-- Products container -->
            <div class="home-products__container">
                <!-- Title -->
                <h3 class="home-products__title">The Latest Items Just Landed</h3>
                <!-- End title -->
                <!-- Carousel -->
                <div class="home-products__carousel js-home-products-2-carousel">
                    <!-- Product -->
                    @foreach ($products as $product)
                        <div class="product-grid-item product-grid-item--type-2">
                            <!-- Wishlist -->
                            <div class="product-grid-item__wishlist"><a href="#"><i
                                        class="lnil lnil-heart-filled"></i></a></div>
                            <!-- End wishlist -->
                            <!-- Image -->
                            <div class="product-grid-item__image">
                                <a href="{{ route('detailProduct', $product->id) }}">
                                    <img alt="Image" data-sizes="auto"
                                        data-srcset="{{ asset('storage/images/products/' . $product->image->srcImage) }} 400w,
                      {{ asset('storage/images/products/' . $product->image->srcImage) }} 800w"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                        class="lazyload lazy-effect" />
                                    <img alt="Image" data-sizes="auto"
                                        data-srcset="{{ asset('storage/images/products/' . $product->image->srcImage) }} 400w,
                      {{ asset('storage/images/products/' . $product->image->srcImage) }} 800w"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                        class="lazyload lazy-effect hover" />
                                </a>
                                <!-- Action -->
                                <div class="product-grid-item__action d-flex">
                                    <!-- Button -->
                                    <div class="product-grid-item__button"><a
                                            href="{{ route('detailProduct', $product->id) }}">Buy now</a></div>
                                    <!-- End button -->
                                </div>
                                <!-- End action -->
                            </div>
                            <!-- End image -->
                            <!-- Brand -->
                            <div class="product-grid-item__brand"><a
                                    href="{{ route('detailProduct', $product->id) }}">{{ $product->name }}</a></div>
                            <!-- End brand -->

                            <!-- Price -->
                            <div class="product-grid-item__price">
                                <span class="format-currency">{{ $product->priceSale }}đ</span> /
                                <del><span class="format-currency">{{ $product->price }}đ</span></del>
                            </div>
                            <!-- End price -->
                        </div>
                    @endforeach
                    <!-- End product -->

                </div>
                <!-- End carousel -->
                <!-- Action -->
                <div class="home-products__bottom-action">
                    <a href="shop.html">All products (200)</a>
                </div>
                <!-- End action -->
            </div>
            <!-- End products container -->
        </div>
        <!-- End container -->
    </div>
    <!-- End home products -->

    <!-- Line 1 px -->
    <div class="container">
        <hr />
    </div>
    <!-- End line 1px -->

    <!-- Our journal -->
    <div class="our-journal our-journal--classic">
        <!-- Container -->
        <div class="container">
            <!-- Title -->
            <h3 class="our-journal__title">World Of Am Routine</h3>
            <!-- End Title -->
            <!-- Posts -->
            <div class="row js-home-blog-2-carousel">
                <!-- Post -->
                @foreach ($blogs as $blog)
                    <div class="col-lg-3 our-journal__post">
                        <!-- Post image -->
                        <div class="our-journal__post-image">
                            <a href="post.html">
                                <img alt="Image" data-sizes="auto"
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
                                <!-- Post meta -->
                                <ul class="our-journal__post-meta">
                                    <li><a href="blog.html">Inspiration</a></li>
                                    <li>Dec 15, 2024</li>
                                </ul>
                                <!-- End post meta -->
                                <!-- Post title -->
                                <h5 class="our-journal__post-title"><a href="post.html">How to dress for the end of the
                                        world
                                        (According to the movies)
                                    </a></h5>
                                <!-- End post title -->
                                <!-- Post description -->
                                <div class="our-journal__post-description">He and his team produce fashion shows, work as
                                    creative directors on shoots and campaigns, produce content and ...</div>
                                <!-- End post description -->
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
        <!-- End container -->
    </div>
    <!-- End our journal -->
    <!-- Modern newsletter -->
    <div class="modern-newsletter modern-newsletter--classic">
        <!-- Container -->
        <div class="container">
            <!-- Heading -->
            <h3 class="modern-newsletter__heading">Subscribe & Get <span>10%</span> Discount</h3>
            <!-- End heading -->
            <!-- Description -->
            <div class="modern-newsletter__description">Be the first to get the latest news about trends, promotions and
                much more. Don’t worry, we not spam!</div>
            <!-- End description -->
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
        <!-- End container -->
    </div>
    <!-- End modern newsletter -->
@endsection
