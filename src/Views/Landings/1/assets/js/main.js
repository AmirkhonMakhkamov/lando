document.addEventListener('DOMContentLoaded', function() {
    document.addEventListener('gesturestart', function(event) {
        event.preventDefault();
    });

    document.addEventListener('contextmenu', function(event) {
        event.preventDefault();
    });

    var elems = document.getElementsByClassName('check-icon');

    for (var i = 0; i < elems.length; i++) {
        var contentBefore = window.getComputedStyle(elems[i], '::before').getPropertyValue('content');

        if (contentBefore === 'none') {
            elems[i].classList.add('bxs-widget');
        }
    }

});

window.addEventListener('load', function() {
  var loadingRing = document.querySelector('.lds-ring');

  loadingRing.style.transition = 'opacity 500ms';
  loadingRing.style.opacity = '0';

  setTimeout(function() {
    loadingRing.remove();
  }, 500);
});

// ==== for menu scroll
const pageLink = document.querySelectorAll(".menu-scroll");

pageLink.forEach((elem) => {
  elem.addEventListener("click", (e) => {
    e.preventDefault();
    document.querySelector(elem.getAttribute("href")).scrollIntoView({
      behavior: "smooth",
      offsetTop: 1 - 60,
    });
  });
});

// section menu active
function onScroll(event) {
  const sections = document.querySelectorAll(".menu-scroll");
  const scrollPos =
    window.pageYOffset ||
    document.documentElement.scrollTop ||
    document.body.scrollTop;

  for (let i = 0; i < sections.length; i++) {
    const currLink = sections[i];
    const val = currLink.getAttribute("href");
    const refElement = document.querySelector(val);
    if (refElement) {
      const scrollTopMinus = scrollPos + 73;
      if (
        refElement.offsetTop <= scrollTopMinus &&
        refElement.offsetTop + refElement.offsetHeight > scrollTopMinus
      ) {
        document.querySelector(".menu-scroll").classList.remove("active");
        currLink.classList.add("active");
      } else {
        currLink.classList.remove("active");
      }
    }
  }

  var header = document.querySelector('.navbar');
  var footer = document.querySelector('.footer-bottom');
  
  if (window.pageYOffset >= 100) {
      header.classList.add('sticky-navbar');
  } else {
      header.classList.remove('sticky-navbar');
  }

  var backToTop = document.querySelector('.back-to-top');
  
  var footerTop = footer.getBoundingClientRect().top;
  var windowHeight = window.innerHeight;
  var defaultBottomPosition = 20;

  if (footerTop < windowHeight) {
      let overlap = windowHeight - footerTop + defaultBottomPosition;
      backToTop.style.bottom = `${overlap}px`;
  } else if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
      backToTop.style.display = 'flex';
      backToTop.style.bottom = `${defaultBottomPosition}px`;
  } else {
      backToTop.style.display = 'none';
  }
}

window.document.addEventListener("scroll", onScroll);

function initAcc(elem, option) {
  document.addEventListener("click", function (e) {
    if (!e.target.matches(elem + " .faq-btn")) return;
    else {
      if (!e.target.parentElement.classList.contains("active")) {
        if (option == true) {
          var elementList = document.querySelectorAll(elem + " .faq");
          Array.prototype.forEach.call(elementList, function (e) {
            e.classList.remove("active");
          });
        }
        e.target.parentElement.classList.add("active");
      } else {
        e.target.parentElement.classList.remove("active");
      }
    }
  });
}

//activate accordion function
initAcc(".faqs", true);


// function typeWriter(id, txt, speed, i = 0) {
//   if (i < txt.length) {
//     document.getElementById(id).innerHTML += txt.charAt(i);
//     i++;
//     setTimeout(() => typeWriter(id, txt, speed, i), speed);
//   }
// }

// function typeWriter(id, txt, speed, i = 0) {
//   return new Promise((resolve) => {
//     if (i < txt.length) {
//       document.getElementById(id).innerHTML += txt.charAt(i);
//       i++;
//       setTimeout(() => {
//         typeWriter(id, txt, speed, i).then(resolve);
//       }, speed);
//     } else {
//       resolve();
//     }
//   });
// }