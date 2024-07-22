import getStudentByManager from './studentGetByManager/studentGetByManager.js';
import addStudentToManager from './studentAddToManager/studentAddToManager.js';
import deleteStudentManager from './studentDeleteManager/studentDeleteManager.js';
import addModuleToStudent from './studentAddModule/studentAddModule.js'

$(document).ready(function () {
	console.log("<Manager> scripts successfully loaded ");
	getStudentByManager();
	addStudentToManager();
	deleteStudentManager();
	addModuleToStudent();
});
