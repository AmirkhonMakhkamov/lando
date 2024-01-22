<div class="offcanvas offcanvas-end border-0"
	tabindex="-1" id="offcanvas-workspace-details"
	aria-labelledby="offcanvas-workspace-details-label"
	>
	<div class="offcanvas-header">
	  	<h5 class="offcanvas-title" id="offcanvas-workspace-details-label">Settings</h5>
	  	<div>
	  		<button
	  			type="button"
	  			class="btn btn-light border-0 py-1 px-4 fw-500 me-2"
	  			onclick="save_to_publish($('#previewPublish-btn'));">
	  		  	Save
	  		</button>
	  		<button
	  			type="button"
	  			class="btn btn-light border-0 p-2"
	  			class="btn-close"
	  			data-bs-dismiss="offcanvas"
	  			aria-label="Close">
	  			<i class="lni lni-close font-15 d-block"></i>
	  		</button>
	  	</div>
	</div>
	<div class="offcanvas-body">
		<div class="mb-4">
			<div class="d-flex align-items-center mb-2">
				<div class="line"></div>
				<span class="px-3 o3 text-nowrap">Download links</span>
				<div class="line"></div>
			</div>

			<div class="form-floating mb-2">
			  	<input
			  	type="url"
			  	class="form-control border-0 bg-light bg-light-subtle"
			  	id="appStore_url"
			  	placeholder="App Store"
			  	value="<?= $previewDetails['appStore_url']; ?>">
			  	<label for="appStore_url" class="font-15">App Store</label>
			</div>

			<div class="form-floating mb-2">
			  	<input
			  	type="url"
			  	class="form-control border-0 bg-light bg-light-subtle"
			  	id="googlePlay_url"
			  	placeholder="Google Play"
			  	value="<?= $previewDetails['googlePlay_url']; ?>">
			  	<label for="googlePlay_url" class="font-15">Google Play</label>
			</div>
		</div>

		<div class="mb-4">
			<div class="d-flex align-items-center mb-2">
				<div class="line"></div>
				<span class="px-3 o3 text-nowrap">Page Settings</span>
				<div class="line"></div>
			</div>

			<div class="form-floating mb-2">
			  	<input
			  	type="text"
			  	class="form-control border-0 bg-light bg-light-subtle"
			  	id="page_title"
			  	placeholder="Customer Support Email"
			  	value="<?= $previewDetails['page_title']; ?>">
			  	<label for="page_title" class="font-15">Page Title</label>
			</div>

			<div class="form-floating mb-2">
			  	<textarea
			  	class="form-control border-0 bg-light bg-light-subtle"
			  	placeholder="Page Description"
			  	id="page_description"
			  	style="min-height: 100px"><?= $previewDetails['page_description']; ?>.</textarea>
			  	<label for="page_description" class="font-15">Page Description</label>
			</div>
		</div>

		<!-- <div class="mb-4">
			<div class="d-flex align-items-center">
				<div class="line"></div>
				<span class="px-3 o3 text-nowrap">Support</span>
				<div class="line"></div>
			</div>
			<div class="mb-1">
				<label class="tex font-13">Customer Support Email</label>
				<input type="email" name="" class="form-control rounded-3 border-0 bg-light bg-light-subtle">
			</div>

			<div class="mb-1">
				<label class="tex font-13">Privacy & Policy Url</label>
				<input type="email" name="" class="form-control rounded-3 border-0 bg-light bg-light-subtle">
			</div>

			<div class="mb-1">
				<label class="tex font-13">Terms and Conditions Url</label>
				<input type="email" name="" class="form-control rounded-3 border-0 bg-light bg-light-subtle">
			</div>
		</div> -->

		<!-- <div class="mb-4">
			<div class="d-flex align-items-center">
				<div class="line"></div>
				<span class="px-3 o3 text-nowrap">Social Media</span>
				<div class="line"></div>
			</div>
			<div class="mb-1">
				<label class="tex font-13">Facebook</label>
				<input type="email" name="" class="form-control rounded-3 border-0 bg-light bg-light-subtle">
			</div>
			<div class="mb-1">
				<label class="tex font-13">Instagram</label>
				<input type="email" name="" class="form-control rounded-3 border-0 bg-light bg-light-subtle">
			</div>
			<div class="mb-1">
				<label class="tex font-13">Twitter</label>
				<input type="email" name="" class="form-control rounded-3 border-0 bg-light bg-light-subtle">
			</div>
			<div class="mb-1">
				<label class="tex font-13">Linkedin</label>
				<input type="email" name="" class="form-control rounded-3 border-0 bg-light bg-light-subtle">
			</div>
		</div> -->

		<!-- <div class="mb-4">
			<div class="d-flex align-items-center">
				<div class="line"></div>
				<span class="px-3 o3 text-nowrap">Custom Code</span>
				<div class="line"></div>
			</div>

			<div class="mb-1">
				<label class="tex font-13">Start of &lt;head&gt; tag</label>
				<textarea class="form-control rounded-3 border-0 bg-light bg-light-subtle" rows="4"></textarea>
			</div>

			<div class="mb-1">
				<label class="tex font-13">End of &lt;head&gt; tag</label>
				<textarea class="form-control rounded-3 border-0 bg-light bg-light-subtle" rows="4"></textarea>
			</div>

			<div class="mb-1">
				<label class="tex font-13">Start of &lt;body&gt; tag</label>
				<textarea class="form-control rounded-3 border-0 bg-light bg-light-subtle" rows="4"></textarea>
			</div>

			<div class="mb-1">
				<label class="tex font-13">End of &lt;body&gt; tag</label>
				<textarea class="form-control rounded-3 border-0 bg-light bg-light-subtle" rows="4"></textarea>
			</div>
		</div> -->
	</div>
</div>