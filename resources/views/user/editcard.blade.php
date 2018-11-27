@extends('layouts.default')

@section('content')

<section class="profile-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div class="inner-sec">
                    <div class="sidebar-outer">
                        <div class="head-sec">
                            <h5>Account Settings</h5>
                        </div>
                        <div class="menu_sec">
                            @component('components.user_sidebar')
                            
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div><!-- Left Section End Here -->
            <div class="col-md-9 col-sm-9">
                <div class="pr-inner-sec">
                    <div class="col-md-5 col-sm-5 m-auto">
                        <div class="form-outer">
                            <form name="Change-Password" class="form-horizontal" role="" method="post" action="#">
                                <div class="col-md-8 col-sm-8 pl-0">										
                                    <div class="form-group">
                                        <label>Card Number</label>
                                        <input type="text" class="form-control" name="fn" id="" value="" placeholder="1234  5678  9101 1213">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 p-0">										
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <select class="form-control" name="cc_type">
                                            <option value="MasterCard">MasterCard</option>
                                            <option value="Visa">Visa</option>
                                            <option value="Discover">Discover</option>  
                                            <option value="JCB">JCB</option>
                                            <option value="American Express">American Express</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">										
                                    <div class="form-group">
                                        <label>Cardholder Name</label>
                                        <input type="text" class="form-control" name="fn" id="" value="" placeholder="John Doe">
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-8 pl-0">										
                                    <div class="form-group">
                                        <label>Expire Date</label>
                                        <input type="text" class="form-control" name="fn" id="" value="" placeholder="05  /  21">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 p-0">										
                                    <div class="form-group">
                                        <label>CVV</label>
                                        <input type="text" class="form-control" name="fn" id="" value="" placeholder="123">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary btn-block btnSub" value="Edit Card">
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- Profile Right Section End Here -->
        </div>
    </div>
</section><!-- Form Section End Here -->


@endsection