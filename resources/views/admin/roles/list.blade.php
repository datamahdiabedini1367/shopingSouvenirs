@extends('admin.layouts.app')

@section('title','لیست نقش ها')


@section('content')
    @include('partials.alerts')
    <div class="card">
        <div class="card-header">
            @lang('users.add role')
        </div>
        <div class="card-body">
            <form method="post" action="{{route('admin.roles.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-5">
                        <input type="text" name="name_role" class="form-control  " placeholder=" @lang('users.role name') ">
                        @if($errors->has('name_role'))
                            <small class="form-text text-danger"> {{$errors->first('name_role')}} </small>
                        @endif
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="persian_name" class="form-control " placeholder=" @lang('users.role persian name') ">
                        @if($errors->has('persian_name'))
                            <small class="form-text text-danger"> {{$errors->first('persian_name')}} </small>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-sm">
                            @lang('users.add')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-header">
            @lang('users.show roles')
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">@lang('users.role name')</th>
                    <th scope="col"> @lang('users.role persian name') </th>
                    <th scope="col"> @lang('users.operation') </th>
                </tr>
                </thead>
                <tbody>
                @forelse ($roles as $role)

                    <tr>
                        <td> {{$role->name}} </td>
                        <td> {{$role->persian_name}} </td>
                        <td>
                            <a href="{{route('admin.roles.edit' , $role->id)}}" class="btn btn-outline-success btn-sm " title="ویرایش">
{{--                                @lang('users.edit')--}}
                                <i class="ti-pencil"></i>
                            </a>


                            <form action="{{route('admin.roles.destroy',$role->id)}}" method="post" id="{{'delete_role_'.$role->id}}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-outline-danger" type="submit" title="حذف">
                                    <i class="ti-trash" ></i>
                                </button>
                            </form>
{{--                            <a href="" onclick="document.getElementById('{{"delete_role_".$role->id}}').submit()" class="mx-5 text-danger" title="حذف">--}}
{{--                            </a>--}}
                        </td>
                    </tr>
                @empty
                    <tr>
                    <td colspan="3 text-center">
                        @lang('users.there are not any role')
                    </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
