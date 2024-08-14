@extends('layout.client')
@section('content')
    <!-- Product -->
    <div class="product">
        <!-- Container -->
        <div class="container">
            <!-- D-flex -->
            <div class="product__d-flex d-flex">
                <!-- Previous page -->
                <div class="product__previous-page"><a href="#"><i class="lnil lnil-arrow-left"></i></a></div>
                <!-- End previous page -->
                <!-- Thumbnails -->
                <div class="product__thumbnails">
                    <!-- Carousel -->
                    <div class="js-product-thumbnails-carousel">
                        <!-- Image -->

                        @foreach ($images as $image)
                            <div class="product-thumbnail">
                                <a href="#" class="active">
                                    <img alt="Image" data-sizes="auto"
                                        data-srcset="{{ asset('storage/images/products/' . $image->srcImage) }} 362w,
                  {{ asset('storage/images/products/' . $image->srcImage) }} 724w"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                        class="lazyload lazy-effect" />
                                </a>
                            </div>
                        @endforeach
                        <!-- End image -->

                    </div>
                    <!-- End carousel -->
                </div>
                <!-- End thumbnails -->
                <!-- Images -->
                <div class="product__images js-popup-gallery">
                    <!-- Carousel -->
                    <div class="js-product-images-carousel">
                        <!-- Image -->
                        @foreach ($images as $image)
                            <div class="product-image">
                                <a href="assets/products/1/2_1-a.jpg">
                                    <img alt="Image" data-sizes="auto"
                                        data-srcset="{{ asset('storage/images/products/' . $image->srcImage) }} 362w,
                  {{ asset('storage/images/products/' . $image->srcImage) }} 724w"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                        class="lazyload lazy-effect" />
                                </a>
                            </div>
                        @endforeach
                        <!-- End image -->

                    </div>
                    <!-- End carousel -->
                </div>
                <!-- End images -->
                <!-- Content -->
                <div class="product__content">
                    <!-- D-flex -->
                    <div class="product-breadcrumb__d-flex d-flex align-items-center">
                        <!-- Breadcrumb -->
                        <div class="product-breadcrumb__back-to-shop"><a href="{{ route('listProduct') }}">Back to list </a>
                        </div>
                        <!-- End breadcrumb -->

                    </div>
                    <!-- End d-flex -->
                    <!-- Mobile share -->
                    <div class="product__mobile-share"><a href="#"><i class="lnil lnil-share"></i></a></div>
                    <!-- End mobile share -->
                    <!-- Product title -->
                    <h1 class="product__title">{{ $product->name }}</h1>
                    <!-- End product title -->
                    <!-- Product price -->
                    <div class="product__price">
                        <span class="product-price__new">{{ $product->priceSale }}đ</span>
                        <span class="product-price__old">{{ $product->price }}đ</span>
                    </div>
                    <!-- End product price -->
                    <!-- Options -->
                    <div class="product__options">

                        <!-- Product colors -->
                        <div class="product__option d-flex align-items-center">
                            <!-- Title -->
                            <div class="product__option-title">Size</div>
                            <!-- End title -->
                            <!-- Available sizes -->
                            <div class="product__details__option__size">

                                <form action="{{ route('addToCart', $product->id) }}" method="post">
                                    @csrf
                                    @method('POST')

                                    @if ($product->size->XXXL > 0)
                                        <label for="xxxl">xxxl
                                            <input type="radio" id="xxxl" name="size" value="xxxl">
                                        </label>
                                    @endif
                                    @if ($product->size->XXL > 0)
                                        <label for="xxl">xxl
                                            <input type="radio" id="xxl" name="size" value="xxl">
                                        </label>
                                    @endif
                                    @if ($product->size->XL > 0)
                                        <label for="xl">xl
                                            <input type="radio" id="xl" name="size" value="xl">
                                        </label>
                                    @endif
                                    @if ($product->size->L > 0)
                                        <label for="l">l
                                            <input type="radio" id="l" name="size" value="l">
                                        </label>
                                    @endif
                                    @if ($product->size->M > 0)
                                        <label for="m">m
                                            <input type="radio" id="m" name="size" value="m">
                                        </label>
                                    @endif
                                    @if ($product->size->S > 0)
                                        <label for="s">s
                                            <input type="radio" id="s" name="size" value="s">
                                        </label>
                                    @endif
                                
                            </div>
                            <!-- End available sizes -->
                            <!-- Size guide -->
                            <div class="product__size-guide">
                                <div class="product-size-guide"><a data-toggle="modal" data-target="#size"
                                        style="cursor: pointer"><i class="lnil lnil-size"></i> Size Guide</div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="size" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"
                                                style="font-weight: 600;text-transform: uppercase">Hướng dẫn chọn size</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="size-guide-table">
                                                <table class="table table-dark" id="row_size">
                                                    <thead>
                                                        <tr>
                                                            <td>SIZE</td>
                                                            <td>Chiều cao (cm)</td>
                                                            <td>Cân nặng (kg)</td>
                                                            <td>Rộng ngực (cm)</td>
                                                            <td>Rộng mông (cm)</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>S</td>
                                                            <td>162-168</td>
                                                            <td>57-62</td>
                                                            <td>84-88</td>
                                                            <td>85-89</td>
                                                        </tr>
                                                        <tr>
                                                            <td>M</td>
                                                            <td>169-173</td>
                                                            <td>63-67</td>
                                                            <td>88-94</td>
                                                            <td>90-94</td>
                                                        </tr>
                                                        <tr>
                                                            <td>L</td>
                                                            <td>171-175</td>
                                                            <td>68-72</td>
                                                            <td>94-98</td>
                                                            <td>95-99</td>
                                                        </tr>
                                                        <tr>
                                                            <td>XL</td>
                                                            <td>173-177</td>
                                                            <td>73-77</td>
                                                            <td>98-104</td>
                                                            <td>100-104</td>
                                                        </tr>
                                                        <tr>
                                                            <td>XXL</td>
                                                            <td>175-179</td>
                                                            <td>78-82</td>
                                                            <td>104-107</td>
                                                            <td>104-108</td>
                                                        </tr>
                                                        <tr>
                                                            <td>XXXL</td>
                                                            <td>179-185</td>
                                                            <td>82-90</td>
                                                            <td>104-107</td>
                                                            <td>108-1010</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End size guide -->
                        </div>
                        <!-- End product colors -->
                        <!-- Quantity -->
                        <div class="product__option d-flex align-items-center">
                            <!-- Title -->
                            <div class="product__option-title">Qty</div>
                            <!-- End title -->
                            <!-- Quantity field -->
                            <div class="product__quantity">
                                <div class="product-quantity__minus js-quantity-down"><a href="#"><i
                                            class="lnil lnil-minus"></i></a></div>
                                <input type="text" value="1" name="qty"
                                    class="product-quantity__input js-quantity-field">
                                <div class="product-quantity__plus js-quantity-up"><a href="#"><i
                                            class="lnil lnil-plus"></i></a></div>
                            </div>
                            <!-- End quantity field -->
                        </div>
                        <!-- End quantity -->
                    </div>
                    <!-- End options -->
                    <!-- Product action -->
                    <div class="product__action js-product-action">
                        <!-- Product quantity and add to cart -->
                        <div class="product__buttons d-flex">
                            <!-- Add to cart -->
                            <div class="product__button">
                                <button type="submit" class="button">Add to cart</button>
                            </div>
                            <!-- End add to cart -->
                        </form>
                        </div>
                        <!-- End product quantity and add to cart -->
                    </div>
                    <!-- End product action -->
                    <!-- Product second action -->
                    <ul class="product__second-action d-flex">
                        <li><a href="#"><i class="lnil lnil-heart"></i> Add to wishlist</a></li>
                        <li><a href="#" class="hide-mobile-before"><i class="lnil lnil-reload"></i> Compare</a>
                        </li>
                        <li class="d-none d-lg-block"><a href="#"><i class="lnil lnil-share"></i> Share</a></li>
                    </ul>
                    <!-- End product section action -->
                    <!-- Product information -->
                    <ul class="product__information">
                        <li><span>SKU</span>
                            <p>RT-{{ $product->id }}</p>
                        </li>
                        <li><span>Category</span>
                            <p>{{ $product->category->name }}</p>
                        </li>

                    </ul>
                    <!-- End product information -->
                    <!-- Mobile tabs -->
                    <div class="product__mobile-tabs">
                        <!-- Accordion -->
                        <div class="accordion active js-accordion">
                            <!-- Title -->
                            <div class="accordion__title js-accordion-title">
                                Description
                            </div>
                            <!-- End title -->
                            <!-- Content -->
                            <div class="accordion__content js-accordion-content">
                                @php
                                    echo $product->description;
                                @endphp
                            </div>
                            <!-- End content -->
                        </div>
                        <!-- End accordion -->
                        <!-- Accordion -->
                        <div class="accordion js-accordion">
                            <!-- Title -->
                            <div class="accordion__title js-accordion-title">
                                Ship & return
                            </div>
                            <!-- End title -->
                            <!-- Content -->
                            <div class="accordion__content js-accordion-content">
                                <h3>Shipping</h3>
                                <ul>
                                    <li>Complimentary ground shipping within 1 to 7 business days</li>
                                    <li>In-store collection available within 1 to 7 business days</li>
                                    <li>Next-day and Express delivery options also available</li>
                                    <li>Purchases are delivered in an orange box tied with a Bolduc ribbon.</li>
                                    <li>See the delivery FAQs for details on shipping methods, costs and delivery times</li>
                                </ul>
                                <h3>Returns & Exchanges</h3>
                                <ul>
                                    <li>Easy and complimentary, within 14 days</li>
                                    <li>See conditions and procedure in our return FAQs</li>
                                    <li>Customer is responsible for shipping charges when making returns and
                                        shipping/handling fees of original purchase is non-refundable.</li>
                                </ul>
                            </div>
                            <!-- End content -->
                        </div>
                        <!-- End accordion -->
                        <!-- Accordion -->
                        <div class="accordion js-accordion">
                            <!-- Title -->
                            <div class="accordion__title js-accordion-title">
                                Review (3)
                            </div>
                            <!-- End title -->
                            <!-- Content -->
                            <div class="accordion__content js-accordion-content">
                                <!-- Review -->
                                <div class="review-2">
                                    <!-- Details -->
                                    <div class="review-2__details">
                                        <!-- Rating -->
                                        <div class="review-2__rating">
                                            <i class="lnir lnir-star-filled active"></i>
                                            <i class="lnir lnir-star-filled active"></i>
                                            <i class="lnir lnir-star-filled active"></i>
                                            <i class="lnir lnir-star-filled active"></i>
                                            <i class="lnir lnir-star-filled active"></i>
                                        </div>
                                        <!-- End rating -->
                                        <!-- Name -->
                                        <div class="review-2__title">Quality product & very comfortable!</div>
                                        <!-- End name -->
                                        <!-- Content -->
                                        <div class="review-2__content">Thanks to the precious advice of the store owner, I
                                            choose this wonderful product. I absolutely love it! Additionally, my order was
                                            sent very quickly. I'm a happy customer and I'll order again!</div>
                                        <!-- End content -->
                                        <!-- Meta -->
                                        <div class="review-2__meta">
                                            <span>andy robertson.</span> on 25 April, 2024
                                        </div>
                                        <!-- End meta -->
                                    </div>
                                    <!-- End details -->
                                </div>
                                <!-- End review -->
                                <!-- Review -->
                                <div class="review-2">
                                    <!-- Details -->
                                    <div class="review-2__details">
                                        <!-- Rating -->
                                        <div class="review-2__rating">
                                            <i class="lnir lnir-star-filled active"></i>
                                            <i class="lnir lnir-star-filled active"></i>
                                            <i class="lnir lnir-star-filled active"></i>
                                            <i class="lnir lnir-star-filled active"></i>
                                            <i class="lnir lnir-star-filled active"></i>
                                        </div>
                                        <!-- End rating -->
                                        <!-- Name -->
                                        <div class="review-2__title">Awesome product</div>
                                        <!-- End name -->
                                        <!-- Content -->
                                        <div class="review-2__content">I love it & certainly that i’ll buy it once again.
                                            Perfection experience!</div>
                                        <!-- End content -->
                                        <!-- Meta -->
                                        <div class="review-2__meta">
                                            <span>Alexander Arnold.</span> on 25 April, 2024
                                        </div>
                                        <!-- End meta -->
                                    </div>
                                    <!-- End details -->
                                </div>
                                <!-- End review -->
                                <h3 class="review-2__add-title">Add A Review</h3>
                                <!-- Form -->
                                <form class="review-2__form">
                                    <!-- Your rating -->
                                    <div class="form__your-rating d-flex align-items-center">
                                        <div class="your-rating__title">Your rating</div>
                                        <div class="your-rating__content">
                                            <i class="lnir lnir-star-filled" data-value="1"></i>
                                            <i class="lnir lnir-star-filled" data-value="2"></i>
                                            <i class="lnir lnir-star-filled" data-value="3"></i>
                                            <i class="lnir lnir-star-filled" data-value="4"></i>
                                            <i class="lnir lnir-star-filled" data-value="5"></i>
                                        </div>
                                    </div>
                                    <!-- End your rating -->
                                    <!-- Form group -->
                                    <div class="form-group">
                                        <input type="text" name="subject" class="form-group__input"
                                            placeholder="Give your review a tittle ">
                                    </div>
                                    <!-- End form group -->
                                    <!-- Form group -->
                                    <div class="form-group">
                                        <textarea placeholder="Write your review here" class="form-group__textarea" rows="3"></textarea>
                                    </div>
                                    <!-- End form group -->
                                    <!-- Row -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- Form group -->
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-group__input"
                                                    placeholder="Full Name">
                                            </div>
                                            <!-- End form group -->
                                        </div>
                                        <div class="col-md-12">
                                            <!-- Form group -->
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-group__input"
                                                    placeholder="Your E-mail*">
                                            </div>
                                            <!-- End form group -->
                                        </div>
                                    </div>
                                    <!-- End row -->
                                    <!-- Form checkbox -->
                                    <div class="form-checkbox">
                                        <input type="checkbox" id="checkbox1" class="form-checkbox__input" />
                                        <label class="form-checkbox__label" for="checkbox1">Save my name & email in this
                                            browser for next time i comment</label>
                                    </div>
                                    <!-- End form checkbox -->
                                    <!-- Action -->
                                    <div class="form__action">
                                        <button type="submit" class="button">Submit review</button>
                                    </div>
                                    <!-- End action -->
                                </form>
                                <!-- End form -->
                            </div>
                            <!-- End content -->
                        </div>
                        <!-- End accordion -->
                    </div>
                    <!-- End mobile tabs -->
                    <!-- Link -->
                    <div class="product__link d-lg-none"><a href="#">Do you need any help?</a></div>
                    <!-- End link -->
                    <!-- Product tabs -->
                    <ul class="product__tabs d-flex">
                        <li><a href="#" class="js-open-tab" data-id="1">Description</a></li>
                        <li><a href="#" class="js-open-tab" data-id="2">Ship & return</a></li>
                        <li><a href="#" class="js-open-tab" data-id="3">Review (3)</a></li>
                    </ul>
                    <!-- End product tabs -->
                    <!-- Tab description -->
                    <div class="tab js-tab" data-id="1">
                        <div class="tab__overlay js-close-tab"></div>
                        <!-- Tab content -->
                        <div class="tab__content">
                            <!-- Heading -->
                            <div class="tab__heading d-flex align-items-center">
                                <!-- H3 -->
                                <h3 class="tab__h3">Description</h3>
                                <!-- End h3 -->
                                <!-- Close -->
                                <div class="tab__close"><a href="#" class="js-close-tab"><i
                                            class="lnil lnil-close"></i></a></div>
                                <!-- End close -->
                            </div>
                            <!-- End heading -->
                            <!-- Description -->
                            <div class="tab__description">
                                @php
                                    echo $product->description;
                                @endphp
                            </div>
                            <!-- End description -->
                        </div>
                        <!-- End tab content -->
                    </div>
                    <!-- End tab description -->
                    <!-- Tab ship & return -->
                    <div class="tab js-tab" data-id="2">
                        <div class="tab__overlay js-close-tab"></div>
                        <!-- Tab content -->
                        <div class="tab__content">
                            <!-- Heading -->
                            <div class="tab__heading d-flex align-items-center">
                                <!-- H3 -->
                                <h3 class="tab__h3">Ship & return</h3>
                                <!-- End h3 -->
                                <!-- Close -->
                                <div class="tab__close"><a href="#" class="js-close-tab"><i
                                            class="lnil lnil-close"></i></a></div>
                                <!-- End close -->
                            </div>
                            <!-- End heading -->
                            <!-- Description -->
                            <div class="tab__description">
                                <h3>Shipping</h3>
                                <ul>
                                    <li>Complimentary ground shipping within 1 to 7 business days</li>
                                    <li>In-store collection available within 1 to 7 business days</li>
                                    <li>Next-day and Express delivery options also available</li>
                                    <li>Purchases are delivered in an orange box tied with a Bolduc ribbon.</li>
                                    <li>See the delivery FAQs for details on shipping methods, costs and delivery times</li>
                                </ul>
                                <h3>Returns & Exchanges</h3>
                                <ul>
                                    <li>Easy and complimentary, within 14 days</li>
                                    <li>See conditions and procedure in our return FAQs</li>
                                    <li>Customer is responsible for shipping charges when making returns and
                                        shipping/handling fees of original purchase is non-refundable.</li>
                                </ul>
                            </div>
                            <!-- End description -->
                        </div>
                        <!-- End tab content -->
                    </div>
                    <!-- End tab ship & return -->
                    <!-- Tab reviews  -->
                    <div class="tab js-tab" data-id="3">
                        <div class="tab__overlay js-close-tab"></div>
                        <!-- Tab content -->
                        <div class="tab__content">
                            <!-- Heading -->
                            <div class="tab__heading d-flex align-items-center">
                                <!-- H3 -->
                                <h3 class="tab__h3">Review (3)</h3>
                                <!-- End h3 -->
                                <!-- Close -->
                                <div class="tab__close"><a href="#" class="js-close-tab"><i
                                            class="lnil lnil-close"></i></a></div>
                                <!-- End close -->
                            </div>
                            <!-- End heading -->
                            <!-- Description -->
                            <div class="tab__description">
                                <h3 class="review__title">Customer’s Review (2)</h3>
                                <!-- Review -->
                                <div class="review d-flex">
                                    <!-- Avatar -->
                                    <div class="review__avatar">
                                        <img alt="Image" data-sizes="auto"
                                            data-srcset="assets/images/default/avatar_1.jpg 1560w,
                      assets/images/default/avatar_1.jpg 3120w"
                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                            class="lazyload" />
                                    </div>
                                    <!-- End avatar -->
                                    <!-- Details -->
                                    <div class="review__details">
                                        <!-- Title and rating -->
                                        <div class="review__title-and-rating d-flex">
                                            <!-- Name -->
                                            <div class="review__title">Quality product & very comfortable!</div>
                                            <!-- End name -->
                                            <!-- Rating -->
                                            <div class="review__rating">
                                                <i class="lnir lnir-star-filled active"></i>
                                                <i class="lnir lnir-star-filled active"></i>
                                                <i class="lnir lnir-star-filled active"></i>
                                                <i class="lnir lnir-star-filled active"></i>
                                                <i class="lnir lnir-star-filled active"></i>
                                            </div>
                                            <!-- End rating -->
                                        </div>
                                        <!-- End title and rating -->
                                        <!-- Content -->
                                        <div class="review__content">Thanks to the precious advice of the store owner, I
                                            choose this wonderful product. I absolutely love it! Additionally, my order was
                                            sent very quickly. I'm a happy customer and I'll order again!</div>
                                        <!-- End content -->
                                        <!-- Meta -->
                                        <div class="review__meta">
                                            <span>andy robertson.</span> on 25 April, 2022
                                        </div>
                                        <!-- End meta -->
                                    </div>
                                    <!-- End details -->
                                </div>
                                <!-- End review -->
                                <!-- Review -->
                                <div class="review d-flex">
                                    <!-- Avatar -->
                                    <div class="review__avatar">
                                        <img alt="Image" data-sizes="auto"
                                            data-srcset="assets/images/default/avatar_2.jpg 1560w,
                      assets/images/default/avatar_2.jpg 3120w"
                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                            class="lazyload" />
                                    </div>
                                    <!-- End avatar -->
                                    <!-- Details -->
                                    <div class="review__details">
                                        <!-- Title and rating -->
                                        <div class="review__title-and-rating d-flex align">
                                            <!-- Name -->
                                            <div class="review__title">Awesome product</div>
                                            <!-- End name -->
                                            <!-- Rating -->
                                            <div class="review__rating">
                                                <i class="lnir lnir-star-filled active"></i>
                                                <i class="lnir lnir-star-filled active"></i>
                                                <i class="lnir lnir-star-filled active"></i>
                                                <i class="lnir lnir-star-filled active"></i>
                                                <i class="lnir lnir-star-filled active"></i>
                                            </div>
                                            <!-- End rating -->
                                        </div>
                                        <!-- End title and rating -->
                                        <!-- Content -->
                                        <div class="review__content">I love it & certainly that i’ll buy it once again.
                                            Perfection experience!</div>
                                        <!-- End content -->
                                        <!-- Meta -->
                                        <div class="review__meta">
                                            <span>Alexander Arnold.</span> on 25 April, 2022
                                        </div>
                                        <!-- End meta -->
                                    </div>
                                    <!-- End details -->
                                </div>
                                <!-- End review -->
                                <h3>Add A Review</h3>
                                <!-- Form -->
                                <form class="review__form">
                                    <!-- Required fields -->
                                    <div class="form__required-fields">Your email address will not be published. Required
                                        fields are marked<span>*</span></div>
                                    <!-- End required fields -->
                                    <!-- Your rating -->
                                    <div class="form__your-rating d-flex align-items-center">
                                        <div class="your-rating__title">Your rating</div>
                                        <div class="your-rating__content js-rating-content">
                                            <i class="lnir lnir-star-filled js-rating" data-value="1"></i>
                                            <i class="lnir lnir-star-filled js-rating" data-value="2"></i>
                                            <i class="lnir lnir-star-filled js-rating" data-value="3"></i>
                                            <i class="lnir lnir-star-filled js-rating" data-value="4"></i>
                                            <i class="lnir lnir-star-filled js-rating" data-value="5"></i>
                                            <div class="d-none">
                                                <input type="radio" name="rating" class="js-rating-input"
                                                    value="1" />
                                                <input type="radio" name="rating" class="js-rating-input"
                                                    value="2" />
                                                <input type="radio" name="rating" class="js-rating-input"
                                                    value="3" />
                                                <input type="radio" name="rating" class="js-rating-input"
                                                    value="4" />
                                                <input type="radio" name="rating" class="js-rating-input"
                                                    value="5" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End your rating -->
                                    <!-- Form group -->
                                    <div class="form-group">
                                        <input type="text" name="subject" class="form-group__input"
                                            placeholder="Give your review a tittle ">
                                    </div>
                                    <!-- End form group -->
                                    <!-- Form group -->
                                    <div class="form-group">
                                        <textarea placeholder="Write your review here" class="form-group__textarea" rows="3"></textarea>
                                    </div>
                                    <!-- End form group -->
                                    <!-- Row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Form group -->
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-group__input"
                                                    placeholder="Full Name">
                                            </div>
                                            <!-- End form group -->
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Form group -->
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-group__input"
                                                    placeholder="Your E-mail*">
                                            </div>
                                            <!-- End form group -->
                                        </div>
                                    </div>
                                    <!-- End row -->
                                    <!-- Form checkbox -->
                                    <div class="form-checkbox">
                                        <input type="checkbox" id="checkbox2" class="form-checkbox__input" />
                                        <label class="form-checkbox__label" for="checkbox2">Save my name & email in this
                                            browser for next time i comment</label>
                                    </div>
                                    <!-- End form checkbox -->
                                    <!-- Action -->
                                    <div class="form__action">
                                        <button type="submit" class="second-button">Submit review</button>
                                    </div>
                                    <!-- End action -->
                                </form>
                                <!-- End form -->
                            </div>
                            <!-- End description -->
                        </div>
                        <!-- End tab content -->
                    </div>
                    <!-- End tab reviews -->
                </div>
                <!-- End content -->
            </div>
            <!-- End d-flex -->
        </div>
        <!-- End container -->
    </div>
    <!-- End product -->
    <!-- Sticky add to cart -->
    <div class="sticky-add-to-cart js-sticky-add-to-cart">
        <!-- Container -->
        <div class="container">
            <!-- D-flex -->
            <div class="sticky-add-to-cart__d-flex d-flex align-items-center">
                <!-- Product image -->
                <div class="sticky-add-to-cart__product-image">
                    <p>
                        <img alt="Image" src="assets/products/1/2_1-a.jpg" />
                    </p>
                </div>
                <!-- End product image -->
                <!-- Product name -->
                <div class="sticky-add-to-cart__product-name">Zipped cardigan cotton</div>
                <!-- End product name -->
                <!-- Product price -->
                <div class="sticky-add-to-cart__product-price">$99</div>
                <!-- End product price -->
                <!-- Product options -->
                <div class="sticky-add-to-cart__product-options d-flex align-items-center">
                    <!-- Color -->
                    <div class="sticky-add-to-cart__color">
                        <p style="background: #484540"></p><span>Grey</span>
                    </div>
                    <!-- End color -->
                    <!-- Standard option -->
                    <div class="sticky-add-to-cart__standard-option">Choose your size</div>
                    <!-- End standard option -->
                </div>
                <!-- End product options -->
                <!-- Quantity -->
                <div class="sticky-add-to-cart__quantity">
                    <div class="sticky-add-to-cart-quantity__minus js-quantity-down"><a href="#"><i
                                class="lnil lnil-minus"></i></a></div>
                    <input type="text" value="2" class="sticky-add-to-cart-quantity__input js-quantity-field">
                    <div class="sticky-add-to-cart-quantity__plus js-quantity-up"><a href="#"><i
                                class="lnil lnil-plus"></i></a></div>
                </div>
                <!-- End quantity -->
                <!-- Add to cart -->
                <div class="sticky-add-to-cart__add-to-cart">
                    <a href="#" class="second-button">Add to cart</a>
                </div>
                <!-- End add to cart -->
            </div>
            <!-- End d-flex -->
        </div>
        <!-- End container -->
    </div>
    <!-- End sticky add to cart -->

    <!-- Home products -->
    <div class="home-products home-products--type-8 home-products--recently-viewed home-products--similar-pieces">
        <!-- Container -->
        <div class="container">
            <!-- Products container -->
            <div class="home-products__container">
                @if (count($relatedProducts) > 0)
                    <!-- Title and action -->
                    <div class="home-products__title-and-action d-flex">
                        <!-- Title -->
                        <h4 class="home-products__title">Similar Pieces</h4>
                        <!-- End title -->
                    </div>
                    <!-- End title and action -->
                    <!-- Carousel -->
                    <div class="home-products__carousel js-home-products-5-carousel">

                        <!-- Product -->
                        @foreach ($relatedProducts as $relatedProduct)
                            <div class="product-grid-item">
                                <!-- Tag -->
                                <div class="product-grid-item__tag">Sale</div>
                                <!-- End tag -->
                                <!-- Wishlist -->
                                <div class="product-grid-item__wishlist"><a href="#"><i
                                            class="lnil lnil-heart"></i></a>
                                </div>
                                <!-- End wishlist -->
                                <!-- Image -->
                                <div class="product-grid-item__image">
                                    <a href="{{ route('detailProduct', $relatedProduct->id) }}">
                                        <img alt="Image" data-sizes="auto"
                                            data-srcset="{{ asset('storage/images/products/' . $relatedProduct->srcImage) }} 400w,
                                                        {{ asset('storage/images/products/' . $relatedProduct->srcImage) }} 800w"
                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                            class="lazyload lazy-effect" />
                                        <img alt="Image" data-sizes="auto"
                                            data-srcset="{{ asset('storage/images/products/' . $relatedProduct->srcImage) }} 400w,
                                                        {{ asset('storage/images/products/' . $relatedProduct->srcImage) }} 800w"
                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                            class="lazyload lazy-effect hover" />
                                    </a>
                                </div>
                                <!-- End image -->
                                <!-- Title -->
                                <div class="product-grid-item__title"><a href="{{ route('detailProduct', $relatedProduct->id) }}">{{ $relatedProduct->name }}</a></div>
                                <!-- End title -->
                                <!-- Price -->
                                <div class="product-grid-item__price">
                                    <span class="price-new">{{ $relatedProduct->priceSale }}đ</span>
                                    <span class="price-old">{{ $relatedProduct->price }}đ</span>
                                </div>
                                <!-- End price -->
                               
                                
                            </div>
                        @endforeach
                        <!-- End product -->


                    </div>
                    <!-- End carousel -->
                @endif
            </div>
            <!-- End products container -->
        </div>
        <!-- End container -->
    </div>
    <!-- End home products -->

    <script>
        $(document).ready(function() {
            $('.product__details__option__size label').click(function() {
                $('.product__details__option__size label').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>
@endsection
