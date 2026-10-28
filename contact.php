<?php
include("header.php");
?>

<!-- Font Awesome CDN for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Custom CSS -->
<style>
    .contact-section {
        margin-top: 50px;
    }

    .contact-heading {
        font-size: 2.8rem;
        font-weight: 700;
        color: #2e7d32;
        margin-bottom: 40px;
    }

    .contact-card {
        background: #2e7d32;
        color: white;
        border: none;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        transition: all 0.3s ease;
        height: 100%;
    }

    .contact-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.25);
    }

    .contact-card .card-body {
        padding: 30px;
    }

    .contact-card .card-title {
        font-size: 1.6rem;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .contact-card .card-text {
        font-size: 1.1rem;
        line-height: 1.6;
    }

    .contact-icon {
        font-size: 2.5rem;
        margin-bottom: 15px;
        color: #fff;
    }
</style>

<div class="container contact-section">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="contact-heading">Contact Us</h2>
        </div>
    </div>

    <div class="row mb-5">
        <!-- Address Card -->
        <div class="col-md-4 mb-4">
            <div class="card contact-card">
                <div class="card-body text-center">
                    <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <h5 class="card-title">Address</h5>
                    <p class="card-text">
                        Prince Farm & Nursery<br>
                        Bhomapardi, Dharampur Road<br>
                        Valsad, Gujarat
                    </p>
                </div>
            </div>
        </div>

        <!-- Phone Card -->
        <div class="col-md-4 mb-4">
            <div class="card contact-card">
                <div class="card-body text-center">
                    <div class="contact-icon"><i class="fas fa-phone-alt"></i></div>
                    <h5 class="card-title">Mobile No</h5>
                    <p class="card-text">
                        9426220531<br>
                        7046975115
                    </p>
                </div>
            </div>
        </div>

        <!-- Email Card -->
        <div class="col-md-4 mb-4">
            <div class="card contact-card">
                <div class="card-body text-center">
                    <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                    <h5 class="card-title">Email ID</h5>
                    <p class="card-text">
                        admin@plantshop.com
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>
