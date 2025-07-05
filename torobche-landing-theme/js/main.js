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

                // Start fade out the price number
                priceDisplay.style.opacity = '0';

                setTimeout(function() {
                    // Update the text content after fade out
                    priceDisplay.textContent = formattedPrice;
                    // Start fade in the new price number
                    priceDisplay.style.opacity = '1';
                }, 100); // Half of the CSS transition duration (0.2s / 2 = 100ms)

                // Ensure the whole price label <p> is visible
                priceLabel.classList.add('price-visible');
            }
            if (selectedAgeField) {
                selectedAgeField.value = selectedAge;
            }
            if (finalPriceField) {
                finalPriceField.value = calculatedPrice;
            }
        } else if (priceLabel) {
            // priceLabel.style.display = 'none'; // Replaced by class toggle
            priceLabel.classList.remove('price-visible');
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

    // Intersection Observer for Scroll Animations
    const animatedElements = document.querySelectorAll('.fade-in-on-scroll');

    if (animatedElements.length > 0) {
        const observerOptions = {
            root: null, // relative to document viewport
            rootMargin: '0px',
            threshold: 0.1 // A small percentage of the target is visible
        };

        const observerCallback = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target); // Stop observing once animated
                }
            });
        };

        const scrollObserver = new IntersectionObserver(observerCallback, observerOptions);
        animatedElements.forEach(el => scrollObserver.observe(el));
    }

    // Intersection Observer for Staggered List Items (Product Features)
    const productFeaturesList = document.querySelector('.product-features ul');
    if (productFeaturesList) {
        const featureItems = productFeaturesList.querySelectorAll('.staggered-fade-item');

        if (featureItems.length > 0) {
            const featureObserverOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.2 // A bit more of the list should be visible
            };

            const featureObserverCallback = (entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        featureItems.forEach((item, index) => {
                            item.style.transitionDelay = (index * 150) + 'ms'; // Stagger delay
                            item.classList.add('is-visible');
                        });
                        observer.unobserve(productFeaturesList); // Stop observing the list once items are triggered
                    }
                });
            };

            const featureListObserver = new IntersectionObserver(featureObserverCallback, featureObserverOptions);
            featureListObserver.observe(productFeaturesList);
        }
    }

});
