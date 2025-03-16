document.addEventListener("DOMContentLoaded", function () {
    // Modal Handling
    const loginModal = document.getElementById("loginModal");
    const signupModal = document.getElementById("signupModal");
    const closeButtons = document.querySelectorAll(".close");

    document.getElementById("openLoginModal").addEventListener("click", () => loginModal.style.display = "block");
    document.getElementById("openSignupModal").addEventListener("click", () => signupModal.style.display = "block");
    closeButtons.forEach(btn => btn.addEventListener("click", () => {
        loginModal.style.display = "none";
        signupModal.style.display = "none";
    }));

    // Initialize intl-tel-input for phone number
    const phoneInput = document.getElementById("signupPhone");
    const countryCodeInput = document.getElementById("countryCode");

    const intlTel = window.intlTelInput(phoneInput, {
        initialCountry: "bd", // Default country Bangladesh 🇧🇩
        separateDialCode: true,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"
    });

    // Capture country code on signup
    const signupForm = document.getElementById("signupForm");
    if (signupForm) {
        signupForm.addEventListener("submit", function (e) {
            const countryData = intlTel.getSelectedCountryData();
            if (!countryData) {
                console.error("Failed to retrieve country data.");
                return;
            }

            const countryCode = countryData.dialCode;
            if (!countryCode) {
                console.error("Failed to retrieve country code.");
                return;
            }

            console.log("Detected Country Code:", countryCode); // Debugging

            // Set country_code value before submitting
            countryCodeInput.value = `+${countryCode}`;

            console.log("Hidden Input Updated:", countryCodeInput.value); // Debugging
        });
    } else {
        console.error("Signup form not found! Check the form ID.");
    }

    // Login Form
    document.getElementById("loginForm").addEventListener("submit", function (e) {
        e.preventDefault();
        fetch("/login", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ phone: document.getElementById("loginPhone").value, password: document.getElementById("loginPassword").value })
        })
        .then(res => res.json())
        .then(data => {
            if (data.error) {
                alert("Invalid credentials");
            } else {
                alert("Login successful");
                window.location.href = "/dashboard";
            }
        })
        .catch(err => console.error(err));
    });
});