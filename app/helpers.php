<?php

    if ( !function_exists( 'user' ) )
    {
        /**
         * @param $field
         *
         * @return App\Models\User|string
         */
        function user( $field = null )
        {
            $user = Auth::guard( 'user' )->user();

            if(!$field)
            {
                return $user;
            }

            return property_exists( $user, $field ) ? $user->$field : '';
        }
    }

    if ( !function_exists( 'admin' ) )
    {
        /**
         * @param $field
         *
         * @return App\Models\Admin\User|string
         */
        function admin( $field = null )
        {
            $admin = Auth::guard( 'admin' )->user();

            if(!$field)
            {
                return $admin;
            }

            return property_exists( $admin, $field ) ? $admin->$field : '';
        }
    }