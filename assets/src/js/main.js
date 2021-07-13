import "../sass/main.scss";
import "./components/menu";

// import Swiper JS
import Swiper from "swiper";

// core version + navigation, pagination modules:
import SwiperCore, { Navigation, Thumbs, Lazy, Controller } from "swiper/core";

// configure Swiper to use modules
SwiperCore.use([Navigation, Lazy, Controller]);

// Loop Carousel
if (document.querySelector(".loop__content--carousel")) {
	const slidersCount = document.querySelectorAll(".loop_slider").length;
	const windowWidth = window.innerWidth;
	if (
		(windowWidth >= 640 && slidersCount < 3) ||
		(windowWidth >= 768 && slidersCount < 4)
	) {
		const swiperContainer = document.querySelector(".swiper-container");
		const swiperWrapper = document.querySelector(".swiper-wrapper");
		const buttonprev = document.querySelector(".slider-button-prev");
		const buttonnext = document.querySelector(".slider-button-next");
		swiperContainer.classList.remove("loop__content--carousel");
		swiperWrapper.classList.add("justify-center");
		swiperWrapper.classList.add("space-x-5");
		buttonprev.classList.add("hidden");
		buttonnext.classList.add("hidden");
	}
	window.addEventListener("load", () => {
		let swiper = new Swiper(".loop__content--carousel", {
			slidesPerView: "auto",
			spaceBetween: 20,
			navigation: {
				nextEl: ".slider-button-next",
				prevEl: ".slider-button-prev",
			},
			centeredSlides: true,
			// Responsive breakpoints
			breakpoints: {
				// when window width is >= 640px
				640: {
					centeredSlides: false,
				},
			},
		});
	});
}

// Gallery Carousel

if (document.querySelector(".gallery__content--carousel")) {
	const windowWidth = window.innerWidth;
	const gallerySliders = document.querySelectorAll(".gallery__slider img");
	if (windowWidth >= 768 && windowWidth < 1024) {
		gallerySliders.forEach((img) => {
			if (img.offsetWidth >= 768) {
				console.log(img.offsetWidth);
				console.log(img.offsetHeight);
				const newWidth = windowWidth;
				const newHeight =
					(img.offsetHeight * newWidth) / img.offsetWidth;
				img.style.width = newWidth + "px";
				img.style.height = newHeight + "px";
			}
		});
	}

	//When all document is load.
	window.addEventListener("load", () => {
		// if gallery__content--carousel class exist
		if (document.querySelector(".gallery__content--carousel")) {
			// create swiper slider
			let swiper2 = new Swiper(".gallery__content--carousel", {
				slidesPerView: 1,
				centeredSlides: true,
				spaceBetween: 12,
				navigation: {
					nextEl: ".slider-button-next",
					prevEl: ".slider-button-prev",
				},
				lazy: {
					loadPrevNext: true,
				},
				keyboard: {
					enabled: true,
					onlyInViewport: false,
				},
				// Responsive breakpoints
				breakpoints: {
					// when window width is >= 768px
					768: {
						slidesPerView: "auto",
						lazy: {
							loadPrevNextAmount: 4,
						},
					},
				},
			});
		}
	});
}

//Make allways visible the "hover" in archive Courses and Productions in mobile devises
if (
	document.querySelector(".post-type-archive-courses") ||
	document.querySelector(".post-type-archive-productions")
) {
	if (window.innerWidth <= 1024) {
		const hoverThumbs = document.querySelectorAll(".loop__hover_info");
		hoverThumbs.forEach((thumb) => {
			thumb.style.opacity = 1;
		});
	}
}

// show main content when page is loaded.
const showContent = () => {
	const content = document.querySelector(".site-main");
	const spin = document.querySelector(".loading-spin");
	content.style.opacity = 1;
	spin ? (spin.style.opacity = 0) : "";
};

window.addEventListener("load", () => {
	showContent();
});
