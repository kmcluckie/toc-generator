<?php
 
namespace Fallfoundry\TocGenerator\Tags;

use Fallfoundry\TocGenerator\Scanner;

class TOC extends \Statamic\Tags\Tags
{
    protected static $handle = 'toc';
    
    public function __construct(
        public Scanner $scanner
    ) {}

    public function index()
    {
        $anchors = $this->scanner->findAnchors(
            $this->params->get('content')
        );

        // TODO: not currently working
        if ($this->params->get('nest'))
        {
            $nested_anchors = [];
            $last = null;

            foreach($anchors as $node)
            {
                if ($last && $node['level'] > $last['level'])
                {
                    array_push($last['children'], $node);
                }
                else
                {
                    $node['children'] = [];
                    array_push($nested_anchors, $node);
                }

                $last = $node;
            }

            dd($nested_anchors);
        }

        return $anchors->toArray();
    }
}