<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Add Font Awesome or Feather Icons for social media icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <script src="{{ asset('js/app.js') }}" defer></script>

    <style>
        /* Modal Styles */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal-content {
            background-color: #23262b;
            padding: 40px;
            border-radius: 16px;
            text-align: center;
            max-width: 500px;
            width: 90%;
            position: relative;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
            transform: scale(0.7);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .modal-content.show {
            transform: scale(1);
            opacity: 1;
        }

        .modal-overlay.show {
            display: flex;
            opacity: 1;
        }

        .modal-content h2 {
            color: #ff6b6b;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        .modal-content p {
            color: #f1f1f1;
            margin-bottom: 30px;
            font-size: 1.1rem;
        }

        .modal-content .close-btn {
            background-color: #ff6b6b;
            color: #f1f1f1;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .modal-content .close-btn:hover {
            background-color: #ef5350;
        }

        .modal-checkmark {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #ff6b6b;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 20px;
            animation: pulse 1.5s infinite;
        }

        .modal-checkmark svg {
            color: white;
            width: 60px;
            height: 60px;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }
    </style>
</head>
<body class="bg-gray-900 text-white">
    <nav>
        <h1>Unimo Restaurant</h1>
        <div class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('signin') }}">Sign In</a>
            <a href="{{ route('signup') }}">Sign Up</a>
        </div>
    </nav>

    <div class="container mx-auto mt-4">
        @yield('content')
    </div>

    <!-- Reservation Success Modal -->
    <div id="successModal" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-checkmark">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h2>Reservation Confirmed!</h2>
            <p>Your reservation has been successfully submitted. We look forward to serving you!</p>
            <button id="reservationCloseBtn" class="close-btn">Close</button>
        </div>
    </div>

    <!-- Contact Success Modal -->
    <div id="contactSuccessModal" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-checkmark">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h2>Message Sent!</h2>
            <p>Your message has been successfully submitted. We look forward to serving you!</p>
            <button id="contactCloseBtn" class="close-btn">Close</button>
        </div>
    </div>

    <script>
        // Function to show the reservation modal
        function showReservationModal() {
            const modal = document.getElementById('successModal');
            modal.classList.add('show');
            setTimeout(() => {
                modal.querySelector('.modal-content').classList.add('show');
            }, 50);
        }

        // Function to show the contact form modal
        function showContactModal() {
            const modal = document.getElementById('contactSuccessModal');
            modal.classList.add('show');
            setTimeout(() => {
                modal.querySelector('.modal-content').classList.add('show');
            }, 50);
        }

        // Function to close modals
        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.querySelector('.modal-content').classList.remove('show');
            setTimeout(() => {
                modal.classList.remove('show');
            }, 300);
        }

        // Add event listeners for modal closing
        document.addEventListener('DOMContentLoaded', () => {
            // Reservation modal close button
            document.getElementById('reservationCloseBtn').addEventListener('click', () => {
                closeModal('successModal');
            });

            // Contact modal close button
            document.getElementById('contactCloseBtn').addEventListener('click', () => {
                closeModal('contactSuccessModal');
            });

            // Check for reservation success message
            @if(session('success'))
                showReservationModal();
            @endif

            // Check for contact form success message
            @if(session('contact_success'))
                showContactModal();
            @endif
        });
    </script>

    <footer>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-google-plus-g"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
        <div class="footer-menu">
            <a href="#">Home</a>
            <a href="#">News</a>
            <a href="#">About</a>
            <a href="#">Contact Us</a>
            <a href="#">Our Team</a>
        </div>
        <div class="copyright">
            Copyright &copy;2024; Designed by PHP_Devils
        </div>
    </footer>
</body>
</html>
