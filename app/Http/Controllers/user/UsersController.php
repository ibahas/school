<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * This construct start in initialize this controller
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        if (Auth::user()->role == 1) {
            $data = User::all();
            return view('user.index', compact('data'));
        } else {
            alert()->warning('لا يوجد لديك أي صلاحية');
            return redirect()->back();
        }
    }
    public function show()
    {
        $user_id = Auth::user()->id;
        $data = User::where('id', $user_id)->first();

        return Response()->view('user.auth', compact('data'));
    }
    public function create()
    {
        $data = user::all();
        return view('user.create', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'bod' => 'required',
            'photo' => 'required',
            'role' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'bod' => $request->bod,
            'phone' => $request->phone,
            'photo' => $request->photo,
            'address' => $request->address,
            'role' => $request->role,
        ];
        User::create($data);
        return redirect('/users');
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::find(Auth::user()->id);
        $request->validate(
            [
                'password' => 'required|min:6',
                'confirmPassword' => 'required|same:password',
                'oldPassword' => 'required',
            ]
        );
        if (Hash::check($request->input('oldPassword'), $user->password)) {
            $user->password = bcrypt($request->input('password'));
            $user->save();
            alert()->success('تم تحديث كلمت المرور بنجاح');
            return redirect('/users/show');
        } else {
            alert()->warning('تأكد من كلمت المرور الخاصة بك .');
            return back();
        }
        // User::where('id', Auth::user()->id)->update(Auth::user()->id);

    }

    /**
     * function to Update a Photo User in Auth :)
     *
     * @param int $id
     * @return void
     */
    public function updatePhoto(Request $request, $id)
    {
        $user = User::find($id);
        request()->validate(
            [
                'photo' => 'mimes:jpg,jpeg,png,gif|max:2048',
            ],
            [
                'photo.max' => alert()->error('هذه الصورة كبيرة للغاية')->html()->persistent('حسناً'),
            ],
        );

        if ($request->hasfile('photo')) {

            $path = public_path('image/') . $user->photo;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('photo');
            $ex = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ex;
            $file->move(public_path('/image'), $filename);
            $user->photo = $filename;

            $user->save();
            alert()->success('تم تحديث صورتك بنجاح')->html()->persistent('حسناً');
            return redirect('/users/show');
        }
    }

    public function updateInfoUser(Request $request)
    {
        $id = Auth::user()->id;
        if (Auth::user()->email !== $request->email) {
            $request->validate([
                'email' => ['required', 'unique:users'],
            ]);
        }
        $data = [
            'name' => $request->name,
            'bod' => $request->bod,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
        ];
        User::where('id', $id)->update($data);
        alert()->success('تم تحديث البيانات بنجاح');
        return redirect('users/show');
    }
    public function showAllParents()
    {
        # code...
        $data = User::where('role', 4)->get();
        return view('user.parents', compact('data'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $User = User::find($id);
        $User->delete($id);
        alert()->success('تم حذف المستخدم');
        $string = request()->headers->get('referer');
        $pieces = explode('/', $string);
        $last_word = array_pop($pieces);
        if($last_word == "parents"){
            return back();
        }else{
            return redirect('users');
        }
    }
}
