@extends('client.profile.profile_master')

@section('profile_title')
    آدرس های من
@endsection


@section('profile_content')




    <!-- New Address Form -->
    @include('partials.alerts')


    @if(!isset($address))

        <!--  insert address Form -->

        <div class="custom-container mb-2" id="new-address">
            <div class="row pt-2 px-3">
                <div class="col-12">
                    <h1>افزودن آدرس جدید</h1>
                </div>
            </div>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-12 pt-3">
                        <form action="{{route('client.profile.address.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-4 pl-2">
                                    <div class="form-group m-1">
                                        <label for="title">عنوان آدرس:</label>
                                        <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}"/>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 pl-2">

                                    <div class="form-group m-1">
                                        <label for="state">استان:</label>
                                        <input type="text" name="state" id="state" class="form-control" value="{{old('state')}}"/>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 pl-2">
                                    <div class="form-group m-1">
                                        <label for="city">شهر:</label>
                                        <input type="text" name="city" id="city" class="form-control" value="{{old('city')}}"/>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 pl-2">
                                    <div class="form-group m-1">
                                        <label for="address">نشانی:</label>
                                        <textarea type="text" name="address" id="address" class="form-control">{{old('address')}}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 pl-2">
                                    <div class="form-group m-1">
                                        <label for="description">توضیحات:</label>
                                        <textarea type="text" name="description" id="description" class="form-control">{{old('description')}}</textarea>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 pl-2">
                                    <div class="form-group m-1">
                                        <label for="postal_code">کد پستی:</label>
                                        <input type="number" minlength="10" maxlength="10" value="{{old('postal_code')}}"
                                               name="postal_code" id="postal_code" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 pl-2">
                                    <div class="form-group m-1">
                                        <label for="receiver">تحویل گیرنده:</label>
                                        <input type="text" name="receiver" id="receiver" class="form-control" value="{{old('receiver')}}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 pl-2">
                                    <div class="form-group m-1">
                                        <label for="phone_number">تلفن تماس:</label>
                                        <input type="tel" name="phone_number" id="phone_number" class="form-control" value="{{old(('phone_number'))}}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 pl-2 py-3">
                                    <div class="form-group m-1">
                                        <input type="checkbox" name="default" id="default" {{old(('default')  ? 'checked' :'')}}  value="1">
                                        <label for="default">ذخیره به عنوان آدرس پیش فرض</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group m-1 pb-3">
                                        <input type="submit" class="btn btn-primary px-5" value="ذخیره آدرس">
                                    </div>
                                </div>
                            </div>
                        </form>
                        @include('partials.validation-errors')
                    </div>
                </div>
            </div>
        </div>
    @else
        <!--  edit address Form -->

        <div class="custom-container mb-2" id="new-address">
            <div class="row pt-2 px-3">
                <div class="col-12"><h1>ویرایش آدرس جدید</h1></div>
            </div>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-12 pt-3">
                        <form action="{{route('client.profile.address.update' , $address->slug)}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="col-12 col-md-4 pl-2">
                                    <div class="form-group m-1">
                                        <label for="title">عنوان آدرس:</label>
                                        <input type="text" name="title" id="title" class="form-control" value="{{$address->title}}"/>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 pl-2">

                                    <div class="form-group m-1">
                                        <label for="state">استان:</label>
                                        <input type="text" name="state" id="state" class="form-control" value="{{$address->state}}"/>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 pl-2">
                                    <div class="form-group m-1">
                                        <label for="city">شهر:</label>
                                        <input type="text" name="city" id="city" class="form-control" value="{{$address->city}}"/>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 pl-2">
                                    <div class="form-group m-1">
                                        <label for="address">نشانی:</label>
                                        <textarea type="text" name="address" id="address" class="form-control">{{$address->address}}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 pl-2">
                                    <div class="form-group m-1">
                                        <label for="description">توضیحات:</label>
                                        <textarea type="text" name="description" id="description" class="form-control">{{$address->description}}</textarea>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 pl-2">
                                    <div class="form-group m-1">
                                        <label for="postal_code">کد پستی:</label>
                                        <input type="number" minlength="10" maxlength="10" value="{{$address->postal_code}}"
                                               name="postal_code" id="postal_code" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 pl-2">
                                    <div class="form-group m-1">
                                        <label for="receiver">تحویل گیرنده:</label>
                                        <input type="text" name="receiver" id="receiver" class="form-control" value="{{$address->receiver}}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 pl-2">
                                    <div class="form-group m-1">
                                        <label for="phone_number">تلفن تماس:</label>
                                        <input type="tel" name="phone_number" id="phone_number" class="form-control" value="{{$address->phone_number}}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 pl-2 py-3">
                                    <div class="form-group m-1">
                                        <input type="checkbox" name="default" id="default" {{$address->default  ? 'checked' :''}}  value="1">
                                        <label for="default">ذخیره به عنوان آدرس پیش فرض</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group m-1 pb-3">
                                        <input type="submit" class="btn btn-primary px-5" value="ویرایش آدرس">
                                    </div>
                                </div>
                            </div>
                        </form>
                        @include('partials.validation-errors')
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- /New Address Form -->

    <!-- User Addresses -->
    <div class="custom-container" id="addresses">
        <div class="row pt-2 px-3">
            <div class="col-12"><h1>آدرس های من</h1></div>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <!-- Address Record -->
                @forelse($addresses as $address)
                    <div class="col-12 address py-2">
                        <div class="row">
                            <div class="col-12 col-sm-10">
                                <div class="title">{{$address->title}}</div>
                                <div class="sub-title">استان/شهر :{{$address->state.'/'.$address->city}}</div>
                                <div class="sub-title">آدرس :{{$address->address}}</div>
                                <div class="sub-title">کد پستی: {{$address->postal_code}} </div>
                                <div class="sub-title">تحویل گیرنده :{{$address->receiver}}</div>
                                <div class="sub-title">شماره تماس : {{$address->phone_number}}</div>
                            </div>
                            <div class="col-12 col-sm-2 text-lg-end">

                                <form action="{{route('client.profile.address.destroy',$address->slug)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-outline-warning border-0 float-right float-sm-left pr-2 pl-sm-2" title="حذف">
                                        <i class="fa fa-trash-alt font-weight-normal"></i>
                                    </button>
                                </form>

                                <form action="{{route('client.profile.address.edit',$address->id)}}" method="get" id="update_address_{{$address->id}}">
                                    <button type="submit" class="btn btn-sm btn-outline-warning  border-0 float-right float-sm-left" title="ویرایش">
                                        <i class="fa fa-edit font-weight-normal"></i>
                                    </button>
                                </form>

                                <form action="{{route('client.profile.address.changeDefault',$address->slug)}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-warning  border-0 float-right float-sm-left" title="آدرس پیش فرض">
                                        @if($address->default)
                                            <i class="fa fa-check-circle" style="color: #fcb941"></i>
                                        @else
                                            <i class="fa fa-circle-notch"></i>
                                        @endif
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
            @empty
                    <p>
                        هیچ آدرسی ثبت نشده است
                    </p>
            @endforelse
            <!-- Address Record -->
            </div>
        </div>
    </div>
    <!-- /User Addresses -->
@endsection
