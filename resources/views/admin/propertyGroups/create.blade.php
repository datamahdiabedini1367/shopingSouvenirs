@extends('admin.layouts.master')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">ایجاد گروه مشخصات جدید</h3>
                </div>
                <div class="box-body">
                    <form action="{{route('propertyGroups.store')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="title">عنوان</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>


                        <div class="form-group">
                            <input type="submit" name="submin" id="submit" value="ثبت" class="btn btn-primary">
                        </div>


                    </form>
                </div>
            </div>
            @include('errors')
        </div>
    </div>

@endsection
