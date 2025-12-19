<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class DownloadNotoTamilFonts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fonts:download-noto-tamil';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download Noto Sans Tamil TTF files into storage/fonts to enable Tamil rendering in DomPDF';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Downloading Noto Sans Tamil fonts...');

        $fontsDir = storage_path('fonts');
        if (! File::exists($fontsDir)) {
            File::makeDirectory($fontsDir, 0755, true);
            $this->info("Created directory: {$fontsDir}");
        }

        $files = [
            'NotoSansTamil-Regular.ttf' => 'https://github.com/googlefonts/noto-fonts/raw/main/hinted/ttf/NotoSansTamil/NotoSansTamil-Regular.ttf',
            'NotoSansTamil-Bold.ttf' => 'https://github.com/googlefonts/noto-fonts/raw/main/hinted/ttf/NotoSansTamil/NotoSansTamil-Bold.ttf',
        ];

        foreach ($files as $name => $url) {
            $path = $fontsDir . DIRECTORY_SEPARATOR . $name;
            if (File::exists($path)) {
                $this->line("Already present: {$name}");
                continue;
            }

            try {
                // Use Laravel HTTP client if available, fall back to file_get_contents
                if (class_exists(Http::class)) {
                    $resp = Http::withOptions(['verify' => false])->get($url);
                    if ($resp->ok()) {
                        File::put($path, $resp->body());
                        $this->info("Downloaded: {$name}");
                    } else {
                        $this->error("Failed to download {$name}: HTTP {$resp->status()}");
                    }
                } else {
                    $contents = @file_get_contents($url);
                    if ($contents === false) {
                        $this->error("Failed to download {$name} (file_get_contents returned false)");
                    } else {
                        File::put($path, $contents);
                        $this->info("Downloaded: {$name}");
                    }
                }
            } catch (\Exception $e) {
                $this->error("Exception downloading {$name}: " . $e->getMessage());
            }
        }

        $this->info('Done. Make sure storage/fonts is readable by the web server/PHP.');
        $this->info('Now you can run your ID card download action; the Blade will prefer local Noto fonts if present.');
        return 0;
    }
}
