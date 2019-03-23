<?php

namespace App\Http\Controllers;

use App\domain;
use App\detail_domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//check login
use Illuminate\Support\Facades\DB;


class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * check quyen va hien thi
     */
    public function index()
    {

        $list_domain = DB::table('domains')->get();

        $list_user_name = DB::table('users')
            ->join('domains', 'users.id', '=', 'domains.user_id')
            ->select('users.name')
            ->get();
        return view('admin.domain.list')->with(['list_domain'=>$list_domain, 'list_user_name'=>$list_user_name ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = DB::table('users')->get();
        return view('admin.domain.create')->with('users',$user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,
        [
            'txtUser_Id' => 'required',
            'txtTenMien' => 'required',
            'txtNgayTao' => 'required',
            'txtKetThuc' => 'required',
        ],
        [
            'txtUser_Id.required' => 'Người dùng là bắt buộc',
            'txtTenMien.required' => 'Tên miền là bắt buộc',
            'txtNgayTao.required' => 'Ngày tạo là bắt buộc',
            'txtKetThuc.required' => 'Ngày kết thúc dùng là bắt buộc',
        ]
        );

        DB::table('domains')->insert(
            [
                'user_id' => $request->txtUser_Id,
                'domain_name' => $request->txtTenMien,
                'register_date' =>$request->txtNgayTao,
                'end_date'=>$request->txtKetThuc
            ]
        );

        return redirect('admin/domain/create')->with('thongbao','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        //return redirect('admin.domain.detail');
        echo 'test';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function edit(domain $domain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, domain $domain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function destroy(domain $domain)
    {
        //
    }
}
