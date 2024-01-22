<header class="bg-white position-fixed top-0 start-0 w-100 border-bottom border-light">
	<div class="container-fluid h-100">
		<div class="d-flex justify-content-between align-items-center h-100 px-2 py-auto">
			<div class="d-flex align-items-center">
				<button
					type="button"
					class="d-lg-none d-md-none btn hover border-0 p-2 me-2"
					data-bs-toggle="offcanvas"
					data-bs-target="#offcanvas-menu"
					aria-controls="offcanvas-menu"
				>
					<i class="lni lni-menu font-21 d-block"></i>
				</button>

				<h4>
					<a href="javascript:;" onclick="dashboard();" class="text-primary fw-600 position-relative">
						LANDO
						<small class="position-absolute font-11 fw-700 ms-1 bg-success py-1 px-2 d-inline-block rounded-5 text-primary">
							AI
						</small>
					</a>
				</h4>
			</div>

			<div class="d-flex align-items-center header-active-bar">
				<button
					type="button"
					class="btn hover border-0 p-2 me-2 d-lg-block d-md-block d-none"
					data-bs-toggle="tooltip"
					data-bs-placement="bottom"
					data-bs-title="Support & Help"
					data-target="support"
					onclick="support();"
				>
					<i class="lni lni-headphone font-20 d-block"></i>
				</button>

				<button
					type="button"
					class="btn hover border-0 p-2 me-2 d-lg-block d-md-block d-none"
					data-bs-toggle="tooltip"
					data-bs-placement="bottom"
					data-bs-title="FAQ"
					data-target="faq"
					onclick="faq();"
				>
					<i class="lni lni-question-circle font-20 d-block"></i>
				</button>

				<button
					type="button"
					class="btn hover border-0 p-2 me-3 d-lg-block d-md-block d-none"

					data-target="notifications"

					data-bs-toggle="offcanvas"
					data-bs-target="#notificationsOffcanvas"
					aria-controls="notificationsOffcanvas"
				>
					<i class="lni lni-alarm font-20 d-block"></i>
				</button>
				<button
					type="button"
					class="btn hover border-0 p-2 me-3 d-lg-none d-md-none"

					data-target="notifications"

					data-bs-toggle="offcanvas"
					data-bs-target="#notificationsOffcanvas-mobile"
					aria-controls="notificationsOffcanvas-mobile"
				>
					<i class="lni lni-alarm font-20 d-block"></i>
				</button>
				
				<div class="dropdown">
					<div
					class="d-flex align-items-center pointer"
					data-bs-toggle="dropdown"
					aria-expanded="false"
					>
						<img
							src="dashboard/storage/uploads/avatar/<?= htmlspecialchars($row['avatar_user'], ENT_QUOTES, 'UTF-8') ?>"
							width="30"
							height="30"
							class="rounded-circle border border-light shadow-sm d-block"
						>
						<span class="d-block ms-2">
							<?= htmlspecialchars($row['fname_user'], ENT_QUOTES, 'UTF-8') ?>
						</span>
					</div>

					<ul class="dropdown-menu mt-1 dropdown-menu-start border-light shadow-sm">
					  	<button
					  		type="button"
					  		class="btn hover border-0 w-100 rounded-0 d-flex align-items-center mb-1"
					  		onclick="settings();"
					  	>
					  		<i class="lni lni-cog font-18 d-block me-2"></i>
					  		<span class="d-block">Settings</span>
					  	</button>

					  	<button
					  		type="button"
					  		class="btn hover border-0 w-100 rounded-0 d-flex align-items-center"
					  		onclick="logOut();"
					  	>
					  		<i class="lni lni-exit font-18 d-block me-2"></i>
					  		<span class="d-block">Log Out</span>
					  	</button>
					</ul>
				</div>


			</div>
		</div>
	</div>
</header>

<div class="container-fluid">
	<div class="row">