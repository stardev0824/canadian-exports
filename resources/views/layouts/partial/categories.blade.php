<div id="categories" class="container">
    <p class="font-weight-bold text-justify font-secondary">
      {{trans("home.cat_msg")}}
    </p>
    <div class="row">
        @foreach(getAllCategories() as $category)
        <div class="col-lg-6 col-md-6 col-sm-6 p-1 pl-2">
            <div class="category py-1 px-3"  style="border:1px solid #FDD7B5;border-radius:3px;">
                <a  style="font-size:16px;" href="{{url("category/$category->slug")}}"><i class="fas fa-plus-circle mr-2 text-success"></i>
                    {{App::isLocale('fr')? $category->name_fr:$category->name_en}}
                </a>
            </div>
        </div>
        @endforeach

        <div class="col-lg-6 col-md-6 col-sm-6 p-1 pl-2">
            <div class="category py-1 px-3"  style="border:1px solid #FDD7B5;border-radius:3px;">
                <a href="{{url("page/how-these-business-categories-came-about")}}"><i class="fas fa-plus-circle mr-2 text-success"></i><span class="text-red"> {{trans("nav_bar.hbc")}}</span></a>
            </div>
        </div>
    </div>
</div>
