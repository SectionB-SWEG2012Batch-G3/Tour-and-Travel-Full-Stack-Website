<script>
    function totalPrice() {
        // calculate price
        var d1 = document.getElementById("St-Date").value;
        var d2 = document.getElementById("En-Date").value;
        console.log(d1, d2);
        const date1 = new Date(d1);
        const date2 = new Date(d2);
        const time = date2 - date1;
        const days = Math.ceil(time / (1000 * 60 * 60 * 24));
        console.log('price', selectedGuidePrice);
        if (isNaN(days)) {
            return;
        } else {
            if (days < 0) {
                alert("Invalid date,start date is greater than the end date");
                endDate.value = null;
                price.value = null;
            } else {
                if (selectedGuidePrice != 0) {
                    price.value = days * selectedGuidePrice + "Birr";
                } else {
                    alert(
                        "select name of the tour guide first and make sure ammount per day is displayed"
                    );
                    startDate.value = null;
                    endDate.value = null;
                    price.value = null;
                }
            }
        }
    }
</script>