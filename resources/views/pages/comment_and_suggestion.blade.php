@extends("layouts.app")
@section('style')
    <style>
        h1, h2, h3, h4, h5, h6, label, p {
            text-transform: none !important;
        }
    </style>
@endsection
@section("content")
    <div class="container padding-y">
        @if(session()->has("success"))
        <h1 class="text-center alert alert-success">
            {{session("success")}}
        </h1>
        @endif

        @if(App::isLocale("fr"))
        <h1 class="text-center text-blue mb-2">Commentaires / Suggestions</h1>
        <p class="font-weight-bold" style="line-height: 30px;">
            (Cette page est disponible uniquement en anglais et en français, les langues officielles du Canada, car elle concerne les lois canadiennes.)        </p>
        <p style="line-height: 30px;">
            Garder à l'esprit que (La route du succès est toujours en construction - Lily Tomlin):<br>

            - Avez-vous des commentaires sur notre site Web ou des suggestions d’améliorations à apporter?<br>

            - Avez-vous des commentaires sur nos services ou des suggestions sur la manière de les améliorer?
        </p>
        <p style="line-height: 30px;">
            Ce site Web est conçu et conçu pour vous aider à trouver d'excellents produits, services et entreprises canadiens. Nous voulons que vous soyez 100% à l'aise à l'utiliser, alors n'hésitez pas à nous contacter avec vos idées. Nous serions heureux d'avoir de vos nouvelles.<br>

            Sinon, remplissez le formulaire sécurisé ci-dessous
        </p>
        <p class="font-weight-bold" style="line-height: 30px;">
            Je vous remercie<br>

            L'équipe de Canadian Exports
        </p>
        @else
        <h1 class="text-center text-blue mb-2">Comments / Suggestions</h1>
        <p class="font-weight-bold" style="line-height: 30px;">
            (This page is available only in English and French, the official languages of Canada, because it pertains to Canadian laws)
        </p>
        <p style="line-height: 30px;">
            Keeping in mind that (The road to success is always under construction - Lily Tomlin):<br>

            -  Do you have any comments about our website or suggestions on improvements that could be made?<br>

            -  Do you have any comments about our services or any suggestions on how to improve them?
        </p>
        <p style="line-height: 30px;">
            This website is designed and intended to help you find great Canadian products, services and companies. We want you 100% comfortable using it, so feel free to Contact us with your ideas. We would be happy to hear from you.<br>

            Alternatively, fill in the secure form below
        </p>
        <p class="font-weight-bold" style="line-height: 30px;">
            Thank you<br>

            The Canadian Exports Team
        </p>
        @endif
    </div>



    <div class="container padding-y">
        <form action="{{route("comment")}}" method="post">
            @csrf
            <h1 class="text-blue mb-2 text-center">Feedback form</h1>

			<p class="astrik-note"><span>*</span> Indicates required fields</p>
            <div class="form-group">
				<label class="cus-label">Your Name <span>*</span></label>
                <input type="text" class="form-control @error("name") invalid @enderror"  name="name"  placeholder="Your Name">
                @error('name')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>
            <div class="form-group">
				<label class="cus-label">Your E-mail <span>*</span></label>
                <input type="email" class="form-control @error("email") invalid @enderror" name="email"  aria-describedby="emailHelp" placeholder="Your E-mail">
                @error('email')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>
            <div class="form-group">
				<label class="cus-label">Your Comment <span>*</span></label>
                <textarea rows="3" class="form-control @error("comment") invalid @enderror" name="comment" placeholder="Your Comment"></textarea>
                @error('comment')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>


            <div class="col-sm-12">
                <div class="capcha-outer">
                    @if(config('services.recaptcha.key'))
                        <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}">
                        </div>
                    @endif
                    @if ($errors->has('g-recaptcha-response'))
                        <span class="help-block">
							<small id="invalid-pw" class="form-text ml-3 text-danger"><i
                                    class="far fa-times-circle mr-2"></i>{{ $errors->first('g-recaptcha-response') }}
							</small>
						</span>
                    @endif
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-5 mr-1">
                <button type="submit" id="proceed_button" class="btn btn-blue form-btn px-5">Submit</button>
            </div>

        </form>
    </div>
@endsection
