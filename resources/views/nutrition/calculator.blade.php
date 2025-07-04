@extends('layouts.app')

@section('content')
    <section class="py-16 bg-gradient-to-br from-soft-orange to-white">
        <div class="container mx-auto px-6 md:px-8">
            <h1 class="text-5xl font-extrabold text-dark-gray text-center mb-12 font-heading leading-tight">Kalkulator Gizi Makanan</h1>

            <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden p-8 md:p-12 border border-gray-100">
                <p class="text-center text-lg text-gray-700 mb-8 leading-relaxed font-sans">
                    Masukkan makanan dan jumlah porsi untuk mengetahui informasi gizi lengkapnya.
                </p>

                <div id="food-input-container" class="space-y-6 mb-8">
                    <div class="flex flex-col md:flex-row items-center gap-4 bg-light-gray p-4 rounded-lg shadow-sm">
                        <input type="text" placeholder="Nama Makanan (contoh: Nasi Putih)" class="flex-grow p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary food-name" data-id="1">
                        <input type="number" placeholder="Jumlah (gram)" class="w-full md:w-32 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary food-quantity" data-id="1">
                        <button class="remove-food-item text-red-500 hover:text-red-700 transition duration-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>
                </div>

                <button id="add-food-item" class="bg-secondary text-white px-6 py-3 rounded-full font-semibold hover:bg-teal-600 transition duration-300 shadow-md flex items-center justify-center mx-auto mb-8">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Tambah Makanan
                </button>

                <button id="calculate-nutrition" class="w-full bg-primary text-white px-8 py-4 rounded-full font-bold hover:bg-red-600 transition duration-300 shadow-lg text-lg">
                    Hitung Gizi
                </button>

                <div id="nutrition-results" class="mt-10 p-8 bg-light-gray rounded-xl border border-gray-200 hidden">
                    <h2 class="text-3xl font-bold text-dark-gray mb-6 font-heading text-center">Hasil Perhitungan Gizi</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-lg text-gray-700">
                        <p><strong>Total Kalori:</strong> <span id="total-calories" class="font-semibold text-primary">0 kcal</span></p>
                        <p><strong>Total Protein:</strong> <span id="total-protein" class="font-semibold">0 g</span></p>
                        <p><strong>Total Lemak:</strong> <span id="total-fat" class="font-semibold">0 g</span></p>
                        <p><strong>Total Karbohidrat:</strong> <span id="total-carbs" class="font-semibold">0 g</span></p>
                    </div>
                    <p class="text-sm text-gray-500 mt-6 text-center">Estimasi gizi berdasarkan data yang tersedia. Konsultasikan dengan ahli gizi untuk rekomendasi personal.</p>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let foodItemId = 1;
            const foodInputContainer = document.getElementById('food-input-container');
            const addFoodItemButton = document.getElementById('add-food-item');
            const calculateNutritionButton = document.getElementById('calculate-nutrition');
            const nutritionResults = document.getElementById('nutrition-results');
            const totalCalories = document.getElementById('total-calories');
            const totalProtein = document.getElementById('total-protein');
            const totalFat = document.getElementById('total-fat');
            const totalCarbs = document.getElementById('total-carbs');

            document.querySelectorAll('.remove-food-item').forEach(button => {
                button.addEventListener('click', (event) => {
                    event.target.closest('.flex.flex-col.md\\:flex-row').remove();
                });
            });

            addFoodItemButton.addEventListener('click', function() {
                foodItemId++;
                const newItemHtml = `
                    <div class="flex flex-col md:flex-row items-center gap-4 bg-light-gray p-4 rounded-lg shadow-sm">
                        <input type="text" placeholder="Nama Makanan (contoh: Nasi Putih)" class="flex-grow p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary food-name" data-id="${foodItemId}">
                        <input type="number" placeholder="Jumlah (gram)" class="w-full md:w-32 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary food-quantity" data-id="${foodItemId}">
                        <button class="remove-food-item text-red-500 hover:text-red-700 transition duration-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>
                `;
                foodInputContainer.insertAdjacentHTML('beforeend', newItemHtml);
                foodInputContainer.lastElementChild.querySelector('.remove-food-item').addEventListener('click', (event) => {
                    event.target.closest('.flex.flex-col.md\\:flex-row').remove();
                });
            });

            calculateNutritionButton.addEventListener('click', async function() {
                const foodItems = [];
                document.querySelectorAll('#food-input-container > div').forEach(itemDiv => {
                    const nameInput = itemDiv.querySelector('.food-name');
                    const quantityInput = itemDiv.querySelector('.food-quantity');
                    if (nameInput && quantityInput && nameInput.value.trim() !== '' && quantityInput.value.trim() !== '') {
                        foodItems.push({
                            name: nameInput.value.trim(),
                            quantity: parseFloat(quantityInput.value.trim())
                        });
                    }
                });

                if (foodItems.length === 0) {
                    alert('Silakan masukkan setidaknya satu makanan.');
                    return;
                }

                const dummyFoodData = {
                    "nasi putih": { calories: 130, protein: 2.7, fat: 0.3, carbs: 28.2 }, // per 100g
                    "dada ayam": { calories: 165, protein: 31, fat: 3.6, carbs: 0 }, // per 100g
                    "telur rebus": { calories: 155, protein: 13, fat: 11, carbs: 1.1 }, // per 100g
                    "brokoli": { calories: 34, protein: 2.8, fat: 0.4, carbs: 6.6 }, // per 100g
                    "pisang": { calories: 89, protein: 1.1, fat: 0.3, carbs: 22.8 }, // per 100g
                    "burger": { calories: 295, protein: 17, fat: 15, carbs: 26 }, // per 100g (contoh tidak sehat)
                    "kentang goreng": { calories: 312, protein: 3.4, fat: 15, carbs: 41 }, // per 100g (contoh tidak sehat)
                    "susu almond": { calories: 15, protein: 0.6, fat: 1.2, carbs: 0.6 }, // per 100g
                    "minyak zaitun": { calories: 884, protein: 0, fat: 100, carbs: 0 }, // per 100g
                    "spaghetti": { calories: 158, protein: 5.8, fat: 0.9, carbs: 30.6 }, // per 100g
                    "jagung manis": { calories: 86, protein: 3.3, fat: 1.2, carbs: 18.7 }, // per 100g
                    "oatmeal": { calories: 389, protein: 16.9, fat: 6.9, carbs: 66.3 }, // per 100g
                    "martabak manis": { calories: 350, protein: 8, fat: 15, carbs: 45 }, // per 100g (estimasi)
                    "donat": { calories: 452, protein: 6, fat: 28, carbs: 45 }, // per 100g (estimasi)
                };

                let totalCal = 0;
                let totalProt = 0;
                let totalFat = 0;
                let totalCarb = 0;

                foodItems.forEach(item => {
                    const foodNameLower = item.name.toLowerCase();
                    if (dummyFoodData[foodNameLower]) {
                        const data = dummyFoodData[foodNameLower];
                        const factor = item.quantity / 100;
                        totalCal += data.calories * factor;
                        totalProt += data.protein * factor;
                        totalFat += data.fat * factor;
                        totalCarb += data.carbs * factor;
                    } else {
                        console.warn(`Data gizi untuk "${item.name}" tidak ditemukan. Menggunakan nilai 0.`);
                        // Optional: alert user or add a default value
                    }
                });

                totalCalories.textContent = `${totalCal.toFixed(2)} kcal`;
                totalProtein.textContent = `${totalProt.toFixed(2)} g`;
                totalFat.textContent = `${totalFat.toFixed(2)} g`;
                totalCarbs.textContent = `${totalCarb.toFixed(2)} g`;
                nutritionResults.classList.remove('hidden');
            });
        });
    </script>
@endsection