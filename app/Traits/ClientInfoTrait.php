<?php
namespace App\Traits;
use App\Models\SeoMetaTags;
use Illuminate\Http\Request;
use Str;
use Hash;
use Intervention\Image\ImageManagerStatic as Image;

trait ClientInfoTrait{
    /**
     * Display a my info.
     *
     * @return \Illuminate\View\View
     */
    public function myInfo()
    {
        app()->make(SeoMetaTags::class)->setMeta('system.client.my_info');
        return view('front.client.cabinet-my-info');
    }

    /**
     * Update my info.
     * @param  Request $request
     * @return Illuminate\Http\RedirectRespons
     */
    public function updateInfo(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'lastname' => ['required'],
            'availability' => ['required'],
            'phone' => ['required'],
        ]);

        auth()->user()->update($request->only('name','lastname','availability','phone'));

        if ($request->hasFile('avatar')) {
            $name_file = Str::random(15).'.jpg';
            $image = $request->file('avatar');
            $image_save = Image::make($image->getRealPath());
            $image_save->resize(128, 128);
            $image_save->save(storage_path(env('LOCAL_PATH_AVATAR') . $name_file));
            auth()->user()->avatar = $name_file;
            auth()->user()->save();
        }


        return back()->with('success', 'Updated');
    }

    /**
     * Display form password.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPasswordForm()
    {
        app()->make(SeoMetaTags::class)->setMeta('system.client.password');
        return view('front.client.password');
    }

    /**
     * Update password
     * @param  Request $request
     * @return Illuminate\Http\RedirectRespons
     */
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (Hash::check($request->old_password , auth()->user()->password )) {

            auth()->user()->password = bcrypt($request->password);
            auth()->user()->save();

            return redirect()->back()->with('success', true);
        }
        return back()->withErrors(['old_password'=>'old password wrong']);
    }
}
