@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Header Section -->
    <header>
        <div class="header-bg">
          <img src="{{ asset('images/banner.jpg') }}" alt="Header Background">
        </div>
        <div class="header-content">
          <h1>Welcome to Unimo Restaurant</h1>
          <p>Experience world-class dining with us!</p>
        </div>
    </header>

    <!-- About Us Section -->
    <section class="header-section">
        <h2 class="about-us">About Us</h2>
        <p>Indulge in culinary excellence at our restaurant, where we craft exquisite dishes that tantalize your taste buds.
            Our diverse menu, featuring a symphony of flavors, is designed to satisfy even the most discerning palate.
            From succulent steaks to delicate seafood, each dish is a masterpiece, carefully prepared with the finest ingredients and presented with artful flair.
            Immerse yourself in an unforgettable dining experience, where every bite is a journey of pure delight.</p>
    </section>

    <!-- Service Section -->
<section class="service-section">
    <h2>Our Services</h2>
    <div class="service-container">
      <div class="service-item">
        <div class="service-icon">
          <i class="fas fa-utensils"></i>
        </div>
        <h3>Culinary Expertise</h3>
        <p>Our team of seasoned chefs and culinary professionals craft exquisite dishes using the finest, locally-sourced ingredients. From classic favorites to innovative creations, we deliver an unparalleled dining experience.</p>
      </div>
      <div class="service-item">
        <div class="service-icon">
          <i class="fas fa-wine-glass-alt"></i>
        </div>
        <h3>Beverage Curation</h3>
        <p>Complement your meal with our expertly curated selection of wines, craft cocktails, and specialty beverages. Our sommelier and mixologists work tirelessly to provide the perfect pairing for every dish.</p>
      </div>
      <div class="service-item">
        <div class="service-icon">
          <i class="fas fa-concierge-bell"></i>
        </div>
        <h3>Exceptional Service</h3>
        <p>From the moment you arrive, our attentive staff is dedicated to ensuring your dining experience is seamless and memorable. Our commitment to hospitality is unparalleled, delivering personalized service tailored to your preferences.</p>
      </div>
    </div>
  </section>

    <!-- Menu Section -->
    <section>
        <h2>Our Menu</h2>
        <div class="grid">
            <img src="{{ asset('images/menu 1.png') }}" alt="Dish 1">
            <img src="{{ asset('images/menu 2.png') }}" alt="Dish 2">
            <img src="{{ asset('images/menu 3.png') }}" alt="Dish 3">
        </div>
    </section>

    <!-- Reservation Form Section -->
    <section>
        <h2>Book Reservation</h2>
        <form method="POST" action="{{ route('reservations.store') }}">
            @csrf
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="fullname" required placeholder="Type your full name">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="Type your email">
            </div>

            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" id="contact_number" name="contact_number" required placeholder="Type your contact number">
            </div>

            <div class="form-group">
                <label for="date">Reservation Date</label>
                <input type="date" id="date" name="date" required placeholder="Select reservation date">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="date-icon">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
            </div>

            <div class="form-group">
                <label for="time">Reservation Time</label>
                <input type="time" id="time" name="time" required>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="time-icon">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
            </div>

            <div class="form-group">
                <label for="special_occasion">Special Occasion</label>
                <div class="special-occasion-container">
                    <input type="text" id="special_occasion" name="special_occasion" autocomplete="off" placeholder="Select or type your occasion">
                    <ul id="specialOccasionList" class="suggestions-dropdown"></ul>
                </div>
            </div>

            <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Predefined Special Occasions
                const specialOccasions = [
                    "Birthday",
                    "Anniversary",
                    "Wedding Celebration",
                    "Engagement Party",
                    "Graduation",
                    "Retirement Party",
                    "Corporate Event",
                    "Surprise Party",
                    "Family Gathering",
                    "Date Night",
                    "Romantic Dinner",
                    "Farewell Party",
                    "Holiday Celebration",
                    "Team Building",
                    "Baby Shower"
                ];

                const specialOccasionInput = document.getElementById('special_occasion');
                const specialOccasionList = document.getElementById('specialOccasionList');

                // Function to show suggestions
                function showSpecialOccasionSuggestions(inputValue) {
                    // Clear previous suggestions
                    specialOccasionList.innerHTML = '';

                    // Filter special occasions based on input
                    const filteredOccasions = specialOccasions.filter(occasion =>
                        occasion.toLowerCase().includes(inputValue.toLowerCase())
                    );

                    // Create suggestion items
                    filteredOccasions.forEach(occasion => {
                        const li = document.createElement('li');
                        li.textContent = occasion;
                        li.classList.add('suggestion-item');
                        li.addEventListener('click', function() {
                            specialOccasionInput.value = occasion;
                            specialOccasionList.innerHTML = '';
                            specialOccasionList.style.display = 'none';
                        });
                        specialOccasionList.appendChild(li);
                    });

                    // Show/hide suggestions list
                    specialOccasionList.style.display = filteredOccasions.length > 0 ? 'block' : 'none';
                }

                // Event listener for input
                specialOccasionInput.addEventListener('input', function() {
                    showSpecialOccasionSuggestions(this.value);
                });

                // Close suggestions when clicking outside
                document.addEventListener('click', function(e) {
                    if (!specialOccasionInput.contains(e.target) && !specialOccasionList.contains(e.target)) {
                        specialOccasionList.innerHTML = '';
                        specialOccasionList.style.display = 'none';
                    }
                });
            });
            </script>

            <div class="form-group">
                <label for="item">Items You Wish to Order</label>
                <div class="item-suggestion-container">
                    <input type="text" id="item" name="item" autocomplete="off" placeholder="Start typing to see menu suggestions" required>
                    <ul id="suggestionsList" class="suggestions-dropdown"></ul>
                </div>
            </div>

            <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Structured Menu Items
                const menuItems = {
                    "Starters": [
                        "Chicken Sweet Corn Soup",
                        "Mix Green Salad",
                        "French Fries",
                        "French Fries with Chicken",
                        "French Fries with Nuggets"
                    ],
                    "Submarine": [
                        "Chicken",
                        "Spicy Chicken",
                        "Beef",
                        "Prawns",
                        "Unimo Special"
                    ],
                    "Chicken": [
                        "Tandoori Chicken",
                        "Crispy Chicken (Boneless)"
                    ],
                    "Shawarma": [
                        "Chicken Shawarma",
                        "Chilli Chicken"
                    ],
                    "Burgers": [
                        "Crispy Chicken",
                        "Beef"
                    ],
                    "Chinese - Rice": [
                        "Fried Rice Chicken",
                        "Fried Rice Beef",
                        "Fried Rice Seafood",
                        "Nasi Goreng (Chicken & Prawn)",
                        "Dragon Rice (Chicken, Beef & Prawn)"
                    ],
                    "Chinese - Sides": [
                        "Devilled Chicken",
                        "Pepper Chicken",
                        "Beef Fry with Onion",
                        "Hot Butter Cuttle Fish",
                        "Hot Butter Prawn"
                    ],
                    "Indian - After 6.00 PM": [
                        "Unimo Special Ghee Parata",
                        "Naan Plain",
                        "Naan Garlic",
                        "Naan Cheese",
                        "Naan Butter"
                    ],
                    "Curries": [
                        "Butter Beef",
                        "Butter Chicken",
                        "Butter Prawn",
                        "Kadai Chicken",
                        "Masala Chicken",
                        "Masala Prawn"
                    ],
                    "Desserts - Ice Cream (Per Scoop)": [
                        "Durian",
                        "Oreo",
                        "Strawberry Cheesecake",
                        "Vanilla with Honey",
                        "Chocolate Fudge",
                        "Mango",
                        "Butter Scotch"
                    ],
                    "Beverages": [
                        "Sweet Lassi",
                        "Mango Lassi",
                        "Vanilla Milkshake",
                        "Chocolate Milkshake",
                        "Strawberry Milkshake",
                        "Mango Milkshake",
                        "Durian Milkshake",
                        "Fresh Juice Lemon & Ginger",
                        "Fresh Juice Lime & Mint",
                        "Falooda",
                        "Water",
                        "Soft Drink 500ml",
                        "Soft Drink 1L"
                    ]
                };

                // Flatten menu items for easier searching
                const flattenedMenuItems = Object.values(menuItems).flat();

                const itemInput = document.getElementById('item');
                const suggestionsList = document.getElementById('suggestionsList');

                // Function to show suggestions
                function showSuggestions(inputValue) {
                    // Clear previous suggestions
                    suggestionsList.innerHTML = '';

                    // Filter menu items based on input
                    const filteredItems = flattenedMenuItems.filter(item =>
                        item.toLowerCase().includes(inputValue.toLowerCase())
                    );

                    // Group suggestions by category
                    const categorizedSuggestions = {};
                    filteredItems.forEach(item => {
                        // Find the category for this item
                        const category = Object.keys(menuItems).find(cat =>
                            menuItems[cat].includes(item)
                        );

                        if (!categorizedSuggestions[category]) {
                            categorizedSuggestions[category] = [];
                        }
                        categorizedSuggestions[category].push(item);
                    });

                    // Create suggestions with categories
                    Object.keys(categorizedSuggestions).forEach(category => {
                        // Add category header
                        const categoryHeader = document.createElement('li');
                        categoryHeader.textContent = category;
                        categoryHeader.classList.add('suggestion-category');
                        suggestionsList.appendChild(categoryHeader);

                        // Add items for this category
                        categorizedSuggestions[category].forEach(item => {
                            const li = document.createElement('li');
                            li.textContent = item;
                            li.classList.add('suggestion-item');
                            li.addEventListener('click', function() {
                                itemInput.value = item;
                                suggestionsList.innerHTML = '';
                            });
                            suggestionsList.appendChild(li);
                        });
                    });

                    // Show/hide suggestions list
                    suggestionsList.style.display = filteredItems.length > 0 ? 'block' : 'none';
                }

                // Event listener for input
                itemInput.addEventListener('input', function() {
                    showSuggestions(this.value);
                });

                // Close suggestions when clicking outside
                document.addEventListener('click', function(e) {
                    if (!itemInput.contains(e.target) && !suggestionsList.contains(e.target)) {
                        suggestionsList.innerHTML = '';
                        suggestionsList.style.display = 'none';
                    }
                });
            });
            </script>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" required placeholder="Type quantity">
            </div>

            <div class="form-group">
                <label for="payment_method">Payment Method</label>
                <select id="payment_method" name="payment_method" required>
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                    <option value="cash">Cash</option>
                </select>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dropdown-icon">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </div>

            <button type="submit">Proceed to Payment</button>
        </form>
    </section>

    <!-- Photo Grid Showcase Section -->
<section class="photo-showcase">
    <h2>Our Gallery</h2>
    <div class="photo-grid">
        @php
        $galleryItems = [
            [
                'image' => 'gallery-1.jpg',
                'title' => 'Sunset Dining',
                'description' => 'Experience intimate dining with a breathtaking sunset view.'
            ],
            [
                'image' => 'gallery-2.jpg',
                'title' => 'Chef\'s Special',
                'description' => 'Artfully crafted dishes that tell a culinary story.'
            ],
            [
                'image' => 'gallery-3.jpg',
                'title' => 'Fresh Ingredients',
                'description' => 'Farm-to-table ingredients sourced from local producers.'
            ],
            [
                'image' => 'gallery-5.jpg',
                'title' => 'Cocktail Hour',
                'description' => 'Innovative cocktails mixed to perfection.'
            ],
            [
                'image' => 'gallery-4.jpg',
                'title' => 'Outdoor Terrace',
                'description' => 'Enjoy your meal in our beautifully designed outdoor space.'
            ],
            [
                'image' => 'gallery-6.jpg',
                'title' => 'Private Dining',
                'description' => 'Exclusive dining experiences for special moments.'
            ]
        ]
        @endphp

        @foreach($galleryItems as $item)
            <div class="photo-grid-item">
                <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['title'] }}">
                <div class="overlay">
                    <h3>{{ $item['title'] }}</h3>
                    <p>{{ $item['description'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>

<section class="contact-us">
    <div class="container">
      <h2>Contact Us</h2>
      <div class="contact-info">
        <div class="map">
          <img src="{{ asset('images/map.png') }}" alt="Unimo Restaurant Map">
        </div>
        <div class="form">
            <form method="POST" action="{{ route('contact-messages.store') }}">
                @csrf
            <div class="form-group">
              <label for="name">Full Name</label>
              <input type="text" id="name" name="name" required placeholder="Type your full name">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" required placeholder="Type your email">
            </div>
            <div class="form-group">
              <label for="phone">Contact Number</label>
              <input type="tel" id="phone" name="phone" required placeholder="Type your contact number">
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea id="message" name="message" required placeholder="Type your message"></textarea>
            </div>
            <button type="submit">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection

