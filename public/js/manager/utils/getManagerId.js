export default function getManagerId(htmlID, onChangeCallback) {
	const $managerSelect = $(htmlID);
	let selectedManagerId = $managerSelect.val();

	$managerSelect.on('change', function () {
		selectedManagerId = $(this).val();
		if (onChangeCallback) {
			onChangeCallback(selectedManagerId);
		}
	});

	return selectedManagerId;
}
