export default function getStudentId(htmlID, onChangeCallback) {
	const $studentSelect = $(htmlID);
	let selectedStudentId = $studentSelect.val();

	$studentSelect.on('change', function () {
		selectedStudentId = $(this).val();
		if (onChangeCallback) {
			onChangeCallback(selectedStudentId);
		}
	});

	return selectedStudentId;
}
