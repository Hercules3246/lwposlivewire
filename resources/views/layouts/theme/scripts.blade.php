
<script src="assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/app.js"></script>

<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="assets/js/custom.js"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
<script src="plugins/notification/snackbar/snackbar.min.js"></script>
<script src="{{asset('plugins/nicescroll/nicescroll.js')}}"></script>
<script src="{{asset('plugins/currency/currency.js')}}"></script>
<script src="https://kit.fontawesome.com/310e572d8b.js" crossorigin="anonymous"></script>
<script>
    function noty(msg,option = 1)
    {
        Snackbar.show({
            text: msg.toUpperCase(),
            actionText: 'CERRAR',
            actionTextColor: '#fff',
            backgroundColor: option == 1 ? '#3b3f5c' : '#e7515a',
            pos: 'top-right'
        });
    }
</script>
<script src="{{asset('plugins/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>


@livewireScripts
