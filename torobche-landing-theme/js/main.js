document.addEventListener('DOMContentLoaded', function() {
    const ageSelect = document.getElementById('age-select');
    const priceLabel = document.getElementById('price-label'); // Get the whole paragraph
    const priceDisplay = document.getElementById('product-price'); // The span for the price number
    const selectedAgeField = document.getElementById('selected_age_field');
    const finalPriceField = document.getElementById('final_price_field');

    function updatePriceAndHiddenFields() {
        if (ageSelect && ageSelect.value !== "") { // Check if a valid age is selected
            const selectedOption = ageSelect.options[ageSelect.selectedIndex];
            const price = selectedOption.getAttribute('data-price');
            const age = selectedOption.value;

            if (price && priceDisplay && priceLabel) {
                const formattedPrice = parseInt(price).toLocaleString('fa-IR');
                priceDisplay.textContent = formattedPrice;
                priceLabel.style.display = 'block'; // Show the price label
            }
            if (selectedAgeField) {
                selectedAgeField.value = age;
            }
            if (finalPriceField) {
                finalPriceField.value = price;
            }
        } else if (priceLabel) {
            // If no valid age is selected (e.g. placeholder is selected), hide the price
            priceLabel.style.display = 'none';
        }
    }

    if (ageSelect) {
        // Add a default placeholder option that is not a valid age
        const placeholderOption = document.createElement('option');
        placeholderOption.value = "";
        placeholderOption.textContent = "لطفا سن را انتخاب کنید...";
        placeholderOption.selected = true;
        placeholderOption.disabled = true; // Optional: make it not selectable again after choosing another
        ageSelect.prepend(placeholderOption);

        ageSelect.addEventListener('change', updatePriceAndHiddenFields);
        // Initialize on load - price will be hidden initially due to placeholder
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
