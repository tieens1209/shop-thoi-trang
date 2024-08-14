@extends('layout.client')

@section('content')

    <!-- Shopping cart -->
    <div class="shopping-cart">
        <!-- Container -->
        <div class="container">
            <!-- Second container -->
            <div class="shopping-cart__container">
                <!-- Title -->
                <h1 class="shopping-cart__title">Shopping Cart</h1>
                <!-- End title -->
                <!-- Row -->
                @if (isset($carts[0]->id))
                    <div class="row">
                        <!-- Left -->
                        <div class="col-lg-7 col-xl-8">
                            <!-- Cart container -->
                            <div class="shopping-cart__container">
                                <!--- Table responsive -->
                                <div class="table-responsive">
                                    <!-- Table -->
                                    <table class="shopping-cart__table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Cart product item -->
                                            <form action="{{ route('updateCart') }}" method="post">
                                                @csrf
                                                @method('POST')
                                                @foreach ($carts as $cart)
                                                    <tr>
                                                        <td>
                                                            <div class="shopping-cart__product">
                                                                <div class="cart-product__image">
                                                                    <a href="#">
                                                                        <img alt="Image" data-sizes="auto"
                                                                            data-srcset="{{ asset('storage/images/products/' . $cart->product->srcImage) }} 400w,
                                                                                        {{ asset('storage/images/products/' . $cart->product->srcImage) }} 800w"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                            class="lazyload lazy-effect" />
                                                                    </a>
                                                                </div>
                                                                <div class="cart-product__title-and-variant">
                                                                    <h3 class="cart-product__title"><a
                                                                            href="#">{{ $cart->product->name }}</a>
                                                                    </h3>
                                                                    <div class="cart-product__variant">Size:
                                                                        {{ $cart->size }}</div>

                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="cart-product__price">
                                                                {{ $cart->product->priceSale }}đ
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="cart-product__quantity-field">
                                                                <div class="quantity-field__minus js-quantity-down"><a
                                                                        href="#">-</a>
                                                                </div>
                                                                <input type="text" value="{{ $cart->qty }}"
                                                                    name="{{ $cart->id }}" min="1"
                                                                    class="quantity-field__input js-quantity-field" />
                                                                <div class="quantity-field__plus js-quantity-up"><a
                                                                        href="#">+</a>
                                                                </div>
                                                            </div>


                                                        </td>
                                                        <td>
                                                            <div class="cart-product__price">
                                                                {{ $cart->total }}đ
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="cart-product__delete">
                                                                <a href="{{ route('deleteInCart', $cart->id) }}"><i
                                                                        class="lnil lnil-close"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <!-- End cart product item -->

                                        </tbody>
                                    </table>
                                    <!-- End table -->
                                </div>
                                <!-- End table responsive -->
                                <!-- Cart discount -->
                                <div class="d-flex">

                                    <button type="submit" class="button">Cập nhật giỏ hàng</button>

                                </div>
                                <!-- End cart discount -->
                            </div>
                            <!-- End cart container -->
                        </div>
                        <!-- End left -->
                        <!-- Right -->
                        <div class="col-lg-5 col-xl-4">
                            <!-- Order summary -->
                            <div class="shopping-cart__order-summary">
                                <!-- Background -->
                                <div class="order-summary__background">
                                    <!-- Title -->
                                    <h3 class="order-summary__title">Order Summary</h3>
                                    <!-- End title -->
                                    <!-- Subtotal -->
                                    <div class="order-summary__subtotal">
                                        <div class="summary-subtotal__title">Subtotal</div>
                                        <div class="summary-subtotal__price">{{ $cart->total }}đ</div>
                                    </div>
                                    <!-- End subtotal -->
                                    <!-- Delivery method -->

                                    <div class="order-summary__subtotal">
                                        <div class="summary-subtotal__title">Shipping</div>
                                        <div class="summary-subtotal__price">Free</div>
                                    </div>
                                    <!-- End delivery method -->
                                    <!-- Total -->
                                    <div class="order-summary__total">
                                        <div class="summary-total__title">Total</div>
                                        <div class="summary-total__price">
                                            @if (isset($voucher))
                                                <span class="format-currency">{{ $totalBill - $voucher->value }}đ</span>
                                                <del style="font-size: 15px; color:black;"
                                                    class="format-currency">{{ $totalBill }}đ</del>
                                            @else
                                                <span class="format-currency">{{ $totalBill }}đ</span>
                                            @endif
                                            </span>
                                        </div>
                                    </div>
                                    <!-- End total -->
                                    <!-- Proceed to checkout -->
                                    <div class="order-summary__proceed-to-checkout">
                                        <a href="{{ route('checkOut') }}" class="second-button">Proceed to checkout</a>
                                    </div>
                                    <!-- End proceed to checkout -->

                                </div>
                                <!-- End background -->
                                <!-- Action -->
                                <div class="order-summary__action">
                                    <a href="{{ route('listProduct') }}">Continue shopping</a>
                                </div>
                                <!-- End action -->
                            </div>
                            <!-- End order summary -->
                        </div>
                        <!-- End right -->
                    </div>
                @else
                    <h5 class="text-center">Bạn chưa có sản phẩm nào trong giỏ. Hãy mua sắm!</h5>
                @endif
                <!-- End row -->
            </div>
            <!-- End second container -->
        </div>
        <!-- End container -->
    </div>
    <!-- End shopping cart -->
@endsection
