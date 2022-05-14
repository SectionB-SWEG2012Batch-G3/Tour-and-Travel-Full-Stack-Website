var ArrayOfUserData = [];

/*[{username:"Haymnaot",password:"ETS0340/12",e_mail:"haymedin21@gmail.com",phone:"0949960922"},
{username:"Bewuket",password:"ETS0146/12",e_mail:"bewuket@gmail.com",phone:"0949960922"},
{username:"Henok",password:"ETS0330/12",e_mail:"Henok@gmail.com",phone:"0949960922"},
{username:"Bereket",password:"ETS0240/12",e_mail:"Bereket@gmail.com",phone:"0949960922"},
{username:"Netsanet",password:"ETS0343/12",e_mail:"Netsanet@gmail.com",phone:"0949960922"},
{username:"Arega",password:"ETS0345/12",e_mail:"Arega@gmail.com",phone:"0949960922"},
{username:"Almaz",password:"ETS0347/12",e_mail:"Almaz@gmail.com",phone:"0949960922"}];*/

localStorage.setItem("Members",JSON.stringify(ArrayOfUserData));
const small = document.querySelectorAll("small");
submitBtn.addEventListener("click",()=>{
    var Counter = 0;
    console.log(small);
    for(let s of small){
        if(s.innerHTML.trim() !== ''){
            Counter++;
        }
    }
    if(Counter != 0){
        console.log("there is error message");
        alert("Validation rule is not obeyed");
    }
    else{
        let check = false;
        var userEmail = email.value.trim();
        var userData = {username:username.value.trim(),e_mail:email.value.trim(),Password:password.value.trim(),phone_number:phone.value.trim()};
        
        for(let data of JSON.parse(localStorage.getItem("Members"))){
            if(data.username.trim() == username.value.trim() && data.e_mail.trim() == userEmail){
                check = true;
            }
        }

        if(check){
            alert("Aleady have acount,Login or use an other email");
        }
        else{
            ArrayOfUserData.push(userData);
            localStorage.setItem("Members",JSON.stringify(ArrayOfUserData));
            alert("Acount Succesfully created");
        }
    }
});
