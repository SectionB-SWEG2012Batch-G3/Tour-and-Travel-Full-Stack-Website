const profile = document.querySelector("#content a.profile");
const div = document.querySelector("#content div.upload-con");
const file = document.querySelector('#content input[type="file"]');
const img = document.querySelector('#content div.upload-con img');


console.log(profile);
console.log(img);


profile.onclick = () => {
    const classes = div.classList;
    console.log(classes[0]);
    if (classes[1] == 'hidden') {
        div.classList.remove('hidden');
        div.classList.add('visible');
    } else {
        div.classList.add('hidden');
        div.classList.remove('visible');
    }
}

file.addEventListener('change', function() {
    //this refers to file
    const choosedFile = this.files[0];
    // console.log(this.files);
    // console.log(choosedFile);
    if (choosedFile) {

        const reader = new FileReader(); //FileReader is a predefined function of JS

        reader.addEventListener('load', function() {
            img.setAttribute('src', reader.result);
            // console.log(reader.result);
        });

        reader.readAsDataURL(choosedFile);
    }
});