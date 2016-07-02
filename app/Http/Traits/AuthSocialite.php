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
            $user = \Socialite::driver( $provider )->user();

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
        }
    }
?>