<?php

namespace App\Http\Resources;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * Class ${NAME}
 *
 * @date      2019-03-24
 * @author    markbonnievestil
 * @copyright Copyright (c) Infostream Group
 */
abstract class BaseResource extends JsonResource
{
    protected $onlyIdentifiers = false;

    public function onlyIdentifiers()
    {
        $this->onlyIdentifiers = true;

        return $this;
    }

    public function toArray($request)
    {
        if ($this->onlyIdentifiers) {
            return $this->identifiers();
        }

        $relationships = $this->relationships($request);

        foreach ($relationships as &$rel) {
            $rel->onlyIdentifiers();
            \Log::info('class', [get_class($rel)]);
            $rel = $rel->toArray($request)['data'];
        }

        \Log::info('relationships', [$relationships]);

        $data = array_filter(array_merge(
            $this->identifiers(),
            ['attributes' => $this->fields($request)],
            ['relationships' => array_filter($relationships)],
            ['links' => $this->links($request)]
        ));

        return $data;
    }

    public function with($request)
    {
        if (method_exists($this, 'includes')) {
            return ['included' => $this->includes($request)];
        }

        return [];
    }

    public function identifiers()
    {
        if (!$this->resource) {
            return [];
        }

        return [
            'type' => Str::plural(
                strtolower(
                    (new \ReflectionClass($this->resource))->getShortName()
                )
            ),
            'id'   => $this->id,
        ];
    }

    abstract public function fields($request);

    abstract public function relationships($request);

    abstract public function links($request);
}