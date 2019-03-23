@extends('layout.master')

@section('content')

        <section class="content-header">
            <h1>
                Thêm mới Domain
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-primary">

                        <form action="{{route('admin_domain_create_p')}}" method="POST">
                            {{ csrf_field() }}

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="txtUser_Id">Chọn tên người dùng</label>
                                    <select name="txtUser_Id" id="txtUser_Id" class="form-control">
                                        <option value="">--Select user--</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="txtTenMien">Tên miền</label>
                                    <input type="text" class="form-control" name="txtTenMien" id="txtTenMien" placeholder="Nhập tên miền">
                                </div>

                                <div class="form-group">
                                    <label for="txtNgayTao">Ngày tạo</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control" name="txtNgayTao" id="txtNgayTao" placeholder="yyyy/mm/dd" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="txtKetThuc">Ngày kết thúc</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control" name="txtKetThuc" id="txtKetThuc" placeholder="yyyy/mm/dd" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask="">
                                    </div>
                                </div>

                                <button class="btn btn-primary">Thêm mới</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection
