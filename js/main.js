document.addEventListener('DOMContentLoaded', function () {
    let currentSlide = 0;
    const slides = [
        {
            image: "https://readdy.ai/api/search-image?query=colorful%20children%20clothing%20with%20cute%20cartoon%20characters%20and%20patterns,%20washable%20fabric%20markers,%20playful%20kids%20fashion%20design,%20bright%20colors,%20simple%20clean%20white%20background,%20studio%20photography,%20commercial%20product%20shot&width=1200&height=600&seq=hero1&orientation=landscape",
            title: "لباس‌های رنگی برای کودکان",
            subtitle: "طرح‌های زیبا برای رنگ‌آمیزی و بازی"
        },
        {
            image: "https://readdy.ai/api/search-image?query=happy%20children%20playing%20and%20coloring%20on%20clothes%20with%20washable%20markers,%20creative%20art%20activity,%20colorful%20drawing%20on%20fabric,%20kids%20having%20fun,%20bright%20playful%20atmosphere,%20clean%20simple%20background&width=1200&height=600&seq=hero2&orientation=landscape",
            title: "رنگ‌آمیزی و شستشو",
            subtitle: "بارها رنگ‌آمیزی کنید و بشویید"
        },
        {
            image: "https://readdy.ai/api/search-image?query=collection%20of%20children%20t-shirts%20with%20cute%20cartoon%20designs%20for%20boys%20and%20girls,%20colorful%20patterns,%20washable%20fabric%20art,%20modern%20kids%20fashion,%20clean%20white%20background,%20product%20photography&width=1200&height=600&seq=hero3&orientation=landscape",
            title: "برای پسران و دختران",
            subtitle: "طرح‌های متنوع و جذاب"
        }
    ];

    const slider = document.querySelector('.slider');

    if (slider) {
        setInterval(() => {
            currentSlide = (currentSlide + 1) % slides.length;
            updateSlide(slider, slides[currentSlide]);
        }, 5000);
    }

    let coloringProgress = 0;
    const coloringFlower = document.querySelector('.coloring-flower');

    if (coloringFlower) {
        const circles = coloringFlower.querySelectorAll('circle[fill^="transparent"]');
        const lines = coloringFlower.querySelectorAll('line[stroke^="#333"]');

        setInterval(() => {
            coloringProgress = (coloringProgress + 2) % 100;
            updateColoring(circles, lines, coloringProgress);
        }, 80);
    }
});

function updateSlide(slider, slide) {
    const image = slider.querySelector('img');
    const title = slider.querySelector('h1');
    const subtitle = slider.querySelector('p');

    if (image) image.src = slide.image;
    if (title) title.textContent = slide.title;
    if (subtitle) subtitle.textContent = slide.subtitle;
}

function updateColoring(circles, lines, progress) {
    circles.forEach((circle, index) => {
        if (progress > (index + 1) * 15) {
            const colors = ["#ff69b4", "#ffb6c1", "#dda0dd"];
            circle.style.fill = colors[index % colors.length];
        }
    });
    lines.forEach(line => {
        if (progress > 30) {
            line.style.stroke = "#32cd32";
        }
    });
}

const menuToggle = document.getElementById('menu-toggle');
const mobileMenu = document.getElementById('mobile-menu');

if (menuToggle && mobileMenu) {
    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
}
