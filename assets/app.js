/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// Handle mobile menu listeners
document.getElementById("mobile-menu-toggle").addEventListener("click", toggleMobileMenu);
document.getElementById("mobile-menu-close").addEventListener("click", toggleMobileMenu);

// Handle theme listeners
document.getElementById("theme-toggle").addEventListener("click", toggleDarkMode);

// Handle initiating theme
function initTheme() {
    if (localStorage.theme === "dark" || (!("theme" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
        localStorage.theme = "dark";
        document.documentElement.classList.add("dark");
    } else {
        localStorage.theme = "light";
        document.documentElement.classList.remove("dark");
    }
}
initTheme();


function toggleDarkMode() {

    const icon = document.getElementById("theme-toggle")

    if (localStorage.theme === "dark") {
        localStorage.theme = "light";
    } else {
        localStorage.theme = "dark";
    }

    document.documentElement.classList.toggle("dark");
    icon.classList.toggle("bxs-sun")
    icon.classList.toggle("bxs-moon")

}

function toggleMobileMenu() {

    const menu = document.getElementById("mobile-menu");

    menu.classList.toggle("opacity-100")
    menu.classList.toggle("pointer-events-auto")

}