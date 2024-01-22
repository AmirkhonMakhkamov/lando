<header class="bg-white position-fixed top-0 start-0 w-100">
	<div class="container-fluid">
		<div class="d-flex justify-content-between align-items-center py-lg-2 py-md-2 py-2">
			<h3 class="">
				<a href="./" class="text-primary fw-600 position-relative">
					LANDO
					<small
					class="position-absolute font-13 fw-700 ms-1 bg-success py-1 px-2 d-inline-block rounded text-primary">
						AI
					</small>
				</a>
			</h3>

			<div class="d-lg-flex d-md-flex d-none align-items-center">
				<button
					type="button"
					class="btn hover border-0 me-1 p-2"
					onclick="desktopFrame();">
					<i class="lni lni-display-alt font-23 d-block"></i>
				</button>

				<button
					type="button"
					class="btn hover border-0 me-1 p-2"
					onclick="tabletFrame();">
					<i class="lni lni-tab font-23 d-block"></i>
				</button>

				<button
					type="button"
					class="btn hover border-0 p-2"
					onclick="mobileFrame();">
					<i class="lni lni-mobile font-23 d-block"></i>
				</button>
			</div>

			<div class="d-flex align-items-center">
				<button
					type="button"
					class="btn hover border-0 p-2 me-2"
					data-bs-toggle="offcanvas"
					data-bs-target="#offcanvas-workspace-details"
					aria-controls="offcanvas-workspace-details">
					<i class="lni lni-cog font-23 d-block"></i>
				</button>

				<button
					type="button"
					class="btn btn-success text-dark fw-500 py-1 px-4 d-flex align-items-center"
					onclick="save_to_publish($(this));"
					id="previewPublish-btn"
					>
					<span class="">Save & Go</span>
				</button>
			</div>
		</div>
	</div>
</header>