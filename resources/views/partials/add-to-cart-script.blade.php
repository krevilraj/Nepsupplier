@push('styles')
    <!-- Sweetalert2 -->
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
@endpush
@push('scripts')
    <!-- Sweetalert2 -->
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        $('.orderby, .count').change(function () {
            $(this).closest('form').submit();
        });

        function UpdateMiniCart() {
            $.ajax({
                type: "GET",
                url: "{{ route('cart.mini')  }}",
                beforeSend: function (data) {
                    //
                },
                success: function (data) {
                    $('#mini-cart').html(data);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    //
                },
                complete: function () {
                    //
                }
            });
        }

        function UpdateCompareList() {
            $.ajax({
                type: "GET",
                url: "{{ route('comparelist.mini')  }}",
                success: function (data) {
                    $('#compare-dropdown').html(data);
                }
            });
        }

        function sweetAlert(type, title, message) {
            swal({
                title: title,
                html: message,
                type: type,
                confirmButtonColor: '#ee3d43',
                timer: 20000
            }).catch(swal.noop);
        }

        // Add product to cart
        $(document).on("click", ".addtocart", function (e) {
            e.preventDefault();
            var $this = $(this);
            var pre_text = $this.html();
            var product = $this.parent().attr('data-product');
            var quantity = $this.siblings('.product-detail-qty').find('#product-vqty').val();
            quantity = quantity ? quantity : 1;

            if (product) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('cart.store')  }}",
                    data: {
                        product: product,
                        quantity: quantity
                    },
                    beforeSend: function (data) {
                        $this.html("<span class=\"spinner-grow spinner-grow-sm\" role=\"status\" aria-hidden=\"true\"></span>Wait ...").prop('disabled', true);
                    },
                    success: function (data) {
                        if (data.status) {
                            sweetAlert('success', 'Success', data.message + '<a href="{{ route('cart.index') }}"> View Cart</a>');
                        }

                        UpdateMiniCart();
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        sweetAlert('error', 'Oops...', 'Something went wrong!');
                    },
                    complete: function () {
                        $this.html(pre_text);
                    }
                });
            }

        });


        // Add product to enquiry list
        $(document).on("click", ".enquiry", function (e) {
            e.preventDefault();
            var $this = $(this);
            var product = $this.parent().attr('data-product');

            if (product) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('enquiry.list.store')  }}",
                    data: {
                        product: product
                    },
                    beforeSend: function () {
                        $this.button('loading');
                    },
                    success: function (data) {
                        if (data.status) {
                            sweetAlert('success', 'Success', data.message + '<a href="{{ route('enquiry') }}"> View Enquiry List</a>');
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        var err;
                        if (xhr.status === 401) {
                            err = eval("(" + xhr.responseText + ")");
                            sweetAlert('error', 'Oops...', err.message + '<a href="{{ route('login') }}"> Login</a>');
                            return false;
                        }

                        sweetAlert('error', 'Oops...', 'Something went wrong!');
                    },
                    complete: function () {
                        $this.button('reset');
                    }
                });
            }

        });

        // Add product to wishlist
        $(document).on("click", ".addtowishlist", function (e) {
            e.preventDefault();
            var $this = $(this);
            var product = $this.parent().attr('data-product');
            var pre_text = $this.html();
            if (product) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('wishlist.store')  }}",
                    data: {
                        product: product
                    },
                    beforeSend: function (data) {
                        var loading = ' <div class="spinner-border spinner-border-sm text-success" role="status">\n' +
                            '                                    <span class="sr-only">Loading...</span>\n' +
                            '                                </div>';
                        $this.html("Wait " + loading).prop('disabled', true);
                    },
                    success: function (data) {
                        if (data.status) {
                            sweetAlert('success', 'Success', data.message + '<a href="{{ route('my-account.wishlist') }}"> View Wishlist</a>');
                            $('#wishcount').html(data.count);
                        }
                        $this.html(pre_text).prop('disabled', false).css('color', 'red');
                        ;
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        var err;
                        $this.html(pre_text).prop('disabled', false);
                        if (xhr.status === 401) {
                            err = eval("(" + xhr.responseText + ")");
                            sweetAlert('error', 'Oops...', err.message + '<a href="{{ route('login') }}"> Login</a>');
                            return false;
                        } else {

                            sweetAlert('error', 'Oops...', 'Something went wrong!');
                        }


                    }
                });
            }

        });

        // Add product to compare list
        $(document).on("click", ".comparelink", function (e) {
            e.preventDefault();
            var $this = $(this);
            var product = $this.parent().attr('data-product');

            if (product) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('compare.store')  }}",
                    data: {
                        product: product
                    },
                    beforeSend: function () {
                        $this.button('loading');
                    },
                    success: function (data) {
                        if (data.status) {
                            sweetAlert('success', 'Success', data.message + '<a href="{{ route('compare') }}"> View Compare List</a>');
                        }

                        UpdateCompareList();
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        //
                    },
                    complete: function () {
                        $this.button('reset');
                    }
                });
            }

        });

        /**
         * Load Product Modal
         *
         * @type {*|jQuery|HTMLElement}
         */
        var $modal = $('#quickViewModal');
        $(".product-quickview").click(function (e) {
            e.preventDefault();
            $modal.load("{{ route('product.quick.view') }}" + "?product=" + $(this).attr("data-product"), function (response) {
                $modal.modal({show: true});
                // Vertical Spinner - Touchspin - Product Details Quantity input
                if ($.fn.TouchSpin) {
                    $('#product-vqty').TouchSpin({
                        verticalbuttons: true
                    });
                }
            });
        });
    </script>
    <script>
        $(document).on("click", ".btn-request", function (e) {
            e.preventDefault();
            var $this = $(this);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('request-product.post')}}",
                data: {
                    name: $('#name1').val(),
                    email: $('#email1').val(),
                    subject: $('#subject1').val(),
                    message: $('#message1').val(),
                    link: $('#link').val(),
                    application: $('#application').val(),
                    phone: $('#phone1').val()
                },
                beforeSend: function () {
                    $this.button('loading');
                },
                success: function (data) {
                    $(location).attr('href', '{{ route('request.confirmed') }}');

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    var errorsHolder = '';
                    errorsHolder += '<ul>';

                    var err = eval("(" + xhr.responseText + ")");
                    $.each(err.errors, function (key, value) {
                        errorsHolder += '<li>' + value + '</li>';
                    });


                    errorsHolder += '</ul>';

                    $this.closest('form').find('.alert-request.alert-danger').fadeIn().html(errorsHolder);

                },
                complete: function () {
                    $this.button('reset');
                }
            });

        });

    </script>
@endpush