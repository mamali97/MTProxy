<?php
/*
Template Name: Checkout Page
*/

get_header();
?>

<div class="container mx-auto px-6 py-12" itemscope itemtype="http://schema.org/Product">
    <h1 class="text-3xl font-bold mb-8 text-center" itemprop="name">صفحه خرید</h1>
<form id="checkout-form" class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg" method="post">
        <?php wp_nonce_field( 'torobche_checkout_nonce', 'checkout_nonce' ); ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="customerName" class="block text-sm font-medium text-gray-700">نام و نام خانوادگی خریدار</label>
                <input type="text" id="customerName" name="customerName" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
            </div>
            <div>
                <label for="recipientName" class="block text-sm font-medium text-gray-700">نام و نام خانوادگی گیرنده</label>
                <input type="text" id="recipientName" name="recipientName" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">شماره تماس</label>
                <input type="tel" id="phone" name="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">ایمیل</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="md:col-span-2">
                <label for="address" class="block text-sm font-medium text-gray-700">آدرس</label>
                <textarea id="address" name="address" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
            </div>
            <div>
                <label for="postalCode" class="block text-sm font-medium text-gray-700">کد پستی</label>
                <input type="text" id="postalCode" name="postalCode" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div>
                <label for="city" class="block text-sm font-medium text-gray-700">شهر</label>
                <input type="text" id="city" name="city" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div>
                <label for="productType" class="block text-sm font-medium text-gray-700">نوع محصول</label>
                <select id="productType" name="productType" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="girls-tshirt">تی‌شرت دخترانه</option>
                    <option value="boys-tshirt">تی‌شرت پسرانه</option>
                    <option value="sweatshirt">سویشرت بچگانه</option>
                </select>
            </div>
            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700">تعداد</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div>
                <label for="childAge" class="block text-sm font-medium text-gray-700">سن کودک</label>
                <input type="number" id="childAge" name="childAge" min="2" value="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="md:col-span-2">
                <label for="notes" class="block text-sm font-medium text-gray-700">توضیحات</label>
                <textarea id="notes" name="notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
            </div>
        </div>
        <div class="mt-8 text-center">
            <p class="text-xl font-bold">قیمت نهایی: <span id="total-price">870,000</span> تومان</p>
        </div>
        <div class="mt-8 text-center">
            <button type="submit" class="bg-purple-600 text-white px-8 py-3 rounded-lg hover:bg-purple-700 transition-colors">
                ثبت سفارش
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('checkout-form');
    const totalPriceEl = document.getElementById('total-price');
    const productTypeEl = document.getElementById('productType');

    const products = {
        'girls-tshirt': { name: 'تی‌شرت دخترانه', basePrice: 870, id: 1 }, // Replace 1 with actual product ID
        'boys-tshirt': { name: 'تی‌شرت پسرانه', basePrice: 870, id: 2 }, // Replace 2 with actual product ID
        'sweatshirt': { name: 'سویشرت بچگانه', basePrice: 970, id: 3 }  // Replace 3 with actual product ID
    };

    function calculatePrice() {
        const productType = form.productType.value;
        const quantity = parseInt(form.quantity.value);
        const childAge = parseInt(form.childAge.value);

        const basePrice = products[productType].basePrice;
        const ageMultiplier = (childAge - 2) * 100;
        const totalPrice = (basePrice + ageMultiplier) * 1000 * quantity;

        totalPriceEl.textContent = new Intl.NumberFormat('fa-IR').format(totalPrice);
    }

    form.addEventListener('input', calculatePrice);
    calculatePrice();

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const productId = products[productTypeEl.value].id;
        const quantity = parseInt(form.quantity.value);

        const formData = new FormData();
        formData.append('add-to-cart', productId);
        formData.append('quantity', quantity);

        fetch('<?php echo wc_get_cart_url(); ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            window.location.href = '<?php echo wc_get_checkout_url(); ?>';
        })
        .catch(error => console.error('Error:', error));
    });
});
</script>

<?php
get_footer();
?>
