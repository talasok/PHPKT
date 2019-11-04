
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="js/demo/datatables-demo.js"></script>
<script src="js/demo/chart-area-demo.js"></script>
<script>
    function func(a){

        var eId = a.getAttribute('eid');
        var eName = a.getAttribute('ename');
        var ePhone = a.getAttribute('ephone');
        var eEmail = a.getAttribute('eemail');
        
        console.log(eId);       
        var id = document.getElementById("id1");
        var id1 = document.getElementById("id2");
        var name = document.getElementById("name1");
        var phone = document.getElementById("phone1");
        var email = document.getElementById("email1");
       
        console.log(id);
        
        id.value = eId;
        id1.value = eId;
        name.value = eName;
        phone.value = ePhone;
        email.value = eEmail;
        
    }
</script>
</body>

</html>