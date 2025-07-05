document.addEventListener('DOMContentLoaded', function() {
    const ageSelect = document.getElementById('age-select');
    const priceLabel = document.getElementById('price-label'); // Get the whole paragraph
    const priceDisplay = document.getElementById('product-price'); // The span for the price number
    const selectedAgeField = document.getElementById('selected_age_field');
    const finalPriceField = document.getElementById('final_price_field');

    function updatePriceAndHiddenFields() {
        if (ageSelect && ageSelect.value !== "" && ageSelect.value !== null) {
            const selectedAge = parseInt(ageSelect.value);
            const basePrice = parseInt(ageSelect.getAttribute('data-base-price'));
            const priceIncrease = parseInt(ageSelect.getAttribute('data-price-increase'));
            const baseAge = 2; // The age for which the base price is set (e.g., 2 years)

            let calculatedPrice = basePrice;
            if (selectedAge > baseAge) {
                calculatedPrice += (selectedAge - baseAge) * priceIncrease;
            }

            // console.log('Selected Age:', selectedAge, 'Base Price:', basePrice, 'Increase:', priceIncrease, 'Calculated Price:', calculatedPrice);

            if (!isNaN(calculatedPrice) && priceDisplay && priceLabel) {
                const formattedPrice = calculatedPrice.toLocaleString('fa-IR');
                priceDisplay.textContent = formattedPrice;
                priceLabel.style.display = 'block';
            }
            if (selectedAgeField) {
                selectedAgeField.value = selectedAge;
            }
            if (finalPriceField) {
                finalPriceField.value = calculatedPrice;
            }
        } else if (priceLabel) {
            priceLabel.style.display = 'none';
            if(selectedAgeField) selectedAgeField.value = "";
            if(finalPriceField) finalPriceField.value = "";
        }
    }

    if (ageSelect) {
        // Check if placeholder already exists from PHP (it shouldn't based on current PHP)
        // Or if the first option is not the placeholder we want to add
        let placeholderExists = false;
        if (ageSelect.options.length > 0 && ageSelect.options[0].value === "") {
            placeholderExists = true;
        }

        if (!placeholderExists) {
            const placeholderOption = document.createElement('option');
            placeholderOption.value = "";
            placeholderOption.textContent = "لطفا سن را انتخاب کنید...";
            placeholderOption.disabled = true;
            placeholderOption.selected = true;
            ageSelect.insertBefore(placeholderOption, ageSelect.firstChild);
        } else {
            // If for some reason a blank value option is there, make sure it's selected.
            ageSelect.value = "";
        }

        ageSelect.addEventListener('change', updatePriceAndHiddenFields);
        updatePriceAndHiddenFields(); // Initialize on load
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
