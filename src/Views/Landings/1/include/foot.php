	<!-- <script defer="" src="assets/js/bundle.js"></script> -->
	<script defer="" src="assets/js/bundle.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/script.js"></script>

	<script type="text/javascript">
		function getAccentColor(imgSrc, callback) {
		    let image = new Image();
		    image.crossOrigin = "Anonymous";

		    image.onload = function() {
		        try {
		            let canvas = document.createElement('canvas');
		            canvas.width = image.width;
		            canvas.height = image.height;

		            let ctx = canvas.getContext('2d');
		            ctx.drawImage(image, 0, 0, canvas.width, canvas.height);

		            let imageData = ctx.getImageData(0, 0, canvas.width, canvas.height).data;
		            let colorCounts = {};
		            let mostFrequentColor;
		            let maxCount = 0;

		            for (let i = 0; i < imageData.length; i += 4) {
		                // Ignore white and close-to-white pixels
		                if (imageData[i] > 240 && imageData[i+1] > 240 && imageData[i+2] > 240) {
		                    continue;
		                }

		                let key = [imageData[i], imageData[i+1], imageData[i+2]].join(",");
		                colorCounts[key] = (colorCounts[key] || 0) + 1;
		                if(colorCounts[key] > maxCount) {
		                    maxCount = colorCounts[key];
		                    mostFrequentColor = key;
		                }
		            }

		            callback(mostFrequentColor);
		        } catch (error) {
		            console.error("Error processing the image:", error);
		        }
		    };

		    image.onerror = function() {
		        console.error("Error loading the image:", imgSrc);
		    }

		    image.src = imgSrc;
		}

		document.addEventListener('DOMContentLoaded', function() {
		    let imagePath = 'include/image.php?image=<?= $previewData['logo']; ?>';
		    getAccentColor(imagePath, function(accentColor) {
		        
		        // $.ajax({
		        //     type: 'POST',
		        //     url: 'config/set_color.php',
		        //     data: { color: accentColor },
		        //     success: function(data) {
		        //         console.log("Accent Color:", accentColor);
		        //     },
		        //     error: function(jqXHR, textStatus, errorThrown) {
		        //         alert(errorThrown);
		        //     }
		        // });

		        let accentColor_no_commas = accentColor.replace(/,/g, ' ');

		        let accentColor_1 = "rgb("+accentColor+")";
		        let accentColor_09 = "rgba("+accentColor+",0.9)";
		        let accentColor_08 = "rgba("+accentColor+",0.8)";
		        let accentColor_07 = "rgba("+accentColor+",0.7)";
		        let accentColor_06 = "rgba("+accentColor+",0.6)";
		        let accentColor_05 = "rgba("+accentColor+",0.5)";

		        let loader_color = '#344D75';

		        let main_old_color = '112 131 245';

		        let bg_gradient_1_1 = '#8EA5FE';
		        let bg_gradient_1_2 = '#BEB3FD';
		        let bg_gradient_1_3 = '#90D1FF';

		        let bg_gradient_2_1 = '#FF8FE8';
		        let bg_gradient_2_2 = '#FFC960';

		        let svg_stop_color_pink_1 = document.getElementsByClassName('svg_stop_color_pink-1');
				let svg_stop_color_pink_2 = document.getElementsByClassName('svg_stop_color_pink-2');

				let svg_stop_color_blue_1 = document.getElementsByClassName('svg_stop_color_blue-1');
				let svg_stop_color_blue_2 = document.getElementsByClassName('svg_stop_color_blue-2');
				let svg_stop_color_blue_3 = document.getElementsByClassName('svg_stop_color_blue-3');


		        let stylesheet = document.getElementById('style');
		        if (!stylesheet || !stylesheet.href) {
		            console.error("Stylesheet element or its href is missing");
		            return;
		        }

		        fetch(stylesheet.href)
		            .then(response => {
		                if (!response.ok) {
		                    throw new Error('Network response was not ok');
		                }
		                return response.text();
		            })
		            .then(css => {
		                let modifiedCSS = css.replace(new RegExp(main_old_color, 'g'), accentColor_no_commas);

		                modifiedCSS = modifiedCSS.replace(new RegExp(loader_color, 'g'), accentColor_1);

		                modifiedCSS = modifiedCSS.replace(new RegExp(bg_gradient_1_1, 'g'), accentColor_1);
		                modifiedCSS = modifiedCSS.replace(new RegExp(bg_gradient_1_2, 'g'), accentColor_07);
		                modifiedCSS = modifiedCSS.replace(new RegExp(bg_gradient_1_3, 'g'), accentColor_09);

		                modifiedCSS = modifiedCSS.replace(new RegExp(bg_gradient_2_1, 'g'), accentColor_09);
		                modifiedCSS = modifiedCSS.replace(new RegExp(bg_gradient_2_2, 'g'), accentColor_07);

		                for (let i = 0; i < svg_stop_color_pink_1.length; i++) {
		                    svg_stop_color_pink_1[i].setAttribute('stop-color', accentColor_06);
		                }
		                for (let i = 0; i < svg_stop_color_pink_2.length; i++) {
		                    svg_stop_color_pink_2[i].setAttribute('stop-color', accentColor_1);
		                }

		                for (let i = 0; i < svg_stop_color_blue_1.length; i++) {
		                    svg_stop_color_blue_1[i].setAttribute('stop-color', accentColor_06);
		                }
		                for (let i = 0; i < svg_stop_color_blue_2.length; i++) {
		                    svg_stop_color_blue_2[i].setAttribute('stop-color', accentColor_09);
		                }
		                for (let i = 0; i < svg_stop_color_blue_3.length; i++) {
		                    svg_stop_color_blue_3[i].setAttribute('stop-color', accentColor_05);
		                }


		                let styleElement = document.createElement('style');
		                styleElement.innerHTML = modifiedCSS;
		                document.head.appendChild(styleElement);
		            })
		            .catch(error => {
		                console.error("Error fetching or processing the stylesheet:", error);
		            });
		    });
		});
	</script>
</body>
</html>