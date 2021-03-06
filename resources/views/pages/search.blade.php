@extends('layouts.app')

@section('content')
<?php

if(!empty($_GET['q']) && empty($_GET['type'])){
$q = $_GET['q'];

?>
    <div class="container padding-y">
       
        <div class="container ">
        	<div class="row">
        	<div class="col-12 text-center text-light" style="padding:2px;font-weight:700;background: linear-gradient(to bottom, #3f71c6 0%,#183774 100%);">
        		        Search results for ( <?php echo strip_tags($q); ?> )
        	</div>
        	</div>
        	
        	<?php
        		
        		   $searchres=DB::table('profiles')->select('*')->where("company_name","like", "%".$q."%")->get()->toArray();
        			$data = [];
        			foreach ($searchres as $u){
        				$media=DB::table('media')->select('*')->where("profile_id","=", $u->id)->get()->toArray();
        				if(file_exists($media[0]->logo)) $logo = $media[0]->logo; else $logo = "../assets/front_end/images/default.jpeg";
        				echo "<div class='row bg-white border border-bottom-1'>";
        				echo "<div class=\"col-1 text-center align-top mt-3 mb-3 ml-4 mr-5\"><a href='/profile/".$u->id."'><img src='".$logo."' height=\"80\"></a></div>";
        				echo "<div class=\"col-10\"><a href='/profile/".$u->id."'>".$u->company_name."</a><br>
        				<p>".trim(strip_tags(substr($u->description,0,200)))."...</p>
        				
        				<a class='float-right' href='/profile/".$u->id."'><b>View Company's Profile</b></a>
        				
        				</div>";
        				echo "<div class=\"col\"></div>
        				</div>";
        				
            		$data[]=$u->company_email;
            		
        			}
        //print_r($data);
   }
   
   if(isset($_GET['type']) && $_GET['type'] == "advanced") { 
   
   
   ?>
   <div class="container  padding-y">
		 <h1 class="text-center text-blue pb-1">Advance Search</h1>
   </div>
   <div class="container">
   	<form action="" method="GET"> 
        	<div class="row p-1 justify-content-center">
            <div class="col-3"></div>
            <div class="col-6">
              <div class="form-group">
                <input type="text" class="form-control" id="q" name="q" value="<?php echo $_GET['q']; ?>" placeholder="Search">
              </div>
            </div>
            <div class="col-3"></div>
        		<div class="col-3">
			  <div class="form-group">
				  <select class="form-control" id="criteria" name="criteria">
				  <?php 
						$criteria = array("Search Criteria","Any Words","All Words","Exact Phrase","Boolean Search");
						foreach($criteria as $k => $c){
							if(isset($_GET['criteria']) && ($k+1) == $_GET['criteria']) $selected = "selected"; else $selected = "";
							echo '<option value="'.($k+1).'" '.$selected.'>'.$c.'</option>';
						}
				  ?>
				  </select>
			  </div>
  </div>
  <!-- div class="col-3">
  <div class="form-group">
    <input type="text" class="form-control" id="q" name="q" value="<?php echo $_GET['q']; ?>" placeholder="Search Term">
  </div>
  </div -->
   <div class="col-3">
  <div class="checkbox">
	  <select class="form-control" id="category" name="category">
			  <?php 
			  		$cats=DB::table('categories')->select('*')->get()->toArray(); 
			  		echo "<option value=''>Select Category</option>";

			  		foreach($cats as $cat){
			  			if(isset($_GET['category']) && $cat->id == $_GET['category']) $selected = "selected"; else $selected = "";
			  			echo "<option value='".$cat->id."' ".$selected.">".$cat->name_en."</option>";
			  		
			  		}
			  
			  ?>
	  </select>
	    <input type="hidden" name="type" value="advanced">
  </div>
  </div>
  <div class="checkbox">
  <button type="submit" class="btn btn-default btn-blue" style="border-radius: 5px;">Submit</button>

					

   			</div>
   		</div>
   		</div>
   	</form>
   </div>
   	
<?php		
if(!empty($_GET['q'])){
$q = $_GET['q'];
$cond = [];
?>
<div class="container padding-y">
        <h1 class="text-center text-blue mb-5"></h1>
        <div class="container ">
        	<div class="row">
        	<div class="col-12 text-center text-light" style="padding:2px;font-weight:700;background: linear-gradient(to bottom, #3f71c6 0%,#183774 100%);">
        		        Search results for ( <?php echo strip_tags($q); ?> )
        	</div>
        	</div>
<?php
				//$searchres=DB::table('profiles')->select('*')->where("company_name","like", "%".$q."%")->get()->toArray();
				
    			if(!empty($_GET['criteria']) && $_GET['criteria'] == 1 ) $cond[] = ['company_name', 'like', "%".$q."%"];
    			if(!empty($_GET['criteria']) && $_GET['criteria'] == 2 ) $cond[] = ['company_name', '=', $q];
    			if(!empty($_GET['criteria']) && $_GET['criteria'] == 3 ) $cond[] = ['company_name', 'like', "%".$q."%"];
    			if(!empty($_GET['criteria']) && $_GET['criteria'] == 4 ){	
					if(preg_match("/ and /i",$q)){ $qex = explode(" AND ",$q);
						$qex = explode(" and ",$q);
    					$cond[] = ['company_name', 'like', "%".$qex[0]."%"];
    					$cond[] = ['company_name', 'like', "%".$qex[1]."%"];
    				}else{
    					$cond[] = ['company_name', 'like', "%".$q."%"];
    				}   				
    			}
    			
    			
				$searchres=DB::table('profiles')->select('*')->where($cond)->get()->toArray();
        			$data = [];
        			foreach ($searchres as $u){
        				$media=DB::table('media')->select('*')->where("profile_id","=", $u->id)->get()->toArray();
        				
    					if(isset($_GET['category'])) $catid=DB::table('category_profile')->select('*')->where([["profile_id","=", $u->id],["category_id","=", $_GET['category']]])->get()->toArray();
    					$show = 0;
    					
    					if(!empty($_GET['category']) && sizeof($catid)>0) $show = 1;
    					if(empty($_GET['category'])) $show = 1;
    					if($show){    					    			
	        				if(file_exists($media[0]->logo)) $logo = $media[0]->logo; else $logo = "../assets/front_end/images/default.jpeg";
	        				echo "<div class='row bg-white border border-bottom-1'>";
	        				echo "<div class=\"col-1 text-center align-top mt-3 mb-3 ml-4 mr-5\"><a href='/profile/".$u->id."'><img src='".$logo."' height=\"80\"></a></div>";
	        				echo "<div class=\"col-10\"><a href='/profile/".$u->id."'>".$u->company_name."</a><br>
	        				<p>".trim(strip_tags(substr($u->description,0,200)))."...</p>
	        				
	        				<a class='float-right' href='/profile/".$u->id."'><b>View Company's Profile</b></a>
	        				
	        				</div>";
	        				echo "<div class=\"col\"></div>
	        				</div>";
	        				
	            		$data[]=$u->company_email;
            		}
            		
        			}
			}  
   	}     		        ?>	
        
       <div class="row">
        <div class="col-4">


			
					
			</div>        
                
        
        </div>
    </div>


    <div class="container padding-y my-5 px-0">

        @foreach(getAllTestimonies() as $test)
        <div class="testimonial px-3 py-2">
            <h5 class="text-blue">Business Category : {{$test->category()->name_en}}</h5>
            <h5 class="text-blue">{{$test->place}}</h5>
            <p class="font-weight-bold text-justify">
                {{$test->comment}}
            </p>
            <h5 class="text-blue text-right">{{$test->name}}</h5>
        </div>
            <br>
        @endforeach
            <div class="row d-flex justify-content-center mt-5">
                {{getAllTestimonies()->links()}}
            </div>

    </div>


@endsection
