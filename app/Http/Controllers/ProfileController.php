<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Customer;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\File; 

function saveImage($request)
{
    $filename = uniqid() . "." . $request->profile_image->extension();
    $request->profile_image->move(public_path('Images'), $filename);
    return $filename;
}
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {
        $customer = Customer::where(['user_id' => $request->user()->id])->first();
        return view('profile.edit', [
            'user' => $request->user(),
            'userData' => $customer,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $newdata = $request->except('_token', '_method');
        try {
            $request->validate(
                [
                    'email' => 'required|email',
                    'username' => 'reqired',
                    'phoneNumber' => 'required'
                ]
            );
        } catch (Exception $e) {
        }
        if ($request->hasFile('profile_image')) 
         $newdata['profile_image'] = saveImage($request);
        
         if (User::where('email', $newdata['email'])->where('id', '!=', $request->user()->id)->count() != 0)
         return Redirect::route('profile.edit')->with('status', 'Email alrady in use');
         
         $request->user()->update($newdata);
         $customer = Customer::where(['user_id' => $request->user()->id])->first();
         
         $old_image=$customer->profile_image;
         if($old_image!='default.jpg'&&$request->hasFile('profile_image'))
         File::delete(public_path('Images/'.$old_image));
         $customer->update($newdata);
         
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
