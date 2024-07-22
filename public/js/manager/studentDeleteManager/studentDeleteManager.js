import getManagerId from '../utils/getManagerId.js';
import apiRequest from '../../utils/apiRequest.js';
import loadStudentList from '../utils/getStudentListByManager.js';

export default function deleteStudentManager() {
	$(document).on('click', '.delete-icon', function () {
		const studentId = $(this).data('id');
		const managerId = getManagerId('#manager-select');

		updateManagerId(studentId, function () {
			loadStudentList(managerId);
		});
	});
}


function updateManagerId(studentId, callback) {
	apiRequest('PATCH', `/api/students/${studentId}`, {
		manager: null
	}, function (response) {
		console.log('Success:', response);
		if (callback) callback();
	}, function (error) {
		console.log('Error:', error);
	});
}
