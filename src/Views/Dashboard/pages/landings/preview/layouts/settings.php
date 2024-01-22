<div
	class="offcanvas offcanvas-end border-0"
	tabindex="-1" id="offcanvas-settings"
	aria-labelledby="offcanvas-settings-label"
	>
	<div class="offcanvas-header">
	  	<h5 class="offcanvas-title" id="offcanvas-settings-label">Settings</h5>
	  	<div>
	  		<button
	  			type="submit"
	  			class="btn btn-light border-0 py-1 px-4 fw-500 me-2"
	  			form="previewSettingUpdateForm"
	  			id="previewSettingUpdateBtn"
	  		>
	  		  	Save
	  		</button>
	  		<button
	  			type="button" class="btn btn-light border-0 p-2"
	  			class="btn-close"
	  			data-bs-dismiss="offcanvas"
	  			aria-label="Close"
	  			id="previewSettingUpdateCloseBtn"
	  		>
	  			<i class="lni lni-close font-15 d-block"></i>
	  		</button>
	  	</div>
	</div>
	<div class="offcanvas-body">
		<form method="POST" id="previewSettingUpdateForm">
		<!-- <form method="POST" id="previewSettingUpdateForm1" action="../../../src/endpoints/dashboard/landings/update.php"> -->

			<input type="hidden" name="landingHash" value="<?= $landingHash; ?>">

			<div class="mb-4 border border-light p-3 rounded-3">
				<div class="d-flex align-items-center mb-3">
					<div class="line"></div>
					<span class="px-3 o3 text-nowrap">Domain</span>
					<div class="line"></div>
				</div>

				<div class="mb-3">
					<!-- <div class="input-group rounded-3 border border-light">
					  	<span
					  		class="input-group-text border-0 bg-light bg-light-subtle"
					  		id="basic-addon-internalDomain">
					  		preview.landoai.com/
					  	</span>
					  	<input
					  		type="text"
					  		class="form-control border-0 bg-light bg-light-subtle py-3"
					  		name="internalDomain"
					  		id="internalDomain"
					  		autocomplete="off"
					  		value="<?= $previewDetails['internalDomain']; ?>"
					  		aria-describedby="basic-addon-internalDomain"
					  	>
					</div> -->

					<div class="input-group rounded-5 border border-light">
					    <span
					        class="input-group-text rounded-start-5 border-0 ps-4 pe-1 text-muted  bg-light bg-light-subtle"
					        id="basic-addon-internalDomain">
					        preview.landoai.com/
					    </span>
					    <input
					        type="text"
					        class="form-control text-lowercase border-0 ps-0 rounded-end-5 bg-light no-focus bg-light-subtle py-3"
					        name="internalDomain"
					        id="internalDomain"
					        autocomplete="off"
					        value="<?= $previewDetails['internalDomain']; ?>"
					        aria-describedby="basic-addon-internalDomain"
					    >
					</div>
				</div>

				<div class="d-flex align-items-center">
					<button
						type="button"
						class="btn hover border border-light p-2 me-2"
						data-bs-toggle="tooltip"
						data-bs-placement="bottom"
						data-bs-title="Copy"
						>
						<i class="lni lni-clipboard font-18 d-block"></i>
						<!-- <i class="bx bx-copy font-20 d-block"></i> -->
					</button>

					<button
						type="button"
						class="btn hover border border-light p-2"
						data-bs-toggle="tooltip"
						data-bs-placement="bottom"
						data-bs-title="Open"
						>
						<!-- <i class="lni lni-share font-21 d-block"></i> -->
						<i class='bx bx-link-external font-18 d-block'></i>
					</button>

					<button
						type="button"
						class="btn btn-success text-dark border-0 py-2 px-4 d-flex align-items-center ms-auto me-0"
						>
						<i class="bx bx-link d-block font-18 me-1"></i>
						<p class="font-15">Connect Your Domain</p>
					</button>
				</div>
				
			</div>

			<div class="mb-4 border border-light p-3 rounded-3">
				<div class="d-flex align-items-center mb-3">
					<div class="line"></div>
					<span class="px-3 o3 text-nowrap">Download links</span>
					<div class="line"></div>
				</div>

				<div class="form-floating mb-2">
				  	<input
				  	type="url"
				  	class="form-control border-0 bg-light bg-light-subtle"
				  	name="appStoreUrl"
				  	id="appStoreUrl"
				  	placeholder="App Store"
				  	value="<?= $previewDetails['appStore_url']; ?>">
				  	<label for="appStoreUrl" class="font-15 bg-none">App Store</label>
				</div>

				<div class="form-floating mb-2">
				  	<input
				  	type="url"
				  	class="form-control border-0 bg-light bg-light-subtle"
				  	name="googlePlayUrl"
				  	id="googlePlayUrl"
				  	placeholder="Google Play"
				  	value="<?= $previewDetails['googlePlay_url']; ?>">
				  	<label for="googlePlayUrl" class="font-15">Google Play</label>
				</div>
			</div>

			<div class="mb-4 border border-light p-3 rounded-3">
				<div class="d-flex align-items-center mb-3">
					<div class="line"></div>
					<span class="px-3 o3 text-nowrap">Page Settings</span>
					<div class="line"></div>
				</div>

				<div class="form-floating mb-2">
				  	<input
				  	type="text"
				  	class="form-control border-0 bg-light bg-light-subtle"
				  	name="pageTitle"
				  	id="pageTitle"
				  	placeholder="Customer Support Email"
				  	value="<?= $previewDetails['page_title']; ?>">
				  	<label for="pageTitle" class="font-15">Page Title</label>
				</div>

				<div class="form-floating mb-2">
				  	<textarea
				  	class="form-control border-0 bg-light bg-light-subtle"
				  	placeholder="Page Description"
				  	name="pageDescription"
				  	id="pageDescription"
				  	style="min-height: 100px"><?= $previewDetails['page_description']; ?></textarea>
				  	<label for="pageDescription" class="font-15">Page Description</label>
				</div>
			</div>

			<div class="mb-4 border border-light p-3 rounded-3">
				<div class="d-flex align-items-center mb-3">
					<div class="line"></div>
					<span class="px-3 o3 text-nowrap">Support</span>
					<div class="line"></div>
				</div>

				<div class="form-floating mb-2">
				  	<input
				  	type="url"
				  	class="form-control border-0 bg-light bg-light-subtle"
				  	id="floatingInput-privacy"
				  	placeholder="Privacy & Policy Url"
				  	value="">
				  	<label for="floatingInput-privacy" class="font-15">Privacy & Policy</label>
				</div>

				<div class="form-floating mb-2">
				  	<input
				  	type="url"
				  	class="form-control border-0 bg-light bg-light-subtle"
				  	id="floatingInput-tems"
				  	placeholder="Terms and Conditions Url"
				  	value="">
				  	<label for="floatingInput-tems" class="font-15">Terms and Conditions</label>
				</div>
			</div>

			<div class="mb-4 border border-light p-3 rounded-3">
				<div class="d-flex align-items-center mb-3">
					<div class="line"></div>
					<span class="px-3 o3 text-nowrap">Social Media</span>
					<div class="line"></div>
				</div>
				<div class="mb-2">
					<div class="input-group rounded-3 border-0">
					  	<span
					  		class="input-group-text border-0 bg-light bg-light-subtle"
					  		id="basic-addon-facebook">
					  		<i class="lni lni-facebook-original text-muted o7"></i>
					  	</span>
					  	<input
					  		type="url"
					  		class="form-control border-0 bg-light bg-light-subtle"
					  		aria-describedby="basic-addon-facebook"
					  	>
					</div>
				</div>

				<div class="mb-2">
					<div class="input-group rounded-3 border-0">
					  	<span
					  		class="input-group-text border-0 bg-light bg-light-subtle"
					  		id="basic-addon-instagram">
					  		<i class="lni lni-instagram-original text-muted o7"></i>
					  	</span>
					  	<input
					  		type="url"
					  		class="form-control border-0 bg-light bg-light-subtle"
					  		aria-describedby="basic-addon-instagram"
					  	>
					</div>
				</div>

				<div class="mb-2">
					<div class="input-group rounded-3 border-0">
					  	<span
					  		class="input-group-text border-0 bg-light bg-light-subtle"
					  		id="basic-addon-discord">
					  		<i class="lni lni-discord-alt text-muted o7"></i>
					  	</span>
					  	<input
					  		type="url"
					  		class="form-control border-0 bg-light bg-light-subtle"
					  		aria-describedby="basic-addon-discord"
					  	>
					</div>
				</div>

				<div class="mb-2">
					<div class="input-group rounded-3 border-0">
					  	<span
					  		class="input-group-text border-0 bg-light bg-light-subtle"
					  		id="basic-addon-linkedin">
					  		<i class="lni lni-linkedin-original text-muted o7"></i>
					  	</span>
					  	<input
					  		type="url"
					  		class="form-control border-0 bg-light bg-light-subtle"
					  		aria-describedby="basic-addon-linkedin"
					  	>
					</div>
				</div>

				<div class="mb-2">
					<div class="input-group rounded-3 border-0">
					  	<span
					  		class="input-group-text border-0 bg-light bg-light-subtle"
					  		id="basic-addon-twitter">
					  		<i class="lni lni-twitter-original text-muted o7"></i>
					  	</span>
					  	<input
					  		type="url"
					  		class="form-control border-0 bg-light bg-light-subtle"
					  		aria-describedby="basic-addon-twitter"
					  	>
					</div>
				</div>
			</div>

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
		</form>


		<!-- delete landing btn -->
	</div>
</div>