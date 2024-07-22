export default function getModuleId(htmlID, onChangeCallback) {
	const $moduleSelect = $(htmlID);
	let selectedModuleId = $moduleSelect.val();

	$moduleSelect.on('change', function () {
		selectedModuleId = $(this).val();
		if (onChangeCallback) {
			onChangeCallback(selectedModuleId);
		}
	});

	return selectedModuleId;
}
