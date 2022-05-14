const tempData1 = document.querySelector(".guy1");
const tempData2 = document.querySelector(".guy2");
const tempData3 = document.querySelector(".guy3");
const tempData4 = document.querySelector(".guy4");
const tempData5 = document.querySelector(".guy5");
console.log(tempData1,tempData2,tempData3,tempData4,tempData5);
/*
console.log(tempData1,tempData2,tempData3,tempData4,tempData5);

const desc1 = document.querySelector("#hay");
const desc2 = document.querySelector("#fu");
const desc3 = document.querySelector("#hana");
const desc4 = document.querySelector("#ham");
const desc5 = document.querySelector("#hai");

console.log(desc1,desc2,desc3,desc4,desc5);

const tempData2 = document.querySelectorAll("div[class^='guy']");

for(let i  in tempData2){
    console.log(tempData2[i]);
}*/
const desc = document.querySelectorAll("a[class='guideDesc']");
const tempData = document.querySelectorAll("div[class^='guy']");
console.log(desc);


for(let a in desc){
         desc[a].onclick = ()=>{
            for(let i = 0; i < 5; i++){
               console.log(tempData[i])
                tempData[i].classList.add("hiddens");
            }
            tempData[a].classList.add("visibles");
            tempData[a].classList.remove("hiddens");
            const div = document.querySelector(".visibles");
            const assign = div.querySelector(".reserve");
            assign.onclick = ()=>{
                alert(`${assign.id}` + `${assign.title}`);
                localStorage.setItem("savedGuide",assign.id);
                localStorage.setItem("price",assign.title);
            }
         }
}

// for(let a in desc){
//     desc[a].onclick = ()=>{
//        switch(a){
//            case 0: tempData1.classList.remove("hidden");
//                    tempData1.classList.add("visible");
//                    tempData2.classList.add("hidden");
//                    tempData3.classList.add("hidden");
//                    tempData4.classList.add("hidden");
//                    tempData5.classList.add("hidden");
//             break;
//            case 1:
//             tempData2.classList.remove("hidden");
//             tempData2.classList.add("visible");
//             tempData1.classList.add("hidden");
//             tempData3.classList.add("hidden");
//             tempData4.classList.add("hidden");
//             tempData5.classList.add("hidden");
//             break;
//           case 2:
//             tempData3.classList.remove("hidden");
//             tempData3.classList.add("visible");
//             tempData2.classList.add("hidden");
//             tempData1.classList.add("hidden");
//             tempData4.classList.add("hidden");
//             tempData5.classList.add("hidden");
//             break;
//           case 3:
//             tempData4.classList.remove("hidden");
//             tempData4.classList.add("visible");
//             tempData2.classList.add("hidden");
//             tempData3.classList.add("hidden");
//             tempData1.classList.add("hidden");
//             tempData5.classList.add("hidden");
//         break;
//         case 4:
//             tempData5.classList.remove("hidden");
//             tempData5.classList.add("visible");
//             tempData2.classList.add("hidden");
//             tempData3.classList.add("hidden");
//             tempData4.classList.add("hidden");
//             tempData1.classList.add("hidden");
//         break;
//        }
//     };
// }