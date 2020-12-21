
<footer>
    <div class="container">
        <div class="row text-left">
            <div class="col-md-4">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('public/uploads/'.$theme->footer_logo) }}" alt="{{ $theme->website_name }}" title="{{ $theme->website_name }}" class="img-fluid footLogo mt-5 mb-3">
                </a>
                <div class="footerContact">
                    <h5 class="footerPageName pt-3 pb-4">{{ $theme->website_name }}</h5>
                    <ul class="contactDetails">
                        <li>
                            <i class="fa fa-map-marker mr-3" aria-hidden="true"></i>
                            {{ $setting->address }}
                        </li>
                        <li>
                            <i class="fa fa-phone mr-3" aria-hidden="true"></i>
                            <a href="javascript:">
                               {{ $setting->phone_number }} ,  {{ $setting->mobile_number }}
                            </a>
                        </li>
                        <li>
                            <i class="fa fa-envelope mr-3" aria-hidden="true"></i>
                            <a href="mailto:info@newsportal.com">
                                {{ $setting->email }}
                            </a>
                        </li>
                        <li>
                            <span class="font-weight-bold">कार्यालय सम्पादक :</span>  {{ $setting->sampadak }}
                        </li>
                        <li>
                            <span class="font-weight-bold">प्रबन्ध निर्देशक :</span>  {{ $setting->nirdesak }}
                        </li>
                        <li>
                            <span class="font-weight-bold">विज्ञापनका लागि :</span>  {{ $setting->ads_number }}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="footerNav">
                    <li class="">
                        <a href="{{ route('index') }}">गृहपृष्ठ <span class="sr-only">(current)</span></a>
                    </li>
                    <li>
                        <a href="javascript:">अन्तर्राष्ट्रिय</a>
                    </li>
                    <li>
                        <a href="#">जीवनशैली</a>
                    </li>
                    <li>
                        <a href="#">सूचना प्रविधि</a>
                    </li>
                    <li>
                        <a href="#">मनोरन्जन</a>
                    </li>
                    <li>
                        <a href="#">खेलकुद</a>
                    </li>
                    <li>
                        <a href="#">अर्थ</a>
                    </li>
                    <li>
                        <a href="#">अन्य</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <div class="fbPage fbIframe">
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ftechcodersnepal&tabs=timeline&width=340&height=250&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
            </div>
        </div>
        <hr class="footerLine">
        <div class="row">
            <div class="col-md-8 text-left copy">
                <p>&#169; न्यूज़ पोर्टल,2020 &#174; All Rights Reserved. <a href="contact-us.php">&nbsp; &nbsp;सम्पर्क</a>&nbsp;|&nbsp;<a href="about-us.php">हाम्रो बारे</a>&nbsp; |&nbsp;<a href="calendar.php">पात्रो</a>&nbsp;|&nbsp; <a href="unicode.php">युनिकोड</a>&nbsp;|&nbsp; <a href="forex.php">Forex</a>&nbsp;|&nbsp; <a href="goldandsilver.php">Gold & Silver</a>&nbsp;|&nbsp;</p>
            </div>
            <div class="col-md-4 copy bottomRight">
                Developed and Designed By <span class="tech"><a href="#">Tech Coderz</a></span>
            </div>
        </div>
    </div>
</footer>

<a href="#" class="gotopbtn"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></a>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('public/frontend/js/jquery-3.4.1.min.js') }}"></script>
<!-- Popper Js -->
<script src="{{ asset('public/frontend/js/popper.js') }}"></script>
<!-- Boostrap 4 JS -->
<script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>

<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="{{ asset('public/frontend/js/app.js') }}"></script>

</body>

</html>
