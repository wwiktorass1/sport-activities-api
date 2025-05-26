<?php
echo "🧪 Running Sport Activities API tests...\n";

// 1. Test: All activities
$response = file_get_contents("http://host.docker.internal:8000");
$data = json_decode($response, true);
assert($data['status'] === 'success');
assert(is_array($data['data']));
echo "✅ All activities test passed\n";

// 2. Test: Filter by is_active=1
$response = file_get_contents("http://host.docker.internal:8000?is_active=1");
$data = json_decode($response, true);
assert($data['status'] === 'success');
foreach ($data['data'] as $activity) {
    assert($activity['is_active'] === true);
}
echo "✅ is_active=1 filter test passed\n";

// 3. Test: Invalid price range
$response = file_get_contents("http://host.docker.internal:8000?price_from=50&price_to=30");
$data = json_decode($response, true);
assert($data['status'] === 'error');
assert($data['message'] === 'Parametras price_from negali būti didesnis už price_to');
echo "✅ Invalid price range test passed\n";

// 4. Test: Filter by title contains "joga"
$response = file_get_contents("http://host.docker.internal:8000?title=joga");
$data = json_decode($response, true);
assert($data['status'] === 'success');
foreach ($data['data'] as $activity) {
    assert(stripos($activity['title'], 'joga') !== false);
}
echo "✅ Title filter test passed\n";

echo "🎉 All tests completed successfully.\n";
