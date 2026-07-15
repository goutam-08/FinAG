@extends('layouts.guest')
@section('content')
<style>.contact-section{

    background:#f8fbff;

}

.section-title{

    color:#10B981;
    font-weight:700;
    letter-spacing:2px;

}

.contact-section h1{

    font-size:48px;
    color:#08152f;

}

.contact-section h1 span{

    color:#10B981;

}

.contact-info{

    background:#08152f;
    color:white;
    padding:40px;
    border-radius:20px;
    height:100%;

}

.contact-item{

    display:flex;
    gap:18px;
    margin-top:30px;

}

.icon{

    width:55px;
    height:55px;
    background:#10B981;
    border-radius:15px;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:22px;

}

.contact-form{

    background:white;
    border-radius:20px;
    padding:40px;
    box-shadow:0 10px 35px rgba(0,0,0,.08);

}

.form-control{

    border-radius:12px;
    height:52px;

}

textarea.form-control{

    height:auto;

}

.form-control:focus{

    border-color:#10B981;
    box-shadow:0 0 0 .2rem rgba(16,185,129,.2);

}

.btn-send{

    background:#10B981;
    color:white;
    border:none;
    padding:14px 35px;
    border-radius:12px;
    transition:.3s;

}

.btn-send:hover{

    background:#059669;
    transform:translateY(-3px);

}

.social-links{

    margin-top:35px;

}

.social-links a{

    display:inline-flex;

    width:45px;
    height:45px;

    justify-content:center;
    align-items:center;

    background:#112240;

    color:white;

    border-radius:50%;

    margin-right:10px;

    transition:.3s;

}

.social-links a:hover{

    background:#10B981;

}

.map-box{

    border-radius:20px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,.08);

}

.map-box iframe{

    width:100%;
    height:420px;
    border:0;

}</style>
    <section class="contact-section py-5">

        <div class="container">

            <div class="text-center mb-5">

                <span class="section-title">CONTACT US</span>

                <h1 class="fw-bold mt-2">
                    We'd Love to <span>Hear From You</span>
                </h1>

                <p class="text-muted">
                    Have questions? Send us a message and we'll respond as soon as possible.
                </p>

            </div>

            <div class="row g-4">

                <!-- Left -->

                <div class="col-lg-5">

                    <div class="contact-info">

                        <h3>Get In Touch</h3>

                        <p>
                            We're always here to help you with your finance journey.
                        </p>

                        <div class="contact-item">

                            <div class="icon">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>

                            <div>
                                <h6>Address</h6>
                                <p>Hazaribagh, Jharkhand, India</p>
                            </div>

                        </div>

                        <div class="contact-item">

                            <div class="icon">
                                <i class="bi bi-envelope-fill"></i>
                            </div>

                            <div>
                                <h6>Email</h6>
                                <p>support@finag.com</p>
                            </div>

                        </div>

                        <div class="contact-item">

                            <div class="icon">
                                <i class="bi bi-telephone-fill"></i>
                            </div>

                            <div>
                                <h6>Phone</h6>
                                <p>+91 9876543210</p>
                            </div>

                        </div>

                        <div class="contact-item">

                            <div class="icon">
                                <i class="bi bi-clock-fill"></i>
                            </div>

                            <div>
                                <h6>Business Hours</h6>
                                <p>Mon - Sat : 9 AM - 6 PM</p>
                            </div>

                        </div>

                        <div class="social-links">

                            <a href="#"><i class="bi bi-facebook"></i></a>

                            <a href="#"><i class="bi bi-instagram"></i></a>

                            <a href="#"><i class="bi bi-twitter-x"></i></a>

                            <a href="#"><i class="bi bi-linkedin"></i></a>

                        </div>

                    </div>

                </div>

                <!-- Right -->

                <div class="col-lg-7">

                    <div class="contact-form">

                        <form>

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label>Name</label>

                                    <input type="text" class="form-control">

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label>Email</label>

                                    <input type="email" class="form-control">

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label>Phone</label>

                                    <input type="text" class="form-control">

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label>Subject</label>

                                    <input type="text" class="form-control">

                                </div>

                                <div class="col-12 mb-3">

                                    <label>Message</label>

                                    <textarea rows="6" class="form-control"></textarea>

                                </div>

                                <div class="col-12">

                                    <button class="btn-send">
                                        Send Message
                                        <i class="bi bi-arrow-right"></i>
                                    </button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Google Map -->

    <section class="container mb-5">

        <div class="map-box">

            <iframe src="https://www.google.com/maps?q=Hazaribagh&output=embed" loading="lazy">
            </iframe>

        </div>

    </section>
@endsection
