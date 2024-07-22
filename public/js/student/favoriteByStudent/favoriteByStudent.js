import apiRequest from "../../utils/apiRequest.js";
import getStudentId from "../utils/getStudentId.js"

export default function getFavoriteByStudent() {
	const studentId = getStudentId('#student-select', loadFavorite);
	loadFavorite(studentId);
}

export function loadFavorite(studentId) {
	apiRequest('GET', `/api/students/${studentId}/favorites`, null, function (response) {
		const $favoriteList = $('#favorite-list');
		$favoriteList.empty();
		response.forEach(favorite => {
			const listItem = `
                <li data-id="${favorite.id}" data-module="${favorite.module.id}" >${favorite.module.title}
                </li>`;
			$favoriteList.append(listItem);
		});

	}, function (error) {
		console.log('Error:', error);
	});
}
