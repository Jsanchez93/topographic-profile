const formData = document.getElementById('form-data');
const addData = document.getElementById('add-data');
addData.addEventListener('click', addRow);

function addRow(event){
	event.preventDefault();
	let newRow = document.getElementById('dataRow').cloneNode(true);	
	newRow.removeAttribute('id');
	newRow.querySelectorAll('[name="location[]"]')[0].value = '';
	newRow.querySelectorAll('[name="elevation[]"]')[0].value = '';
	newRow.querySelectorAll('[name="NE[]"]')[0].value = '';
	newRow.querySelectorAll('[name="depth[]"]')[0].value = '';
	formData.appendChild(newRow);
}