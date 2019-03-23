@extends('layout.master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <!-- =============================================== -->


        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                List User
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">List User</h3>

                </div>

                <div class="box-body">
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="example2_info">
                                    <thead>
                                    <tr role="row">
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Tên đầy đủ</th>
                                        <th>Địa chỉ</th>
                                        <th>Điện thoại</th>
                                        <th>Công ty</th>
                                        <th>Quyền</th>
                                        <th>Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list_users as $user)
                                        <tr role="row" class="odd">
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->fullname }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>{{ $user->fonenumber }}</td>
                                            <td>{{ $user->company }}</td>
                                            <td>@if($user->quyen == 1) {{ 'admin' }} @else {{ 'user' }} @endif</td>
                                            <td>
                                                <a href="#" class="deleteRecord" data-id="{{ $user->id }}"><i class="fa fa-fw fa-trash-o"></i></a>
                                                <a href="{{ route('admin_user_create') }}"><i class="fa fa-fw fa-plus"></i></a>
                                                <a href="{{ route('admin_user_edit',['id'=>$user->id]) }}"><i class="fa fa-fw fa-wrench"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>

                                </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 6 of 6 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button next disabled" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">Next</a></li></ul></div></div></div></div>
                </div>
            </div><!-- /.box -->



        </section><!-- /.content -->


@endsection

@section('js')
    <script>
        // $('.deleteRecord').click(function (e) {
        //     e.preventDefault();
        //     var confirmText = "Are you sure you want to delete this object?";
        //     if(confirm(confirmText))
        //     {
        //         var id = $(this).attr('data-id');
        //         var token = $("meta[name='csrf-token']").attr("content");
        //         $.ajax(
        //             {
        //                 url: "admin/user/delete"+id,
        //                 type: 'DELETE',
        //                 data: {
        //                     "id": id,
        //                     "_token": token,
        //                 },
        //                 success: function (){
        //                     alert("it Works");
        //                 }
        //             });
        //     }
        //
        // });
    </script>
@endsection
