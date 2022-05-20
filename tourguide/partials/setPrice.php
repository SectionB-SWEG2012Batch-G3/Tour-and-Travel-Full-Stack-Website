<script>
    function setPrice() {
        <?php foreach ($tourguides as $i => $tourguide) : ?>
            console.log('equal? ', guides.value === "<?php echo $tourguide['name'] ?>");
            console.log(guides.value);
            console.log("<?php echo $tourguide['name'] ?>");
            if (guides.value === "<?php echo $tourguide['name'] ?>") {
                console.log(guides.value);
                perhour.value = <?php echo $tourguide['salaryPerHour'] ?> + 'Birr per hour';
                selectedGuidePrice = <?php echo $tourguide['salaryPerHour'] ?>;
                console.log('here ', perhour.value, selectedGuidePrice);
                totalPrice();
            }
        <?php endforeach ?>
    }
</script>