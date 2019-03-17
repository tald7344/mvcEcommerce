<?php 
	$messages = $this->messenger->getMessages();
	if (!empty($messages)) {
		foreach ($messages as $message) {
			echo '<div class="alert alert-'. $message[1].' text-center hidden p-1 my-4">' . $message[0] . '</div>';
		}
	}
?>	
<div class="categories">
	<h1 class="text-center my-4"><?= $text_category_page?></h1>
	<div class="row">
		<div class="col-12">
			<a class="btn btn-primary btn-sm mb-2" href="/admin/categories/create"><i class="fa fa-plus m-1"></i><?= $add_category?></a>
		</div>
		<div class="col-12">
			<div class="card custom-card">
				<div class="card-header">
					<?= $manage_categories ?>
				</div>
				<div class="card-body">
					<?php
						foreach ($categories as $cat) {
							echo '<div class="cat_section">';
								echo '<div class="control_section">';?>
									<a class="btn btn-danger btn-sm mr-1 px-2 py-0" href="/admin/categories/delete/<?=$cat->Catid?>" onclick="if (!confirm('<?=$alert_delete_msg?>')) return false;"><?=$delete?></a>
									<?php
									echo '<a class="btn btn-primary btn-sm mr-1 px-2 py-0" href="/admin/categories/edit/' . $cat->Catid . '">' . $edit . '</a>';
								echo '</div>';
								echo '<h5 class="mb-0">' . $cat->Catname . '</h5>';
								echo '<div class="full-view">';
									echo '<p>';
										if (empty($cat->Catdesc)) {
											echo $table_empty_desc;
										} else {
											echo $cat->Catdesc;
										}
									echo '</p>';
									if ($cat->CatVisible == 0) {
										echo '<span class="visible">' . $visiblity_disabled . '</span>';
									}
									if ($cat->CatComment == 0) {
										echo '<span class="comment">' . $comments_disabled . '</span>';
									}					
									if ($cat->CatAds == 0) {
										echo '<span class="ads">' . $ads_disabled . '</span>';
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