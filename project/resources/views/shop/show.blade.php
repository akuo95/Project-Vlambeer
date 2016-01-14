@extends('layout.master_shop')

@section('bodyAttributes')
    class="shop"
@endsection

@section('content')
    <div class="product">
        <div class="row">
            <div class="col-md-4 col-md-offset-1 productimg">
                <img src="{{$product->img}}" alt="product-img">
            </div>
            <div class="col-md-6">
                <div class="productinfo">
                    <h4>{{ $product->name }}</h4>
                    <p>{{ $product->description }}</p>
                </div>

                <div class="buy-now">
                    @if($product->category == 'clothes')
                        <div class="productoption ">
                            <div class="form-group">
                                <select class="form-control size" name="size">
                                    <option value="">size</option>
                                    <option value="m">M</option>
                                    <option value="l">L</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <select class="form-control color" name="color">
                                    <option>color</option>
                                    <option value="black">black</option>
                                    <option value="green">green</option>
                                </select>
                            </div>
                        </div>
                    @endif
                    <i class="minus fa fa-minus "></i>
                    <input min="1" type="number" class="quantity" value="1" />
                    <i class="add fa fa-plus"></i>
                    <div class="btn btn-primary pull-right add_to_cookie" id="{{$product['id']}}">Add to cart</div>
                </div>
                {{--Real payment link: https://www.paypal.com/cgi-bin/webscr--}}
                {{--<div class="paypal pull-right">--}}
                    {{--<form name="_xclick" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">--}}
                        {{--<input type="hidden" name="cmd" value="_xclick">--}}
                        {{--<input type="hidden" name="business" value="sjoerd3008-facilitator@hotmail.com">--}}
                        {{--<input type="hidden" name="currency_code" value="EUR">--}}
                        {{--<input type="hidden" name="return" value="http://vlambeer.dev/shop/paid">--}}
                        {{--<input type="hidden" name="cancel_return" value="http://vlambeer.dev/shop/payment_failed">--}}

                        {{--<input type="hidden" name="item_name" value="{{$product->name}}">--}}
                        {{--<input type="hidden" name="amount" value="{{$product->price}}">--}}
                        {{--<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">--}}
                    {{--</form>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
    <div class="relevant">
        <h2>Items you also may like:</h2>
        @foreach($randproducts as $randproduct)
            <div class="col-sm-4 col-lg-4 col-md-4 product-item">
                <div class="thumbnail">
                    <a href="{{$randproduct->id}}"></a>
                    <img src="{{$randproduct->img}}" alt="product-img">
                    <div class="caption">
                        <h4 class="pull-right">&#x24;{{$product['price']}}</h4>
                        <h4>{{$randproduct['name']}}</h4>
                        {{--                                        <h4>{{ substr($product['name'], 0, 20) . '...' }}</h4>--}}
                        <p> {{ substr($randproduct['description'], 0, 100) . '...' }}</p>
                    </div>
                    <div class="buy-now">
                        <input class="quantity" type="number">
                        <div class="btn btn-primary" id="{{$randproduct->id}}">KOOP NU!!</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@endsection