<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function findOrCreate(ProviderUser $providerUser, $provider)
    {
        $account = LinkedSocialAccount::where('provider_name', $provider)
            ->where('provider_id', $providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $user = User::where('email', $providerUser->getEmail())->first();

            if (! $user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name'  => $providerUser->getName(),
                    'password' => bcrypt($providerUser->getEmail())
                ]);


                $link = new LinkedSocialAccount();
                $link->provider_id = $providerUser->getId();
                $link->provider_name = $provider;
                $link->user_id = $user->id;

                $link->save();

            }



            return $user;

        }
    }
}