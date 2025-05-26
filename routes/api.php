<?php
header('Content-Type: application/json');

$data = [
  [
    'id' => 1,
    'title' => 'Joga parke',
    'type' => 'joga',
    'location' => 'Vilnius',
    'price' => 15,
    'is_active' => true
  ],
  [
    'id' => 2,
    'title' => 'Pilates namuose',
    'type' => 'pilates',
    'location' => 'Kaunas',
    'price' => 25,
    'is_active' => false
  ]
];

$type = $_GET['type'] ?? null;
$location = $_GET['location'] ?? null;

$filtered = array_filter($data, function ($activity) use ($type, $location) {
    if ($type && $activity['type'] !== $type) return false;
    if ($location && $activity['location'] !== $location) return false;
    return true;
});

echo json_encode(array_values($filtered));
