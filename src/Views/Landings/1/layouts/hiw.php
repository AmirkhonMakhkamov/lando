<?php if (!empty($previewData['hiw'][0])): ?>
	<section id="work-process" class="relative z-10 pt-[110px]">
		<div class="container">
			<div class="wow fadeInUp mx-auto mb-14 max-w-[690px] text-center lg:mb-[70px]">
				<h2 class="mb-4 text-3xl font-bold text-black dark:text-white sm:text-4xl md:text-[44px] md:leading-tight">
					How it Works?
				</h2>
			</div>
		</div>

		<div class="container max-w-[1390px]">
			<div class="rounded-2xl bg-white px-5 pt-14 pb-14 shadow-card dark:bg-dark dark:shadow-card-dark md:pb-1 lg:pt-20 lg:pb-5 xl:px-10">
				<div class="-mx-4 flex flex-wrap justify-center">

					<?php foreach ($previewData['hiw'] as $hiw): ?>
						<div class="w-full px-4 md:w-1/2 lg:w-1/3">
							<div class="wow fadeInUp group mx-auto mb-[60px] max-w-[310px] text-center">
								<div class="mx-auto mb-8 flex h-[90px] w-[90px] items-center justify-center rounded-3xl bg-gray text-primary duration-300 group-hover:bg-primary group-hover:text-white dark:bg-[#2A2E44] dark:text-white dark:group-hover:bg-primary">
									<i class="<?= $hiw['icon']; ?> text-[30px] check-icon"></i>
								</div>

								<h3 class="mb-4 text-xl font-semibold text-black dark:text-white sm:text-[22px] xl:text-[26px]">
									<?= $hiw['title']; ?>
								</h3>
								<p class="text-base text-body">
									<?= $hiw['description']; ?>
								</p>
							</div>
						</div>
					<?php endforeach; ?>

				</div>
			</div>
		</div>

		<div class="absolute -top-28 left-0 -z-10 hidden md:block">
			<svg width="632" height="1179" viewBox="0 0 632 1179" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g opacity="0.25" filter="url(#filter0_f_38_24)">
					<circle cx="42.5" cy="589.5" r="329.5" fill="url(#paint0_linear_38_24)"></circle>
				</g>

				<defs>
					<filter id="filter0_f_38_24" x="-547" y="0" width="1179" height="1179" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
						<feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
						<feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"></feBlend>
						<feGaussianBlur stdDeviation="130" result="effect1_foregroundBlur_38_24"></feGaussianBlur>
					</filter>

					<linearGradient id="paint0_linear_38_24" x1="-366.218" y1="919" x2="451.176" y2="349.901" gradientUnits="userSpaceOnUse">
						<stop stop-color="#8EA5FE" class="svg_stop_color_blue-1"></stop>
						<stop offset="0.541667" stop-color="#BEB3FD" class="svg_stop_color_blue-2"></stop>
						<stop offset="1" stop-color="#90D1FF" class="svg_stop_color_blue-3"></stop>
					</linearGradient>
				</defs>
			</svg>
		</div>

		<div class="absolute right-0 top-20 -z-10">
			<svg width="637" height="1277" viewBox="0 0 637 1277" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g opacity="0.2" filter="url(#filter0_f_38_23)">
					<circle cx="638.5" cy="638.5" r="388.5" fill="url(#paint0_linear_38_23)"></circle>
				</g>

				<defs>
					<filter id="filter0_f_38_23" x="0" y="0" width="1277" height="1277" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
						<feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
						<feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"></feBlend>
						<feGaussianBlur stdDeviation="125" result="effect1_foregroundBlur_38_23"></feGaussianBlur>
					</filter>

					<linearGradient id="paint0_linear_38_23" x1="250" y1="250" x2="1168.59" y2="782.957" gradientUnits="userSpaceOnUse">
						<stop stop-color="#FF8FE8" class="svg_stop_color_pink-1"></stop>
						<stop offset="1" stop-color="#FFC960" class="svg_stop_color_pink-2"></stop>
					</linearGradient>
				</defs>
			</svg>
		</div>
	</section>
<?php endif; ?>