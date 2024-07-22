/**
 * Function to make API requests using jQuery
 * @param {string} method - The HTTP method (GET, POST, PUT, DELETE)
 * @param {string} url - The API endpoint
 * @param {Object} data - The data to send (for POST and PUT requests)
 * @param {function} successCallback - Function to call on success
 * @param {function} errorCallback - Function to call on error
 */
function apiRequest(method, url, data, successCallback, errorCallback) {
    let contentType = 'application/json; charset=utf-8';
    if (method === 'PATCH') {
        contentType = 'application/merge-patch+json';
	}
	if (method === 'POST') {
        contentType = 'application/ld+json';
    }

    $.ajax({
        url: url,
        type: method,
        data: JSON.stringify(data),
        contentType: contentType,
        dataType: 'json',
        success: successCallback,
        error: errorCallback
    });
}

export default apiRequest;
