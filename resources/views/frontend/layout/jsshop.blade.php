    <script src="{{ asset('frontend/assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('cart_empty'))
        <script>
            Swal.fire({
                icon: 'info',
                title: 'Cart Empty',
                text: '{{ session('cart_empty') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Add to Cart Success',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
