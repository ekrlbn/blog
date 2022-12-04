const newCategory = document.getElementById('category');

const newCategoryInput = document.getElementById('new-category');

newCategory.addEventListener('change', function () {
	if (newCategory.value === '0') {
		newCategoryInput.style.display = 'block';
	} else {
		newCategoryInput.style.display = 'none';
	}
});
