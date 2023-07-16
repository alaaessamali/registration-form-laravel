@extends('layout')

@section('title')
    Registration Form
@endsection

@section('links')
    <link rel="stylesheet" href={{asset('CSS/style.css')}}>
    <link rel="stylesheet" href={{'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'}}>
@endsection

@section('body')

    @include('header')

    <div class="form">

        <form method="post" name="Form" id="form" onsubmit="matchPassword(this)" class="input" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <div>
                <span> {{__('msg.span1')}} </span><input type="text" onfocusout="validateName()" name="name" class="info" id="name" value="">

                <span class="error" id="message1"> </span><br>

                <div>
                    <span> {{__('msg.span2')}}</span><input type="text" onfocusout="validateUserName()" name="username" class="info" id="username" value="">
                    <span class="error" id="message2"> </span><br>

                </div>
                <div>
                    <span>{{__('msg.span3')}}</span> <input type="Date" onchange="showActors()" onfocusout="validateDate()" name="bd" class="info" id="birth" value="">
                    <span onclick="showActorList()" class="show-button">{{__('msg.actor')}}</span>
                    <div class=" actor-list">
                    </div>
                    <span class="error" id="message3"> </span><br>

                </div>
                <div>
                    <span>{{__('msg.span4')}}:</span> <input type="Number" onfocusout="validatePhone()" name="phone" class="info" id="phone" value="">
                    <span class="error" id="message4"></span><br>

                </div>
                <div>
                    <span>{{__('msg.span5')}}: </span><input type="text" onfocusout="validateAddress()" name="address" class="info" id="address" value="">
                    <span class="error" id="message5"> </span><br>

                </div>
                <div>
                    <span>{{__('msg.span6')}}:</span> <input type="text" onfocusout="validateEmail()" name="email" class="info" id="email" value="">
                    <span class="error" id="message8"> </span><br>

                    <div>
                        <span>{{__('msg.span7')}}:</span> <input type="password" onfocusout="validatePassword()" name="password" class="info" id="pswd1" value="">
                        <span class="error" id="message6"> </span><br>

                    </div>
                    <div>
                        <span>{{__('msg.span8')}}:</span> <input type="password" onfocusout="validateConfirmPassword()" name="confirmpassword" id="pswd2" class="info" value="">
                        <span class="error" id="message7"></span><br>
                    </div>
                    <input type="submit" name="submit" value="{{__('msg.span9')}}" class="submit">
        </form>

    </div>
    @include('footer')

@endsection

@section('script')
    <script>
        function validateName() {
            var name = document.getElementById("name").value;

            if (name == "") {
                document.getElementById("message1").innerHTML = "{{__('msg.error1')}}";
                return false;
            } else if (!/^[a-zA-Z-' ]+$/.test(Form.name.value)) {
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
                document.getElementById("message8").innerHTML = "{{__('msg.error9')}}";
                return false;
            } else if (
                !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(Form.email.value)
            ) {
                alert("{{__('msg.error10')}}");
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
            myRequest.onreadystatechange = function() {
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
    </script>
    <!-- <script src={{--asset('js/index.js')--}}></script> -->
@endsection


