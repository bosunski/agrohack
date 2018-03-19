<?php

namespace Modules\Concession\Repositories;

use Ramsey\Uuid\Uuid;
use League\Fractal\Serializer\ArraySerializer;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class BaseRepository
{
    protected function transform($model, $transformer)
	{
		$data = fractal($model, $transformer)
            ->serializeWith(new \Spatie\Fractalistic\ArraySerializer());
		return $this->apiResponse('success', $data);
	}

    protected function generateUuid()
    {
        return Uuid::uuid5(Uuid::NAMESPACE_DNS, str_random(20))->toString();
    }

}
