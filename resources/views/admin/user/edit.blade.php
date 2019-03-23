@extends('layout.master')

@section('content')

        <section class="content-header">
            <h1>
                Cập nhật User
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-primary">

                        <form action="{{route('admin_user_update_p',['id'=>$user->id])}}" method="POST">
                            {{ csrf_field() }}

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="txtTenNguoiDung">Tên người dùng</label>
                                    <input value="{{ $user->name }}" type="text" class="form-control" name="txtTenNguoiDung" id="txtTenNguoiDung" placeholder="Nhập người dùng">
                                </div>

                                <div class="form-group">
                                    <label for="txtFullName">Tên đầy đủ</label>
                                    <input value="{{ $user->fullname }}" type="text" class="form-control" name="txtFullName" id="txtFullName" placeholder="Nhập tên miền">
                                </div>

                                <div class="form-group">
                                    <label for="txtAdress">Địa chỉ</label>
                                    <input value="{{ $user->address }}" type="text" class="form-control" name="txtAdress" id="txtAdress" placeholder="Nhập tên miền">
                                </div>

                                <div class="form-group">
                                    <label for="txt_Email">email</label>
                                    <input value="{{ $user->email }}" type="email" class="form-control" name="txt_Email" id="txt_Email" placeholder="Nhập người dùng">
                                </div>

                                <div class="form-group">
                                    <label for="txtPassWord">Mật khẩu</label>
                                    <input value="{{ $user->password }}" type="text" class="form-control" name="txtPassWord" id="txtPassWord" placeholder="Nhập tên miền">
                                </div>

                                <div class="form-group">
                                    <label for="txtPhone">Điện thoại</label>
                                    <input value="{{ $user->fonenumber }}" type="text" class="form-control" name="txtPhone" id="txtPhone" placeholder="Nhập tên miền">
                                </div>

                                @if ($user->quyen == 0)
                                    <div class="form-group">
                                        <label for="txtQuyen">Quyền</label>
                                        <select class="form-control" name="txtQuyen" id="txtQuyen" :class="txtQuyen">
                                            <option value="">--Select--</option>
                                            <option value="0" @if($user->quyen == 0) {{ 'selected' }} @endif>user</option>
                                        </select>
                                    </div>
                                @endif


                                <button class="btn btn-primary">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

@endsection
