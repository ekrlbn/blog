const btnGroup = document.querySelectorAll('.btn-group');

const form = document.querySelector('#order');

btnGroup.forEach((btn) => {
	btn.onclick = function () {
		form.submit();
	};
});
