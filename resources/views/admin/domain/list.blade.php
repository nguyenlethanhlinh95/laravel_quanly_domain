@extends('layout.master')

@section('content')
    <!-- =============================================== -->

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                List Domain

            </h1>

        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">List domain</h3>

                </div>

                <div class="box-body">
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="example2_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending">User Name</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Host record: activate to sort column descending">Domain name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Value: activate to sort column ascending">Ngày đăng ký</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Độ ưu tiên: activate to sort column ascending">Ngày hết hạn</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{--@foreach($list_user_name as $user)--}}
                                        {{--{{ $user->name }}--}}
                                    {{--@endforeach--}}

                                    <?php $i=0; ?>
                                    @foreach($list_domain as $domain)
                                        <tr role="row" class="odd">
                                            <td>{{ $list_user_name[$i]->name }}</td>
                                            <td class="sorting_1">{{ $domain->domain_name }}</td>
                                            <td>{{ $domain->register_date }}</td>
                                            <td>{{ $domain->end_date }}</td>
                                            <td>
                                                <a href="#"><i class="fa fa-fw fa-trash-o"></i></a>
                                                <a href="{{ route('admin_domain_create') }}"><i class="fa fa-fw fa-plus"></i></a>
                                                <a href="#"><i class="fa fa-fw fa-wrench"></i></a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach


                                    </tbody>

                                </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 6 of 6 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button next disabled" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">Next</a></li></ul></div></div></div></div>
                </div>
            </div><!-- /.box -->



        </section><!-- /.content -->

@endsection
