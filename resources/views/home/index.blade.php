<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css') 
</head>
<body>
    @include('home.header') <!-- HEADER BLADE -->

    @include('home.hero') <!-- HOME/HERO BLADE -->

    @include('home.collections') <!-- COLLECTIONS CARDS BLADE-->

    @include('home.footer')

    
    <!-- BOOTSTRAP JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    
</body>
</html> 
