<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>Fresh from the oven</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">All</li>
                    @foreach($promoted_categories as $category)
                        <li data-filter=".{{$category['filter_name']}}">{{$category['name']}}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row property__gallery">

            @foreach($promoted_products as $promotedProduct)
                <div class="col-lg-3 col-md-4 col-sm-6 mix {{implode(' ', $promotedProduct['categories'])}}">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{$promotedProduct['img']}}">
                            @if ($promotedProduct['is_new'])
                                <div class="label new">New</div>
                            @elseif ($promotedProduct['out_of_stock'])
                                <div class="label stockout">out of stock</div>
                            @elseif ($promotedProduct['on_sale'])
                                <div class="label sale">Sale</div>
                            @endif
                            <ul class="product__hover">
                                <li><a href="{{$promotedProduct['img']}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">{{$promotedProduct['name']}}</a></h6>
                            <div class="rating">
                                @for($i = 0; $i <= $promotedProduct['avg_rating']; $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            </div>
                            <div class="product__price">
                                @if ($promotedProduct['on_sale'])
                                    £{{$promotedProduct['sale_price']}}
                                    <span>£{{$promotedProduct['price']}}</span>
                                @else
                                    £{{$promotedProduct['price']}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Product Section End -->