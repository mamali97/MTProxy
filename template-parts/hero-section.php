<div class="relative h-[600px] text-white slider">
    <?php
    $slides = [];
    for ($i = 1; $i <= 3; $i++) {
        $slides[] = [
            'image' => get_theme_mod("hero_slide_{$i}_image", 'https://readdy.ai/api/search-image?query=colorful%20children%20clothing%20with%20cute%20cartoon%20characters%20and%20patterns,%20washable%20fabric%20markers,%20playful%20kids%20fashion%20design,%20bright%20colors,%20simple%20clean%20white%20background,%20studio%20photography,%20commercial%20product%20shot&width=1200&height=600&seq=hero' . $i . '&orientation=landscape'),
            'title' => get_theme_mod("hero_slide_{$i}_title", "Slide {$i} Title"),
            'subtitle' => get_theme_mod("hero_slide_{$i}_subtitle", "Slide {$i} Subtitle"),
        ];
    }
    ?>
    <img src="<?php echo esc_url($slides[0]['image']); ?>" alt="Slide Image" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black/30"></div>
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center">
        <h1 class="text-5xl font-bold"><?php echo esc_html($slides[0]['title']); ?></h1>
        <p class="text-xl mt-4"><?php echo esc_html($slides[0]['subtitle']); ?></p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const slides = <?php echo json_encode($slides); ?>;
        let currentSlide = 0;
        const slider = document.querySelector('.slider');

        if (slider) {
            setInterval(() => {
                currentSlide = (currentSlide + 1) % slides.length;
                updateSlide(slider, slides[currentSlide]);
            }, 5000);
        }

        function updateSlide(slider, slide) {
            const image = slider.querySelector('img');
            const title = slider.querySelector('h1');
            const subtitle = slider.querySelector('p');

            if (image) image.src = slide.image;
            if (title) title.textContent = slide.title;
            if (subtitle) subtitle.textContent = slide.subtitle;
        }
    });
</script>
