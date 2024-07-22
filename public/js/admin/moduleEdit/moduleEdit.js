import apiRequest from '../../utils/apiRequest.js';

/**
 * Initializes edit functionality for module titles.
 * 
 * This function sets up event listeners for editing module titles within a document. 
 * It allows users to click on an edit icon to make the title editable, and then automatically 
 * saves the changes when the input field loses focus. It uses an API request to save the updated 
 * title and handles both success and error responses. Additionally, it initializes each module 
 * title with an original value for potential rollback in case of an error.
 */
export default function editModule() {
	$(document).on('click', '.edit-icon', function () {
		const id = $(this).data('id');
		const $titleInput = $(`input[data-id="${id}"]`);
		$titleInput.prop('readonly', false).focus();
	});

	// Save modification when leaving the field
	$(document).on('blur', '.module-title', function () {
		const id = $(this).data('id');
		const newTitle = $(this).val();

		apiRequest('PATCH', `/api/modules/${id}`, { title: newTitle }, function (response) {
			console.log('Update success:', response);
			$(`input[data-id="${id}"]`).prop('readonly', true);
		}, function (error) {
			console.log('Error updating:', error);
			// Réinitialiser la valeur en cas d'erreur
			const originalTitle = $(`input[data-id="${id}"]`).data('original-value');
			$(`input[data-id="${id}"]`).val(originalTitle).prop('readonly', true);
		});
	});

	// Initialize the original values
	$('.module-title').each(function () {
		$(this).data('original-value', $(this).val());
	});

}
