
export default function showSelectedStudent() {
	$(document).ready(function () {
		const selectedStudent = $('#student-select');
		
		loadStudentInfos(selectedStudent);

		selectedStudent.on('change', function () {
			loadStudentInfos(selectedStudent);
		});
	});

}

function loadStudentInfos(studentSelected) {
	var selectedOption = studentSelected.find('option:selected');
	
	$('#student-nummodules').text(selectedOption.data('nummodules'));
	$('#student-numchapters').text(selectedOption.data('numchapters'));
	$('#student-id').text(selectedOption.val());
	$('#student-username').text(selectedOption.data('username'));
	$('#student-firstname').text(selectedOption.data('firstname'));
	$('#student-lastname').text(selectedOption.data('lastname'));
	$('#student-email').text(selectedOption.data('email'));
	$('#student-phone-number').text(selectedOption.data('phone-number'));
	$('#student-manager').text(selectedOption.data('manager') ? selectedOption.data('manager') : 'sans manager');

}


