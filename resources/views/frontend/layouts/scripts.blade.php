<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        // incriment product quantity
        $('.product-increment').on('click', function() {
            let input = $(this).siblings('.product-qty');
            let quantity = parseInt(input.val()) + 1;
            let rowId = input.data('rowid');
            input.val(quantity);

            $.ajax({
                url: "{{ route('cart.update-quantity') }}",
                method: 'POST',
                data: {
                    rowId: rowId,
                    quantity: quantity
                },
                success: function(data) {
                    if (data.status === 'success') {
                        let productId = '#' + rowId;
                        let totalAmount = data.productTotal +
                            "{{ $settings->currency_icon }}"
                        $(productId).text(totalAmount)

                        renderCartSubTotal();
                        calculateCouponDescount();

                        toastr.success(data.message)

                        window.location.reload();
                    } else if (data.status == 'warning') {
                        let productId = '#' + rowId;
                        let totalAmount = data.productTotal +
                            "{{ $settings->currency_icon }}"
                        $(productId).text(totalAmount)

                        renderCartSubTotal();
                        calculateCouponDescount();
                        toastr.warning(data.message)
                        window.location.reload();
                    } else if (data.status === 'error') {

                        toastr.error(data.message)
                        window.location.reload();
                    }
                },
                error: function(data) {

                }
            })
        })

        // decrement product quantity
        $('.product-decrement').on('click', function() {
            let input = $(this).siblings('.product-qty');
            let quantity = parseInt(input.val()) - 1;
            let rowId = input.data('rowid');

            if (quantity < 1) {
                quantity = 1;
            }

            input.val(quantity);

            $.ajax({
                url: "{{ route('cart.update-quantity') }}",
                method: 'POST',
                data: {
                    rowId: rowId,
                    quantity: quantity
                },
                success: function(data) {
                    if (data.status === 'success') {
                        let productId = '#' + rowId;
                        let totalAmount = data.productTotal +
                            "{{ $settings->currency_icon }}"
                        $(productId).text(totalAmount)

                        renderCartSubTotal();
                        calculateCouponDescount();

                        toastr.success(data.message)
                        window.location.reload();
                    } else if (data.status == 'warning') {
                        let productId = '#' + rowId;
                        let totalAmount = data.productTotal +
                            "{{ $settings->currency_icon }}"
                        $(productId).text(totalAmount)

                        renderCartSubTotal();
                        calculateCouponDescount();
                        toastr.warning(data.message)
                        window.location.reload();
                    } else if (data.status === 'error') {
                        toastr.error(data.message)
                        window.location.reload();
                    }
                },
                error: function(data) {

                }
            })

        })

        //clear all cart
        $('.clear_cart').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Jesteś pewien?',
                text: "Zostaną usunięte wszystkie produkty z koszyka",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Tak'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        type: 'get',
                        url: "{{ route('clear.cart') }}",
                        success: function(data) {
                            if (data.status === 'success') {
                                calculateCouponDescount();
                                window.location.reload();
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    })
                }
            })
        })




        $('.shopping-cart-form').on('submit', function(e) {
            e.preventDefault();
            let formData = $(this).serialize();

            $.ajax({
                method: 'POST',
                data: formData,
                url: "{{ route('add-to-cart') }}",
                success: function(data) {
                    if (data.status == 'success') {
                        getCartCount();
                        fetchSidebarCartProducts();
                        $('.mini_cart_actions').removeClass('d-none');
                        toastr.success(data.message);
                    } else if (data.status == 'warning') {
                        getCartCount();
                        fetchSidebarCartProducts();
                        $('.mini_cart_actions').removeClass('d-none');
                        toastr.warning(data.message);
                    } else {
                        toastr.error(data.message);
                    }
                },
                error: function(data) {

                }
            })
        })


        function getCartCount() {
            $.ajax({
                method: 'GET',
                url: "{{ route('cart-count') }}",
                success: function(data) {
                    $('#cart-count').text(data);
                },
                error: function(data) {

                }
            })
        }

        function fetchSidebarCartProducts() {
            $.ajax({
                method: 'GET',
                url: "{{ route('cart-products') }}",
                success: function(data) {
                    $('mini_cart_wrapper').html("");
                    var html = '';
                    for (let item in data) {
                        let product = data[item];
                        html += `
                        <li id="mini_cart_${product.rowId}">
                            <div class="wsus__cart_img">
                                <a href="{{ url('product-detail/') }}/${product.options.slug}"><img src="{{ asset('/') }}${product.options.image}" alt="product" class="img-fluid w-100"></a>
                                <a class="wsis__del_icon remove_sidebar_product" data-id="${product.rowId}" href="{{ url('product-detail') }}/${product.options.slug}"><i class="fas fa-minus-circle"></i></a>
                            </div>
                            <div class="wsus__cart_text">
                                <a class="wsus__cart_title" href="#">${product.name}</a>
                                <p>${product.price} {{ $settings->currency_icon }}</p>
                                <small>Cena Wariantu: ${product.options.variants_total} {{ $settings->currency_icon }}</small>
                                 <br>
                                 <small>Ilość: ${product.qty}</small>
                            </div>
                        </li>`
                    }
                    $('.mini_cart_wrapper').html(html);

                    getSidebarCartSubtotal();
                },
                error: function() {

                }
            })
        }
        //remove product
        $('body').on('click', '.remove_sidebar_product', function(e) {
            e.preventDefault();
            let rowId = $(this).data('id');

            $.ajax({
                method: 'POST',
                url: "{{ route('cart.remove-sidebar-product') }}",
                data: {
                    rowId: rowId
                },
                success: function(data) {
                    let productId = '#mini_cart_' + rowId;
                    $(productId).remove();
                    getSidebarCartSubtotal();
                    if ($('.mini_cart_wrapper').find('li').length === 0) {
                        $('.mini_cart_actions').addClass('d-none');
                        $('.mini_cart_wrapper').html(
                            '<li class="text-center">Koszyk jest pusty.</li>')
                    }
                    toaster.success(data.message);
                },
                error: function(data) {

                }
            })
        })


        function getSidebarCartSubtotal() {
            $.ajax({
                method: 'GET',
                url: "{{ route('cart.sidebar-product-total') }}",
                success: function(data) {
                    $('#mini_cart_subtotal').text(data + "{{ $settings->currency_icon }}");
                },
                error: function(data) {

                }
            })
        }


        //get total cart subtotal amount
        //this fun will only return float value
        function getCartTotal() {
            $.ajax({
                method: 'GET',
                url: "{{ route('cart.sidebar-product-total') }}",
                success: function(data) {
                    return data;
                },
                error: function(data) {

                }
            })
        }






        // get subtotal of cart and put it on dom
        function renderCartSubTotal() {
            $.ajax({
                method: 'GET',
                url: "{{ route('cart.sidebar-product-total') }}",
                success: function(data) {
                    $('#sub_total').text(data + "{{ $settings->currency_icon }}");
                },
                error: function(data) {
                    console.log(data);
                }
            })
        }
        $('#coupon_form').on('submit', function(e) {
            e.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                method: 'GET',
                url: "{{ route('apply-coupon') }}",
                data: formData,
                success: function(data) {
                    if (data.status == 'error') {
                        calculateCouponDescount();
                        toastr.error(data.message);
                    } else if (data.status == 'success') {
                        calculateCouponDescount();
                        toastr.success(data.message);
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            })
        })

        function calculateCouponDescount() {
            $.ajax({
                method: 'GET',
                url: "{{ route('coupon-calculation') }}",
                success: function(data) {
                    if (data.status === 'success') {
                        $('#discount').text(data.discount + '{{ $settings->currency_icon }}');
                        $('#cart_total').text(data.cart_total + '{{ $settings->currency_icon }}');
                    }
                },
                error: function(data) {

                }
            })
        }

        //add product to wishlist
        $('.add_to_wishlist').on('click', function(e) {
            e.preventDefault();
            let id = $(this).data('id');

            $.ajax({
                method: 'GET',
                url: "{{ route('user.wishlist.store') }}",
                data: {
                    id: id
                },
                success: function(data) {
                    if (data.status === 'success') {
                        $('#wishlist_count').text(data.count)
                        toastr.success(data.message)
                    } else if (data.status === 'error') {
                        toastr.error(data.message)
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            })
        })

        //add product to wishlist
        $('#newsletter').on('submit', function(e) {
            e.preventDefault();
            let data = $(this).serialize();

            $.ajax({
                method: 'POST',
                url: "{{ route('newsletter-request') }}",
                data: data,
                beforeSend: function() {
                    $('.subscribe_btn').text('Ładowanie...');
                },
                success: function(data) {
                    if (data.status === 'success') {
                        $('.subscribe_btn').text('Subskrybujesz');
                        $('.newsletter_email').val('');
                        toastr.success(data.message);

                    } else if (data.status === 'error') {

                        $('.subscribe_btn').text('Subskrybujesz');
                        toastr.error(data.message);
                    }
                },
                error: function(data) {
                    let errors = data.responseJSON.errors;
                    if (errors) {
                        $.each(errors, function(key, value) {
                            toastr.error(value);
                        })
                    }
                    $('.subscribe_btn').text('Subskrybujesz');
                }
            })
        })




    });
</script>
