const searchInput = document.querySelector('.search-input');

searchInput.addEventListener('input', function (e) {
	const posts = document.querySelectorAll('.post');
	const value = e.target.value.toLowerCase();
	posts.forEach(function (post) {
		const title = post.querySelector('.post-title').textContent.toLowerCase();
		const body = post.querySelector('.post-body').textContent.toLowerCase();
		if (title.indexOf(value) > -1 || body.indexOf(value) > -1) {
			post.style.display = 'block';
		} else {
			post.style.display = 'none';
		}
	});
});
