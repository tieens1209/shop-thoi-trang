@extends('layout.client')
@section('content')

<!-- Collection -->
<div class="collection">
    <!-- Container -->
    <div class="container container--type-5">
      <!-- Shop breadcrumb -->
      <div class="shop-breadcrumb shop-breadcrumb--type-3">
        <!-- D-flex -->
        <div class="shop-breadcrumb__d-flex d-flex align-items-center">
          <!-- Title -->
          <h1 class="shop-breadcrumb__title">New Now</h1>
          <!-- End Title -->
          <!-- Breadcrumb -->
          <ol class="breadcrumb text-uppercase">
            <li class="breadcrumb__item"><a href="/">home </a></li>
            
            <li class="breadcrumb__item active" aria-current="page">shop</li>
          </ol>
          <!-- End breadcrumb -->
        </div>
        <!-- End d-flex -->
        
      </div>
      <!-- End shop breadcrumb -->
      <!-- Open mobile filter -->
      <div class="open-mobile-top-filter js-open-mobile-filter">
        <i class="lnil lnil-control-panel"></i>
        <span>Show filters</span>
      </div>
      <!-- End open mobile filter -->
      <!-- Row -->
      <div class="row">
        <!-- Left column -->
        <div class="col-12 col-lg-3">
          <!-- Filter -->
          <div class="top-filter js-top-filter">
            <!-- Close background -->
            <div class="top-filter__close-background js-close-filter"></div>
            <!-- End close background -->
            <!-- Background -->
            <div class="top-filter__background">
              <!-- Close -->
              <div class="top-filter__close d-lg-none">
                <a href="#" class="js-close-filter"><i class="lnil lnil-close"></i></a>
              </div>
              <!-- End close --->
              <!-- Row -->
              <div class="row">
                <!-- Widget -->
                <div class="col-12 col-md-6 col-lg-25">
                  <div class="top-filter__widget">
                    <!-- Title -->
                    <h2 class="widget__title widget__title--type-2">Categories</h2>
                    <!-- End title -->
                    <!-- Collections -->
                    <ul class="widget__collections">
                      <li><a href="#">Coats</a></li>
                      <li><a href="#">Jackets</a></li>
                      <li><a href="#">Cardigans & Sweaters</a></li>
                      <li><a href="#">Blazers</a></li>
                      <li><a href="#">Swearshirts</a></li>
                      <li><a href="#">Shirts</a></li>
                      <li><a href="#">T-Shirts</a></li>
                      <li><a href="#">Polos</a></li>
                      <li><a href="#">Jeans</a></li>
                      <li><a href="#">Underwear</a></li>
                    </ul>
                    <!-- End collections -->
                  </div>
                </div>
                <!-- End widget -->
                <!-- Filter heading -->
                <div class="col-12 filter-title">
                  <h2 class="widget__title widget__title--type-2">Filter</h2>
                </div>
                <!-- End filter heading -->
               
                
                <!-- Widget -->
                <div class="col-12 col-md-6 col-lg-25">
                  <div class="top-filter__widget">
                    <!-- Title -->
                    <h2 class="widget__title">Size</h2>
                    <!-- End title -->
                    <!-- Options -->
                    <ul class="widget__checkbox-options">
                      <!-- Size option -->
                      <li>
                        <label>
                          <input type="checkbox" name="size" checked />
                          <span>XS</span>
                        </label>
                      </li>
                      <!-- End size option -->
                      <!-- Size option -->
                      <li>
                        <label>
                          <input type="checkbox" name="size" />
                          <span>S</span>
                        </label>
                      </li>
                      <!-- End size option -->
                      <!-- Size option -->
                      <li>
                        <label>
                          <input type="checkbox" name="size" />
                          <span>M</span>
                        </label>
                      </li>
                      <!-- End size option -->
                      <!-- Size option -->
                      <li>
                        <label>
                          <input type="checkbox" name="size" />
                          <span>L</span>
                        </label>
                      </li>
                      <!-- End size option -->
                      <!-- Size option -->
                      <li>
                        <label>
                          <input type="checkbox" name="size" />
                          <span>XL</span>
                        </label>
                      </li>
                      <!-- End size option -->
                      <!-- Size option -->
                      <li>
                        <label>
                          <input type="checkbox" name="size" />
                          <span>XXL</span>
                        </label>
                      </li>
                      <!-- End size option -->
                    </ul>
                    <!-- End options -->
                  </div>
                </div>
                <!-- End widget -->
                <!-- Price -->
                <div class="col-12 col-md-6 col-lg-25">
                  <!-- Widget -->
                  <div class="top-filter__widget">
                    <!-- Widget title -->
                    <h2 class="widget__title">Price</h2>
                    <!-- End widget title -->
                    <!-- Price slider -->
                    <div class="widget__price-slider">
                      <div class="js-price-slider"></div>
                      <div class="price-slider__value">
                        <span>From</span>
                        <input type="text" class="js-price-slider-value" />
                      </div>
                    </div>
                    <!-- End price slider -->
                    <!-- Button -->
                    <div class="widget__view-result">
                      <a href="#" class="second-button">View Result (25)</a>
                    </div>
                    <!-- End button -->
                  </div>
                  <!-- End widget -->
                </div>
                <!-- End price -->
              </div>
              <!-- End row -->
            </div>
            <!-- End background -->
          </div>
          <!-- End filter -->
        </div>
        <!-- End left column -->
        <!-- Right column -->
        <div class="col-12 col-lg-9">
          <!-- Top filter -->
          <div class="collection__top-filter clearfix">
            <!-- Sort and view -->
            <div class="collection__sort-and-view d-flex align-items-center">
              <!-- Sort by -->  
              <div class="products-sort-by d-flex align-items-center">
                <label for="sort-by">Sort by</label>
                <div class="products-sort-by__select">
                  <i class="lnil lnil-chevron-down"></i>
                  <select id="sort-by">
                    <option>Default</option>
                    <option>Popularity</option>
                    <option>Price</option>
                  </select>
                </div>
              </div>
              <!-- End sort by -->
              
            </div>
            <!-- End sort and view -->
            <!-- Founded products -->
            {{-- <div class="collection__founded-products collection__founded-products--type-2">
              <span>24</span> Products found
            </div> --}}
            <!-- End founded products -->
          </div>
          <!-- End top filter -->
          <!-- Products row -->
          <div class="row products-row">
            <!-- Product -->
            @foreach ($products as $product)
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
              <div class="product-grid-item">
                <!-- Tag -->
                <div class="product-grid-item__tag">Sale</div>
                <!-- End tag -->
                <!-- Wishlist -->
                <div class="product-grid-item__wishlist"><a href="#"><i class="lnil lnil-heart"></i></a></div>
                <!-- End wishlist -->
                <!-- Image -->
                <div class="product-grid-item__image">
                  <a href="{{ route('detailProduct', $product->id) }}">
                    <img
                      alt="Image"
                      data-sizes="auto"
                      data-srcset="{{ asset('storage/images/products/' . $product->image->srcImage) }} 400w,
                      {{ asset('storage/images/products/' . $product->image->srcImage) }} 800w"
                      src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                      class="lazyload lazy-effect" />
                    <img
                      alt="Image"
                      data-sizes="auto"
                      data-srcset="{{ asset('storage/images/products/' . $product->image->srcImage) }} 400w,
                      {{ asset('storage/images/products/' . $product->image->srcImage) }} 800w"
                      src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                      class="lazyload lazy-effect hover" />
                  </a>
                  
                </div>
                <!-- End image -->
                <!-- Title -->
                <div class="product-grid-item__title"><a href="{{ route('detailProduct', $product->id) }}">{{ $product->name }}</a></div>
                <!-- End title -->
                <!-- Price -->
                <div class="product-grid-item__price">
                  <span class="price-new">{{ $product->priceSale }}đ</span>
                  <span class="price-old">{{ $product->price }}đ</span>
                </div>
                <!-- End price -->
                
              </div>
            </div>
            @endforeach
            <!-- End product -->
            
          </div>
          <!-- End products row -->
          <!-- Loading spin -->
          <div class="loading-spin text-center">
            <ul class="standard-pagination">
              <li><a href="#" class="active">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">Next</a></li>
            </ul>
          </div>
          <!-- End loading spin -->
        </div>
        <!-- End right column -->
      </div>
      <!-- End row -->
    </div>
    <!-- End container -->
  </div>
  <!-- End collection -->

@endsection