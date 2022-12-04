const searchInput = document.querySelector('.search-input');

searchInput.addEventListener('input', function (e) {
	const posts = document.querySelectorAll('.post');
	const value = e.target.value.toLowerCase();
	console.log(value);
	posts.forEach(function (post) {
		const title = post.querySelector('.post-title').textContent.toLowerCase();
		if (title.indexOf(value) > -1) {
			post.style.display = 'flex';
		} else {
			post.style.display = 'none';
		}
	});
});
