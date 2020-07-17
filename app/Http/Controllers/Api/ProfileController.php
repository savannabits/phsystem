<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function show(Request $request) {
        $profile = User::findOrFail(\Auth::id());
        $profile->load(['roles','relatives.child']);
        return jsonRes(true,"My Profile",$profile);
    }
    public function uploadAvatar(Request $request) {
        /**@var User $me*/
        $me = \Auth::user();
        // Save the file to the disk and return path:
        $file = $request->file('avatar');
        $media = $me->addMedia($file)
            ->setFileName("users/".$me->id.".".$file->extension())
            ->setName("user-$me->id-avatar")
            ->toMediaCollection('avatar',"public");
        $media->saveOrFail();
        return jsonRes(true, "profile pic uploaded",$media);
    }
    public function update(UpdateProfile $request) {
        $data = $request->validated();
        $me = User::findOrFail(\Auth::id());
        $me->update($data);
        return jsonRes(true, "Profile updated", [],200);
    }
    public function changePassword(Request $request) {
        try {
            $request->validate([
                "current_password" => ["required", "string"],
                "new_password" => ["required", "string", "min:8","confirmed"],
            ]);

            if (!\Hash::check($request->current_password,\Auth::user()->password)) {
                abort(400,"The specified current password is invalid.");
            }
            \Auth::user()->password = bcrypt($request->new_password);
            \Auth::user()->saveOrFail();
            return jsonRes(true, "Password has been updated.");
        } catch (ValidationException $e) {
            return jsonRes(false, $e->validator->getMessageBag()->first(), $e->errors(),422);
        }
        catch (\Throwable $exception) {
            \Log::error($exception);
            return jsonRes(false, $exception->getMessage(), [],400);
        }
    }
}
