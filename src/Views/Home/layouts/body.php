<section class="pt-5 position-relative w-100">
	<div class="w-100 h-100 text-center container">
		<div class="text-center">
			<h1 class="top-main-txt text-primary">
				AI-Generated
				<img
				src="public/assets/img/home/top-text-frame.svg"
				class="text-frame"
				/>
			</h1>

			<h1 class="top-main-txt text-primary position-relative">
				App Landing Pages
				<img
				src="public/assets/img/home/top-text-frame-2.svg"
				class="text-frame-2"
				/>
			</h1>

			<p class="font-20 text-muted o8 mt-4">
				AI-Generated App Landing Pages.
				Boost downloads with stunning designs.
				Get started now!
			</p>
		</div>

		<div class="mt-5 d-inline-block w-lg-50-sm-100">
			<div class="bg-white box-shadow rounded p-2">

				<form method="POST" id="generateForm<?= $homeController->getLandingProgress() ?>">
					<div class="d-flex align-items-center">
						
						<div id="store-indicator" class="ps-3">
							<i class="lni lni-search font-25 d-block"></i>
						</div>

						<input
							type="url"
							name="url"
							id="url"
							required
							autocomplete="off"
							class="no-style-input w-100 px-3 py-0 font-18"
							placeholder="Insert the link to the App Store or Google Play"
						/>
						<button
							type="submit"
							class="btn btn-success py-2 px-4 d-flex align-items-center"
							style="white-space: nowrap;"
						>
							<img
							src="public/assets/img/home/generate-icon.svg"
							class="d-block"
							/>
							<span class="d-block text-dark">
								Generate
							</span>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="mt-5">
		<spline-viewer
		url="https://prod.spline.design/3q6-RCJjhT7h22XU/scene.splinecode">
		</spline-viewer>
	</div>
</section>

<?= $homeController->showInProgressLanding() ?>

<div class="loader-G p-3" id="loader-G">
	<div class="d-flex align-items-center justify-content-center h-100 w-100">
		<div class="text-center">
			<div id="contentGenerating">
				<h2 class="font-50 fw-600 text-primary">
					Hang tight.
					<img
					src="public/assets/img/home/top-text-frame.svg"
					class="text-frame"
					/>
				</h2>

				<p class="mt-3 font-20 fw-400 text-muted">
					We are creating your landing page...
				</p>

				<div class="border border-primary bw-2 mt-4 p-1 rounded">
					<div class="progress bg-none rounded" style="height: 40px;">
					  	<div
					  		class="progress-bar bg-success"
					  		role="progressbar"
					  		id="loader__generating"
					  		aria-label="Generating Landing Page"
					  		aria-valuenow="0"
					  		aria-valuemin="0"
					  		aria-valuemax="100"
					  		style="width: 0%;"
					  	></div>
					</div>
				</div>
			</div>

			<div class="mt-4" id="errorGenerating" style="display: none;">
				<p class="text-danger fw-500" id="errorGenerating_txt">
					
				</p>

				<button
				type="button"
				class="btn btn-primary px-4 mt-3"
				onclick="closeGeneratingLoading();"
				>
					Close
				</button>
			</div>
		</div>
	</div>
</div>