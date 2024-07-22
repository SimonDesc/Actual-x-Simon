export default function getChapterAndModuleByStudent() {
	$('#student-select').on('change', function () {
		const selectedStudentId = $(this).val();

		$('#chapter-and-module-list > li').each(function () {
			const chapterItem = $(this);
			let hasVisibleModules = false;

			chapterItem.find('ul > li').each(function () {
				const moduleItem = $(this);
				if (moduleItem.data('student-id') == selectedStudentId) {
					moduleItem.show();
					hasVisibleModules = true;
				} else {
					moduleItem.hide();
				}
			});

			if (hasVisibleModules) {
				chapterItem.show();
			} else {
				chapterItem.hide();
			}
		});
	});

	$('#student-select').trigger('change');
}
