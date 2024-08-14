@extends('layout.client')
@section('content')

<!-- Sidebar contact -->
{{-- <div class="sidebar-contact js-sidebar-contact">
    <!-- Background -->
    <div class="sidebar-contact__background js-close-sidebar-contact"></div>
    <!-- End background -->
    <!-- Content -->
    <div class="sidebar-contact__content">
      <!-- Close -->
      <div class="sidebar-contact__close"><a href="#" class="js-close-sidebar-contact"><i class="lnil lnil-close"></i></a></div>
      <!-- End close -->
      <!-- Section -->
      <div class="sidebar-contact__section">
        <!-- Title -->
        <h6 class="sidebar-contact-section__title">Contact</h6>
        <!-- End title -->
        <!-- Item -->
        <div class="sidebar-contact-section__item d-flex">
          <!-- Icon -->
          <div class="sidebar-contact-section-item__icon"><i class="lnil lnil-map-marker"></i></div>
          <!-- End icon -->
          <!-- Text -->
          <div class="sidebar-contact-section-item__text">
            No. Rosecrans Ave, Suite 200 El Segundo, CA 90245. USA
          </div>
          <!-- End text -->
        </div>
        <!-- End item -->
        <!-- Item -->
        <div class="sidebar-contact-section__item d-flex">
          <!-- Icon -->
          <div class="sidebar-contact-section-item__icon"><i class="lnil lnil-phone-ring"></i></div>
          <!-- End icon -->
          <!-- Text -->
          <div class="sidebar-contact-section-item__text">
            Call: +1 (202) 861-5567
          </div>
          <!-- End text -->
        </div>
        <!-- End item -->
        <!-- Item -->
        <div class="sidebar-contact-section__item d-flex">
          <!-- Icon -->
          <div class="sidebar-contact-section-item__icon"><i class="lnil lnil-message-edit"></i></div>
          <!-- End icon -->
          <!-- Text -->
          <div class="sidebar-contact-section-item__text">
            Email: support@demo.com
          </div>
          <!-- End text -->
        </div>
        <!-- End item -->
      </div>
      <!-- End section -->
      <!-- Section -->
      <div class="sidebar-contact__section">
        <!-- Title -->
        <h6 class="sidebar-contact-section__title">Connect on Social</h6>
        <!-- End title -->
        <!-- Socials -->
        <ul class="sidebar-contact-section__socials">
          <li><a href="https://twitter.com/" target="_blank"><i class="lnil lnil-twitter"></i></a></li>
          <li><a href="https://facebook.com/" target="_blank"><i class="lnil lnil-facebook"></i></a></li>
          <li><a href="https://instagram.com/" target="_blank"><i class="lnil lnil-Instagram"></i></a></li>
        </ul>
        <!-- End socials -->
      </div>
      <!-- End section -->
    </div>  
    <!-- End content -->
  </div> --}}
  <!-- End sidebar contact -->
  <!-- Fixed header -->
  {{-- <div class="fixed-header js-fixed-header"></div> --}}
  <!-- End fixed header -->
  <!-- Shopping cart -->
  <div class="wishlist">
    <!-- Container -->
    <div class="container">
      <!-- Second container -->
      <div class="wishlist__container">
        <!-- Title -->
        <h1 class="wishlist__title">Wishlist</h1>
        <!-- End title -->
        <!--- Table responsive -->
        <div class="table-responsive">
          <!-- Table -->
          <table class="wishlist__table">
            <thead>
              <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Status</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <!-- Wishlist product item -->
              <tr>
                <td>
                  <div class="wishlist__product">
                    <div class="wishlist-product__image">
                      <a href="{{ route('products') }}">
                        <img
                          alt="Image"
                          data-sizes="auto"
                          data-srcset="assets/products/1/6a.jpg 400w,
                          assets/products/1/6a.jpg 800w"
                          src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                          class="lazyload lazy-effect" />
                      </a>
                    </div>
                    <h3 class="wishlist-product__title"><a href="{{ route('products') }}">Slim fit modal cotton shirt</a></h3>
                  </div>
                </td>
                <td>
                  <div class="wishlist-product__price">
                    $56.99
                  </div>
                </td>
                <td>
                  <div class="wishlist-product__status wishlist-product__status--in-stock">
                    In Stock
                  </div>
                </td>
                <td>
                  <a href="#" class="fourth-button">Add to cart</a>
                </td>
                <td>
                  <div class="wishlist-product__delete">
                    <a href="#"><i class="lnil lnil-close"></i></a>
                  </div>
                </td>
              </tr>
              <!-- End wishlist product item -->
              <!-- Wishlist product item -->
              <tr>
                <td>
                  <div class="wishlist__product">
                    <div class="wishlist-product__image">
                      <a href="{{ route('products') }}">
                        <img
                          alt="Image"
                          data-sizes="auto"
                          data-srcset="assets/products/1/7a.jpg 400w,
                          assets/products/1/7a.jpg 800w"
                          src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                          class="lazyload lazy-effect" />
                      </a>
                    </div>
                    <h3 class="wishlist-product__title"><a href="{{ route('products') }}">Suede sport shoes</a></h3>
                  </div>
                </td>
                <td>
                  <div class="wishlist-product__price">
                    $45.5
                  </div>
                </td>
                <td>
                  <div class="wishlist-product__status wishlist-product__status--stock-out">
                    Stock Out
                  </div>
                </td>
                <td>
                  <a href="#" class="fourth-button">Pre-order</a>
                </td>
                <td>
                  <div class="wishlist-product__delete">
                    <a href="#"><i class="lnil lnil-close"></i></a>
                  </div>
                </td>
              </tr>
              <!-- End wishlist product item -->
              <!-- Wishlist product item -->
              <tr>
                <td>
                  <div class="wishlist__product">
                    <div class="wishlist-product__image">
                      <a href="{{ route('products') }}">
                        <img
                          alt="Image"
                          data-sizes="auto"
                          data-srcset="assets/products/1/16a.jpg 400w,
                          assets/products/1/16a.jpg 800w"
                          src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                          class="lazyload lazy-effect" />
                      </a>
                    </div>
                    <h3 class="wishlist-product__title"><a href="{{ route('products') }}">Pebbled crossbody belt bag</a></h3>
                  </div>
                </td>
                <td>
                  <div class="wishlist-product__price">
                    $72.99
                  </div>
                </td>
                <td>
                  <div class="wishlist-product__status wishlist-product__status--pre-order">
                    Pre-Order
                  </div>
                </td>
                <td>
                  <a href="#" class="fourth-button">Pre-order</a>
                </td>
                <td>
                  <div class="wishlist-product__delete">
                    <a href="#"><i class="lnil lnil-close"></i></a>
                  </div>
                </td>
              </tr>
              <!-- End wishlist product item -->
            </tbody>
          </table>
          <!-- End table -->
        </div>
        <!-- End table responsive -->
      </div>
      <!-- End second container -->
    </div>
    <!-- End container -->
  </div>
  <!-- End wishlist -->

  @endsection