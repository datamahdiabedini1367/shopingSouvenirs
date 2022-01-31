@extends('client.layouts.app')

@section('title')
    تماس با ما
@endsection

@section('content')
    <section class="inner-page" id="contact-page">
        <div class="container-fluid" id="page-hero">
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 px-0">
                                <h1>تماس با ما</h1>
                                <p>با ما در ارتباط باشید.</p>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">صفحه نخست</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">تماس با ما</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('partials.alerts')
                    <div class="content p-0 p-sm-3">
                        <form action="{{route('contact.store')}}" method="post">
                            @csrf
                        <div class="row">
                            <div class="col-12 col-lg-5 text-center" id="contact-page-info">
                                <div class="info">
                                    <i class="fa fa-map-marked"></i>
                                    <div class="title">آدرس فروشگاه:</div>
                                    <div>ایران، تهران، جردن</div>
                                </div>
                                <div class="info">
                                    <i class="fa fa-phone"></i>
                                    <div class="title">تلفن تماس:</div>
                                    <div>02112345678</div>
                                    <div>09351234567</div>
                                </div>
                                <div class="info">
                                    <i class="fa fa-envelope"></i>
                                    <div class="title">پست الکترونیک:</div>
                                    <div>email@website.com</div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-7 p-4">
                                <div class="title">ارسال پیام</div>
                                <p>نظرات، پیشنهادات و انتقادات سازنده خود را از طریق فرم زیر با ما در میان بگذارید. ما در این فروشگاه اینترنتی همواره برای بهبود خدمات خود در تلاش هستیم.</p>
                                <div class="form-group">
                                    <label for="name">نام شما :</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <label for="tel">تلفن تماس :</label>
                                    <input type="text" class="form-control" id="tel" name="phone" value="{{old('phone')}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">پست الکترونیک :</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
                                </div>
                                <div class="form-group">
                                    <label for="subject">موضوع پیام :</label>
                                    <input type="text" class="form-control" id="subject" name="subject" value="{{old('subject')}}">
                                </div>
                                <div class="form-group">
                                    <label for="message">متن پیام :</label>
                                    <textarea class="form-control" id="message" rows="3" name="description">{{old('description')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="ارسال پیام" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                        </form>
                        @include('partials.validation-errors')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
