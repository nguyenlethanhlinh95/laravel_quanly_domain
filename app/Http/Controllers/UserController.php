<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;//check login


class UserController extends Controller
{
    //
    public function loginAdmin()
    {
        return view('login');
    }

    public function checkLoginAdmin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:3|max:32'
        ], [
            'email.required'    => 'Bạn chưa nhập tên đăng nhập',

            'password.required'  => 'Bạn chưa nhập mật khẩu',
            'password.min'      => 'Mật khẩu phải lớn hơn 3 ký tự',
            'password.max'      => 'Mật khẩu phải nhỏ hơn 32 ký tự'
        ]);

        $data=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($data)){
            //check neu khong phai la admin, user thuong thi chuyen huong ve trang chi tiet
            $user = Auth::user();


            if ($user->quyen != 1)
            {
                $domain = DB::table('domains')
                    ->where('user_id', '=', $user->id )
                    ->get();
                $domain_id = $domain[0]->id;

                $detail_domain = DB::table('detail_domains')
                ->where('domain_id', '=', $domain_id)
                ->get();
                $data = [
                    'user'  => $user,
                    'domain'=> $domain,
                    'detail_domain' => $detail_domain
                ];

                //echo '<pre>'; print_r($detail_domain); echo '</pre>';
                return view('admin.domain.detail')->with($data);
            }

            $list_domain = DB::table('domains')->get();
            $list_user_name = DB::table('users')
                ->join('domains', 'users.id', '=', 'domains.user_id')
                ->select('users.name')
                ->get();
            return view('admin.domain.list')->with(['list_domain'=>$list_domain, 'list_user_name'=>$list_user_name]);
        }
        else{
            //false
            return redirect('login')->with('err', 'Tên đăng nhập hoặc mật khẩu không đúng.');
            //echo 'dang nhap that bai';
        }

    }


    //logout
    public function getLogout() {
        Auth::logout();
        return redirect('/');
    }


    // list user
    public function index()
    {
        $list_users = DB::table('users')->get();
        return view('admin.user.list')->with('list_users',$list_users);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'txtTenNguoiDung' => 'required',
                'txtFullName' => 'required',
                'txt_Email' => 'required|email|unique:users,email',
                'txtPassWord' => 'required|min:6',
                'txtPhone' => 'required',
                'txtQuyen' => 'required',
            ],
            [
                'txtTenNguoiDung.required' => 'Tên người dùng là bắt buộc',
                'txtFullName.required' => 'fullname là bắt buộc',

                'txt_Email.required' => 'Email là bắt buộc',
                'txt_Email.email' => 'Email không hợp lệ',
                'txt_Email.unique' => 'Email này đã được sử dụng',

                'txtPassWord.required' => 'Mật khẩu là bắt buộc',
                'txtPassWord.min' => 'Mật khẩu phải lớn hơn 8 kí tự',

                'txtPhone.required' => 'Điện thoại là bắt buộc',
                'txtQuyen.required' => 'Quyền là bắt buộc',
            ]
        );

        DB::table('users')->insert(
            [
                'name' => $request->txtTenNguoiDung,
                'fullname' => $request->txtFullName,
                'email' =>$request->txt_Email,
                'password'=> bcrypt($request->txtPassWord),
                'fonenumber'=>$request->txtPhone,
                'quyen'=>$request->txtQuyen,
                'address' => $request->txtAdress
            ]
        );

        return redirect('admin/user/create')->with('thongbao','Thêm thành công');
    }

    public function edit($id)
    {
        $user = DB::table('users')
            ->where('id','=',$id)
            ->first();
        return view('admin.user.edit')->with('user',$user);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'txtTenNguoiDung' => 'required',
                'txtFullName' => 'required',
                'txt_Email' => 'required|email',
                'txtPassWord' => 'required|min:8',
                'txtPhone' => 'required',

            ],
            [
                'txtTenNguoiDung.required' => 'Tên người dùng là bắt buộc',
                'txtFullName.required' => 'fullname là bắt buộc',

                'txt_Email.required' => 'Email là bắt buộc',
                'txt_Email.email' => 'Email không hợp lệ',

                'txtPassWord.required' => 'Mật khẩu là bắt buộc',
                'txtPassWord.min' => 'Mật khẩu phải lớn hơn 8 kí tự',

                'txtPhone.required' => 'Điện thoại là bắt buộc',

            ]
        );
        $user = DB::table('users')->where('id',$id)->first();

        $pass = '';
        if ($request->txtPassWord == $user->password)
        {
            $pass = $user->password;
        }
        else{
            $pass = bcrypt($request->txtPassWord);
        }

        DB::table('users')
            ->where('id',$id)
            ->update([
                'name' => $request->txtTenNguoiDung,
                'fullname' => $request->txtFullName,
                'email' =>$request->txt_Email,
                'password'=> $pass,
                'fonenumber'=>$request->txtPhone,
                'address' => $request->txtAdress,
            ]);
        return redirect('admin/user/list/')->with('thongbao','Cập nhật thành công');
    }


    public function destroy($id)
    {
        //
        //echo 'test';
        User::find($id)->delete($id);
        //return redirect('admin/user/list/')->with('thongbao','Xóa thành công');
    }

}
