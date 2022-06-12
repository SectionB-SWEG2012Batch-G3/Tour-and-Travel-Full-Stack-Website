const download = document.querySelector('div.download');
const downloadOpt = document.querySelector('div.download ul.hidden');
const options = document.querySelectorAll('div.download ul.hidden li');
download.onmouseover = () => {
    downloadOpt.style.display = "block";
}
download.onmouseout = () => {
    downloadOpt.style.display = "none";
}