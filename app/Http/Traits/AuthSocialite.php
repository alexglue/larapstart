<?php
    /**
     * AuthSocialite
     *
     * @author  glue
     * @date    02.07.16
     * @package igrating
     * @subpackage
     */
    namespace App\Http\Traits;
    use App\Models\Role;
    use App\Models\SocialUser;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;


    /**
     * Class AuthSocialite
     *
     * @package App\Traits
     */
    trait AuthSocialite {

        /**
         * Redirect the user to the Vkontakte authentication page.
         *
         * @param Request $request
         * @param null    $provider
         *
         * @return Response
         *
         */
        public function redirectToProvider( Request $request, $provider = null ) {

            //        $clientId = "secret";
            //        $clientSecret = "secret";
            //        $redirectUrl = "http://yourdomain.com/api/redirect";
            //        $additionalProviderConfig = ['site' => 'meta.stackoverflow.com'];
            //        $config = new \SocialiteProviders\Manager\Config($clientId, $clientSecret, $redirectUrl, $additionalProviderConfig);
            //        return Socialite::with('provider-name')->setConfig($config)->redirect();

            return \Socialite::driver( $provider )
                    //->scopes(['scope1', 'scope2'])
                    //->with(['hd' => 'example.com'])
                    ->redirect();
        }


        /**
         * Obtain the user information from Vkontakte.
         *
         * @param Request $request
         * @param null    $provider
         *
         * @return Response
         */
        public function handleProviderCallback(Request $request, $provider)
        {
            $socialiteUser = \Socialite::driver( $provider )->user();

            //        // OAuth Two Providers
            //        $token = $user->token;
            //        $refreshToken = $user->refreshToken; // not always provided
            //        $expiresIn = $user->expiresIn;
            //
            //        // OAuth One Providers
            //        $token = $user->token;
            //        $tokenSecret = $user->tokenSecret;
            //
            //        // All Providers
            //        $user->getId();
            //        $user->getNickname();
            //        $user->getName();
            //        $user->getEmail();
            //        $user->getAvatar();

            $user = null;

            //Check is this email present
            $existingUser = User::where('email', '=', $socialiteUser->email)->first();
            if(!empty($existingUser))
            {
                $user = $existingUser;
            }
            else
            {
                $existingSocialUser = SocialUser::where('social_id', '=', $socialiteUser->id)->where('provider', '=', $provider )->first();

                if(empty($existingSocialUser))
                {
                    //There is no combination of this social id and provider, so create new one
                    $newUser           = new User;
                    $newUser->email    = $socialiteUser->email;
                    $newUser->name     = $socialiteUser->name;
                    $newUser->password = bcrypt( str_random() );
                    $newUser->save();

                    $newSocialUser            = new SocialUser();
                    $newSocialUser->social_id = $socialiteUser->id;
                    $newSocialUser->provider  = $provider;
                    $newUser->social()->save( $newSocialUser );

                    // Add role
                    //$role = Role::whereName('user')->first();
                    //$newUser->attachRole($role);

                    $user = $newUser;
                }
                else
                {
                    //Load this existing social user
                    $user = $existingSocialUser->user;
                }

            }

            //todo: if new user then post-registration page shown
            \Auth::login($user, true);

            if( \Auth::guest())
            {
                \App::abort(500);
            }

            return redirect('/'); //->route('/');
        }
    }
?>