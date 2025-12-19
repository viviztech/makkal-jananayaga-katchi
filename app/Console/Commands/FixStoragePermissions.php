<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class FixStoragePermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:fix-permissions {--check : Only check permissions without fixing}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix file and directory permissions for public storage to ensure public access';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $storagePath = storage_path('app/public');
        $publicStoragePath = public_path('storage');
        
        if ($this->option('check')) {
            return $this->checkPermissions($storagePath, $publicStoragePath);
        }

        $this->info('Fixing storage permissions...');
        
        // Fix directory permissions (755 - read, write, execute for owner; read, execute for group/others)
        $this->fixDirectoryPermissions($storagePath);
        
        // Fix file permissions (644 - read, write for owner; read for group/others)
        $this->fixFilePermissions($storagePath);
        
        // Fix public storage symlink permissions
        if (is_link($publicStoragePath)) {
            $this->info('Storage symlink exists: ' . $publicStoragePath);
        } else {
            $this->warn('Storage symlink does not exist. Run: php artisan storage:link');
        }
        
        $this->info('✅ Storage permissions fixed successfully!');
        
        // Show summary
        $this->checkPermissions($storagePath, $publicStoragePath);
        
        return Command::SUCCESS;
    }

    /**
     * Fix directory permissions
     */
    protected function fixDirectoryPermissions($path)
    {
        $directories = File::directories($path, true);
        $directories[] = $path; // Include the root directory
        
        $fixed = 0;
        foreach ($directories as $dir) {
            if (chmod($dir, 0755)) {
                $fixed++;
            }
        }
        
        $this->line("Fixed {$fixed} directories (set to 755)");
    }

    /**
     * Fix file permissions
     */
    protected function fixFilePermissions($path)
    {
        $files = File::files($path, true);
        
        $fixed = 0;
        foreach ($files as $file) {
            if (chmod($file, 0644)) {
                $fixed++;
            }
        }
        
        $this->line("Fixed {$fixed} files (set to 644)");
    }

    /**
     * Check current permissions
     */
    protected function checkPermissions($storagePath, $publicStoragePath)
    {
        $this->info('Checking current permissions...');
        
        // Check directories
        $directories = File::directories($storagePath, true);
        $directories[] = $storagePath;
        
        $incorrectDirs = 0;
        foreach ($directories as $dir) {
            $perms = fileperms($dir);
            $octalPerms = substr(sprintf('%o', $perms), -4);
            if ($octalPerms !== '0755' && $octalPerms !== '755') {
                $incorrectDirs++;
                if ($this->option('check')) {
                    $this->warn("  Directory: {$dir} - Permissions: {$octalPerms} (should be 0755)");
                }
            }
        }
        
        // Check files
        $files = File::files($storagePath, true);
        $incorrectFiles = 0;
        foreach ($files as $file) {
            $perms = fileperms($file);
            $octalPerms = substr(sprintf('%o', $perms), -4);
            if ($octalPerms !== '0644' && $octalPerms !== '644') {
                $incorrectFiles++;
                if ($this->option('check')) {
                    $this->warn("  File: {$file} - Permissions: {$octalPerms} (should be 0644)");
                }
            }
        }
        
        if ($this->option('check')) {
            if ($incorrectDirs === 0 && $incorrectFiles === 0) {
                $this->info('✅ All permissions are correct!');
                $this->line("  Directories: " . count($directories) . " (all 755)");
                $this->line("  Files: " . count($files) . " (all 644)");
            } else {
                $this->warn("⚠️  Found permission issues:");
                $this->line("  Directories with incorrect permissions: {$incorrectDirs}");
                $this->line("  Files with incorrect permissions: {$incorrectFiles}");
                $this->line("  Run without --check to fix: php artisan storage:fix-permissions");
            }
        } else {
            $this->info('📊 Summary:');
            $this->line("  Total directories checked: " . count($directories));
            $this->line("  Total files checked: " . count($files));
        }
        
        // Check storage symlink
        if (is_link($publicStoragePath)) {
            $this->info('✅ Storage symlink exists');
        } else {
            $this->error('❌ Storage symlink missing. Run: php artisan storage:link');
        }
    }
}

