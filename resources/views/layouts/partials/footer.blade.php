{{-- Main Footer Section --}}
<section class="footer-bg">
<footer class="footer">
            <div class="container">
                <div class="footer-inner">
                    <div class="footer-left">
                        <h2>{{ __('site.footer.lets_connect') }}</h2>
                        <p>{{ __('site.footer.about_description') }}</p>

                        <div class="subscribe-box">
                            <input type="email" placeholder="{{ __('site.footer.email_address') }}" />
                            <button>{{ __('site.footer.subscribe') }}</button>
                        </div>

                        <div class="social-icons">
                            <p><a href=""><img src="{{ asset('assets/images/images/fb.png') }}" alt="facebook"></a></p>
                            <p><a href=""><img src="{{ asset('assets/images/images/twitter.png') }}" alt="twitter"></a></p>
                            <p><a href=""><img src="{{ asset('assets/images/images/insta.png') }}" alt="instagram"></a></p>
                            <p><a href=""><img src="{{ asset('assets/images/images/yt.png') }}" alt="youtube"></a></p>
                        </div>
                    </div>

                    <div class="footer-right">
                        <div class="footer-column">
                            <div class="footer-column-inner">
                                <h4>{{ __('site.menu.party') }}</h4>
                                <ul>
                                    <li><a href="{{ route('leadership') }}"><span>✔</span> {{ __('site.menu.leadership') }}</a></li>
                                    <li><a href="{{ route('party-wings') }}"><span>✔</span> {{ __('site.color_symbolism.party_wings') }}</a></li>
                                    <li><a href="{{ route('press-releases') }}"><span>✔</span> {{ __('site.menu.press_release') }}</a></li>
                                    <li><a href="{{ route('elected-members') }}"><span>✔</span> {{ __('site.menu.elected_members') }}</a></li>
                                </ul>
                            </div>
                            <div class="footer-column-inner">
                                <h4>{{ __('site.footer.quick_links') }}</h4>
                                <ul>
                                    <li><a href="{{ route('join') }}"><span>✔</span> {{ __('site.menu.join_vck') }}</a></li>
                                    <li><a href="{{ route('donation') }}"><span>✔</span> {{ __('site.menu.donations') }}</a></li>
                                    <li><a href="{{ route('applications') }}"><span>✔</span> {{ __('site.menu.applications') }}</a></li>
                                    <li><a href="{{ route('contact') }}"><span>✔</span> {{ __('site.menu.contact') }}</a></li>
                                </ul>
                            </div>
                        </div>


                        <div class="footer-contact">
                            <div class="contact-item">
                                <div class="icon phone"><img src="{{ asset('assets/images/images/call-icon.png') }}" alt="call"></div>
                                <div>
                                    <h5>{{ __('site.footer.phone') }}</h5>
                                    <p><a href="tel:+91 90920 73388">+91 90920 73388</a></p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="icon mail"><img src="{{ asset('assets/images/images/mail-icon.png') }}" alt="mail"></div>
                                <div>
                                    <h5>{{ __('site.footer.email') }}</h5>
                                    <p><a
                                            href="mailto:info@makkaljananayagakatchi.com">info@makkaljananayagakatchi.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
                <div class="footer-bottom">
            <p>Viduthalaichiruthaigal Katchi © Copyright 2025 || All Rights Reserved.</p>
        </div>
    </section>
