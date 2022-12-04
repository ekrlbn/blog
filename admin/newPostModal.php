<?php 
 $sql = "SELECT * FROM categories";
 $result = $conn->query($sql);
 $categories = [];
 if($result->num_rows > 0){
     while($row = $result->fetch_assoc()){
         $categories[] = $row;
     }
 }

 $conn->close();
?>
<script src="../scripts/newCategory.js" defer></script>
<div id="modal" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">New Post</h5>
				<button
					id="close-button-modal"
					type="button"
					class="btn-close"
					data-bs-dismiss="modal"
					aria-label="Close"
				></button>
			</div>
			<div class="modal-body">
				<form action="/admin/newPostForm.php" method="post" enctype="multipart/form-data">
					<div class="mb-3">
						<label for="post-title" class="form-label">Title</label>
						<input name="title" type="text" class="form-control" id="post-title" required />
					</div>
					<div class="mb-3">
						<label for="post-content" class="form-label">Content</label>
						<textarea
							class="form-control"
							id="post-content"
							rows="5"
							name="content"
						></textarea>
					</div>

					<div class="mb-3">
						<label for="formFile" class="form-label">Upload Image</label>
						<input
							name="image"
							class="form-control"
							type="file"
							id="formFile"
						/>
					</div>
					<div class="mb-3">
                        <div class="category">
                            <label for="category" class="form-label">Category</label>
                            <select name="category_id" id="category" class="form-select">
                              <option>none</option>
                              <option value="0">new category</option>
                              <?php foreach($categories as $category): ?>
                                <option value="<?php echo $category['id'] ?>" <?php if($category['id'] == $post['category_id']) echo 'selected' ?>><?php echo $category['name'] ?></option>
                              <?php endforeach; ?>
                            </select>
							<div class="new-category" id="new-category">
								<label for="new-category-name" class="form-label">Category Name</label>
								<input type="text" name="category_name" class="form-control" id="new-category-name">
							</div>
                          </div>
                    </div>
					<button type="submit" class="btn btn-outline-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
