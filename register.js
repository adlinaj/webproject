function validate(){
    var memUsername = document.getElementByMemberId("memUsername").value;
    var memPassword = document.getElementByMemberId("memPassword").value;
    var memberName = document.getElementByMemberId("memberName").value;
    var memberAdd = document.getElementByMemberId("memberAdd").value;
    var memberEmail = document.getElementByMemberId("memberEmail").value;
    var memberContact = document.getElementByMemberId("memberContact").value;
    var error = document.getElementByMemberId("error");

    error.style.padding = "8px";

    var text;
    if(memUsername.length< 5){
        text = "Please Enter Your username";
        error.innerHTML = text;
        return false;
    }
    if(memPassword.length< 6){
        text = "Please Enter Your Password";
        error.innerHTML = text;
        return false;
    }
    if(memberName.length< 10){
        text = "Please Enter Your Name";
        error.innerHTML = text;
        return false;
    }
    if(memberAdd.length< 5){
        text = "Please Enter Valid Address";
        error.innerHTML = text;
        return false;
    }
    alert("Message Sent!");
    return true;

}