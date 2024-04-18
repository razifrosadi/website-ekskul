<footer class="footer pt-5 mt-5">
    <div class="container">
        <div class="row">


            <div class="col-12">
                <div class="text-center">
                    <p class="text-dark my-4 text-sm font-weight-normal">
                        Website Ekstrakurikuler © <script>
                            document.write(new Date().getFullYear())
                        </script> <a href="https://www.creative-tim.com" target="_blank">Razif Ilham Rosadi</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>





















<!--   Core JS Files   -->
<script src="<?= base_url('assets/'); ?>js/core/popper.min.js" type="text/javascript"></script>
<script src="<?= base_url('assets/'); ?>js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= base_url('assets/'); ?>js/plugins/perfect-scrollbar.min.js"></script>




<!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
<script src="<?= base_url('assets/'); ?>js/plugins/countup.min.js"></script>





<script src="<?= base_url('assets/'); ?>js/plugins/choices.min.js"></script>



<script src="<?= base_url('assets/'); ?>js/plugins/prism.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/plugins/highlight.min.js"></script>



<!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
<script src="<?= base_url('assets/'); ?>js/plugins/rellax.min.js"></script>
<!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
<script src="<?= base_url('assets/'); ?>js/plugins/tilt.min.js"></script>
<!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
<script src="<?= base_url('assets/'); ?>js/plugins/choices.min.js"></script>
















<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<!--  Google Maps Plugin    -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
<script src="<?= base_url('assets/'); ?>js/material-kit.min.js?v=3.0.4" type="text/javascript"></script>


<script type="text/javascript">
    if (document.getElementById('state1')) {
        const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
        if (!countUp.error) {
            countUp.start();
        } else {
            console.error(countUp.error);
        }
    }
    if (document.getElementById('state2')) {
        const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
        if (!countUp1.error) {
            countUp1.start();
        } else {
            console.error(countUp1.error);
        }
    }
    if (document.getElementById('state3')) {
        const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
        if (!countUp2.error) {
            countUp2.start();
        } else {
            console.error(countUp2.error);
        };
    }
</script>


























</body>

</html>