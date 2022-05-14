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
console.log(tempData);


for(let a in desc){
         desc[a].onclick = ()=>{
            console.log("desc ", desc);
            for(let i =0; i < tempData.length; i++){
               console.log(i,tempData[i]);
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

