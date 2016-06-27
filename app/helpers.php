<?php

    use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

    if ( !function_exists( 'user' ) )
    {
        /**
         * @param $field
         *
         * @return \App\Models\User|string
         * @throws AccessDeniedHttpException
         */
        function user( $field = null )
        {
            if( Auth::guest() )
            {
                throw new AccessDeniedHttpException('Unauthorized user');
            }

            $user = Auth::user();

            if(!$field)
            {
                return $user;
            }

            return property_exists( $user, $field ) ? $user->$field : '';
        }
    }