const download = document.querySelector('div.download');
const btns = document.querySelector('div.download .row .export');

btns.onmouseover = () => {
    btns.childNodes[1].style.display = "block";
}
btns.onmouseout = () => {
    btns.childNodes[1].style.display = "none";
}

// downloadOpt.onmouseover = () => {
//     downloadOpt.style.display = "block";
// }
// downloadOpt.onmouseout = () => {
//     downloadOpt.style.display = "none";
// }