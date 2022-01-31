<section class="pt-4 pb-3" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-6 col-sm-6 col-lg-2">
                <div class="title">دسترسی سریع</div>
                <ul>
                    <li><a href="{{route('client.profile.orders.show')}}">پیگیری سفارش</a></li>
                    <li><a href="{{route('about')}}">درباره ما</a></li>
                    <li><a href="{{route('contactus')}}">تماس با ما</a></li>
                </ul>
            </div>
            <div class="col-6 col-sm-6 col-lg-2 d-none d-sm-inline-block">
                <div class="title">ناحیه کاربری</div>
                <ul>
                    @guest
                        <li><a href="{{route('auth.login')}}">ورود به سایت</a></li>
                        <li><a href="{{route('auth.register')}}">عضویت در سایت</a></li>
                        <li><a href="{{route('auth.password.forget.form')}}">بازیابی رمز عبور</a></li>
                    @endguest

                    <li><a href="{{route('basket.index')}}">سبد خرید</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
                <hr class="d-lg-none">
                <img src="{{asset('client/assets/images/logo.png')}}" alt=""> سوغات مارکت
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است،
                    و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                <div class="row">
                    <div class="col-12 col-md-6 text-center p-2" id="encoded-5443654533">
                        <div>7 روز هفته، 24 ساعت شبانه روز</div>
                        <div>پاسخگوی شما هستیم</div>
                        <div>09351234567</div>
                    </div>
                    <div class="col-12 col-md-6 pt-2 pt-md-0" id="encoded-544363">
                        <div class="row">
                            <div class="col-4 text-center">
                                <a href="#"><img src="{{asset('client/assets/images/certificates/enamad.png')}}" alt=""></a>
                            </div>
                            <div class="col-4 text-center">
                                <a href="#"><img src="{{asset('client/assets/images/certificates/samandehi.png')}}" alt=""></a>
                            </div>
                            <div class="col-4 text-center">
                                <a href="#"><img src="{{asset('client/assets/images/certificates/etehadiye.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
