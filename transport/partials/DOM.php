<script>
    const guides = document.getElementById("guides");
    const guideElem = document.getElementById("guides");
    const option = guides.querySelectorAll("option");
    var selectedGuidePrice = 0;
    const perhour = document.getElementById("perhour");
    const Price = document.getElementById("price");
    const startDate = document.getElementById("St-Date");
    const endDate = document.getElementById("En-Date");

    setPrice();
    guides.onchange = setPrice;
    endDate.onchange = totalPrice;
    startDate.onchange = totalPrice;
</script>