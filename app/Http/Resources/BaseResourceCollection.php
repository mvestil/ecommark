<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class BaseResourceCollection
 */
abstract class BaseResourceCollection extends ResourceCollection
{
    protected $onlyIdentifiers = false;

    public function onlyIdentifiers()
    {
        $this->onlyIdentifiers = true;

        return $this;
    }

    public function makeResource(string $resourceClass, $resource)
    {
        $obj = new $resourceClass($resource);

        if ($this->onlyIdentifiers) {
            $obj->onlyIdentifiers();
        }

        return $obj;
    }

    public function with($request)
    {
        if (method_exists($this, 'includes')) {
            return ['included' => $this->includes($request)];
        }

        return [];
    }
}