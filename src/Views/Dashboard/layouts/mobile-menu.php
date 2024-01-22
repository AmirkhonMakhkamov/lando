<div
	class="offcanvas offcanvas-start border-0"
	tabindex="-1" id="offcanvas-menu"
	aria-labelledby="offcanvas-menu-label"
	>
	<div class="offcanvas-header">
	  	<div
	  	class="d-flex align-items-center pointer"
	  	onclick="personal();"
	  	>
	  		<img
	  			src="dashboard/storage/uploads/avatar/<?= htmlspecialchars($row['avatar_user']) ?>"
	  			width="40"
	  			height="40"
	  			class="rounded-circle border border-light shadow-sm d-block"
	  		>
	  		<span class="d-block ms-3 text-capitalize">
	  			<?= $row['fname_user']." ".$row['lname_user'] ?>
	  		</span>
	  	</div>
	  	<div>
	  		<button
	  		type="button"
	  		class="btn btn-light border-0 p-2"
	  		class="btn-close"
	  		data-bs-dismiss="offcanvas"
	  		aria-label="Close"
	  		>
	  			<i class="lni lni-close font-15 d-block"></i>
	  		</button>
	  	</div>
	</div>
	<div class="offcanvas-body">
		<div class="nav-btns">
			<button
			type="button"
			class="btn hover w-100 rounded-2 d-flex align-items-center mb-3"
			data-target="dashboard"
			onclick="dashboard();"
			>
				<i class="lni lni-home font-20 d-block me-3"></i>
				<span class="d-block">
					Dashboard
				</span>
			</button>

			<button
			type="button"
			class="btn hover active w-100 rounded-2 d-flex align-items-center mb-3"
			data-target="landings"
			onclick="landings();"
			>
				<i class="lni lni-grid-alt font-20 d-block me-3"></i>
				<span class="d-block">
					My Landings
				</span>
			</button>

			<button
			type="button"
			class="btn hover w-100 rounded-2 d-flex align-items-center mb-3"
			data-target="billing"
			onclick="billing();"
			>
				<i class="lni lni-wallet font-20 d-block me-3"></i>
				<span class="d-block">
					Billing
				</span>
			</button>

			<button
			type="button"
			class="btn hover w-100 rounded-2 d-flex align-items-center mb-3"
			data-target="settings"
			onclick="settings();"
			>
				<i class="lni lni-cog font-20 d-block me-3"></i>
				<span class="d-block">
					Settings
				</span>
			</button>

			<button
			type="button"
			class="btn hover w-100 rounded-2 d-flex align-items-center mb-3"
			data-target="personal"
			onclick="personal();"
			>
				<i class="lni lni-briefcase font-20 d-block me-3"></i>
				<span class="d-block">
					Personal
				</span>
			</button>

			<hr class="o1">

			<button
			type="button"
			class="btn hover w-100 rounded-2 d-flex align-items-center mb-3"
			data-target="notifications"
			onclick="notifications();"
			>
				<i class="lni lni-alarm font-20 d-block me-3"></i>
				<span class="d-block">
					Notifications
				</span>
			</button>

			<button
			type="button"
			class="btn hover w-100 rounded-2 d-flex align-items-center mb-3"
			data-target="support"
			onclick="support();"
			>
				<i class="lni lni-support font-20 d-block me-3"></i>
				<span class="d-block">
					Support & Help
				</span>
			</button>

			<button
			type="button"
			class="btn hover w-100 rounded-2 d-flex align-items-center mb-3"
			data-target="faq"
			onclick="faq();"
			>
				<i class="lni lni-question-circle font-20 d-block me-3"></i>
				<span class="d-block">
					FAQ
				</span>
			</button>
			
		</div>

		<div class="position-absolute start-0 bottom-0 w-100 pb-4 px-3">
			<button
				type="button"
				class="btn btn-success text-dark w-100 rounded-3 fw-500 d-flex align-items-center justify-content-center"
				data-target="new_landing"
				onclick="new_landing();"
			>
				<img
				src="public/assets/img/home/generate-icon.svg"
				class="d-block"
				/>
				<span class="d-block">
					New Landing
				</span>
			</button>
		</div>
	</div>
</div>