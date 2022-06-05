<script>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM destination");
    $stmt->execute();
    $destinations = $stmt->fetchAll();

    $stmt = $pdo->prepare("SELECT * FROM places_to_visit");
    $stmt->execute();
    $places = $stmt->fetchAll();
    ?>
    const searcInput = document.querySelector(".search-bar-container");
    const inputBox = searcInput.querySelector("input");
    const suggBox = searcInput.querySelector(".autocom-box");
    var suggestions = [];
    var suggestionLinks = [];
    var l = suggestions.length;
    const links = [];
    <?php foreach ($destinations as $i => $destination) : ?>
        suggestions[l] = "<?php echo $destination['RegionName'] ?>";

        links[l] = {
            name: "<?php echo $destination['RegionName'] ?>",
            link: "http://localhost/Tour-and-Travel-Full-Stack-Website/destination/destinations.php?id=<?php echo $destination['id'] ?>&name=<?php echo $destination['RegionName'] ?>"
        }
        l = suggestions.length;
    <?php endforeach ?>


    l = suggestions.length;
    <?php foreach ($places as $i => $place) : ?>
        suggestions[l] = "<?php echo $place['title'] ?>";
        links[l] = {
            name: "<?php echo $place['title'] ?>",
            link: "http://localhost/Tour-and-Travel-Full-Stack-Website/destination/destination.php?id=<?php echo $place['id'] ?>&name=<?php echo $place['title'] ?>"
        }
        l = suggestions.length;
    <?php endforeach ?>
    var tempSearchValue = [];

    console.log(suggestions);
    inputBox.onkeyup = (event) => {
        let inputData = event.target.value;
        searchValueContainer = [];
        suggestionLinks = [];
        if (inputData) {
            if (!suggestions.includes(inputBox.value)) {
                suggestions.push(inputBox.value);
            }
            searchValueContainer = suggestions.filter((data) => {
                return data.toLowerCase().startsWith(inputData.toLowerCase());
            });

            for (let i of searchValueContainer) {
                suggestionLinks.push(i);
            }

            var searchValueContainer = [];
            for (let i in suggestionLinks) {
                for (let j in links) {
                    if (suggestionLinks[i] === links[j]['name']) {
                        searchValueContainer.push(`<a href = ${links[j]['link']} >` + suggestionLinks[i] + "</a>");
                    }
                }
            }
            searchValueContainer.sort();

            // searchValueContainer = searchValueContainer.map((data) => {
            //     return "<a href = 'destination/addisababa/addisababa.html'>" + data + "</a>";
            //     //       return  "<li><a href = 'destination/addisababa/addisababa.html'>" + data + "</a></li>";s
            // })
            searcInput.classList.add("add");
            showSuggestions(searchValueContainer);

            const listOfSuggestions = suggBox.querySelectorAll("a");
            for (let i = 0; i < listOfSuggestions.length; i++) {
                /*  listOfSuggestions[i].onclick = ()=>{
                      inputBox.setAttribute("value",listOfSuggestions[i].innerText);
                  }  */
                listOfSuggestions[i].setAttribute("onclick", "selectSearchValue(this)");
            }
        } else {
            searcInput.classList.remove("add");
            showSuggestions(searchValueContainer);
        }
    }

    function selectSearchValue(element) {
        inputBox.setAttribute("value", element.innerText);
        inputBox.value = element.innerText;
    }

    function showSuggestions(list) {
        let listdata;
        // console.log(list);
        if (list.length) {
            listdata = list.join("");
        } else {
            listdata = `${inputBox.value}`;
        }
        console.log(listdata);
        suggBox.innerHTML = listdata;
    }
</script>