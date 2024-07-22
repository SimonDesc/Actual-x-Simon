// Usage examples:

// GET request
apiRequest('GET', '/api/chapters', null, function(response) {
    console.log('Success:', response);
}, function(error) {
    console.log('Error:', error);
});

// POST request
apiRequest('POST', '/api/modules', {
    title: 'Réussir sa vente',
    chapter: '/api/chapters/1'
}, function(response) {
    console.log('Success:', response);
}, function(error) {
    console.log('Error:', error);
});

// PUT request
apiRequest('PUT', '/api/modules/1', {
    title: 'Réussir sa vente (updated)'
}, function(response) {
    console.log('Success:', response);
}, function(error) {
    console.log('Error:', error);
});

// DELETE request
apiRequest('DELETE', '/api/modules/1', null, function(response) {
    console.log('Success:', response);
}, function(error) {
    console.log('Error:', error);
});

// PATCH request
apiRequest('PATCH', '/api/modules/1', {
    title: 'Réussir sa vente (patched)'
}, function(response) {
    console.log('Success:', response);
}, function(error) {
    console.log('Error:', error);
});
