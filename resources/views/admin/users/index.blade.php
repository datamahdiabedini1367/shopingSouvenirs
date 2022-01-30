@extends('admin.layouts.app')
@section('title','لیست کاربران')

@section('links')

@endsection



@section('content')

    <div class="row">
        <div class="col-sm-12">
            @include('partials.alerts')
            <div class="box">
                <div class="box-header with-border">
                    <h1 class="box-title">
                        کاربران
                    </h1>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example5" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام</th>
                                <th>ایمیل</th>
                                <th>نقش</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @foreach($user->roles as $role)
                                                <span class="badge badge-secondary" >{{$role->persian_name}}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-sm btn-primary">ویرایش</a>
                                        </td>
                                        <td>
                                            <form action="{{route('admin.users.destroy', $user)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-sm btn-danger" value="حذف">
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                @include('partials.validation-errors')
            </div>
        </div>
    </div>

@endsection



@section('scripts')
    <script src="{{asset('admin/js/pages/data-table.js')}}"></script>
@endsection
