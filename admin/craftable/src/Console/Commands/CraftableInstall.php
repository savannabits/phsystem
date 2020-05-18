<?php

namespace Savannabits\Craftable\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CraftableInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'craftable:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install a Craftable (savannabits/craftable) instance';

    /**
     * Password for generated default admin
     *
     * @var string
     */
    protected $password = 'best package ever';

    /**
     * Execute the console command.
     *
     * @param Filesystem $files
     * @return void
     */
    public function handle(Filesystem $files): void
    {
        $this->info('Installing Craftable...');

        $this->publishAllVendors();

        $this->generatePasswordAndUpdateMigration();

        $this->addHashToLogging();

        $this->call('admin-ui:install');

        $this->call('admin-auth:install');

        $this->generateUserStuff($files);

        $this->call('admin-translations:install');

        $this->scanAndSaveTranslations();

        $this->call('admin-listing:install');

        $this->comment('Admin password is: ' . $this->password);

        $this->info('Craftable installed.');
    }

    /**
     * Replace string in file
     *
     * @param string $fileName
     * @param string $find
     * @param string $replaceWith
     * @return int|bool
     */
    private function strReplaceInFile($fileName, $find, $replaceWith)
    {
        $content = File::get($fileName);
        return File::put($fileName, str_replace($find, $replaceWith, $content));
    }

    /**
     * Publishing all publishable files from all craftable packages
     *
     * @return void
     */
    private function publishAllVendors(): void
    {
        //Spatie Permission
        $this->call('vendor:publish', [
            '--provider' => 'Spatie\\Permission\\PermissionServiceProvider',
            '--tag' => 'migrations'
        ]);
        $this->call('vendor:publish', [
            '--provider' => 'Spatie\\Permission\\PermissionServiceProvider',
            '--tag' => 'config'
        ]);

        //Spatie Backup
        $this->call('vendor:publish', [
            '--provider' => "Spatie\\Backup\\BackupServiceProvider",
        ]);

        //Media
        $this->call('vendor:publish', [
            '--provider' => 'Spatie\\MediaLibrary\\MediaLibraryServiceProvider',
            '--tag' => 'migrations'
        ]);
        $this->call('vendor:publish', [
            '--provider' => "Savannabits\\Media\\MediaServiceProvider",
        ]);

        //Advanced logger
        $this->call('vendor:publish', [
            '--provider' => "Savannabits\\AdvancedLogger\\AdvancedLoggerServiceProvider",
        ]);

        //Craftable
        $this->call('vendor:publish', [
            '--provider' => "Savannabits\\Craftable\\CraftableServiceProvider",
        ]);
    }

    /**
     * Generate new password and change default password in igration to use new password
     *
     * @return void
     */
    private function generatePasswordAndUpdateMigration(): void
    {
        $this->password = Str::random(10);

        $files = File::allFiles(database_path('migrations'));
        foreach ($files as $file) {
            if (strpos($file->getFilename(), 'fill_default_admin_user_and_permissions.php') !== false) {
                //change database/migrations/*fill_default_user_and_permissions.php to use new password
                $this->strReplaceInFile(
                    database_path('migrations/' . $file->getFilename()),
                    'best package ever',
                    '' . $this->password . '');
                break;
            }
        }
    }

    /**
     * Generate user administration and profile
     *
     * @param Filesystem $files
     * @return void
     */
    private function generateUserStuff(Filesystem $files): void
    {
        // TODO this is probably redundant?
        // Migrate
        $this->call('migrate');

        // Generate User CRUD (with new model)
        $this->call('admin:generate:admin-user', [
            '--force' => true,
        ]);

        // Generate user profile
        $this->call('admin:generate:admin-user:profile');
    }

    /**
     * Prepare translations config and rescan
     *
     * @return void
     */
    private function scanAndSaveTranslations(): void
    {
        // Scan translations
        $this->info('Scanning codebase and storing all translations');

        $this->strReplaceInFile(
            config_path('admin-translations.php'),
            '// here you can add your own directories',
            '// here you can add your own directories
        // base_path(\'routes\'), // uncomment if you have translations in your routes i.e. you have localized URLs
        base_path(\'vendor/savannabits/admin-auth/src\'),
        base_path(\'vendor/savannabits/admin-auth/resources\'),
        base_path(\'vendor/savannabits/admin-ui/resources\'),
        base_path(\'vendor/savannabits/admin-translations/resources\'),'
        );

        $this->call('admin-translations:scan-and-save', [
            'paths' => array_merge(
                config('admin-translations.scanned_directories'),
                ['vendor/savannabits/admin-auth/src', 'vendor/savannabits/admin-auth/resources']
            ),
        ]);
    }

    /**
     * Change logging to add hash to logs
     *
     * @return void
     */
    private function addHashToLogging(): void
    {
        if (version_compare(app()->version(), '5.6.0', '>=')) {
            $this->strReplaceInFile(
                config_path('logging.php'),
                '\'days\' => 14,',
                '\'days\' => 90,
            \'tap\' => [Savannabits\AdvancedLogger\LogCustomizers\HashLogCustomizer::class],'
            );
        }
    }
}
