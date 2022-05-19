// var y;
// function comeFrom(){
//     var x = document.querySelector("h1").innerHTML;
//     y=x;
// }


// function autoFill(){
//     var x = document.querySelector("h1");
//     document.querySelector("#modelOfCar").setAttribute('value', x);
// }

// window.localStorage.setItem("name", document.querySelector("h1").);
// var name = window.localStorage.getItem("name");

var datas = new Array();
            const addData = (ev) =>{
                ev.preventDefault();
                //let data = {
                    let firstName , lastName , email , contact , modelOfCar , pricePerDay , startDate , endDate , total;
                    firstName = document.querySelector("#fname").value;
                    lastName = document.querySelector("#lname").value;
                    email = document.querySelector("#email").value;
                    contact = document.querySelector("#contact").value;
                    modelOfCar = document.querySelector("#modelOfCar").value;
                    pricePerDay = document.querySelector("#priceOfCar").value;
                    startDate = document.querySelector("#startDate").value;
                    endDate = document.querySelector("#endDate").value;
                    total = document.querySelector("#amountDisplay").value;

                    datas = JSON.parse(localStorage.getItem("carReserveList"))? JSON.parse(localStorage.getItem("carReserveList")) : []
                    console.log(datas);
                    console.log(firstName);

                    // datas.push({
                    //     "firstName" : firstName,
                    //     "lastName" : lastName,
                    //     "email" : email,
                    //     "contact" : contact,
                    //     "modelOfCar" : modelOfCar,
                    //     "pricePerDay" : pricePerDay,
                    //     "startDate" : startDate,
                    //     "endDate" : endDate,
                    //     "total" : total
                    // })

                    



                //}

                // z = JSON.parse(localStorage.getItem("carReserveList"));
                //const str = localStorage.getItem("carReserveList");
                //z = JSON.parse(localStorage.getItem("carReserveList"));
                //z=JSON.parse(str);
                //alert(z);
                //console.log(z[0]);
                //console.log(z.length);
                //const dataObj = JSON.stringify(data);
                //alert(z.length);
                //alert(z);
                //alert(z[0]);
                //alert(datas);

                // if(datas.firstName!='' && datas.lastName!='' && datas.email!='' && datas.contact!=''
                //     && datas.modelOfCar!='' && datas.pricePerDay!='' && datas.startDate!=''
                //     && datas.endDate!='' && datas.total!=''){
                    if(firstName!="" && lastName!="" && email!="" && contact!=""
                    && modelOfCar!="" && pricePerDay!="" && startDate!=""
                    && endDate!="" && total!=""){
                        if(dateCheck(startDate, endDate, modelOfCar)){
                            datas.push({
                                "firstName" : firstName,
                                "lastName" : lastName,
                                "email" : email,
                                "contact" : contact,
                                "modelOfCar" : modelOfCar,
                                "pricePerDay" : pricePerDay,
                                "startDate" : startDate,
                                "endDate" : endDate,
                                "total" : total
                            })
                        //datas.push(data);
                        //index++;
                        document.querySelector('form').reset();
                        // document.getElementById("modeOfCar").innerHTML = ' ';
                        // document.getElementById("priceOfCar").innerHTML = ' ';
                        localStorage.setItem('carReserveList', JSON.stringify(datas));
                        //localStorage.setItem('carReserveList', dataObj);
                        //console.log('added', dataObj);
                        }
                        // else{
                        //     alert("Correct date")
                        // }
                    }
                else{
                    alert("Fill every space")
                }
                

                
                // if(datas.firstName!=null && datas.lastName!=null && datas.email!=null && datas.contact!=null
                //     && datas.modelOfCar!=null && datas.pricePerDay!=null && datas.startDate!=null
                //     && datas.endDate!=null && datas.total!=null){
                // localStorage.setItem('carReserveList', JSON.stringify(datas));
                //     }
                //var gr = datas.length;
                //localStorage.setItem('indexCar', JSON.stringify(gr));

                // if(data.firstName!='' && data.lastName!='' && data.email!='' && data.contact!=''
                //     && data.modelOfCar!='' && data.pricePerDay!='' && data.startDate!=''
                //     && data.endDate!='' && data.total!=''){
                //         if(dateCheck(data.startDate, data.endDate)){
                // localStorage.setItem('carReserveList', JSON.stringify(datas));
                //         }
                //     }
            }
            document.getElementById("btn").addEventListener('click', addData); 











var x = localStorage.getItem("modelOfCar");
var y = localStorage.getItem("priceOfCar");
var pr = parseInt(y,10);
var startD = document.getElementById("startDate").innerHTML;
function autoFill(){
    
    //document.querySelector("#modelOfCar").setAttribute('value', x);
    //document.querySelector("#priceOfCar").setAttribute('value', y);
    //document.querySelector("#modelOfCar").value=x;
    //document.querySelector("#priceOfCar").value=y;

    var s = document.querySelectorAll("option");
    var found = 0;
    
    for(var i=0;i<s.length && found==0;i++){
        if(x == s[i].value){
            s[i].setAttribute("selected", "selected");
            found = 1;
        }
    }

    document.querySelector("#priceOfCar").value = y;

    //var priceList = [100, 65, 40, 50, 200, 170, 150, 165, 125, 100, 200, 180];
    //document.querySelector("#priceOfCar").innerHTML = priceList[index];
    
}

var selectedCarPrice = 0;

function comb(obj){
    //var val = obj.value;
    if(obj.value == 'Honda City'){
        document.querySelector("#priceOfCar").value = 100+" $ per day";
        selectedCarPrice = 100;
    }
    else if(obj.value == 'Toyota Sedan'){
        document.querySelector("#priceOfCar").value = 65 +" $ per day";
        selectedCarPrice = 65;
    }
    else if(obj.value == 'Vitz'){
        document.querySelector("#priceOfCar").value = 40 +" $ per day";
        selectedCarPrice = 40;
    }
    else if(obj.value == 'Yaris'){
        document.querySelector("#priceOfCar").value = 50 +" $ per day";
        selectedCarPrice = 50;
    }
    else if(obj.value == 'V8'){
        document.querySelector("#priceOfCar").value = 200 +" $ per day";
        selectedCarPrice = 200;
    }
    else if(obj.value == 'Hummer'){
        document.querySelector("#priceOfCar").value = 170 +" $ per day";
        selectedCarPrice = 170;
    }
    else if(obj.value == 'Revo'){
        document.querySelector("#priceOfCar").value = 150 +" $ per day";
        selectedCarPrice = 150;
    }
    else if(obj.value == 'RAV4'){
        document.querySelector("#priceOfCar").value = 165 +" $ per day";
        selectedCarPrice = 165;
    }
    else if(obj.value == 'Hyundai'){
        document.querySelector("#priceOfCar").value = 125 +" $ per day";
        selectedCarPrice = 125;
    }
    else if(obj.value == 'TOYOTA HIACE'){
        document.querySelector("#priceOfCar").value = 100 +" $ per day";
        selectedCarPrice = 100;
    }
    else if(obj.value == 'Tata xenon'){
        document.querySelector("#priceOfCar").innerHTML = 200 +" $ per day";
        selectedCarPrice = 200;
    }
    else if(obj.value == 'Toyota Coaster'){
        document.querySelector("#priceOfCar").value = 180 +" $ per day";
        selectedCarPrice = 180;
    }
    else{
        document.querySelector("#priceOfCar").value = "select the car again";
        selectedCarPrice = 0;
    }

    calculateDays();

}

var startD = document.getElementById("startDate").value;
var endD = document.getElementById("endDate").value;
function getDate(date){
    var dateArr = date.split('/');
    var date = new Date(dateArr[2],dateArr[1],dateArr[0]);
    return date;
}
var date1 = getDate(startD);

// function dis(){
//     alert(date1);
// }

function calculateDays(){
    var d1 = document.getElementById("startDate").value;
    var d2 = document.getElementById("endDate").value;
    const date1 = new Date(d1);
    const date2 = new Date(d2);
    //const time = Math.abs(date2 - date1);
    const time = date2 - date1;
    const days = Math.ceil(time / (1000*60*60*24));
    // if(d1==''){
    
    // }
    // else if (d2='') {
        
    // } else {
    //     document.getElementById("amountDisplay").innerHTML=days*pr;
    // }
    if(isNaN(days)){
      return;
    }
     else {
         if(days<0){
             alert("invalid date");
             
         }
         else{
            if(selectedCarPrice!=0){
        document.getElementById("amountDisplay").value=days*selectedCarPrice+'$';
                }
            else{
                alert("select the car first and make sure ammount per day is displayed");
                document.getElementById("startDate").value = null;
                document.getElementById("endDate").value = null;
            }
        }
    }
    
}

// function displayTotalAmmount(){
//     document.getElementById("amountDisplay").innerHTML=days*selectedCarPrice+'$';
// }

var adder=-1;
var arr = new Array();

function toSaveData(){
    var first = document.querySelector("#fname").value;
    var last = document.querySelector("#lname").value;
    var ema = document.querySelector("#email").value; 
    var conta = document.querySelector("#contact").value;
    adder++;
    SaveData(first,last,ema,conta);
    
    

}

function SaveData(f,l,e,c){
    arr[adder] = new Person(f,l,e,c);
}

function show(){
    alert(this.fname+ ":" +this.lname+ ":" +this.email+ ":" +this.contact);
}

function showAll(){
    for(var q=1;q<arr.length;q++){
        arr[q].show();
    }
}

function Person(f,l,e,c){
    
    this.fname = f;
    this.lname = l;
    this.email = e;
    this.contact = c;
    this.show;


    // var p = document.querySelectorAll(".toBeSaved");
    // console.log(p);
    // var data = [];

    // localStorage.setItem("carReserve", p);


}

 document.querySelector("#fname").value;
 document.querySelector("#lname").value;
 document.querySelector("#email").value;
 document.querySelector("#contact").value;
 


// const dateCheck = (from, to, checks, checke) => {
//     let fDate,lDate,sDate,eDate;
//     fDate = Date.parse(from);
//     lDate = Date.parse(to);
//     sDate = Date.parse(checks);
//     eDate = Date.parse(checke);
//     if((sDate <= lDate && sDate >= fDate) || (eDate <= lDate && eDate >= fDate))  return true
//     return false;
// }
// dateCheck("02/05/2021","02/09/2021","02/4/2021","02/10/2021");

//var z = localStorage.getItem("carReserveList");

const dateCheck = (checks, checke, mCar) => {
    let fDate,lDate,sDate,eDate;
    //fDate = Date.parse(from);
    //lDate = Date.parse(to);
    sDate = Date.parse(checks);
    eDate = Date.parse(checke);
    console.log(sDate);
    

    if(datas.length==0){
        //alert("entered here");
        return true;
    }
    else{
    for(var i =0;i< datas.length;i++){
        //alert("entered 2");
        fDate = Date.parse(datas[i].startDate);
        lDate = Date.parse(datas[i].endDate);
        //alert(sDate);
        //alert(fDate);
        //alert(lDate);
        
        //alert(eDate);
        console.log(datas[i].modelOfCar);
        if(mCar == datas[i].modelOfCar){
        if((sDate <= lDate && sDate >= fDate) || (eDate <= lDate && eDate >= fDate) ||(sDate <= fDate && eDate >= lDate)) {
            //alert("entered 4");
            alert("This car is alrady scheduled from "+datas[i].startDate+" to "+datas[i].endDate);
            return false;
        }
        }
        // else{
        //     alert("entered 3");
        //     return true;
        // }
    }

    //alert("reache");
    return true;

    }

}
//dateCheck("02/05/2021","02/09/2021","02/4/2021","02/10/2021");
//if((sDate <= datas[i].endDate && sDate >= datas[i].startDate) || (eDate <= datas[i].endDate && eDate >= datas[i].startDate))


//document.getElementById("2").setAttribute("selected" , "selected");