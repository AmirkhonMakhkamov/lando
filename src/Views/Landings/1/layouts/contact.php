<section id="contact" class="pt-[100px] pb-[110px]">
	<div class="container">
		<div class="wow fadeInUp mx-auto mb-10 max-w-[690px] text-center" data-wow-delay=".2s">
			<h2
			class="mb-4 text-3xl font-bold text-black dark:text-white sm:text-4xl md:text-[44px] md:leading-tight">
				Let's Stay Connected
			</h2>
			<p class="text-base text-body">
				Building a bond with our users is crucial. Whether it's addressing your concerns, understanding your needs, or getting a sense of your preferences, we're eager to connect.
			</p>
		</div>
	</div>

	<div class="container">
		<div class="wow fadeInUp mx-auto w-full max-w-[925px] rounded-lg bg-[#F8FAFB] px-8 py-10 shadow-card dark:bg-[#15182B] dark:shadow-card-dark sm:px-10" data-wow-delay=".3s">
			<form method="POST" id="contactForm">

				<input type="hidden" required name="lid" value="<?= $landingId ?>">

				<div class="-mx-[22px] flex flex-wrap">
					<div class="w-full px-[22px] md:w-1/2">
						<div class="mb-8">
							<input
							type="text"
							name="name"
							placeholder="Your name"
							maxlength="255"
							required
							class="w-full rounded border border-stroke bg-white py-4 px-[30px] text-base text-body outline-none focus:border-primary dark:border-[#34374A] dark:bg-[#2A2E44] dark:focus:border-primary">
						</div>
					</div>

					<div class="w-full px-[22px] md:w-1/2">
						<div class="mb-8">
							<input
							type="email"
							name="email"
							placeholder="Email"
							maxlength="255"
							required
							class="w-full rounded border border-stroke bg-white py-4 px-[30px] text-base text-body outline-none focus:border-primary dark:border-[#34374A] dark:bg-[#2A2E44] dark:focus:border-primary">
						</div>
					</div>

					<div class="w-full px-[22px]">
						<div class="mb-8">
							<textarea
							rows="4"
							name="message"
							placeholder="Message"
							maxlength="255"
							required
							class="w-full rounded border border-stroke bg-white py-4 px-[30px] text-base text-body outline-none focus:border-primary dark:border-[#34374A] dark:bg-[#2A2E44] dark:focus:border-primary"></textarea>
						</div>
					</div>

					<div class="w-full px-[22px]">
						<div class="text-center">
							<!-- <p class="mb-5 text-center text-base text-body">
								By clicking contact us button, you agree our terms and
							policy,
							</p> -->

							<button
							type="submit"
							class="inline-block rounded-md bg-primary py-[14px] px-11 text-base font-medium text-white hover:bg-opacity-90">
								Contact Us
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>