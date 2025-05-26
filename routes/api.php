<?php
header('Content-Type: application/json');

function errorResponse(string $message): void {
    echo json_encode([
        'status' => 'error',
        'message' => $message,
        'data' => []
    ]);
    exit;
}

$data = [
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
    ],
    [
        'id' => 3,
        'title' => 'Futbolo treniruotė',
        'type' => 'futbolas',
        'group_type' => 'Grupė',
        'location' => 'Klaipėda',
        'start_date' => '2025-06-01',
        'price' => 10.0,
        'latitude' => 55.7033,
        'longitude' => 21.1443,
        'is_active' => true,
    ],
    [
        'id' => 4,
        'title' => 'Krepšinio stovykla',
        'type' => 'krepšinis',
        'group_type' => 'Grupė',
        'location' => 'Panevėžys',
        'start_date' => '2025-06-10',
        'price' => 40.0,
        'latitude' => 55.7333,
        'longitude' => 24.35,
        'is_active' => true,
    ],
    [
        'id' => 5,
        'title' => 'Teniso pamoka',
        'type' => 'tenisas',
        'group_type' => 'Individualiai',
        'location' => 'Šiauliai',
        'start_date' => '2025-06-05',
        'price' => 30.0,
        'latitude' => 55.9333,
        'longitude' => 23.3167,
        'is_active' => false,
    ]
];

$filters = [
    'type' => $_GET['type'] ?? null,
    'location' => $_GET['location'] ?? null,
    'title' => $_GET['title'] ?? null,
    'price_from' => $_GET['price_from'] ?? null,
    'price_to' => $_GET['price_to'] ?? null,
    'is_active' => $_GET['is_active'] ?? null
];

// Validacija
if (isset($filters['is_active']) && !in_array($filters['is_active'], ['0', '1'], true)) {
    errorResponse("Netinkama reikšmė parametre is_active (leidžiamos: 0, 1)");
}
if (isset($filters['price_from']) && !is_numeric($filters['price_from'])) {
    errorResponse("Parametras price_from turi būti skaičius");
}
if (isset($filters['price_to']) && !is_numeric($filters['price_to'])) {
    errorResponse("Parametras price_to turi būti skaičius");
}
if (isset($filters['price_from'], $filters['price_to']) &&
    $filters['price_from'] !== null && $filters['price_to'] !== null &&
    $filters['price_from'] > $filters['price_to']) {
    errorResponse("Parametras price_from negali būti didesnis už price_to");
}
if (isset($filters['title']) && trim($filters['title']) === '') {
    errorResponse("Parametras title negali būti tuščias");
}

$filtered = array_filter($data, function ($activity) use ($filters) {
    if ($filters['type'] && $activity['type'] !== $filters['type']) return false;
    if ($filters['location'] && $activity['location'] !== $filters['location']) return false;
    if ($filters['title'] && stripos($activity['title'], $filters['title']) === false) return false;
    if ($filters['price_from'] && $activity['price'] < (float) $filters['price_from']) return false;
    if ($filters['price_to'] && $activity['price'] > (float) $filters['price_to']) return false;
    if ($filters['is_active'] !== null && $activity['is_active'] != (bool) $filters['is_active']) return false;
    return true;
});

echo json_encode([
    'status' => 'success',
    'message' => null,
    'data' => array_values($filtered)
]);
