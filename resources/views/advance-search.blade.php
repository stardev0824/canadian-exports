@extends('layouts.app')

@section('content')

    <div class="container">
	   <div class="container  padding-y">
			 <h1 class="text-center text-blue pb-1">Advance Search</h1>
	   </div>
	</div>   
	<section class="advance-search-outer">   
		   <div class="container">
			<form action="" method="GET"> 
					<div class="row justify-content-center">
						<div class="col-sm-3"></div>
						<div class="col-sm-6 col-12">
						  <div class="form-group">
							<input type="text" class="form-control" id="q" name="q" value="" placeholder="Search">
						  </div>
						</div>
						<div class="col-sm-3"></div>
					</div>
					<div class="row justify-content-center">
						<div class="col-sm-4 col-12">
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
					   <div class="col-sm-4 col-12">
							  <div class="checkbox">
								  <select class="form-control" id="category" name="category">
										  <?php 
										$filter = array("Select Category","Canadian Exporters","Trade shows and Events","Inquaries to buy");
										foreach($filter as $k => $c){
										  if(isset($_GET['category']) && ($k+1) == $_GET['category']) $selected = "selected"; else $selected = "";
										  echo '<option value="'.($k+1).'" '.$selected.'>'.$c.'</option>';
										}
									  ?>
								  </select>
									<input type="hidden" name="type" value="advanced" />
							  </div>
						</div>
            <div class="col-sm-4 col-12" id="bussinss" style="display: none;">
                <div class="checkbox">
                  <select class="form-control" id="bussines-category" name="bussines_category">
                      <?php 
                        $cats=DB::table('categories')->select('*')->get()->toArray(); 
                        echo "<option value=''>Select Category</option>";
                        foreach($cats as $cat){
                          if(isset($_GET['bussines_category']) && $cat->id == $_GET['bussines_category']) $selected = "selected"; else $selected = "";
                          echo "<option value='".$cat->id."' ".$selected.">".$cat->name_en."</option>";
                        }
                    ?>
                  </select>
                </div>
            </div>
            <div class="col-sm-4 col-12" id="i2b" style="display: none;">
              <div class="checkbox">
                <select class="form-control" id="i2b-category" name="i2b_category">
                  <?php 
                  $cats=DB::table('buys')->select('*')->get()->toArray(); 
                  echo "<option value=''>Select I2B</option>";
                  foreach($cats as $cat){
                    if(isset($_GET['i2b_category']) && $cat->id == $_GET['i2b_category']) $selected = "selected"; else $selected = "";
                    echo "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-sm-4 col-12" id="event" style="display: none;">
              <div class="checkbox">
                <select class="form-control" id="events" name="events_category">
                  <?php 
                  $cats=DB::table('events')->select('*')->get()->toArray(); 
                  echo "<option value=''>Select Event</option>";
                  foreach($cats as $cat){
                    if(isset($_GET['events_category']) && $cat->id == $_GET['events_category']) $selected = "selected"; else $selected = "";
                    echo "<option value='".$cat->id."' ".$selected.">".$cat->title."</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
				</div>
				<div class="row align-items-center">
					<div class="col-sm-4 col-12 text-center"></div>
					<div class="col-sm-4 col-12 text-center">	
						<div class="checkbox my-2">
								<button type="submit" class="btn btn-default btn-blue" style="border-radius: 5px; width: 100% !Important;">Submit</button>
						</div>
					</div>	
				</div>
			</form>
			</div>
		</section>
  
  

      <?php   
        if(!empty($_GET['category'])){ 
          if ($_GET['category'] == 2) { $q = $_GET['q']; ?>
            <div class="container padding-y">
              <h1 class="text-center text-blue mb-5"></h1>
              <div class="container ">
                <div class="row">
                <div class="col-12 text-center text-light" style="padding:2px;font-weight:700;background: linear-gradient(to bottom, #3f71c6 0%,#183774 100%);">
                          Search results for ( <?php echo $q ?> )
                </div>
                </div>
             <div class="row">
              <div class="col-4">
            </div>   
              </div>
          </div>
    <div class="container padding-y my-5 px-0">
      @foreach($searches as $u)
        <div class="row bg-white border border-bottom-1">
          <div class="col-1 text-center align-top mt-3 mb-3 ml-4 mr-5">
            <a href="/profile/{{ $u->id }}">
              <img src="{{ asset('assets/front_end/images/default.jpeg') }}" height=80>
            </a>
          </div>
          <div class="col-10">
            <a href="/profile/{{ $u->id }}">{{ $u->company_name }}</a>
            <br>
            <p><?php echo trim(strip_tags(substr($u->description,0,200))) ?></p>
            <a class="float-right" href="/profile/{{ $u->id }}">
              <b>View Company's Profile</b>
            </a>
          </div>
        <div class="col"></div>
        </div>
        @endforeach
        <br>
        <div class="row d-flex justify-content-center mt-5">
          {{$searches->links()}}
        </div>
      <?php } } ?>
      <?php   
      if(!empty($_GET['category'])){ 
        if ($_GET['category'] == 3) { $q = $_GET['q']; ?>
          <div class="container padding-y">
              <h1 class="text-center text-blue mb-5"></h1>
              <div class="container ">
                <div class="row">
                <div class="col-12 text-center text-light" style="padding:2px;font-weight:700;background: linear-gradient(to bottom, #3f71c6 0%,#183774 100%);">
                          Search results for ( <?php echo $q ?> )
                </div>
                </div>
             <div class="row">
              <div class="col-4">
            </div>   
              </div>
          </div>
      @foreach($searches as $u)
        <div class="row bg-white border border-bottom-1">
          <div class="col-1 text-center align-top mt-3 mb-3 ml-4 mr-5">
            <a href="{{ $u->url }}">
              <img src="{{ asset('assets/front_end/images/default.jpeg') }}" height=80>
            </a>
          </div>
          <div class="col-10">
            <a href="{{ $u->url }}">{{ $u->title }}</a>
            <br>
            <p><?php echo trim(strip_tags(substr($u->description,0,200))) ?></p>
            <a class="float-right" href="{{ $u->url }}">
              <b>{{ $u->title }}</b>
            </a>
          </div>
        <div class="col"></div>
        </div>
        @endforeach
        <br>
        <div class="row d-flex justify-content-center mt-5">
          {{$searches->links()}}
        </div>
      <?php } } ?>
      <?php   
      if(!empty($_GET['category'])){ 
        if ($_GET['category'] == 4) { $q = $_GET['q']; ?>
          <div class="container padding-y">
              <h1 class="text-center text-blue mb-5"></h1>
              <div class="container ">
                <div class="row">
                <div class="col-12 text-center text-light" style="padding:2px;font-weight:700;background: linear-gradient(to bottom, #3f71c6 0%,#183774 100%);">
                          Search results for ( <?php echo $q ?> )
                </div>
                </div>
             <div class="row">
              <div class="col-4">
            </div>   
              </div>
          </div>
      @foreach($searches as $u)
        <div class="row bg-white border border-bottom-1">
          <div class="col-1 text-center align-top mt-3 mb-3 ml-4 mr-5">
            <a href="#">
              <img src="{{ asset('assets/front_end/images/default.jpeg') }}" height=80>
            </a>
          </div>
          <div class="col-10">
            <a href="#">{{ $u->category }}</a>
            <br>
            <a href="#">{{ $u->name }}</a>
            <br>
            <p>Country : {{ $u->country }}</p>
            <br>
            <p>Deadline : {{ $u->dead_line }}</p>
            <br>
            <p>Estimated value : {{ $u->value }}</p>
          </div>
        <div class="col"></div>
        </div>
        @endforeach
        <br>
        <div class="row d-flex justify-content-center mt-5">
          {{$searches->links()}}
        </div>
      <?php } } ?>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  $(document).ready(function() {
      $('#category').change(function() {
        if ( this.value == '2'){
          $("#i2b").hide();
          $("#event").hide();
          $("#bussinss").show();
        }
        if ( this.value == '3'){
          $("#i2b").hide();
          $("#bussinss").hide();
          $("#event").show();
        }
        if ( this.value == '4'){
          $("#event").hide();
          $("#bussinss").hide();
          $("#i2b").show();
        }
        if ( this.value == '1'){
          $("#event").hide();
          $("#bussinss").hide();
          $("#i2b").hide();
        }
      });
});
</script>

@endsection
