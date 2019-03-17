<div class="categories">
	<h1 class="text-center my-4"><?= $edit_category_page ?></h1>
	<form class="col-md-6 m-auto" method="post">
		<div class="form-group row">
		  <label class="col-2 col-form-label"><?= $table_name ?></label>
		  <div class="col-10">
		    <input class="form-control" type="text" name="Catname" placeholder="<?= $table_placeholder_name ?>" value="<?= $category->Catname?>">
		  </div>
		</div>
		<div class="form-group row">			
			<label class="col-2 col-form-label"><?= $table_desc ?></label>
			<div class="col-10">
				<input class="form-control" type="text" name="Catdesc" placeholder="<?= $table_placeholder_desc ?>" value="<?= $category->Catdesc ?>">
			</div>
		</div>
		<!--Start Visibility Field-->
		<div class="row">
			<label class="col-2 col-form-label"><?= $table_visible ?></label>
			<div class="btn-group col-10" data-toggle="buttons">
				<label class="btn btn-success <?= $category->CatVisible == 1 ? 'active' : ''?>">
					<input type="radio" name="CatVisible" value="1" autocomplete="off" <?= $category->CatVisible == 1 ? 'checked' : ''?>>On
				</label>
				<label class="btn btn-success <?= $category->CatVisible == 0 ? 'active' : ''?>">
					<input type="radio" name="CatVisible" value="0" autocomplete="off" <?= $category->CatVisible == 0 ? 'checked' : ''?>>Off
				</label>
			</div>
		</div>
		<!--Start Comments Field-->
		<div class="row">
			<label class="col-2 col-form-label"><?= $table_comments?></label>
			<div class="btn-group col-10" data-toggle="buttons">
				<label class="btn btn-success <?= $category->CatComment == 1 ? 'active' : ''?>">
					<input type="radio" name="CatComment" value="1" autocomplete="off" <?= $category->CatComment == 1 ? 'checked' : ''?>>On
				</label>
				<label class="btn btn-success <?= $category->CatComment == 0 ? 'active' : ''?>">
					<input type="radio" name="CatComment" value="0" autocomplete="off" <?= $category->CatComment == 0 ? 'checked' : ''?>>Off
				</label>
			</div>
		</div>
		<!--Start Advertise Field-->
		<div class="form-group row">
			<label class="col-2 col-form-label"><?= $table_ads?></label>
			<div class="btn-group col-10" data-toggle="buttons">
				<label class="btn btn-success <?= $category->CatAds == 1 ? 'active' : ''?>">						
					<input type="radio" name="CatAds" value="1" autocomplete="off" <?= $category->CatAds == 1 ? 'checked' : ''?>>On
				</label>
				<label class="btn btn-success <?= $category->CatAds == 0 ? 'active' : ''?>">
					<input type="radio" name="CatAds" value="0" autocomplete="off" <?= $category->CatAds == 0 ? 'checked' : ''?>>Off
				</label>
			</div>
		</div>
		<div class="form-group custom_submit offset-md-2 mt-3">
			<input class="btn btn-primary" type="submit" name="save" value="<?= $save?>">
		</div>
	</form>
</div>