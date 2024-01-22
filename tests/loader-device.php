<style type="text/css">
	#loader-container{
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100vh;
		background-color: #fff;
		z-index: 999!important;
	}
	.loader {
	  position: absolute;
	  top: 50%;
	  left: 50%;
	  z-index: 10;
	  width: 160px;
	  height: 100px;
	  margin-left: -80px;
	  margin-top: -50px;
	  border-radius: 5px;
	  background: #4640de;
	  animation: dot1_ 3s cubic-bezier(0.55,0.3,0.24,0.99) infinite;
	}

	.loader:nth-child(2) {
	  z-index: 11;
	  width: 150px;
	  height: 90px;
	  margin-top: -45px;
	  margin-left: -75px;
	  border-radius: 3px;
	  background: rgb(200, 198, 252);
	  animation-name: dot2_;
	}

	.loader:nth-child(3) {
	  z-index: 12;
	  width: 40px;
	  height: 20px;
	  margin-top: 50px;
	  margin-left: -20px;
	  border-radius: 0 0 5px 5px;
	  background: #ccfd52;
	  animation-name: dot3_;
	}

	@keyframes dot1_ {
	  3%,97% {
	    width: 160px;
	    height: 100px;
	    margin-top: -50px;
	    margin-left: -80px;
	  }

	  30%,36% {
	    width: 80px;
	    height: 120px;
	    margin-top: -60px;
	    margin-left: -40px;
	  }

	  63%,69% {
	    width: 40px;
	    height: 80px;
	    margin-top: -40px;
	    margin-left: -20px;
	  }
	}

	@keyframes dot2_ {
	  3%,97% {
	    height: 90px;
	    width: 150px;
	    margin-left: -75px;
	    margin-top: -45px;
	  }

	  30%,36% {
	    width: 70px;
	    height: 96px;
	    margin-left: -35px;
	    margin-top: -48px;
	  }

	  63%,69% {
	    width: 32px;
	    height: 60px;
	    margin-left: -16px;
	    margin-top: -30px;
	  }
	}

	@keyframes dot3_ {
	  3%,97% {
	    height: 20px;
	    width: 40px;
	    margin-left: -20px;
	    margin-top: 50px;
	  }

	  30%,36% {
	    width: 8px;
	    height: 8px;
	    margin-left: -5px;
	    margin-top: 49px;
	    border-radius: 8px;
	  }

	  63%,69% {
	    width: 16px;
	    height: 4px;
	    margin-left: -8px;
	    margin-top: -37px;
	    border-radius: 10px;
	  }
	}
</style>

<div id="loader-container">
	<div class="loader"></div>
	<div class="loader"></div>
	<div class="loader"></div>
</div>