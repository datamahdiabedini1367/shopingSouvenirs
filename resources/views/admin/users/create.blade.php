@extends('admin.layouts.master')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">ایجاد نقش </h3>
                </div>
                <div class="box-body">
                    <form action="{{route('roles.store')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="title">عنوان</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>

                        <div class="form-group">
                            <label> انتخاب دسترسی ها</label>
                            <div class="row">
                                @foreach($permissions as $permission)
                                    <label for="{{$permission->id}}" class="col-sm-2">
                                        <input type="checkbox" name="permissions[]" value="{{$permission->id}}" id="{{$permission->id}}"
                                               style="opacity: 1 !important;position: static !important; left: 0;right: 0;padding: 2px;margin: 3px;"
                                        >{{$permission->label}}
                                    </label>
                                @endforeach
                            </div>

                        </div>


                        <div class="form-group">
                            <input type="submit" name="submin" id="submit" value="ثبت" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('errors')

@endsection
