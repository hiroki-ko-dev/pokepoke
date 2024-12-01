<?php

namespace App\Services;

use Goutte\Client;
use Illuminate\Support\Facades\Storage;

class ImageScraperService
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function scrapeImages(string $url, string $directory)
    {
        $crawler = $this->client->request('GET', $url);

        // 保存ディレクトリが存在しない場合は作成
        if (!Storage::exists($directory)) {
            Storage::makeDirectory($directory);
        }

        $crawler->filter('img')->each(function ($node) use ($directory) {
            $imgUrl = $node->attr('src');
            $imgName = basename(parse_url($imgUrl, PHP_URL_PATH));
            $imgData = file_get_contents($imgUrl);

            if ($imgData !== false) {
                Storage::put($directory . '/' . $imgName, $imgData);
            }
        });
    }
}
