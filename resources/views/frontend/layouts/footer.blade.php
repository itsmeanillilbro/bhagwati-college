<!-- Footer Start -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3 class="title">Get in Touch</h3>
                    <div class="contact-info">
                        <p><i class="fa fa-map-marker"></i>123 News Street, NY, USA</p>
                        <p><i class="fa fa-envelope"></i>info@example.com</p>
                        <p><i class="fa fa-phone"></i>+123-456-7890</p>
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

            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3 class="title">Useful Links</h3>
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('/teams')}}">Teams</a></li>
                        <li><a href="{{url('/timeline')}}">Timeline</a></li>
                        <li><a href="{{url('/download')}}">Downloads</a></li>
                        <li><a href="{{url('/alumni')}}">Alumni</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3 class="title">Quick Links</h3>
                    <ul>
                        <li><a href="{{url('/about')}}">About Us</a></li>
                        <li><a href="{{url('/notice')}}">Notice</a></li>
                        <li><a href="{{url('/contact')}}">Contact Us</a></li>
                        <li><a href="{{url('/news')}}">News & Events</a></li>
                        <li><a href="{{url('/gallery')}}">Gallery</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3 class="title">About Campus</h3>
                    <div class="newsletter">
                        <p>
                            People’s Campus (PEC), a pioneering and a leading community-based non-profit academic
                            institution, was established in 1981 A.D. with the initiation of a group of visionary
                            educationists, professionals and key stakeholders in the field of education.</p>
                        <!-- <form>
                            <input class="form-control" type="email" placeholder="Your email here">
                            <button class="btn">Submit</button>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Footer Menu Start -->
<div class="footer-menu">
    <div class="container">
        <div class="f-menu">
            <a href="{{url('/terms')}}">Terms & Conditions</a>
            <a href="{{url('/privacy')}}">Privacy policy</a>
            <a href="{{url('/about')}}">About Us</a>
            <a href="{{url('/academics')}}">Academics</a>
            <a href="{{url('/')}}">Home</a>
            <a href="{{url('/contact')}}">Contact Us</a>
        </div>
    </div>
</div>
<!-- Footer Menu End -->

<!-- Footer Bottom Start -->
<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6 copyright">
                <p>Copyright &copy; <a href="">People'scampus</a>. All Rights Reserved</p>
            </div>

            <div class="col-md-6 template-by">
                <p>Powered By <a href="https://erasoft.com.np/">Erasoft Solution Pvt. Ltd.</a></p>
            </div>
        </div>
    </div>
</div>
<!-- Footer Bottom End -->

<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script><script src="{{url('frontend/lib/easing/easing.min.js')}}"></script>
<script src="{{url('frontend/lib/easing/easing.min.js')}}"></script>
<script src="{{url('frontend/lib/slick/slick.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{url('frontend/js/main.js')}}"></script>
<script src="{{url('frontend/js/timeline.min.js')}}"></script>
<script src="{{url('frontend/js/fancybox.umd.js')}}"></script>
<script>
    timeline(document.querySelectorAll('.timeline'), {
        forceVerticalMode: 700,
        mode: 'horizontal',
        verticalStartPosition: 'left',
        visibleItems: 4
    });
</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    function go_back() {
        window.history.back();
    }

    function refreshCaptcha() {
        var img = document.images['captcha_image'];
        img.src = img.src.substring(0, img.src.lastIndexOf("?")) + "?rand=" + Math.random() * 1000;
    }
</script>
<!-- <script>
    $(function () {

        $('.slide').click(function () {
            $(this).parent().children('.toggle').slideToggle('slow');
        });

        $('#np-datepicker').jDatepicker({ separator: '-', ADelm: 'dateAD' });
    });
</script> -->
<script>

    $(document).ready(function () {
        $("#myModal").modal('show');

        $(".btn-close").click(function () {
            $("#myModal").modal('hide');
        });
    });
</script>

<script>
    Fancybox.bind("[data-fancybox]", {





});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

{!! Toastr::message() !!}

</body>

</html>
