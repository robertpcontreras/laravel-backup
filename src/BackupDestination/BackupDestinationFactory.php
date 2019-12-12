<?php

namespace Spatie\Backup\BackupDestination;

use Illuminate\Support\Collection;

class BackupDestinationFactory
{
    public static function createFromArray(array $config): Collection
    {
        return collect($config['destination']['disks'])
            ->map(function ($filesystemName) use ($config) {
                $backupName = $config[$filesystemName]['name'] ?? $config['name'];
                return BackupDestination::create($filesystemName, $backupName);
            });
    }
}
