@extends ('frontend.layouts.main')
@section ('main-container')

        <!-- Breadcrumb Start -->
        <div class="all-title-box">
            <div class="container text-center">
                <h1>Contact<span class="m_1"><a href="{{url('/')}}">Home</a> / <a href="">Contact Us</a></span></h1>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="contact-form">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" placeholder="Your Name" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="email" class="form-control" placeholder="Your Email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Subject" />
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" placeholder="Message"></textarea>
                                </div>
                                <div><button class="btn" type="submit">Send Message</button></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-info">
                            <h3 class="pb-5" >Get in Touch</h3>
                            <h4><i class="fa fa-map-marker"></i>Kamalamai Municipality, Sindhuli, Nepal</h4>
                            <h4><i class="fa fa-envelope"></i>bhagawati.hses@gmail.com</h4>
                            <h4><i class="fa fa-phone"></i>9854020179</h4>
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

        <!-- MAP SECTION -->
        <h2 class="text-center" >Our Location</h2>
<section data-aos="fade-up" data-aos-delay="50" class="my-4">
    <div class="embed-responsive embed-responsive-16by9" style="width:70%; margin: auto;  " >
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3548.4869140825585!2d85.91133590978359!3d27.20385854742219!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb8b5ebff4e585%3A0x1db8e37f99d1ef6b!2sBhagawati%20Secondary%20School!5e0!3m2!1sen!2snp!4v1716895869736!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

@endsection
