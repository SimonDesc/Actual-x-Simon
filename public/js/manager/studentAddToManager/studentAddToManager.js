import apiRequest from '../../utils/apiRequest.js';
import getManagerId from '../utils/getManagerId.js';
import getStudentId from '../utils/getStudentId.js';
import loadStudentList from '../utils/getStudentListByManager.js';

export default function addStudentToManager() {
	$(document).on('click', '.add-icon-to-manager', function () {
		const studentId = getStudentId('#student-select');
		const managerId = getManagerId('#manager-select');
		addManager(studentId, managerId);
		loadStudentList(managerId);
	});
}

function addManager(studentId, managerId) {
	apiRequest('PATCH', `/api/students/${studentId}`, {
		manager: `/api/managers/${managerId}`
	}, function (response) {
		console.log('Success:', response);
	}, function (error) {
		console.log('Error:', error);
	});
}
