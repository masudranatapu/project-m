@extends('layouts.frontend.app')

@section('title')
    {{$title}}
@endsection

@section('meta')

@endsection

@push('css')
    <style>
        .card-img-top {
            height: 220px;
        }
        .profile_image_view {
            width: 100px;
            height: 100px;
        }
        .my_cart_image_size {
            width: 50px;
            height: 50px;
        }
        .button_plus_minus {
            height: 45px;
            padding: 0 15px;
            border: 1px solid #ced4da;
        }
        .input_center {
            padding-left: 25px;
        }
        .remove_cart_font {
            font-size: 20px;
            font-weight: bold;
        }
        hr {
            margin: 5px 0;
            border-bottom: 1px solid #bbbcbf;
        }
    </style>
@endpush

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area commun_bread py-3 grey-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul class="text-capitalize">
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li>{{ $title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="our_services bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h4>My Cart
                                @if(session('cart'))
                                <Small> ( {{ count(session('cart')) }} ) </Small>
                                @endif
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="1%">SL</th>
                                        <th class="text-center" width="10%">Image</th>
                                        <th class="text-center" width="30%">Name</th>
                                        <th class="text-center" width="22%">Qty</th>
                                        <th class="text-center" width="14%">Price</th>
                                        <th class="text-center" width="14%">Sub Total</th>
                                        <th class="text-center" width="5%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                        $i = 1;
                                    @endphp
                                    @if(session('cart'))
                                        @foreach(session('cart') as $key => $cartdetails)
                                            @php
                                                $total += $cartdetails['price'] * $cartdetails['quantity'] ;
                                            @endphp
                                            <tr>
                                                <th> {{ $i++ }} </th>
                                                <td>
                                                    <img class="my_cart_image_size" src="{{ asset($cartdetails['image']) }}" alt="">
                                                </td>
                                                <td>
                                                    {{ $cartdetails['name'] }}
                                                    <br>
                                                    @if($cartdetails['size_id'])
                                                        @php
                                                            $size = App\Models\Size::findOrFail($cartdetails['size_id']);
                                                        @endphp
                                                        <b class="badge text-success">Size : {{$size->name}}</b>
                                                        <hr>
                                                    @endif
                                                    @if($cartdetails['color_id'])
                                                        @php
                                                            $color = App\Models\Color::findOrFail($cartdetails['color_id']);
                                                        @endphp
                                                        <b class="badge text-info">Color: {{ $color->name }}</b>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="input-group input_qty">
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-number button_plus_minus btn-minus-qty_{{ $key }} update-cart" @if ($cartdetails['quantity'] <= 1) disabled="disabled" @endif data-id="{{ $key }}" data-type="minus" data-field="quant_{{ $key }}[1]">
                                                                <i class="fa fa-minus"></i>
                                                            </button>
                                                        </span>
                                                        <input type="text" name="quant_{{ $key }}[1]" class="form-control input-number" value="{{ $cartdetails['quantity'] }}" min="1" max="100">
                                                        <span class="input-group-btn">
                                                            <button  type="button" class="btn btn-number button_plus_minus btn-plus-qty_{{ $key }} update-cart" data-id="{{ $key }}" data-type="plus" data-field="quant_{{ $key }}[1]">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>{{ $cartdetails['price'] }} Tk </td>
                                                <td>{{ $cartdetails['price'] * $cartdetails['quantity'] }} Tk</td>
                                                <td class="text-center">
                                                    <a href="javascript:;" onclick="removeFormCart({{ $key }})" class="btn text-danger remove_cart_font" title="Product remove form cart">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </td>
                                                <form id="delete-form-{{ $key }}" action="{{ route('cart.remove', $key) }}" method="get" style="display: none;">
                                                    @csrf
                                                </form>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('home') }}" class="btn btn-success btn-lg">
                                <i class="fa fa-cart-plus mr-2"></i>
                                Continue Shopping
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <h4>Checkout Summary</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Sub Total
                                    <span class="pull-right">{{ $total }} Tk</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Grand Total
                                    <span class="pull-right">{{ $total + 0 }} Tk</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('customer.checkout.index') }}" class="btn btn-info float-right">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- product cart qty up down button  -->
    <script>
        $('.btn-number').click(function(e){
            e.preventDefault();
            var ele = $(this);
            var id = ele.attr("data-id");

            fieldName = $(this).attr('data-field');
            type      = $(this).attr('data-type');
            var input = $("input[name='"+fieldName+"']");
            var currentVal = parseInt(input.val());

            if (!isNaN(currentVal)) {
                if(type == 'minus') {
                    if(currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                        $.ajax({
                            url: '{{ url('update-cart') }}',
                            method: "patch",
                            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: currentVal - 1},
                            success: function (data) {
                                window.location.reload();
                            }
                        });
                    }
                    if(parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if(type == 'plus') {

                    if(currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();
                        $('.btn-minus-qty_'.id).attr('disabled', false);
                        $.ajax({
                            url: '{{ url('update-cart') }}',
                            method: "patch",
                            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: currentVal + 1},
                            success: function (data) {
                                window.location.reload();
                            }
                        });
                    }
                    if(parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });
    </script>

    <script src="{{ asset('massage/sweetalert/sweetalert.all.js') }}"></script>
    <script type="text/javascript">
        function removeFormCart(id) {
            swal({
                title: 'Are you sure?',
                text: "Your want to remove product from cart ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    // event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your cart product save. Please checkout :-)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush