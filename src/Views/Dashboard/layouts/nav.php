<div
	class="
		col-lg-2
		col-md-2
		col-12
		d-lg-block
		d-md-block
		d-none
		left-nav
		position-fixed
		border-end
		border-light
		pt-55
	"
>
	<div class="py-3 px-1 nav-btns">
		<button
		type="button" class="btn hover w-100 rounded-2 d-flex align-items-center mb-2 py-2"
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
		class="btn hover w-100 rounded-2 d-flex align-items-center mb-2 py-2"
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
		class="btn hover w-100 rounded-2 d-flex align-items-center mb-2 py-2"
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
		class="btn hover w-100 rounded-2 d-flex align-items-center mb-2 py-2"
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
		class="btn hover w-100 rounded-2 d-flex align-items-center mb-2 py-2"
		data-target="personal"
		onclick="personal();"
		>
			<i class="lni lni-briefcase font-20 d-block me-3"></i>
			<span class="d-block">
				Personal
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