<?php

namespace Fallfoundry\TocGenerator;

use Symfony\Component\DomCrawler\Crawler;

class Scanner
{
    public function findAnchors($html)
    {
        $anchors = collect();

        $crawler = new Crawler($html);

        foreach ($crawler->filterXPath('//h1 | //h2 | //h3 | //h4 | //h5 | //h6 | //h7')->extract(['_name', '_text', 'id']) as $nodeInfo)
        {
            $item = [
                'type' => $nodeInfo[0],
                'level' => substr($nodeInfo[0], 1, 1),
                'title' => $nodeInfo[1],
                'id' => $nodeInfo[2],
            ];

            $anchors->push($item);
        }

        return $anchors;
    }
}
