<footer>
	<a href="javascript:void(0)" class="back-to-top fixed bottom-8 right-8 left-auto z-[999] hidden h-10 w-10 items-center justify-center rounded-md bg-primary text-white shadow-md duration-300 ease-in-out hover:bg-opacity-80" style="display: flex;">
		<span class="mt-[6px] h-3 w-3 rotate-45 border-t border-l border-white"></span>
	</a>

	<div class="bg-[#F8FAFB] pt-[95px] pb-[46px] dark:bg-[#15182A]">
		<div class="container max-w-[1390px]">
			<div class="-mx-4 flex flex-wrap">
				<div class="w-full px-4 lg:w-5/12 xl:w-5/12">
					<div class="wow fadeInUp mb-11 max-w-[320px]">
						<a href="#home" class="menu-scroll mb-5 inline-block">
							<img
							src="include/image.php?image=<?= $previewData['logo']; ?>"
							alt="logo"
							class="block dark:hidden rounded-md mt-1 mb-1"
							width="70">

							<img
							src="include/image.php?image=<?= $previewData['logo']; ?>"
							alt="logo"
							class="hidden dark:block rounded-md mt-1 mb-1"
							width="70">
						</a>
						<p class="text-base text-body">
							<?= $previewData['subtitle3']; ?>.
						</p>
					</div>
				</div>

				<div class="w-full px-4 lg:w-7/12 xl:w-7/12">
					<div class="-mx-4 flex flex-wrap">
						<div class="w-full px-4 sm:w-1/2 md:w-4/12 lg:w-4/12 mb-5">
							<div class="wow fadeInUp">
								<h3 class="mb-5 text-[22px] font-medium text-black dark:text-white">
									Discover
								</h3>

								<ul class="space-y-[10px]">
									<?php if (!empty($previewData['steps'][0])): ?>
										<li>
											<a href="#about" class="menu-scroll inline-block text-base text-body hover:text-primary">
												About
											</a>
										</li>
									<?php endif; ?>

									<?php if (!empty($previewData['features'][0])): ?>
										<li>
											<a href="#features" class="menu-scroll inline-block text-base text-body hover:text-primary">
												Features
											</a>
										</li>
									<?php endif; ?>

									<?php if (!empty($previewData['hiw'][0])): ?>
										<li>
											<a href="#work-process" class="menu-scroll inline-block text-base text-body hover:text-primary">
												How it works
											</a>
										</li>
									<?php endif; ?>

									<?php if (!empty($previewData['screenshots'][0])): ?>
										<li>
											<a href="#screens" class="menu-scroll inline-block text-base text-body hover:text-primary">
												Screenshots
											</a>
										</li>
									<?php endif; ?>
								</ul>
							</div>
						</div>

						<div class="w-full px-4 sm:w-1/2 md:w-4/12 lg:w-4/12 mb-5">
							<div class="wow fadeInUp">
								<h3 class="mb-5 text-[22px] font-medium text-black dark:text-white">
									Learn More
								</h3>

								<ul class="space-y-[10px]">
									<?php if (!empty($previewData['reviews'][0])): ?>
										<li>
											<a href="#testimonials" class="menu-scroll inline-block text-base text-body hover:text-primary">
												Reviews
											</a>
										</li>
									<?php endif; ?>

									<?php if (!empty($previewData['faq'][0])): ?>
										<li>
											<a href="#faq" class="menu-scroll inline-block text-base text-body hover:text-primary">
												FAQ
											</a>
										</li>
									<?php endif; ?>
								</ul>
							</div>
						</div>

						<div class="w-full px-4 sm:w-1/2 md:w-4/12 lg:w-4/12 mb-5">
							<div class="wow fadeInUp">
								<h3 class="mb-5 text-[22px] font-medium text-black dark:text-white">
									Support
								</h3>

								<ul class="space-y-[10px]">
									<li>
										<a href="#contact" class="menu-scroll inline-block text-base text-body hover:text-primary">
											Contact
										</a>
									</li>

									<li>
										<a href="javascript:void(0)" class="inline-block text-base text-body hover:text-primary">
											Privacy & Policy
										</a>
									</li>

									<li>
										<a href="javascript:void(0)" class="inline-block text-base text-body hover:text-primary">
											Terms and Conditions
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="wow fadeInUp bg-primary py-7 dark:bg-black footer-bottom">
		<div class="container max-w-[1390px]">
			<div class="-mx-3 flex flex-wrap">
				<div class="order-last w-full px-3 lg:order-first lg:w-1/3">
					<p class="mt-4 text-center text-base text-white lg:mt-0 lg:text-left">
						© <?= date('Y') ?> <?= $previewData['title_first']; ?>. All rights reserved
					</p>
				</div>

				<div class="w-full px-3 md:w-1/2 lg:w-1/3">
					<div class="mb-4 flex items-center justify-center space-x-5 md:mb-0 md:justify-start lg:justify-center">
						<a href="javascript:void(0)" class="text-white opacity-70 hover:opacity-100" name="social icon" aria-label="social icon">
							<i class="bx bxl-linkedin text-2xl"></i>
						</a>

						<a href="javascript:void(0)" class="text-white opacity-70 hover:opacity-100" name="social icon" aria-label="social icon">
							<i class="bx bxl-facebook text-2xl"></i>
						</a>

						<a href="javascript:void(0)" class="text-white opacity-70 hover:opacity-100" name="social icon" aria-label="social icon">
							<i class="bx bxl-twitter text-2xl"></i>
						</a>

						<a href="javascript:void(0)" class="text-white opacity-70 hover:opacity-100" name="social icon" aria-label="social icon">
							<i class="bx bxl-instagram text-2xl"></i>
						</a>

						<a href="javascript:void(0)" class="text-white opacity-70 hover:opacity-100" name="social icon" aria-label="social icon">
							<i class="bx bxl-discord-alt text-2xl"></i>
						</a>
					</div>
				</div>

				<div class="w-full px-3 md:w-1/2 lg:w-1/3">
					<div class="flex items-center justify-center space-x-4 sm:space-x-8 md:justify-end lg:justify-end">
						<a href="https://landoai.com" target="_blank" class="text-base text-white">
							Generated by <b>LANDO AI</b>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>