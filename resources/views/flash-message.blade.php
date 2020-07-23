
<script>

    $(document).ready(function(){

        @if (Session::has('success'))
        swal('Succés!', '{{Session::get("success")}}', 'success')
        @endif

        @if (Session::has('erreur'))
        swal('erreur', '{{Session::get("erreur")}}', 'erreur')
        @endif

        @if (Session::has('error'))
        swal('Erreur', '{{Session::get("error")}}', 'error')
        @endif



    });

</script>
