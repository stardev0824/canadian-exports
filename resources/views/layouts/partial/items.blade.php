<div id="itb" class="container padding-y pb-5">

    <h1 class="text-light text-center">{{trans("nav_bar.itb")}}</h1>
    <div class="row d-flex justify-content-between ">
        @foreach(getAllItems(6) as $item)
            <div class="col-lg-4 p-1">
            <div class="itb container-fluid" style="">
                <div class="py-2">
                    <a href="#" class=""><h6 class="text-success font-weight-bold text-uppercase">{{$item->categpry}}</h6></a>
                    <a href="#" class="text-dark"  data-toggle="modal" data-target="#item{{$item->id}}">
                        <h4 class="font-weight-bold">{{str_truncate($item->name,20," ","...")}}</h4>
                    </a>
                    <div class="mt-3">
                        <h6 class="font-weight-bold text-dark">Category : <span>{{$item->category}}</span></h6>
                        <h6 class="font-weight-bold text-secondary">Country : <span>{{$item->country}}</span></h6>
                        <h6 class="font-weight-bold text-secondary">Deadline : <span>{{$item->dead_line}}</span></h6>
                        <h6 class="font-weight-bold text-secondary">Estimated value : <span>{{$item->value}}</span></h6>
                    </div>
                </div>
            </div>
        </div>


            <!-- Modal Inquiries to buy-->
            <div class="modal fade" id="item{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-blue" id="">Canadian Exporters</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container padding-y">
                                <p class="font-weight-bold">
                                    These Inquiries to Buy are provided free of charge exclusively to our premium members
                                </p>
                                <form action="{{route("inquire-mail")}}" method="post" id="{{$item->id}}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" required placeholder="Your company name *">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" required placeholder="Your E-mail *">
                                    </div>
                                    <div class="form-group">
                                        <textarea rows="3" class="form-control" name="item" placeholder="Inquiry">{{$item->name}}</textarea>
                                    </div>


                                    <div class="row d-flex justify-content-end mt-5 ">
                                        <button type="submit" class="btn btn-blue form-btn px-5 mr-3">Submit</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Inquiries to buy -->
        @endforeach


    </div>
    <div class="row d-flex justify-content-center mt-2">
        <a href="{{url("page/inquiries-to-bay")}}" class="btn btn-outline-white px-5">ACCESS ALL INQUIRIES</a>
    </div>

</div>
