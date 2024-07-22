import apiRequest from '../../utils/apiRequest.js';

/**
 * Deletes a module from the document.
 * 
 * This function attaches an event listener to delete icons within the document. When a delete icon is clicked,
 * it triggers an API request to delete the module with the specified ID. Upon successful deletion, the function
 * removes the module's HTML element from the document. If the deletion fails, it logs the error to the console.
 */
export default function deleteModule() {
	$(document).on('click', '.delete-icon', function () {
		const id = $(this).data('id');
		const moduleItem = $(`li[data-id="${id}"]`);

		apiRequest('DELETE', `/api/modules/${id}`, null, function (response) {
			console.log('Delete success:', response);
			// Delete the DOM element after success
			moduleItem.remove();
		}, function (error) {
			console.log('Error:', error);
		});
	});

}
