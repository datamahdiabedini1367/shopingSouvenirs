@extends('admin.layouts.app')

@section('title' ,'لیست نظرات و پیشنهادات ')

@section('links')
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-12">
                @include('partials.alerts')

                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="productorder" class="table table-hover no-wrap product-order" data-page-size="10">
                                <thead>
                                <tr>
                                    <th>نام</th>
                                    <th>شماره تماس</th>
                                    <th>ایمیل</th>
                                    <th>موضوع</th>
                                    <th>متن پیام</th>
                                    <th>اقدامات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($contacts->count()>=1)
                                    @foreach($contacts as $contact)
                                        <tr>
                                            <td>{{$contact->name}}</td>
                                            <td>{{$contact->phone}}</td>
                                            <td>{{$contact->email}}</td>
                                            <td>{{$contact->subject}}</td>
                                            <td>{{$contact->description}}</td>
                                            <td>

                                                <a onclick="event.preventDefault();document.getElementById('delete_order_{{$contact->id}}').submit()"
                                                   class="text-danger mr-10" data-toggle="tooltip" data-original-title="حذف پیام">
                                                    <i class="ti-trash"></i>
                                                </a>

                                                <form action="{{route('contact.destroy',$contact->id)}}" method="post" id="delete_order_{{$contact->id}}">
                                                    @csrf
                                                    @method('delete')
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="text-center">هیچ فاکتوری برای نمایش وجود ندارد.</td>
                                    </tr>
                                @endif


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection
