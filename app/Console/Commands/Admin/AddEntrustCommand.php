<?php

    namespace App\Console\Commands\Admin;

    use App\Models\Permission;
    use App\Models\Role;
    use Illuminate\Console\Command;
    use Symfony\Component\Console\Input\InputOption;
    use Symfony\Component\Console\Input\InputArgument;

    /**
     * Class AdminCommand
     *
     * @package App\Console\Commands
     *
     * @example signature
     * Argument: joindin:sync {eventId}
     * Optional Argument: joindin:sync {eventId?}
     * Argument with default: joindin:sync {eventId=all}
     * Boolean Option: joindin:sync --wipeOldEvents
     * Option with Value: joindin:sync --afterDate=
     * Option with Value and Default: joindin:sync --afterDate=1999-01-01
     */
    class AddEntrustCommand extends Command
    {
        /** @var string  */
        protected $signature = 'admin:add {entity}
                                {--name= : The system name of new role}
                                {--display= : The display name of new role}
                                {--description= : The new role description short text}
                                ';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Creates new role|permission';

        /**
         * Execute the console command.
         *
         * @return mixed
         */
        public function handle()
        {
            \DB::beginTransaction();
            try {

                $entity = $this->argument('entity');
                if(!in_array($entity, ['role', 'permission']))
                {
                    $this->error('Invalid argument passed: use one of [role|permission]');
                    app()->abort(-1);
                }

                call_user_func([$this, 'add' . ucfirst($entity)]);

                \DB::commit();

            }
            catch (\Exception $e)
            {
                \DB::rollback();
                $this->error('Something went wrong!');

                app()->abort(-1, $e->getFile() . ':' . $e->getLine() . '/' . $e->getMessage());
            }
        }

        protected function addRole()
        {
            /** @var Role $role */
            $model       = config( 'entrust.role' );
            $role        = new $model;
            $name        = $this->hasOption('name')? $this->option('name') : "";
            $display     = $this->hasOption('display')? $this->option('display') : "";
            $description = $this->hasOption('description')? $this->option('description') : "";

            if(!$name)
            {
                $name = $this->ask( 'Please enter the name of new role' );
            }

            if(!$this->hasOption('name'))
            {
                $display     = $this->ask( 'Please enter the display name of new role', $display);
                $description = $this->ask( 'Please enter the description of new role', $description );
            }

            $role->create(
                [
                    'name'         => $name,
                    'display_name' => $display,
                    'description'  => $description
                ]
            );

            $this->info('Role ' . $name . ' was successfully created!');

        }

        protected function addPermission()
        {
            /** @var Permission $permission */
            $model       = config('entrust.permission');
            $permission  = new $model;
            $name        = $this->hasOption('name')? $this->option('name') : "";
            $display     = $this->hasOption('display')? $this->option('display') : "";
            $description = $this->hasOption('description')? $this->option('description') : "";

            if(!$name)
            {
                $name = $this->ask( 'Please enter the name of new role' );
            }

            if(!$this->hasOption('name'))
            {
                $display     = $this->ask( 'Please enter the display name of new role', $display);
                $description = $this->ask( 'Please enter the description of new role', $description );
            }

            $permission->create(
                [
                    'name'         => $name,
                    'display_name' => $display,
                    'description'  => $description
                ]
            );

            $this->info('Permission ' . $name . ' was successfully created!');

        }
    }