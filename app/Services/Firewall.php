<?php

namespace App\Services;

use App\Filter\Filter;

class Firewall
{
    protected $filters;
    
    public function __construct(protected Logger $log, Filter ...$filters)
    {
        
        $this->filters = $filters;
    }

    public function filterContent(string $content): string
    {
        foreach($this->filters as $filter) {
            $content = $filter->apply($content);
        }

        $this->log->log("Content difilter : $content");

        return $content;
    }
}
