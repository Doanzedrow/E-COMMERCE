
<script>
const dels = document.querySelectorAll(".btn-sm");

dels.forEach(del => {
    del.addEventListener('click', function() {
        $.get("del.php?"+del.id, {'del.id': del.id});
    });
});
</script>
<?php $id = $_GET['del.id'];
?>