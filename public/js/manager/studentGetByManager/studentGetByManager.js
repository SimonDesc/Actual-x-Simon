import getManagerId from '../utils/getManagerId.js';
import loadStudentList from '../utils/getStudentListByManager.js';

export default function getStudentByManager() {
	// Get the original ID and pass the callback for change
	const selectedManagerId = getManagerId('#manager-select', loadStudentList);
	// Load the student list for the original manager
	loadStudentList(selectedManagerId);
}


