<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Permission;
use Auth;
use DB;

class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function message($type, $msg, $data = null) {
        $this->data['type'] = $type;
        $this->data['message'] = $msg;
        $this->data['data'] = $data;
        echo json_encode($this->data);
    }


    public function delete_record(Request $request) {
        // if ($this->permissions->is_allow('Delete')) {
            $list = $request->table::find($request->id);
            // $changeLogs = $list->name . ' ' . $request->message . ' Deleted by ' . Auth::user()->name;
            // $this->logDeletedActivity($list, $changeLogs);
            $res = $list->delete();
            if ($res) {
                $this->message('success', 'Delete Successfully', '');
            } else {
                $this->message('error', 'Some Problem!', '');
            }
        // } else {
        //     $this->message('warning', 'Permission Denied.......');
        // }
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function doctor()
    {
        return view('admin.doctor.list');
    } 

    public function doctor_list()
    {
        $res = User::where('userType', 1)->get();
        $i = 1;
        foreach ($res as $key => &$value) {
            $value->sr_no = $i;
            $value->action = "<a user_id='" . $value->id . "' class='pr-2 pointer text-primary edit-permission' data-toggle='modal' data-target='#edit-permission'><i class='lni lni-pencil'></i></a>"
                    . " <a user_id='" . $value->id . "' class='pointer delete_permission'><i class='lni lni-eraser text-danger'></i></a>";
            $i++;
        }
        $this->message('success', '', $res);
    }

    public function retrieve(Request $request) {
        $res = DB::table($request->table)->where($request->key, $request->id)->get();
        if ($res) {
            $this->message('success', 'Data Found', $res);
        } else {
            $this->message('error', 'Data Not Found!', '');
        }
    }


// ~~~~~~~~~~~~~~~~~~~ Add Subadmin ~~~~~~~~~~~~~

    public function sub_admin()
    {
        return view('admin.subadmin.list');
    }

    public function sub_admin_list()
    {
        $res = User::where('userType', 2)->get();
        $i = 1;
        foreach ($res as $key => &$value) {
            $value->sr_no = $i;
            $value->action = "<a user_id='" . $value->id . "' class='pr-2 pointer text-primary edit-user' data-bs-toggle='modal' data-bs-target='#subAdminEditModal' ><i class='lni lni-pencil'></i></a>"
                    . " <a user_id='" . $value->id . "' class='pointer delete_sub_admin'><i class='lni lni-eraser text-danger'></i></a>";
            $i++;
        }
        $this->message('success', '', $res);
    }

    public function add_admin_subadmin(Request $request){
            $data = [
                'name' => $request->name,
                'userType' => $request->user_type,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => bcrypt($request->password),
            ];
            $res = User::create($data);
            if ($res) {
                $this->message('success', 'Sub Admin Create Successfully', '');
            } else {
                $this->message('error', 'Some Problem!', '');
            }
        }

    public function edit_admin_subadmin(Request $request){
            $datas = [
                'name' => $request->name,
                'userType' => $request->user_type,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => bcrypt($request->password),
            ];
            $data = User::where(['id' => $request->id]);
            $res = $data->update($datas);
            if ($res) {
                $this->message('success', 'Sub Admin Update Successfully', '');
            } else {
                $this->message('error', 'Some Problem!', '');
            }
        }

        // ~~~~~~~~~~~~~~~~~~~~~~ End Subadmin ~~~~~~~~~~~~~~

    public function permission()
    {
        return view('admin.permission.content');
    }

    public function permission_list()
    {
        $res = Permission::all();
        $i = 1;
        foreach ($res as $key => &$value) {
            $value->sr_no = $i;
            $value->action = "<a permission_id='" . $value->id . "' class='pr-2 pointer text-primary edit-user' data-bs-toggle='modal' data-bs-target='#EditModal' ><i class='lni lni-pencil'></i></a>"
                    . " <a permission_id='" . $value->id . "' class='pointer delete_data'><i class='lni lni-eraser text-danger'></i></a>";
            $i++;
        }
        $this->message('success', '', $res);
    }

    public function add_permission(Request $request){
        $data = [
            'name' => $request->name,
        ];
        $res = Permission::create($data);
        if ($res) {
            $this->message('success', 'Permission Create Successfully', '');
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }

     public function edit_permission(Request $request){
            $datas = [
                'name' => $request->name,
            ];
            $data = Permission::where(['id' => $request->id]);
            $res = $data->update($datas);
            if ($res) {
                $this->message('success', 'Permission Update Successfully', '');
            } else {
                $this->message('error', 'Some Problem!', '');
            }
        }
     
}
