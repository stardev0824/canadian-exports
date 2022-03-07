@extends('layouts.app')

@section('content')
    <div class="container p-5">
    	<div class="row">
    		<div class="padding-y col-12">
        		<h1 class="text-center text-blue mb-5">Review And Confirm</h1>
		        <div class="mb-5">
		        	<label class="form-check-label" for="exampleRadios1" style="font-weight:bold">
		                Please take the time to review your subscription details and make any changes as necessary. Once you have checked that all your details are correct, please select Proceed. You will then be directed to payment
		            </label>
		        </div>
    		</div>
    	</div>
    	<div class="row">
    		<div class="padding-y col-7">


        <div class="mb-5" style="padding: 0px;">
	        <div class="row mt-2">
		        	<div class="col-5">
		            <h5 class="text-blue font">Registration Package:</h5>
		            <p style="line-height: 30px;">
		                {{$user->package_description}}
		            </p>
		        	</div>
		        	<div class="col-5">
		        		
	        		</div>
		        	
	        </div>
        </div>

        <div class="mb-5">
            <h5 class="text-blue font">User Profile</h5>
            <div class="row mt-2">
            	<div class="col-4">
            		<label>Your name and title : </label>
            	</div>
            	<div class="col-5">
            		<input class="form-control p-3" type="text" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" disabled>
            	</div>                
            </div>
            <div class="row mt-2">
            	<div class="col-4">
            		<label>Your email : </label>
            	</div>
            	<div class="col-5">
            		<input class="form-control p-3" type="text" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" disabled>
            	</div>                
            </div>

        </div>
        

        <div class="mb-5">
        <h5 class="text-blue font">Selected business categories (Industry Sectors)</h5>
            @foreach($user->profile()->categories()->get() as $category)
            <p class="text-justify">
                {{$category->name_en}}
            </p>
            @endforeach

        </div>

        <div class="mb-5">
            <h5 class="text-blue font">Business Profile</h5>
            <div class="row mt-2">
            	<div class="col-4">
            		<label>Company name : </label>
            	</div>
            	<div class="col-7">
            		<input class="form-control p-3" type="text" value="<?php if(isset($_POST['company_name'])) echo $_POST['company_name']; ?>" disabled>
            	</div>                
            </div>

            <div class="row mt-2">
            	<div class="col-4">
            		<label>Company email : </label>
            	</div>
            	<div class="col-7">
            		<input class="form-control p-3" type="text" value="<?php if(isset($_POST['company_email'])) echo $_POST['company_email']; ?>" disabled>
            	</div>                
            </div>
            <div class="row mt-2">
            	<div class="col-4">
            		<label>Mailing address : </label>
            	</div>
            	<div class="col-7">
            		<textarea rows="3" class="form-control p-3 " disabled><?php if(isset($_POST['address'])) echo $_POST['address']; ?></textarea>
            	</div>                
            </div>

            <div class="row mt-2">
            	<div class="col-4">
            		<label>Detailed business description : </label>
            	</div>
            	<div class="col-7">
            		<textarea rows="3" class="form-control p-3 " disabled><?php if(isset($_POST['description'])) echo $_POST['description']; ?></textarea>
            	</div>                
            </div>            
            <div class="row mt-2">
            	<div class="col-4">
            		<label>Phone : </label>
            	</div>
            	<div class="col-5">
            		<input class="form-control p-3" type="text" value="{{$user->profile()->phone}}" disabled>
            	</div>                
            </div>
				<div class="row mt-2">
            	<div class="col-4">
            		<label>Website : </label>
            	</div>
            	<div class="col-5">
            		<input class="form-control p-3" type="text" value="{{$user->profile()->site}}" disabled>
            	</div>                
            </div>
            
            <div class="row mt-2">
            	<div class="col-4">
            		<label>Facebook : </label>
            	</div>
            	<div class="col-7">
            		<input class="form-control p-3" type="text" value="<?php if(isset($_POST['facebook'])) echo $_POST['facebook']; ?>" disabled>
            	</div>                
            </div>
				<div class="row mt-2">
            	<div class="col-4">
            		<label>Twitter : </label>
            	</div>
            	<div class="col-7">
            		<input class="form-control p-3" type="text" value="<?php if(isset($_POST['twitter'])) echo $_POST['twitter']; ?>" disabled>
            	</div>                
            </div>
            <div class="row mt-2">
            	<div class="col-4">
            		<label>YouTube : </label>
            	</div>
            	<div class="col-7">
            		<input class="form-control p-3" type="text" value="<?php if(isset($_POST['youtube'])) echo $_POST['youtube']; ?>" disabled>
            	</div>                
            </div>
            <div class="row mt-2">
            	<div class="col-4">
            		<label>LinkedIn : </label>
            	</div>
            	<div class="col-7">
            		<input class="form-control p-3" type="text" value="<?php if(isset($_POST['linked_in'])) echo $_POST['linked_in']; ?>" disabled>
            	</div>                
            </div>
            <div class="row mt-2">
            	<div class="col-4">
            		<label>GooglePlus : </label>
            	</div>
            	<div class="col-7">
            		<input class="form-control p-3" type="text" value="<?php if(isset($_POST['google'])) echo $_POST['google']; ?>" disabled>
            	</div>                
            </div> 
        </div>

        <div class="row d-flex mt-5 ">
        		<div class="col-2">
        		</div>
        		<div class="col-3">
        		   <?php 
        		   $vars = json_encode($_POST);
        		   
        		   setcookie("vars",$vars); ?>
	            <form action="{{route("register.back",$user->id)}}" method="post">
	                @csrf
	                {{method_field("DELETE")}}
	                <div class="row d-flex justify-content-end mt-5 mr-1">
	                
	                    <button type="submit" class="btn btn-blue form-btn px-5 mr-3">Back</button>
	                </div>
	            </form>
	            </div>
	            <div class="col-5">
	            <form action="{{route("create-payment")}}" method="post">
	                @csrf
	                <div class="row d-flex justify-content-end mt-5 mr-5">
	                    <button type="submit" class="btn btn-blue form-btn px-5">Confirm & pay</button>
	                </div>
	            </form>
        			</div>
        		<div class="col-2">
        		</div>
        </div>





    </div>
		<div class="col-5" style="background-color:white;">
			<div class="panel panel-default" style="background-color: #dee2e6;padding: 4px;border-radius: 10px;">
	            <div class="panel-heading">
	            	<h4 class="panel-title text-center font-weight-bold" style="margin-right:3px;">
	              		Cart Summary
	            	</h4>
	          	</div>
	          	<div id="" class="panel-body bg-white">
	          		<div class="row border p-1" style="margin-right: 0px;margin-left:0px" >
        				<div class="col-8">Cart Item(s)</div>		        		
        				<div class="col-1">1</div>		        		
        			</div>
        			<div class="row border p-1" style="margin-right: 0px;margin-left:0px">
        				<div class="col-8">Total Item Cost</div>	
        				<div class="col-4"><?php print_r(explode(" ",$user->package_description)[4]); ?></div>	        		
        			</div>
        			<div class="row border p-1" style="margin-right: 0px;margin-left:0px">
        				<div class="col-8">Shipping Fees</div>		        		
        				<div class="col-4" style="color:green;">Free</div>		        		
        			</div>
        			<div class="row border p-1"  style="font-size:16px;font-weight:bold;margin-right: 0px;margin-left:0px">
        				<div class="col-8">Subtotal</div>		        		
        				<div class="col-4"><?php print_r(explode(" ",$user->package_description)[4]); ?></div>	        		
        			</div>
        		</div>
	        </div>
	        <div class="row">
	        	<div class="col-12 text-center">
	        		<label for="" class="text-blue font">Payment method:</label>
	        		<input type="radio" checked=""> <span><img src="{{asset('assets/front_end/images/paypal.png')}}" height="85px" alt=""></span>
	        	</div>
	        </div>
	        		<div class="panel panel-default" style="background-color: #dee2e6;padding: 4px;border-radius: 10px;">
			            <div class="panel-heading">
			            	<h4 class="panel-title" style="margin-right:3px;" data-toggle="collapse" data-target="#demo">
			              		More payment Methods
			            	</h4>
			          	</div>
		          	<div id="demo" class="panel-body collapse" >
		            	<ul class="list-group" >
			              <li class="list-group-item" style="margin-bottom: 2px;font-weight:bold;"><span class="" style="    padding-right: 5px;"><input type="radio"></span>Credet or Debit Card  <span style="float:right">All major cards accepted</span></li>

			              <li class="list-group-item" style="margin-bottom: 2px;font-weight:bold;line-height: 3;"><span class="" style="    padding-right: 5px;"><input type="radio"></span><label for="">Scrill</label> <span style="float:right"><img height="25px" src="{{asset('assets/front_end/images/skrill.png')}}" alt=""></span></li>

			              <li class="list-group-item" style="margin-bottom: 2px;font-weight:bold;line-height: 3;"><span class="" style="    padding-right: 5px;"><input type="radio"></span><label for="">Bank Deposite</label> <span style="float:right"><img height="50px" src="{{asset('assets/front_end/images/bank.jpg')}}" alt=""></span></li>

			              <li class="list-group-item" style="margin-bottom: 2px;font-weight:bold;line-height: 3;"><span class="" style="    padding-right: 5px;"><input type="radio"></span><label for="">Webmoney</label> <span style="float:right"><img height="50px" src="{{asset('assets/front_end/images/webpay.png')}}" alt=""></span></li>
			              <li class="list-group-item" style="margin-bottom: 2px;font-weight:bold;line-height: 3;"><span class="" style="    padding-right: 5px;"><input type="radio"></span><label for="">IDEAL</label> <span style="float:right"><img height="50px" src="{{asset('assets/front_end/images/ideal.png')}}" alt=""></span></li>

			              <li class="list-group-item" style="margin-bottom: 2px;font-weight:bold;line-height: 3;"><span class="" style="    padding-right: 5px;"><input type="radio"></span><label for="">Sofort</label> <span style="float:right"><img height="25px" src="{{asset('assets/front_end/images/sofort.png')}}" alt=""></span></li>

			              <li class="list-group-item" style="margin-bottom: 2px;font-weight:bold;line-height: 3;"><span class="" style="    padding-right: 5px;"><input type="radio"></span><label for="">Giropay</label> <span style="float:right"><img height="30px" src="{{asset('assets/front_end/images/giropay.png')}}" alt=""></span></li>

			              <li class="list-group-item" style="margin-bottom: 2px;font-weight:bold;line-height: 3;"><span class="" style="    padding-right: 5px;"><input type="radio"></span><label for="">Bancontact</label> <span style="float:right"><img height="40px" src="{{asset('assets/front_end/images/bancontact.png')}}" alt=""></span></li>
			              <li class="list-group-item" style="margin-bottom: 2px;font-weight:bold;line-height: 3;"><span class="" style="    padding-right: 5px;"><input type="radio"></span><label for="">DotPay</label> <span style="float:right"><img height="50px" src="{{asset('assets/front_end/images/dotpay.png')}}" alt=""></span></li>

			              <li class="list-group-item" style="margin-bottom: 2px;font-weight:bold;line-height: 3;"><span class="" style="    padding-right: 5px;"><input type="radio"></span><label for="">WeChatPay</label> <span style="float:right"><img height="50px" src="{{asset('assets/front_end/images/wechat.png')}}" alt=""></span></li>

			              <li class="list-group-item" style="margin-bottom: 2px;font-weight:bold;line-height: 3;"><span class="" style="    padding-right: 5px;"><input type="radio"></span><label for="">AliPay</label> <span style="float:right"><img height="50px" src="{{asset('assets/front_end/images/alipay.png')}}" alt=""></span></li>
			              <li class="list-group-item" style="margin-bottom: 2px;font-weight:bold;line-height: 3;"><span class="" style="    padding-right: 5px;"><input type="radio"></span><label for="">UnionPay</label> <span style="float:right"><img height="40px" src="{{asset('assets/front_end/images/unionpay.png')}}" alt=""></span></li>

			              <li class="list-group-item" style="margin-bottom: 2px;font-weight:bold;line-height: 3;"><span class="" style="    padding-right: 5px;"><input type="radio"></span><label for="">Paytm</label> <span style="float:right"><img height="25px" src="{{asset('assets/front_end/images/paytm.png')}}" alt=""></span></li>
		            	</ul>
		          	</div>
		        </div>
	        </div>
	 	</div>
	 </div>
@endsection
