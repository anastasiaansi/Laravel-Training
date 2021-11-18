<?php

namespace App\Service;

use App\Contracts\Parser;
use App\Models\News;
use App\Models\Resources;

class ParserService implements Parser
{
    protected string $url;

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function start(): void
    {
        $xml = \XmlParser::load($this->getUrl());

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);
        foreach ($data['news'] as $item) {

            $resources = Resources::query()->firstOrNew(['title' => $item['title']]);
//            \Log::info(' new news: ' . $resources);
            if ($resources->id) {
                continue;
            } else {
                $resources = new Resources();
                $resources->title = $item['title'];
                $resources->link = $item['link'];
                $resources->guid = $item['guid'];
                $resources->description = $item['description'];
                $resources->pub_date = $item['pubDate'];

                $resources->save();
            }

        }
//        $e = explode("/", $this->getUrl());
//        $fileName = end($e);
//        \Storage::append('news/' . $fileName, json_encode($data));
    }
}