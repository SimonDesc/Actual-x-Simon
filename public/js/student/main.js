import showSelectedStudent from './studentShowSelected/studentShowSelected.js'
import getChapterAndModuleByStudent from './ChapterAndModuleGetByStudent/ChapterAndModuleGetByStudent.js'
import getFavoriteByStudent from './favoriteByStudent/favoriteByStudent.js'
import addStudentToFavorite from './addStudentFavorite/addStudentFavorite.js'

$(document).ready(function () {
	console.log("<Student> scripts successfully loaded ");
	showSelectedStudent();
	getChapterAndModuleByStudent();
	getFavoriteByStudent();
	addStudentToFavorite();
});
