# Vindhyavasini Medical Store — PHP Website

## Project Structure

```
medicalstore/
├── index.php                        # Home page
├── about.php                        # About Us
├── contact.php                      # Contact page
├── products.php                     # Products listing with search/filter
├── Register_In.php                  # Login page
├── Register_page.php                # Registration page
│
├── BPMonitoring.php                 # Blood Pressure Monitoring
├── OnlineConsultation.php           # Book doctor appointments
├── OnlinePrescription.php           # Upload prescription & order
├── LabBooking.php                   # Lab test booking
├── HomeDelivery.php                 # Medicine home delivery
├── NutritionalCounselling.php       # Nutritional guidance booking
├── VaccineAdministration.php        # Vaccine appointment booking
├── MedicineEquipmentRent.php        # Equipment rental with bill
├── ChronicDiseaseManagement.php     # Chronic disease care programmes
├── EmergencyServices.php            # Emergency request form
├── CustomerSupport.php              # 24/7 support with live chat
├── MedicalSynchronization.php       # Health programme sync
├── HealthandDrinkSupplements.php    # Supplements shop with cart
│
├── includes/
│   ├── header.php                   # Shared navbar + top banner
│   └── footer.php                   # Shared footer
│
└── assets/
    ├── style.css                    # Global stylesheet
    └── script.js                    # Global JavaScript
```

## Tech Stack
- **PHP 7.4+** — Server-side logic, form handling, server-side validation
- **HTML5 / CSS3** — Semantic markup, CSS variables, animations
- **Bootstrap 5.3** — Responsive grid and components (CDN)
- **Bootstrap Icons** — Icon library (CDN)
- **Google Fonts** — Playfair Display + DM Sans
- **Vanilla JavaScript** — Cart, FAQ accordion, chat widget, BP readings

## Design System
- **Color palette:** Deep Navy (#0a1628) + Emerald (#00b894) + Gold (#f0a500)
- **Typography:** Playfair Display (headings) + DM Sans (body)
- **Theme:** Medical luxury — dark, professional, modern

## Setup Instructions

### Requirements
- PHP 7.4 or higher
- Any web server: Apache (XAMPP/WAMP) or Nginx
- No database required for demo (can add MySQL for production)

### Local Setup (XAMPP)
1. Copy the `vindhyavasini/` folder into `C:/xampp/htdocs/`
2. Start Apache in XAMPP Control Panel
3. Open `http://localhost/vindhyavasini/` in your browser

### Local Setup (PHP Built-in Server)
```bash
cd vindhyavasini/
php -S localhost:8000
# Open http://localhost:8000
```

### Production Deployment
1. Upload all files to your web hosting (public_html or www)
2. Ensure PHP is enabled
3. Update contact email in `contact.php` and add `mail()` function
4. Add MySQL database for storing form submissions, users, orders

## Features Implemented
- ✅ Full responsive design (mobile, tablet, desktop)
- ✅ Unified navigation with dropdown menus
- ✅ Live cart counter (localStorage)
- ✅ BP readings tracker (localStorage)
- ✅ Equipment rental with auto-cost calculation and printable bill
- ✅ Medicine search and cart for supplements shop
- ✅ Prescription upload UI
- ✅ Live chat widget
- ✅ FAQ accordion
- ✅ Newsletter subscription
- ✅ Form validation (client + server-side)
- ✅ Login / Register pages
- ✅ Scroll reveal animations
- ✅ Emergency services with direct call buttons

## Demo Login
- Username: `user`
- Password: `password`

## Notes for Production
- Replace `mail()` stub in contact forms with PHPMailer or SMTP
- Add PDO/MySQLi for database-backed forms
- Implement proper session-based authentication
- Add CSRF token protection to all forms
- Use HTTPS in production

---
© 2024 Vindhyavasini Medical Store — Zamania, Ghazipur, UP
