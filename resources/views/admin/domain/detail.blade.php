@extends('layout.master')

@section('content')
    <!-- =============================================== -->

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Chi Tiết Tên Miền
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>


        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">THÔNG TIN TÊN MIỀN</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    Tên miền: {{ $domain[0]->domain_name }}
                </div><!-- /.box-body -->
                <div class="box-footer">
                    Ngày đăng ký: {{ $domain[0]->register_date }}
                </div><!-- /.box-footer-->
                <div class="box-footer">
                    Ngày hết hạn: {{ $domain[0]->end_date }}
                </div><!-- /.box-footer-->
            </div><!-- /.box -->

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">THÔNG TIN CHỦ THỂ</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    Tên chủ thể: {{ $user->name }}
                </div><!-- /.box-body -->
                <div class="box-footer">
                    Địa chỉ: {{ $user->address }}
                </div><!-- /.box-footer-->
                <div class="box-footer">
                    Điện thoại di động: {{ $user->fonenumber }}
                </div><!-- /.box-footer-->
                <div class="box-footer">
                    Email: {{ $user->email }}
                </div><!-- /.box-footer-->
            </div><!-- /.box -->


            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Chi tiết</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="example2_info">
                                            <thead>
                                            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Host record: activate to sort column descending">Host record</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending">Type</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Value: activate to sort column ascending">Value</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Độ ưu tiên: activate to sort column ascending">Độ ưu tiên</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Tình trạng: activate to sort column ascending">Tình trạng</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{ $detail_domain[0]->host_record }}</td>
                                                <td>{{ $detail_domain[0]->type }}</td>
                                                <td>{{ $detail_domain[0]->value }}</td>
                                                <td>{{ $detail_domain[0]->order }}</td>
                                                <td>{{ $detail_domain[0]->status }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                        </div><!-- /.box-body -->
                    </div><!-- /.box -->


                </div><!-- /.col -->
            </div>
        </section><!-- /.content -->

@endsection
