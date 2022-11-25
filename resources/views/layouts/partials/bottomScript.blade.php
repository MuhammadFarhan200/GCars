<script src="{{ asset('frontend/js/jquery-2.1.0.min.js') }}"></script>
<script src="{{ asset('frontend/js/popper.js') }}"></script>

<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('frontend/js/scrollreveal.min.js') }}"></script>
<script src="{{ asset('frontend/js/waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('frontend/js/imgfix.min.js') }}"></script>
<script src="{{ asset('frontend/js/mixitup.js') }}"></script>
<script src="{{ asset('frontend/js/accordions.js') }}"></script>
<script src="{{ asset('frontend/js/custom.js') }}"></script>

<script src="{{ asset('backend/extensions/sweetalert2/sweetalert2.all.min.js') }}"></script>

<script src="{{ asset('owlcarousel/dist/owl.carousel.min.js') }}"></script>
<script>
    $(document).ready(function() {
    $(".owl-carousel").owlCarousel({
        items: 1,
        margin: 10,
    });
});
</script>

@include('sweetalert::alert')
