<?php

    namespace App\Console\Commands\Admin;

    use Illuminate\Console\Command;
    use Symfony\Component\Console\Input\InputOption;
    use Symfony\Component\Console\Input\InputArgument;
    use App\Services\Acl\Installer as AdminInstaller;

    /**
     * Class AdminCommand
     *
     * @package App\Console\Commands
     */
    class InstallCommand extends Command
    {
        /**
         * The console command name.
         *
         * @var string
         */
        protected $name = 'admin:install';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Installs the LarAppStart package';

        /**
         * Create a new command instance.
         */
        public function __construct()
        {
            parent::__construct();
        }

        /**
         * Execute the console command.
         *
         * @return mixed
         */
        public function fire()
        {
            \DB::beginTransaction();
            try {
                $this->info('Welcome to the LarAppStart Installer');
                $email     = $this->ask('Please enter the email for the administrator');
                $password  = $this->secret('Please enter the password for the administrator');
                $this->info('Please give us a minute while we install everything');
                $this->call('migrate');
                $this->info('Creating basic user and Roles');
                $installer = new AdminInstaller;
                $installer->install($email, $password);
                \DB::commit();
                $this->info('Thanks! we are done!');
            } catch (\Exception $e) {
                \DB::rollback();
                $this->error('Something went wrong!');

                dd($e->getFile() . ':' . $e->getLine() . '/' . $e->getMessage());
            }
        }

        /**
         * Get the console command arguments.
         *
         * @return array
         */
        protected function getArguments()
        {
            return [
            ];
        }

        /**
         * Get the console command options.
         *
         * @return array
         */
        protected function getOptions()
        {
            return [
            ];
        }
    }