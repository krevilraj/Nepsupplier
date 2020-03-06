@if(count($reviews = $product->getReviews()) >0)

    <div class="review_address_inner">

    @foreach($reviews as $review)
        <!-- Start Single Review -->
            <div class="pro_review  mt-30">
                <div class="review_thumb">
                    <img alt="review images" src="{{ asset('images/reviewer.jpg') }}">
                </div>
                <div class="review_details">
                    <div class="review_info mb-10">

                        @for ($i = 1; $i < 6; $i++)
                            <span class="fas fa-star
                                @if($i <= $review->star)
                                    checked
                                @endif
                                    " >

                            </span>

                        @endfor

                        <h5>{{$review->user->getFullNameAttribute() }} -
                            <span> {{humanizeDate($review->created_at)}}</span></h5>

                    </div>
                    <p>{{ $review->comment }}</p>
                </div>
            </div>
            <!-- End Single Review -->
        @endforeach


    </div>
@else
    <div class="collateral-box">
        <ul class="list-unstyled">
            <li>Be the first to review this product</li>
        </ul>
    </div>
@endif


<!-- Start RAting Area -->
<div class="rating_wrap mt-50">
    <h5 class="rating-title-1">Add a review </h5>
    <p>Your email address will not be published. Required fields are marked *</p>
    <p id="message"></p>
</div>
<!-- End RAting Area -->

<div class="comments-area comments-reply-area">
    <div class="row">
        <div class="col-lg-12">
            <form id="review_form" action="{{ route('review.store') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" id="product_id" value="{{ $product->id }}"/>
                <br>
                <h6 class="rating-title-2">Your Rating</h6>
                <div class="rating_list">
                    <div class="review_info mb-10">
                        <div class="container">
                            <div class="row">
                                <div class="rating">
                                    <span class="fa fa-star" id="star1" onclick="add(this,1)"></span>
                                    <span class="fa fa-star" id="star2" onclick="add(this,2)"></span>
                                    <span class="fa fa-star" id="star3" onclick="add(this,3)"></span>
                                    <span class="fa fa-star" id="star4" onclick="add(this,4)"></span>
                                    <span class="fa fa-star" id="star5" onclick="add(this,5)"></span>
                                    <input type="hidden" name="star" id="user-star"/>
                                    <div class="help-block text-danger" id="error_user_star"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="comment-form-comment mt-15">
                    <label>Comment</label>
                    <textarea cols="5" rows="6" name="comment" id="user-comment" class="comment-notes"
                    >{{ old('comment') }}</textarea>
                    <span class="help-block text-danger" id="error_user_comment"></span>
                </div>
                <div class="comment-form-submit mt-15">
                    <button id="review_btn" class="login-btn btn" type="submit">
                        <span>Submit</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('styles')
    <style>
        .checked {
            color: orange;
        }

        .rating .fa-star {
            font-size: 18px;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $("#review_form").on("submit", function (e) {
            e.preventDefault();
            var star = $("#user-star").val();
            var comment = $("#user-comment").val();
            $("#error_user_star").html("");
            $("#error_user_comment").html("");
            if (star == "" || comment == "" || star == undefined || comment == undefined) {
                if (star == "" || star == undefined) $("#error_user_star").html("<i class=\"fas fa-exclamation-circle\"></i> Select your rating on star<br/>");
                if (comment == "" || comment == undefined) $("#error_user_comment").html("<i class=\"fas fa-exclamation-circle\"></i> Comment is required<br/>");
                return false;
            } else {
                var results = '';
                var _token = $("input[name='_token']").val();
                var data = {
                    _token: _token,
                    star: star,
                    comment: comment,
                    product_id: $('#product_id').val()
                };
                $.ajax({
                    type: "POST",
                    url: "{{ route('review.store') }}",
                    data: data,
                    beforeSend: function () {
                        $("#review_btn").html("<span class=\"spinner-grow spinner-grow-sm\" role=\"status\" aria-hidden=\"true\"></span>Wait ...").prop('disabled', true);
                    },
                    success: function (data) {
                        if (data.success) {
                            var message = '<div class="alert alert-success alert-dismissible fade show" role="alert">\n' +
                                '  <strong>Success!!!</strong> ' + data.message + '\n' +
                                '  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                                '    <span aria-hidden="true">&times;</span>\n' +
                                '  </button>\n' +
                                '</div>'
                            $('#message').html(message);
                            location.reload();
                        } else {
                            var error = data.message;
                            var results = "";
                            $.each(error, function () {
                                results += "<i class=\"fas fa-exclamation-circle\"></i> " + this + '<br>';
                            });
                            $("#message").html(results);
                        }
                    },
                    error: function (response) {
                        var error = response.responseJSON.errors;
                        var results = "";
                        $.each(error, function () {
                            results += "<i class=\"fas fa-exclamation-circle\"></i> " + this + '<br>';
                        });
                        $("#message").html(results);
                    },
                    complete: function () {
                        $("#review_btn").html("Login").prop("disabled", false);
                    }

                });

            }

        });

        function add(ths, sno) {
            $('#user-star').val(sno);
            for (var i = 1; i <= 5; i++) {
                var cur = document.getElementById("star" + i);
                cur.className = "fa fa-star"
            }

            for (var i = 1; i <= sno; i++) {
                var cur = document.getElementById("star" + i)
                if (cur.className == "fa fa-star") {
                    cur.className = "fa fa-star checked"
                }
            }

        }

    </script>
@endpush


