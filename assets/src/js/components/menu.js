/* ---- Menu Burger Button ---- */

var menuBtn = document.querySelector(".header__menu-btn");
var menuBtnBurger = document.querySelector(".header__menu-btn__burger");
var nav = document.querySelector(".header__menu_nav");
var menuNav = document.querySelector(".header__menu_nav__items");
var menuNavItem = document.querySelectorAll(".header__menu_nav__items__item");

var showMenu = false;

menuBtn.addEventListener("click", function () {
	if (showMenu === false) {
		menuBtnBurger.classList.add("open");
		nav.classList.add("open");
		menuNav.classList.add("open");
		for (var i = 0; i < menuNavItem.length; i++) {
			menuNavItem[i].classList.add("open");
		}
		document.body.setAttribute("style", "overflow: hidden");
		showMenu = true;
	} else {
		menuBtnBurger.classList.remove("open");
		nav.classList.remove("open");
		menuNav.classList.remove("open");
		for (var i = 0; i < menuNavItem.length; i++) {
			menuNavItem[i].classList.remove("open");
		}
		document.body.removeAttribute("style");
		showMenu = false;
	}
});
