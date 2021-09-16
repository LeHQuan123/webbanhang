@extends('frontend.master')
@section('title','Shop - Le H Quan')
@section('main')
<div id="wrap-inner">
<div class="products">
	<h3>sản phẩm nổi bật</h3>
	<div class="product-list row">
		@foreach($featured as $item)
		<div class="product-item col-md-3 col-sm-6 col-xs-12">
			<a href="#"><img height="150px" src="{{asset('storage/' . $item->prod_img)}}"></a>
			<p><a href="#">{{$item->prod_name}}</a></p>
			<p class="price">{{number_format($item->prod_price,0,',','.')}}</p>	  
			<div class="marsk">
				<a href="{{asset('details/'. $item->prod_id . '/' . $item->prod_slug . '.html')}}">Xem chi tiết</a>
			</div>                                    
		</div> 
		@endforeach             	                        
	</div>                	                	
</div>

<div class="products">
	<h3>sản phẩm mới</h3>
	<div class="product-list row">
		@foreach($news as $new)
		<div class="product-item col-md-3 col-sm-6 col-xs-12">
			<a href="#"><img height="150px" src="{{asset('storage/' . $new->prod_img)}}" alt=""class="img-thumbnail"></a>
			<p><a href="#">{{$new->prod_name}}</a></p>
			<p class="price">{{number_format($new->prod_price,0,',','.')}}</p>	  
			<div class="marsk">
				<a href="{{asset('details/'. $new->prod_id . '/' . $new->prod_slug . '.html')}}">Xem chi tiết</a>
			</div>                      	                        
		</div>
		@endforeach
	</div>    
</div>
</div>
@stop

				