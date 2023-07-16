function validateName() {
    var name = document.getElementById("name").value;
  
    if (name == "") {
      document.getElementById("message1").innerHTML = "{{__('msg.error1')}}";
      return false;
    }
    else if (!/^[a-zA-Z-' ]+$/.test(Form.name.value)) {
      document.getElementById("message1").innerHTML =
      "{{__('msg.error2')}}";
      return false;
    } else {
      document.getElementById("message1").innerHTML = "";
    }
  }

  function validateUserName() {
    var userName = document.getElementById("username").value;
    if (userName == "") {
      document.getElementById("message2").innerHTML =
      "{{__('msg.error3')}}";
      return false;
    } else {
      document.getElementById("message2").innerHTML = "";
    }
  }
  function validateDate() {
    var birth = document.getElementById("birth").value;

    if (birth == "") {
      document.getElementById("message3").innerHTML =
      "{{__('msg.error4')}}";
      return false;
    } else {
      document.getElementById("message3").innerHTML = "";
    }
  }

  function validatePhone() {
    var phone = document.getElementById("phone").value;
    if (phone == "") {
      document.getElementById("message4").innerHTML =
      "{{__('msg.error5')}}";
      return false;
    } else {
      document.getElementById("message4").innerHTML = "";
    }
  }

  function validateAddress() {
    var address = document.getElementById("address").value;

    if (address == "") {
      document.getElementById("message5").innerHTML =
      "{{__('msg.error6')}}";
      return false;
    } else {
      document.getElementById("message5").innerHTML = "";
    }
  }
  function validatePassword() {
    var pw = document.getElementById("pswd1").value;

    if (pw == "") {
      document.getElementById("message6").innerHTML =
      "{{__('msg.error7')}}";
      return false;
    } else if (
      pw.length < 8 ||
      pw.search(/(?=.*[-\#\$\.\%\&\@\!\+\=\<\>\*])/) < 0 ||
      pw.search(/[0-9]/) < 0
    ) {
      document.getElementById("message6").innerHTML =
      "{{__('msg.error8')}}";
      return false;
    } else {
      document.getElementById("message6").innerHTML = "";
    }
  }
  function validateEmail() {
    var email = document.getElementById("email").value;

    if (email == "") {
      document.getElementById("message8").innerHTML =  "{{__('msg.error9')}}";
      return false;
    } else if (
      !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(Form.email.value)
    ) {
      alert( "{{__('msg.error10')}}");
      return false;
    } else {
      document.getElementById("message8").innerHTML = "";
    }
  }
  function validateConfirmPassword(form) {
    var confirmPass = document.getElementById("pswd2").value;
    if (confirmPass == "") {
      document.getElementById("message7").innerHTML =
      "{{__('msg.error11')}}";
      return false;
    } else {
      document.getElementById("message7").innerHTML = "";
    }
  }
  function matchPassword(form) {
    const password = form.password.value;
    const confirmpassword = form.confirmpassword.value;
    if (password != confirmpassword) {
      alert("{{__('msg.error12')}}");
      return false;
    } else {
      alert("{{__('msg.error13')}}");
      return true;
    }
  }

  // function to make request for api
  function showActors() {
    let val = document.getElementById("birth").value;
    const date = new Date(val);
    if (date === null) return;
    let burthDay = date.getDate();
    let burthMonth = date.getMonth() + 1;
    // instanciate an opject from xmlhttprequest class
    var myRequest = new XMLHttpRequest();
    //if request ready state change => call this funciont
    myRequest.onreadystatechange = function () {
      // if the Request is Finished and Response is Ready
      // if the Response Statuts is (OK) 200
      if (this.readyState === 4 && this.status === 200) {
        // Show the Response
        let res = this.responseText;
        document.querySelector(".actor-list").innerHTML = res;
      }
    };
    // get the content from api_res php page
    const requestUrl = `api_result.php?day=${burthDay}&month=${burthMonth}`;
    myRequest.open("GET", requestUrl, true);
    myRequest.send();
  }
  //funciont to show actors list
  function showActorList() {
    let show = document.querySelector(".actor-list").style.display;
    if (show !== "block") {
      document.querySelector(".actor-list").style.display = "block";
    } else {
      document.querySelector(".actor-list").style.display = "none";
    }
  }
