<div class="categories">
	<h1 class="text-center my-4">Categories Page</h1>
	<div class="row">
		<div class="col-12">
			<a class="btn btn-primary btn-sm mb-2" href="/admin/categories/create"><i class="fa fa-plus m-1"></i>Add New Category</a>
		</div>
		<div class="col-12">
			<div class="card custom-card">
				<div class="card-header">
					Manage Categories
				</div>
				<div class="card-body">
					<?php
						foreach ($categories as $cat) {
							echo '<div class="cat_section">';
								echo '<h5 class="mb-0">' . $cat->Catname . '</h5>';
								echo '<div class="full-view">';
									echo '<p>';
										if (empty($cat->Catdesc)) {
											echo 'There Is Not Any Description About This Category';
										} else {
											echo $cat->Catdesc;
										}
									echo '</p>';
									if ($cat->CatVisible == 0) {
										echo '<span class="visible">Hidden</span>';
									}
									if ($cat->CatComment == 0) {
										echo '<span class="comment">Comments Disabled</span>';
									}					
									if ($cat->CatAds == 0) {
										echo '<span class="ads">Ads Disabled</span>';
									}
								echo '</div>';		
							echo '</div>';

						}
					?>
				</div>
			</div>
		</div>
	</div>
</div>