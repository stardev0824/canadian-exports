<div class="container-fluid related-program-outer-data" style="margin-top:30px">
    <div class="container">
    	<div class="row">
    		<div class="col-sm-12 text-center">
    		    <?php
    		    $ads_banner=DB::table('ads_banner')->select('*')->first();
    		    ?>
    		    <a target="_blank" id="bannerLink" href="{{ $ads_banner->url }}" onclick="void window.open(this.href); return false;">
                <img id="bannerImage" src="{{asset($ads_banner->image)}}" alt="some text">
                </a>
                
    		</div>
    	</div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>
 $("document").ready( function () {
    $.ajax({
    url: 'https://canadianexports.org/get_data',
    type: "GET",
    dataType: "json",
    success:function(data) {
        var tn_array = [];
        var tn_link = [];
        $.each(data, function(key, value) {
            tn_array.push('https://canadianexports.org/'+value.image);
            tn_link.push(value.url);
        });
        var images = tn_array;
        var links = tn_link;
        var i = 0;
        var renew = setInterval(function(){
            if(links.length == i){
                i = 0;
            }else {
                document.getElementById("bannerImage").src = images[i]; 
                document.getElementById("bannerLink").href = links[i]; 
                i++;
            } //10sec = 10000
        },10000);
    }
    });
});

</script>