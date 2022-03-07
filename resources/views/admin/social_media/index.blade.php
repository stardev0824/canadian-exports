@extends("admin.layouts.app")

@section("title","edit Social Media")

@push("css")

@endpush

@section("content")
    <div class="container-fluid">

        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Update Canadian Exports Information
                        </h2>

                    </div>
                    <div class="body">
                        <form action="{{route("admin.infos.update")}}" method="post">
                            @csrf
                            {{method_field("PUT")}}
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="too_free" id="too_free" value="{{getInfos()->too_free}}" class="form-control">
                                    <label class="form-label">Toll Free</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="phone" id="phone" value="{{getInfos()->phone}}" class="form-control">
                                    <label class="form-label">Telephone</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="fax" id="fax" value="{{getInfos()->fax}}" class="form-control">
                                    <label class="form-label">Fax</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" name="email" id="name" value="{{getInfos()->email}}" class="form-control">
                                    <label class="form-label">e-mail</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="site" id="site" value="{{getInfos()->site}}" class="form-control">
                                    <label class="form-label">Website</label>
                                </div>
                            </div>
                            
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="langs" id="langs" value="{{getInfos()->langs}}" class="form-control">
                                    <label class="form-label">Supported Languages (Default: ar,bn,bu,ch,du,en,es,fa,fi,fr,ge,gr,he,hi,in,it,ja,ko,ma,no,pl,po,ro,ru,se,sp,th,tu,uk,vi)</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" name="sales_department_email" id="sales_department_email" value="{{getInfos()->sales_department_email}}" class="form-control">
                                    <label class="form-label">Sales Department</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="employment_email" id="employment_email" value="{{getInfos()->employment_email}}" class="form-control">
                                    <label class="form-label">Jobs at Canadian Exports</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="office_hours" id="office_hours" value="{{getInfos()->office_hours}}" class="form-control">
                                    <label class="form-label">Office Hours</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea name="location" id="" cols="30" rows="2" class="form-control">{{getInfos()->location}}</textarea>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="url" name="facebook" id="facebook" value="{{getInfos()->facebook}}" class="form-control">
                                    <label class="form-label">Facebook</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="url" name="youtube" id="youtube" value="{{getInfos()->youtube}}" class="form-control">
                                    <label class="form-label">Youtube</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="twitter" id="twitter" value="{{getInfos()->twitter}}" class="form-control">
                                    <label class="form-label">Twitter</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="linked_in" id="linked_in" value="{{getInfos()->linked_in}}" class="form-control">
                                    <label class="form-label">LinkedIn</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="url" name="google" id="google" value="{{getInfos()->google}}" class="form-control">
                                    <label class="form-label">Google Plus</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                            <a href="{{route("admin.dashboard")}}" class="btn btn-danger m-t-15 waves-effect">Back</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vertical Layout | With Floating Label -->

    </div>

@endsection

@push("js")


@endpush
