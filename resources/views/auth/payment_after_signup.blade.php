@extends('layouts.default')

@section('content')
<!-- {{phpinfo()}} -->
<section class="payment-cred">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-5">
                <div class="pay-inner-sec">
                    <form role="form" id="signuppay">
                    {{ csrf_field() }}
                        <div class="pay-heading">
                            <div class="col-md-12">
                                <h5 class="pay-title">Payment Credential</h5>
                                <p class="pay-detail-detail">Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <h3 class="pay-amount">$13.00</h5>
                            </div>
                        </div>
                        <div class="row">

                            <div class="alert-info">
                            
                            </div>

                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>Card Number</label>
                                    <input type="text" class="form-control" id="" name="cc_number" value="" placeholder="123 123 123 123">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                        <label>&nbsp;</label>
                                        <select class="form-control" name="cc_type" id="cc_type">  
                                            <option value="MasterCard">MasterCard</option>
                                            <option value="Visa">Visa</option>
                                            <option value="Discover">Discover</option>  
                                            <option value="JCB">JCB</option>
                                            <option value="American Express">American Express</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Cardholder Name</label>
                                        <input type="text" class="form-control" id="" name="cc_name" value="" placeholder="John Doe">
                                    </div>
                            </div>
							<div class="col-md-6">
                                <div class="form-group">
                                    <label>Expiry Date</label>
                                     <input type="text" class="form-control" id="" name="cc_expire_date_month" value="" placeholder="MM" maxlength="2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label>&nbsp;</label>
                                        <input type="text" class="form-control" id="" name="cc_expire_date_year" value="" placeholder="YYYY" maxlength="4">
                                                   
                                </div>
                            </div>
                            <div class="col-md-12">
                                        <div class="form-group">
                                            <label>CVV</label>
                                            <input type="text" class="form-control" id="" name="cvv" value="" placeholder="123">
                                        </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input login-check" name="save_card" value="yes"><span class="checkbox-style"></span><span class="checkbox-style-login">SAVE CARD</span>
                                </label>
                            </div>
                        </div>
                        </div>
                        <input type="hidden" name="cc_token" value="{{$_GET['token']}}">
                        <div class="col-md-12 col-sm-12 p-0">
                            <button class="paynow btn" type="button">Pay Now</button>
                        </div>
                        <!-- First Step End Here -->
                    </form>
                </div>
            </div>
            <div class="col-md-7 col-sm-7">
                <h4 class="amount-reason">Reason for deducting the amount</h4>
                <p class="reason-txt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, 
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                    and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                <p class="reason-txt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, 
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                    and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </div>
        </div>
    </div>
</section><!-- Form Section End Here -->

<script>

jQuery(document).ready(function($) {

    var signuppay = $("#signuppay").validate({
        rules: {
            cc_number: {
                required: true,
                minlength: 16,
                digits: true
            },
            cc_name: "required",
            cc_expire_date_month: {
                required: true,
                digits: true,
            },
            cc_expire_date_year: {
                required: true,
                digits: true,
                minlength: 4,
            },
            cvv: "required",
        },
        messages: {
            cc_number: {
                required: 'Please enter card number',
                minlength: 'Card number must be of atleast 16 characters long',
                digits: 'Please enter digits only'
            },
            cc_name: "Please enter card holder name",
            cc_expire_date_month: {
                required: 'Please enter expiry month',
                digits: 'Please enter digits only'
            },
            cc_expire_date_year: {
                required: 'Please enter expiry year',
                digits: 'Please enter digits only',
                minlength: 'Please enter valid expiry year e.g 2020'
            },
            cvv: "Please enter cvv"
        }
    });


    $('#signuppay .paynow').on('click', function() {

        if(signuppay.form()){

            $.ajax({
                url: '{{ url("/") }}/after/payment',
                method: 'post',
                data: $("#signuppay").serialize()+'&_token='+'{{ csrf_token() }}',
                dataType: 'json',
                beforeSend: function() {
                    //$(".alert-info").html('<div class="alert alert-info">Please wait..</div>')
                    swal({
                      title: 'Please Wait',
                      text: 'This will take a while',
                      onOpen: () => {
                        swal.showLoading()
                      }
                    })
                },
                // complete: function() {
                //     $('.alert').remove();
                //     $('#button-confirm').attr('disabled', false);
                // },
                success: function(json) {

                    if (json['error']) {
                        //alert(json['error']);
                        swal({
                          type: 'error',
                          title: 'Payment failed',
                          text: json['error']
                        })
                    }

                    if (json['success']) {

                        //$(".alert-info").html('<div class="alert alert-success">Payment has been completed succesfully. Redirecting...</div>')
                        
                        // setTimeout(function(){ 
                        //     window.location.href = '{{ url("/") }}/user/profile';
                        // }, 3000);
                        swal.close()

                        swal({
                          type: 'success',
                          title: 'Success',
                          text: 'Payment has been completed succesfully. Redirecting...',
                          timer: 3000,
                          allowOutsideClick: false,
                          onOpen: () => {
                            swal.showLoading()
                          }
                        }).then((result) => {
                          if (
                            // Read more about handling dismissals
                            result.dismiss === swal.DismissReason.timer
                          ) {
                            window.location.href = '{{ url("/") }}/user/profile';
                          }
                        })

                    }
                }
            });
        }    
    });
});
</script>

@endsection