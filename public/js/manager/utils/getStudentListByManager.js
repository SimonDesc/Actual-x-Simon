import apiRequest from '../../utils/apiRequest.js';

// Retrieve the Student list by manager
export default function loadStudentList(managerId) {
    apiRequest('GET', `/api/students/by-manager/${managerId}`, null, function (response) {
        const $studentList = $('#student-list');
        $studentList.empty();
        console.log('Success:', response);

        $.each(response, function (index, student) {
            const listItem = `
                <li data-id="${student.id}" class="flex w-96 justify-between p-2 border-b border-gray-200">
                    <span>${student.firstname} ${student.lastname}</span>
                    <i class="fas fa-trash delete-icon text-red-500 cursor-pointer" data-id="${student.id}"></i>
                </li>`;
            $studentList.append(listItem);
        });

    }, function (error) {
        console.log('Error:', error);
    });
}
