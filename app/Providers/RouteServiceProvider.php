<?php

    namespace App\Providers;

    use Illuminate\Routing\Router;
    use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

    /**
     * Class RouteServiceProvider
     *
     * @package App\Providers
     */
    class RouteServiceProvider extends ServiceProvider {

        /**
         * This namespace is applied to your controller routes.
         *
         * In addition, it is set as the URL generator's root namespace.
         *
         * @var string
         */
        protected $namespace = 'App\Http\Controllers';

        /**
         * Define the routes for the application.
         *
         * @param Router $router
         */
        public function map( Router $router )
        {
            $defaults = $this->getDefaults();
            $groups   = config( 'routes.groups', $defaults );

            foreach ( $groups as $group )
            {

                $attributes = [
                    'namespace'  => array_get( $group, 'namespace', array_get( $defaults, 'namespace', $this->namespace ) ),
                    'middleware' => array_get( $group, 'middleware', array_get( $defaults, 'middleware', '' ) ),
                    'prefix'     => array_get( $group, 'prefix', array_get( $defaults, 'prefix', '' ) )
                ];

                $router->group(
                    array_filter($attributes),
                    function ( $router ) use ( $group, $defaults )
                    {
                        $filename = array_get( $group, 'filename', array_get( $defaults, 'filename', 'routes.php' ) );

                        /** @noinspection PhpIncludeInspection */
                        require app_path( 'Http/' . $filename );
                    }
                );
            }
        }


        /**
         * @return array
         */
        protected function getDefaults()
        {
            return [
                'namespace'  => config( 'routes.defaults.namespace', $this->namespace ),
                'middleware' => config( 'routes.defaults.middleware', '' ),
                'prefix'     => config( 'routes.defaults.prefix', '' ),
                'filename'   => config( 'routes.defaults.filename', 'routes.php' )
            ];
        }
    }
