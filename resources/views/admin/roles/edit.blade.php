@extends('admin.layouts.app')

@section('title','ویرایش نقش')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            @include('partials.alerts')
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">ویرایش نقش </h3>
                </div>
                <div class="box-body">
                    <form action="{{route('admin.roles.update', $role)}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="title">نام نقش</label>
                            <input type="text" class="form-control" name="persian_name" id="title" value="{{$role->persian_name}}">
                        </div>


                        <div class="form-group">
                            <label> انتخاب دسترسی ها</label>
                            <div class="row">
                                @foreach($permissions as $permission)
                                    <label for="{{'permission'.$permission->id}}" class="col-sm-2">
                                        <input type="checkbox" name="permissions[]" value="{{$permission->name}}" id="{{'permission'.$permission->id}}"
                                               @if($role->hasPermission($permission)) checked="checked" @endif
                                               style="opacity: 1 !important;position: static !important; left: 0;right: 0;padding: 2px;margin: 3px;"
                                        >{{$permission->persian_name}}
                                    </label>
                                @endforeach
                            </div>

                        </div>


                        <div class="form-group">
                            <input type="submit" name="submin" id="submit" value="ثبت" class="btn btn-primary">
                        </div>
                    </form>
                    @include('partials.validation-errors')
                </div>
            </div>
        </div>
    </div>

@endsection
