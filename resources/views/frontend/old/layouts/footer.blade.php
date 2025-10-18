
<footer class="first-footer rec-pro">
    <div class="top-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="netabout text-justify">
                        {{--<a href="{{route('home')}}" class="logo">
                            <img src="{{@url('uploads/setting/'.getSetting()->site_logo2)}}" alt="River Edge">
                        </a>--}}
                        <p>River Edge Realtors Pvt. Ltd. is the most reliable and trusted real estate consultation firm for over a decade. Proving best-in-class investment solutions, property management, and portfolio management to our esteemed customers and investors. With over 15 years of dedicated experience in the industry.</p>
                    </div>
                    <div class="contactus">
                        <ul>
                            <li>
                                <div class="info">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <p class="in-p">{!!@getSetting()->primary_address!!}</p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <p class="in-p"><a href="tel:{!!@getSetting()->primary_contact!!}">{{@getSetting()->primary_contact}}</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <p class="in-p ti"><a href="mailto:{!!@getSetting()->primary_email!!}">{{@getSetting()->primary_email}}</a></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="navigation">
                        <h3>Navigation</h3>
                        <div class="nav-footer">
                            <ul class="w-100">
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li><a href="{{route('about.us')}}">About Us</a></li>
                                <li><a href="{{route('projects')}}">Projects</a></li>
                                <li><a href="{{route('blog')}}">Blogs</a></li>
                                <li><a href="{{route('contact')}}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="navigation">
                        <h3>Quick Links</h3>
                        <div class="nav-footer">
                            <ul class="w-100">
                                @foreach(additionalPage() as $addPageRow)
                                <li><a href="{{route('additional.page',$addPageRow->slug)}}">{{$addPageRow->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="newsletters">
                        <h3>Newsletters</h3>
                        <p>Sign Up for Our Newsletter to get Latest Updates and Offers. Subscribe to receive news in your inbox.</p>
                    </div>
                    <form id="subscribe-form" class="bloq-email form-inline" method="post">
                        @csrf
                        <label class="subscribe-msg"></label>
                        <div class="email">
                            <input class="subsEmail" type="email" name="email" placeholder="Enter Your Email">
                            <input type="submit" value="Subscribe">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="second-footer rec-pro">
        <div class="container-fluid sd-f">
            <p>{!!@getSetting()->copyrights!!}</p>
            <ul class="netsocials">
                @if(getSetting()->facebook)
                <li><a target="_blank" href="{{getSetting()->facebook}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                @endif
                @if(getSetting()->twitter)
                <li><a target="_blank" href="{{getSetting()->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                @endif
                @if(getSetting()->instagram)
                <li><a target="_blank" href="{{getSetting()->instagram}}"><i class="fab fa-instagram"></i></a></li>
                @endif
                @if(getSetting()->youtube)
                <li><a target="_blank" href="{{getSetting()->youtube}}"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                @endif
                @if(getSetting()->linkedin)
                <li><a target="_blank" href="{{getSetting()->linkedin}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                @endif
            </ul>
        </div>
    </div>
</footer>

<a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>

<a href="https://wa.me/+919810946297" class="btn-whatsapp-pulse">
    <i class="fab fa-whatsapp"></i>
</a>

<!--register form -->
<div class="login-and-register-form modal">
    <div class="main-overlay"></div>
    <div class="main-register-holder">
        <div class="main-register fl-wrap">
            <div class="close-reg"><i class="fa fa-times"></i></div>
            <h3>Welcome to <span>River <strong>Edge</strong></span></h3>
            <form action="{{route('enquiry')}}" method="post">
                @csrf
                <div class="custom-form px-5">
                    <form method="post" name="registerform">
                        <label>Name </label>
                        <input name="name" type="text" required>

                        <label>Phone </label>
                        <input name="phone" type="text" required>

                        <label>Email </label>
                        <input name="email" type="email" required>

                        <label>Message </label>
                        <textarea name="message" type="text" required></textarea>

                        <button type="submit" class="log-submit-btn"><span>Submit</span></button>
                        
                    </form>
                    
                </div>
            </form>
        </div>
    </div>
</div>
<!--register form end -->