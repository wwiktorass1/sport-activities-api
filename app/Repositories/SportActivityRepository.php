<?php

namespace App\Repositories;

class SportActivityRepository
{
    public function getAll(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Joga parke',
                'type' => 'joga',
                'group_type' => 'Grupė',
                'location' => 'Vilnius',
                'start_date' => '2025-05-22',
                'price' => 15.0,
                'latitude' => 54.6872,
                'longitude' => 25.2797,
                'is_active' => true,
            ],
            [
                'id' => 2,
                'title' => 'Pilates namuose',
                'type' => 'pilates',
                'group_type' => 'Individualiai',
                'location' => 'Kaunas',
                'start_date' => '2025-05-23',
                'price' => 25.0,
                'latitude' => 54.9,
                'longitude' => 23.9,
                'is_active' => false,
            ]
        ];
    }
}
