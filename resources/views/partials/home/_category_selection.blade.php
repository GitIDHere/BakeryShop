<!-- Categories Section Begin -->
<section class="categories">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-6 p-0">
                <div class="categories__item categories__large__item set-bg"
                     data-setbg="{{$lead_tile['img']}}">
                    <div class="categories__text">
                        <h1>{{$lead_tile['title']}}</h1>
{{--                        <p>{{$lead_tile['product_count']}} items</p>--}}
                        {{--                                    <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt laboreedolore magna aliquapendisse ultrices gravida.</p>--}}
                        <a href="#">Shop now</a>
                    </div>
                </div>
            </div>

            @if(isset($small_tiles))
                <div class="col-lg-6">
                    <div class="row">
                        @foreach($small_tiles as $smallTile)
                            <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                                <div class="categories__item set-bg" data-setbg="{{$smallTile['img']}}">
                                    <div class="categories__text">
                                        <h4>{{$smallTile['title']}}</h4>
{{--                                        <p>{{$smallTile['product_count']}} items</p>--}}
                                        <a href="#">Shop now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
</section>
<!-- Categories Section End -->
