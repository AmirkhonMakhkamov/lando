<div class="">
	<div class="d-flex align-items-center justify-content-center" style="height: calc(100vh - 110px);">
		<div class="container">

			<!-- <div class="">
				<spline-viewer
				url="https://prod.spline.design/3q6-RCJjhT7h22XU/scene.splinecode">
				</spline-viewer>
			</div> -->

			<div class="row mb-5">
				<div class="col-lg-8 col-md-9 col-12 mx-auto">
					<div class="bg-white border border-light rounded-5 p-2">

						<form method="POST" id="generateForm" onsubmit="generateForm();">
							<div class="d-flex align-items-center">
								
								<div id="store-indicator" class="ps-3">
									<i class="lni lni-search font-25 d-block"></i>
								</div>

								<input
									type="url"
									name="url"
									id="url"


									onkeydown="toggleStoreIcon($(this));" 
									onkeyup="toggleStoreIcon($(this));" 
									onpaste="toggleStoreIcon($(this));"

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
		</div>
	</div>
</div>


<div class="modal fade" id="loader-G" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loader-G_Label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content border-0 rounded-5">
			<div class="modal-body">
				<div class="p-4">
					<div class="text-center">
						<div id="contentGenerating">
							<h2 class="font-50 fw-600 text-primary">
								<span>Hang tight.</span>
								<img
								src="public/assets/img/home/top-text-frame.svg"
								class="text-frame"
								/>
							</h2>

							<p class="mt-3 font-20 fw-400 text-muted">
								We are creating your landing page...
							</p>

							<div class="border border-primary bw-2 mt-4 p-1 rounded-5">
								<div class="progress bg-none rounded-5" style="height: 40px;">
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
		</div>
	</div>
</div>

<!-- <script src="../../public/assets/js/robot.js"></script> -->