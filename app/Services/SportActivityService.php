<?php

namespace App\Services;

use App\Repositories\SportActivityRepository;

class SportActivityService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new SportActivityRepository();
    }

    public function getFiltered(array $filters): array
    {
        return array_values(array_filter($this->repository->getAll(), function ($activity) use ($filters) {
            if (isset($filters['type']) && $activity['type'] !== $filters['type']) return false;
            if (isset($filters['price_from']) && $activity['price'] < $filters['price_from']) return false;
            if (isset($filters['price_to']) && $activity['price'] > $filters['price_to']) return false;
            if (isset($filters['location']) && $activity['location'] !== $filters['location']) return false;
            if (isset($filters['group_type']) && $activity['group_type'] !== $filters['group_type']) return false;
            if (isset($filters['start_date']) && $activity['start_date'] !== $filters['start_date']) return false;
            if (isset($filters['is_active']) && $activity['is_active'] != (bool)$filters['is_active']) return false;
            return true;
        }));
    }
}
