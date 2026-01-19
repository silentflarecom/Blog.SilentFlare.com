<?php

declare(strict_types=1);

namespace App\Tenancy\TenantDatabaseManagers;

use Stancl\Tenancy\Contracts\TenantDatabaseManager;
use Stancl\Tenancy\Contracts\TenantWithDatabase;

class CustomSQLiteDatabaseManager implements TenantDatabaseManager
{
    public function createDatabase(TenantWithDatabase $tenant): bool
    {
        try {
            $name = $tenant->tenancy_db_name;
            return (bool) file_put_contents($this->getPath($name), '');
        } catch (\Throwable $th) {
            echo "Error creating DB: " . $th->getMessage() . "\n";
            return false;
        }
    }

    public function deleteDatabase(TenantWithDatabase $tenant): bool
    {
        try {
            return unlink($this->getPath($tenant->tenancy_db_name));
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function databaseExists(string $name): bool
    {
        return file_exists($this->getPath($name));
    }

    public function makeConnectionConfig(array $baseConfig, string $databaseName): array
    {
        $baseConfig['database'] = $this->getPath($databaseName);

        return $baseConfig;
    }

    public function setConnection(string $connection): void
    {
        //
    }

    protected function getPath(string $name): string
    {
        return storage_path('tenant_databases/' . $name);
    }
}
