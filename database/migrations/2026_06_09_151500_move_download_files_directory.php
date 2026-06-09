<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

return new class extends Migration
{
    public function up(): void
    {
        $oldDirectory = public_path('downloads');
        $newDirectory = public_path('download-files');

        if (File::isDirectory($oldDirectory) && ! File::isDirectory($newDirectory)) {
            File::moveDirectory($oldDirectory, $newDirectory);
        } elseif (File::isDirectory($oldDirectory) && File::isDirectory($newDirectory)) {
            foreach (File::directories($oldDirectory) as $directory) {
                File::copyDirectory($directory, $newDirectory.'/'.basename($directory));
            }

            File::deleteDirectory($oldDirectory);
        }

        DB::table('download_items')
            ->where('file_path', 'like', 'downloads/%')
            ->update([
                'file_path' => DB::raw("REPLACE(file_path, 'downloads/', 'download-files/')"),
            ]);
    }

    public function down(): void
    {
        $oldDirectory = public_path('downloads');
        $newDirectory = public_path('download-files');

        if (File::isDirectory($newDirectory) && ! File::isDirectory($oldDirectory)) {
            File::moveDirectory($newDirectory, $oldDirectory);
        }

        DB::table('download_items')
            ->where('file_path', 'like', 'download-files/%')
            ->update([
                'file_path' => DB::raw("REPLACE(file_path, 'download-files/', 'downloads/')"),
            ]);
    }
};
