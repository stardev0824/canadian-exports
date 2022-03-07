@extends('layouts.app')

@section('content')
    <div class="container padding-y">
        <h1 class="text-center text-blue mb-5">Confirm my business</h1>


        <div class="mb-5">
            <h5 class="text-blue font">Registration Package:</h5>
            <p class="text-justify" style="line-height: 30px;">
                {{$user->package_description}}
            </p>
        </div>

        <div class="mb-5">
            <h5 class="text-blue font">User Profile</h5>
            <p class="text-justify">
                Name : {{$user->name}}
            </p>
            <p class="text-justify">
                Email : {{$user->email}}
            </p>

        </div>

        <div class="mb-5">
        <h5 class="text-blue font">Select Your Business Categories (Industry Sectors)</h5>
            @foreach($user->profile()->categories()->get() as $category)
            <p class="text-justify">
                {{$category->name_en}}
            </p>
            @endforeach

        </div>

        <div class="mb-5">
            <h5 class="text-blue font">Business Profile</h5>
            <div class="row text-justify mt-2">
            	<div class="col-3">
            		<label>Company name : </label>
            	</div>
            	<div class="col-5">
            		<input class="form-control p-3" type="text" value="<?php if(isset($_POST['company_name'])) echo $_POST['company_name']; ?>" disabled>
            	</div>                
            </div>

            <div class="row text-justify mt-2">
            	<div class="col-3">
            		<label>Company email : </label>
            	</div>
            	<div class="col-5">
            		<input class="form-control p-3" type="text" value="<?php if(isset($_POST['company_email'])) echo $_POST['company_email']; ?>" disabled>
            	</div>                
            </div>
            <div class="row text-justify mt-2">
            	<div class="col-3">
            		<label>Mailing address : </label>
            	</div>
            	<div class="col-5">
            		<textarea rows="3" class="form-control p-3 " disabled><?php if(isset($_POST['address'])) echo $_POST['address']; ?></textarea>
            	</div>                
            </div>

            <div class="row text-justify mt-2">
            	<div class="col-3">
            		<label>Detailed business description : </label>
            	</div>
            	<div class="col-3">
            		<textarea rows="3" class="form-control p-3 " disabled><?php if(isset($_POST['description'])) echo $_POST['description']; ?></textarea>
            	</div>                
            </div>   
            <div class="row text-justify mt-2">
            	<div class="col-3">
            		<label>Your name and title : </label>
            	</div>
            	<div class="col-3">
            		<input class="form-control p-3" type="text" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" disabled>
            	</div>                
            </div>           
            <div class="row text-justify mt-2">
            	<div class="col-3">
            		<label>Phone : </label>
            	</div>
            	<div class="col-3">
            		<input class="form-control p-3" type="text" value="{{$user->profile()->phone}}" disabled>
            	</div>                
            </div>
				<div class="row text-justify mt-2">
            	<div class="col-3">
            		<label>Website : </label>
            	</div>
            	<div class="col-3">
            		<input class="form-control p-3" type="text" value="{{$user->profile()->site}}" disabled>
            	</div>                
            </div>
            
            <div class="row text-justify mt-2">
            	<div class="col-3">
            		<label>Facebook : </label>
            	</div>
            	<div class="col-5">
            		<input class="form-control p-3" type="text" value="<?php if(isset($_POST['facebook'])) echo $_POST['facebook']; ?>" disabled>
            	</div>                
            </div>
				<div class="row text-justify mt-2">
            	<div class="col-3">
            		<label>Twitter : </label>
            	</div>
            	<div class="col-5">
            		<input class="form-control p-3" type="text" value="<?php if(isset($_POST['twitter'])) echo $_POST['twitter']; ?>" disabled>
            	</div>                
            </div>
            <div class="row text-justify mt-2">
            	<div class="col-3">
            		<label>YouTube : </label>
            	</div>
            	<div class="col-5">
            		<input class="form-control p-3" type="text" value="<?php if(isset($_POST['youtube'])) echo $_POST['youtube']; ?>" disabled>
            	</div>                
            </div>
            <div class="row text-justify mt-2">
            	<div class="col-3">
            		<label>LinkedIn : </label>
            	</div>
            	<div class="col-5">
            		<input class="form-control p-3" type="text" value="<?php if(isset($_POST['linked_in'])) echo $_POST['linked_in']; ?>" disabled>
            	</div>                
            </div>
            <div class="row text-justify mt-2">
            	<div class="col-3">
            		<label>GooglePlus : </label>
            	</div>
            	<div class="col-5">
            		<input class="form-control p-3" type="text" value="<?php if(isset($_POST['google'])) echo $_POST['google']; ?>" disabled>
            	</div>                
            </div> 
        </div>

        <div class="row d-flex justify-content-end mt-5">
            <form action="{{route("register.back",$user->id)}}" method="post">
                @csrf
                {{method_field("DELETE")}}
                <div class="row d-flex justify-content-end mt-5 mr-1">
                    <button type="submit" class="btn btn-blue form-btn px-5 mr-3">Back</button>
                </div>
            </form>
            <form action="{{route("create-payment")}}" method="post">
                @csrf
                <div class="row d-flex justify-content-end mt-5 mr-1">
                    <button type="submit" class="btn btn-blue form-btn px-5">Confirm</button>
                </div>
            </form>
        </div>





    </div>

@endsection
