<?php

namespace App\Repositories;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class BaseRepository
{

    public function __construct()
    {
        ##
    }

    protected function generateUUID()
    {
        try {
            return Uuid::uuid5(Uuid::NAMESPACE_DNS, str_random(20))->toString();
        } catch (UnsatisfiedDependencyException $e) {
            return false;
        }
    }
}
