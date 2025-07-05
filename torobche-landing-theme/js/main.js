document.addEventListener('DOMContentLoaded', function() {
    const ageSelect = document.getElementById('age-select');
    const priceDisplay = document.getElementById('product-price');
    const selectedAgeField = document.getElementById('selected_age_field');
    const finalPriceField = document.getElementById('final_price_field');

    function updatePriceAndHiddenFields() {
        if (ageSelect) {
            const selectedOption = ageSelect.options[ageSelect.selectedIndex];
            const price = selectedOption.getAttribute('data-price');
            const age = selectedOption.value;

            if (price && priceDisplay) {
                const formattedPrice = parseInt(price).toLocaleString('fa-IR');
                priceDisplay.textContent = formattedPrice;
            }
            if (selectedAgeField) {
                selectedAgeField.value = age;
            }
            if (finalPriceField) {
                finalPriceField.value = price;
            }
        }
    }

    if (ageSelect) {
        ageSelect.addEventListener('change', updatePriceAndHiddenFields);
        // Initialize on load
        updatePriceAndHiddenFields();
    }

    // Smooth scroll for anchor links (e.g., Hero CTA to Order Form)
    const smoothScrollLinks = document.querySelectorAll('a[href^="#"]');
    for (let link of smoothScrollLinks) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    }
});
