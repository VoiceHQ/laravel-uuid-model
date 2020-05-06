<?php

namespace YarkHQ\LaravelUuidModel\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class UuidMigrationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'uuid:migration {table}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a uuid column to an existing table';

    /**
     * The filesystem instance
     * @var Filesystem
     */
    protected $files;

    /**
     * The generated stub
     * @var string $stub
     */
    protected $stub;

    public function __construct(Filesystem $files)
    {
        $this->files = $files;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->stub = $this->files->get(__DIR__ . '/../../stubs/uuid_migration.stub');
        $this->stub = $this->replaceClassName($this->stub);
        $this->stub = $this->replaceTableName($this->stub);
        $this->files->put($this->getPath('add_uuid_to_' . $this->argument('table')), $this->stub);
        $this->info('Created UUID migration for ' . $this->argument('table'));
    }

    protected function getPath($name)
    {
        return base_path() . '/database/migrations/' . date('Y_m_d_His') . '_' . $name . '.php';
    }

    protected function replaceClassName($stub)
    {
        return str_replace('{{ class }}', 'AddUuidTo' . ucfirst($this->argument('table')), $stub);
    }

    protected function replaceTableName($stub)
    {
        return str_replace('{{ table }}', $this->argument('table'), $stub);
    }
}
