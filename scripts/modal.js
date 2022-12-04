const modalButton = document.getElementById('modal-button');
const modal = document.getElementById('modal');
const modalClose = document.getElementById('close-button-modal');

modalButton.onclick = function () {
	modal.style.display = 'block';
};

modalClose.onclick = function () {
	modal.style.display = 'none';
};

window.onclick = function (event) {
	if (event.target == modal) {
		modal.style.display = 'none';
	}
};
