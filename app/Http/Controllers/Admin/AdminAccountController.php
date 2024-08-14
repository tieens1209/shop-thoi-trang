<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifiEmail;
use App\Models\Order;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminAccountController extends Controller
{
    public function getFormLogin()
    {
        return view('admin.page.auth.login');
    }

    public function submitFormLogin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('name', $request->name)->where('active', 1)->first();

        if (is_null($user)) {
            toastr()->error('Login failed', 'Error');
            return redirect()->route('adminLogin');
        } else {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect()->route('admin.product.index');
            } else {
                toastr()->error('Login failed', 'Error');
                return redirect()->route('adminLogin');
            }
        }
    }

    public function submitFormLogout(Request $request)
    {
        Auth::logout();
        return redirect()->route('adminLogin');
    }

    //Management
    public function index()
    {
        $accounts = User::withTrashed()->get();
        return view('admin.page.account.index', compact('accounts'));
    }
    public function create()
    {
        return view('admin.page.account.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users',
            'password' => 'required',
            'repeat_password' => 'required|same:password',
            'fullname' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users|max:10|min:10',
            'address' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => $request->role,
        ];

        User::create($data);

        $token = Str::random(32);
        User::where('email', $request->email)->update(['token' => $token]);

        $information = [
            'name' => $request->fullname,
            'email' => $request->email,
            'token' => $token
        ];

        Mail::to($request->email)->send(new VerifiEmail($information));


        $request->session()->flash('success', 'Created account.');
        return redirect()->route('admin.account.index');
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.page.account.edit', compact('user'));
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'fullname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|max:10|min:10',
            'address' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];

        User::where('id', $id)->update($data);

        $user = User::where('id', $id)->first();

        // Set lại quyền cho tài khoản nhân viên (nếu cần)
        $roles = ['Account', 'Category', 'Product', 'Banner', 'Voucher', 'Blog'];
        $actions = ['show', 'add', 'update', 'delete'];
        $permission = [];
        $revokePermission = [];

        foreach ($roles as $role) {
            foreach ($actions as $action) {
                array_push($revokePermission, $action . $role);
                if ($request->input($action . $role) == 'on') {
                    array_push($permission, $action . $role);
                }
            }
        }

        $user->revokePermissionTo($revokePermission);
        $user->givePermissionTo($permission);


        $request->session()->flash('success', 'Updated account.');
        return redirect()->route('admin.account.index');
    }

    public function destroy($id, Request $request)
    {
        //Không thể tự block chính mình
        if (Auth::user()->id == $id) {
            toastr()->error('Unachievable', "You can't block yourself");
            $request->session()->flash('success', 'Hoàn lại thành công.');
            return redirect()->route('account.index');
        }
        User::where('id', $id)->delete();

        $request->session()->flash('success', 'Blocked account.');
        return redirect()->route('admin.account.index');
    }
    public function unblock($id, Request $request)
    {
        User::where('id', $id)->restore();

        $request->session()->flash('success', 'Unblocked account.');
        return redirect()->route('admin.account.index');
    }
    public function getFormCreateStaff()
    {
        return view('admin.page.account.createStaff');
    }
    public function submitFormCreateStaff(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users',
            'password' => 'required',
            'repeat_password' => 'required|same:password',
            'fullname' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users|max:10|min:10',
            'address' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => 2,
        ];

        $user = User::create($data);

        $token = Str::random(32);
        User::where('email', $request->email)->update(['token' => $token]);

        $information = [
            'name' => $request->fullname,
            'email' => $request->email,
            'token' => $token
        ];

        Mail::to($request->email)->send(new VerifiEmail($information));

        // Set quyền cho tài khoản nhân viên
        $roles = ['Account', 'Category', 'Product', 'Banner', 'Voucher'];
        $actions = ['show', 'add', 'update', 'delete'];
        $permission = [];

        foreach ($roles as $role) {
            foreach ($actions as $action) {
                if ($request->input($action . $role) == 'on') {
                    array_push($permission, $action . $role);
                }
            }
        }

        $user->givePermissionTo($permission);


        $request->session()->flash('success', 'Created account.');
        return redirect()->route('admin.account.index');
    }
}
