import getStudentId from '../utils/getStudentId.js';
import getModuleId from '../utils/getModuleId.js';
import apiRequest from '../../utils/apiRequest.js';

export default function addModuleToStudent() {
	$(document).on('click', '.add-icon-to-module', function () {
		const studentId = getStudentId('#student-select-module');
		const moduleId = getModuleId('#module-select');

		console.log("module: ", moduleId, "student : ", studentId);
		addModule(studentId, moduleId);
	});
}

function addModule(studentId, moduleId) {
	// POST request
	apiRequest('POST', '/api/student_modules', {
		module: `/api/modules/${moduleId}`,
		student: `/api/students/${studentId}`
	}, function (response) {
		console.log('Success:', response);
	}, function (error) {
		console.log('Error:', error);
	});
}


