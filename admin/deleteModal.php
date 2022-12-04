<div id="modal" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
					Delete
					<?php echo $post['title'] ?>
				</h5>
				<button
					id="close-button-modal"
					type="button"
					class="btn-close"
					data-bs-dismiss="modal"
					aria-label="Close"
				></button>
			</div>
			<div class="modal-body">
				<p>Want to delete?</p>
			</div>
			<div class="modal-footer">
				<form action="delete.php" method="get">
					<input type="hidden" name="method" value="delete" />
					<input type="hidden" name="id" value="<?php echo $post['id'] ?>" />
					<button
						id="modal-close"
						type="button"
						class="btn btn-secondary"
						data-bs-dismiss="modal"
					>
						Close
					</button>
					<button id="modal-delete-button" type="submit" class="btn btn-danger">
						Delete
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	const deleteButton = document.getElementById('delete-button');
	const modal = document.getElementById('modal');
	const modalCross = document.getElementById('close-button-modal');

	const modalClose = document.getElementById('modal-close');
	deleteButton.onclick = function () {
		modal.style.display = 'block';
	};

	modalClose.onclick = function () {
		modal.style.display = 'none';
	};

	modalCross.onclick = function () {
		modal.style.display = 'none';
	};

	window.onclick = function (event) {
		if (event.target == modal) {
			modal.style.display = 'none';
		}
	};
</script>
