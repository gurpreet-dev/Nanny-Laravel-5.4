@extends('layouts.default')

@section('content')
<section class="test-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-sec">
                    <div class="test-part">
                        <div class="test-header">
                            <h3>Testimonials</h3>
                            <div class="btn-sec ml-auto">
                            @if (Auth::user())
                                <button type="button" class="btn btn-default btnPop" data-toggle="modal" data-target="#rating-modal">Write a Review</button>
                                @endif
                                <a href="{{ route('yelpreviews') }}" class="btn btn-default btnYelp"><img src="{{ url('/') }}/images/website/yelp.png" alt="Yelp Logo"> Yelp Reviews</a>
                            </div>
                        </div>
                        <div class="test-body">
                            @if(count($reviews) > 0)
                            @foreach($reviews as $review)
                            <div class="test-block">
                                <div class="avatar-sec">
                                    @if($review->user->image != '')
                                    <img src="{{url('/')}}/images/users/{{ $review->user->image }}" alt="Avatar">
                                    @else
                                    <img src="{{url('/')}}/images/users/noimage.png" alt="Avatar">
                                    @endif
                                </div>
                                <div class="details">
                                    <h6>{{ $review->user->first_name1.' '.$review->user->last_name1 }}</h6>
                                    <div class="star-details">
                                        
                                        <?php
                                        $avg = $review->rating;
                                        for($i = 0; $i<$avg; $i++){
                                        ?>
                                        <span class="rating"><span class="rated"><i class="far fa-star"></i></span>
                                        <?php
                                        }
                                        
                                        $not_avg = 5 - $review->rating;
                                        for($i = 0; $i<$not_avg; $i++){
                                        ?>
                                        <span class="rating"><span><i class="far fa-star"></i></span>
                                        <?php } ?>
                                        
                                        <span class="date">{{ date('d M, Y', strtotime($review->created_at)) }}</span>
                                    </div>
                                    <p>{{ $review->review }}</p>
                                </div>
                            </div>
                            @endforeach
                            @else
                            No Tesimonials Yet
                            @endif
                        </div>
                    </div>
                </div
            </div>
        </div>
    </div>
</section><!-- Form Section End Here -->


<div class="modal fade" id="rating-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>
                <h5>Write A Review</h5>
                <div id="alert-box"></div>
                <div class="rating-icon">
                    <a href="#" class=""><i class="far fa-star"></i></a>
                    <a href="#" class=""><i class="far fa-star"></i></a>
                    <a href="#" class=""><i class="far fa-star"></i></a>
                    <a href="#" class=""><i class="far fa-star"></i></a>
                    <a href="#" class=""><i class="far fa-star"></i></a>
                </div>
                <form class="form-horizontal" name="Comment-Form" method="post" action="#" id="review-form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea class="form-control" id="" name="review" value="" placeholder="Enter your comment"></textarea> 
                    </div>
                    <input type="hidden" id="ratings1" name="rating">
                    <input type="button" class="btn btn-default btnSub" id="sbt-rev" value="Submit">
                </form>
                <div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
$('.rating-icon a').each(function(){
	$(this).click(function(){
		if(!$(this).hasClass('active')){
			$(this).addClass('active');
			$(this).prevAll().addClass('active');
			var rate = $('.rating-icon .active').length;
		}else{
			$(this).nextAll().removeClass('active');
			var rate = $('.rating-icon .active').length;
		}

		$('#ratings1').val(rate);
	   
	});
});

$(document).delegate('#sbt-rev', 'click', function(){
	
	var rating = $("#ratings1").val();
	var review = $('textarea[name="review"]').val();
	if(rating == 0){
		alert("Please give star rating");
	}else if(review == ''){
		alert("Please give review");
	}else{
		$.ajax({
			url: '{{ url('/') }}/user/addreview',
			data: $("#review-form").serialize(),
			method: 'post',
			success: function(response){
				if(response == 'success'){
					$('#alert-box').html('<div class="alert alert-success">Review submitted successfully</div>').css('display', 'block');
					$('.rating-icon, #review-form').css('display', 'none');
					
					$(document).click(function(){
						location.reload();
					});
				}
			}
		});
	}
});



</script>

@endsection