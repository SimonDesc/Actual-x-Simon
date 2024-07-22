import apiRequest from "../../utils/apiRequest.js";
import getStudentId from "../utils/getStudentId.js";
import { loadFavorite } from "../favoriteByStudent/favoriteByStudent.js";

export default function addStudentToFavorite() {
	$(document).on('click', '.add-favorite-to-student', function () {
		const studentId = getStudentId('#student-select');
		const moduleId = $(this).data('id');

		const favoriteId = getFavoriteId(moduleId);
		if (isModuleInFavorites(moduleId)) {
			deleteFavorite(favoriteId, studentId);
			$(this).removeClass('fa-solid fa-heart')
			.addClass('fa-regular fa-heart add-favorite-to-student');
		} else {
			addFavorite(studentId, moduleId);
			$(this).removeClass('fa-regular fa-heart add-favorite-to-student')
			.addClass('fa-solid fa-heart add-favorite-to-student');
		}

		loadFavorite(studentId);
	});
}

function getFavoriteId(moduleId) {
    const $favoriteList = $('#favorite-list');
    let favoriteId = null;

    $favoriteList.find('li').each(function() {
        if ($(this).data('module') === moduleId) {
            favoriteId = $(this).data('id');
            return false;
        }
    });

    return favoriteId;
}

function deleteFavorite(favoriteId, studentId) {
    apiRequest('DELETE', `/api/favorites/${favoriteId}`, null, function(response) {
        console.log('Success:', response);
    }, function(error) {
        console.log('Error lors de la suppression:', error);
    });
}


function addFavorite(studentId, moduleId) {
	apiRequest('POST', `/api/favorites`, {
		student: `/api/students/${studentId}`,
		module: `/api/modules/${moduleId}`
	}, function (response) {
		console.log('Success:', response);
	}, function (error) {
		console.log('Error:', error);
	});
}


function isModuleInFavorites(moduleId) {
	const $favoriteList = $('#favorite-list');
	let exists = false;

	$favoriteList.find('li').each(function () {
		if ($(this).data('module') === moduleId) {
			exists = true;
			return false;
		}
	});

	return exists;
}
