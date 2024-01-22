<div class="py-2 px-3 border-bottom border-light d-flex justify-content-between align-items-center bg-white">
	<h6>
		<span onclick="landings();" class="pointer text-primary">
			My Landings</span> / <span>Details
		</span>
	</h6>

	<div class="d-lg-flex d-md-flex d-none align-items-center">
		<button
			type="button"
			class="btn hover border-0 me-1 p-2"
			onclick="desktopFrame();">
			<i class="lni lni-display-alt font-21 d-block"></i>
		</button>

		<button
			type="button"
			class="btn hover border-0 me-1 p-2"
			onclick="tabletFrame();">
			<i class="lni lni-tab font-21 d-block"></i>
		</button>

		<button
			type="button"
			class="btn hover border-0 p-2"
			onclick="mobileFrame();">
			<i class="lni lni-mobile font-21 d-block"></i>
		</button>
	</div>

	<div class="d-flex align-items-center">
		
		<div class="d-lg-flex d-md-flex d-none align-items-center">
			<!-- <button
				type="button"
				class="btn hover border-0 p-2 me-1"
				>
				<i class="lni lni-download font-21 d-block"></i>
			</button> -->

			<button
				type="button"
				class="btn hover border-0 p-2 me-1"
				data-bs-toggle="offcanvas"
				data-bs-target="#offcanvas-contactRequests"
				aria-controls="offcanvas-contactRequests"
				>
				<i class="lni lni-support font-21 d-block"></i>
			</button>

			<button
				type="button"
				class="btn hover border-0 p-2 me-2"
				data-bs-toggle="offcanvas"
				data-bs-target="#offcanvas-settings"
				aria-controls="offcanvas-settings">
				<i class="lni lni-cog font-21 d-block"></i>
			</button>

			
		</div>

		<div class="dropdown">
			<button
				type="button"
				class="btn hover border-0 p-2 me-2 d-block d-lg-none d-md-none"
				data-bs-toggle="dropdown"
				aria-expanded="false"
				>
				<i class="lni lni-more-alt font-21 d-block"></i>
			</button>

			<ul class="dropdown-menu mt-1 dropdown-menu-start border-light shadow-sm">
			  	<button
			  		type="button"
			  		class="btn hover border-0 w-100 rounded-0 d-flex align-items-center mb-1"
			  	>
			  		<i class="lni lni-download font-18 d-block me-2"></i>
			  		<span class="d-block">Download</span>
			  	</button>

			  	<button
			  		type="button"
			  		class="btn hover border-0 w-100 rounded-0 d-flex align-items-center mb-1"
			  		data-bs-toggle="offcanvas"
			  		data-bs-target="#offcanvas-contactRequests"
			  		aria-controls="offcanvas-contactRequests"
			  	>
			  		<i class="lni lni-support font-18 d-block me-2"></i>
			  		<span class="d-block">Requests</span>
			  	</button>

			  	<button
			  		type="button"
			  		class="btn hover border-0 w-100 rounded-0 d-flex align-items-center"
			  		data-bs-toggle="offcanvas"
			  		data-bs-target="#offcanvas-settings"
			  		aria-controls="offcanvas-settings"
			  	>
			  		<i class="lni lni-cog font-18 d-block me-2"></i>
			  		<span class="d-block">Settings</span>
			  	</button>
			</ul>
		</div>

		
		<button
			type="button"
			class="btn btn-success text-dark fw-500 py-1 px-4 d-flex align-items-center"
			id="previewPublish"
			data-status="<?= htmlspecialchars($previewDetails['publishStatus']) ?>"
			data-domain="<?= htmlspecialchars($previewDetails['internalDomain']) ?>"
			data-domain-type="<?= htmlspecialchars($previewDetails['domainStatus']) ?>"
			>
			<span class="text-capitalize"><?= htmlspecialchars($previewDetails['publishStatus']) ?></span>
		</button>
	</div>
</div>
