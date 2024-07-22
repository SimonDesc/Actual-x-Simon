import editModule from './moduleEdit/moduleEdit.js';
import deleteModule from './moduleDelete/moduleDelete.js';

$(document).ready(function () {
	console.log("<Admin> scripts successfully loaded ");
	editModule();
	deleteModule();
});
