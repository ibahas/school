<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;


class UsersController extends Controller
{
    //
    public function index()
    {
        $data = User::all();
        return view('user.index', compact('data'));
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
                'photo'  => 'mimes:jpg,jpeg,png,gif|max:2048',
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
}
