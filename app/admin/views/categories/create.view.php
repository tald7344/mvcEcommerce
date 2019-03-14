<div class="categories">
	<h1 class="text-center my-4">Add Category</h1>
	<form class="col-md-6 m-auto" method="post">
		<div class="form-group row">
		  <label class="col-2 col-form-label">Name</label>
		  <div class="col-10">
		    <input class="form-control" type="text" name="Catname" placeholder="Type Category Name">
		  </div>
		</div>
		<div class="form-group row">			
			<label class="col-2 col-form-label">Description</label>
			<div class="col-10">
				<input class="form-control" type="text" name="Catdesc" placeholder="Type Category Description">
			</div>
		</div>
		<!--Start Visibility Field-->
		<div class="row">
			<label class="col-2 col-form-label">Visiblity</label>
			<div class="btn-group col-10" data-toggle="buttons">
				<label class="btn btn-success active">						
					<input type="radio" name="CatVisible" value="1" autocomplete="off" checked>On
				</label>
				<label class="btn btn-success">
					<input type="radio" name="CatVisible" value="0" autocomplete="off">Off
				</label>
			</div>
		</div>
		<!--Start Comments Field-->
		<div class="row">
			<label class="col-2 col-form-label">Comments</label>
			<div class="btn-group col-10" data-toggle="buttons">
				<label class="btn btn-success active">						
					<input type="radio" name="CatComment" value="1" autocomplete="off" checked>On
				</label>
				<label class="btn btn-success">
					<input type="radio" name="CatComment" value="0" autocomplete="off">Off
				</label>
			</div>
		</div>
		<!--Start Advertise Field-->
		<div class="form-group row">
			<label class="col-2 col-form-label">Advertise</label>
			<div class="btn-group col-10" data-toggle="buttons">
				<label class="btn btn-success active">						
					<input type="radio" name="CatAds" value="1" autocomplete="off" checked>On
				</label>
				<label class="btn btn-success">
					<input type="radio" name="CatAds" value="0" autocomplete="off">Off
				</label>
			</div>
		</div>
		<div class="form-group offset-md-2 mt-3">
			<input class="btn btn-primary" type="submit" name="save" value="Add Category">
		</div>
	</form>
</div>