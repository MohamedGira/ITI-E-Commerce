<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Customer;
use App\Models\User;
use App\Utils;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

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
         $newdata['profile_image'] = Utils::saveImage($request->file('profile_image'));
        
         if (User::where('email', $newdata['email'])->where('id', '!=', $request->user()->id)->count() != 0)
            return Redirect::route('profile.edit')->with('status', 'Email alrady in use');
         $userFilteredData = Utils::filterObject($newdata, Schema::getColumnListing((new User)->getTable()));
         $customerFilteredData= Utils::filterObject($newdata, Schema::getColumnListing((new Customer)->getTable()));

         $request->user()->update($userFilteredData);
         $customer = Customer::where(['user_id' => $request->user()->id])->first();
         $old_image=$customer->profile_image;
         if($old_image!='default.jpg'&&$request->hasFile('profile_image'))
         File::delete(public_path('Images/'.$old_image));
        
         $customer->update($customerFilteredData);
         
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
