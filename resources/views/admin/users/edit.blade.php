@extends('admin.layouts.app')

@section('title','ویرایش نقش کاربر')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            @include('partials.alerts')
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">ویرایش نقش کاربر </h3>
                </div>
                <div class="box-body">
                    <form action="{{route('admin.users.update', $user->id)}}" method="post">
                        @csrf



                        <div class="form-group">
                            <label> انتخاب نقش ها</label>
                            <div class="row">
                                @forelse($roles as $role)
                                    <label for="{{'role'.$role->id}}" class="col-sm-2">
                                        <input type="checkbox" name="roles[]" value="{{$role->name}}" id="{{'role'.$role->id}}"
                                               {{$user->roles->contains($role) ? 'checked' : ''}}
                                               style="opacity: 1 !important;position: static !important; left: 0;right: 0;padding: 2px;margin: 3px;"
                                        >{{$role->persian_name}}
                                    </label>
                                @empty
                                    <p>نقشی یافت نشد</p>
                                @endforelse
                            </div>

                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label> انتخاب دسترسی ها</label>--}}
{{--                            <div class="row">--}}
{{--                                @foreach($permissions as $permission)--}}
{{--                                    <label for="{{$permission->id}}" class="col-sm-2">--}}
{{--                                        <input type="checkbox" name="permissions[]" value="{{$permission->name}}" id="{{$permission->id}}"--}}
{{--                                               {{$user->permissions->contains($permission) ? 'checked' : ''}}--}}

{{--                                               style="opacity: 1 !important;position: static !important; left: 0;right: 0;padding: 2px;margin: 3px;"--}}
{{--                                        >{{$permission->persian_name}}--}}
{{--                                    </label>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}

{{--                        </div>--}}


                        <div class="form-group">
                            <input type="submit"  id="submit" value="ثبت" class="btn btn-primary">
                        </div>
                        @include('partials.validation-errors')
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
