<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layouts.shared/title-meta', ['title' => "Privacy Policy"])
    @include('layouts.shared/head-css', ["mode" => $mode ?? '', "demo" => $demo ?? ''])
    <title>Contact us</title>
<style>
    #loader {
    font-size: 60px;
    display: grid !important;
    align-items: center;
    justify-content: center;
    position: fixed;
    top: 40%;
    margin-left: 50%;
    transform: translate(-50%, -50%);
    height: 50px;
    width: 100%;
    z-index: 9999;
    color: grey;
    align-items: center
}

</style>
</head>
<body class="bg-white" style="font-family: 'Poppins', 'Helvetica Neue', Helvetica, Roboto, sans-serif;">
   
<div id="loader" style="display: none !important;">
    <i class="fas fa-spinner fa-spin"></i> 
</div>

    <div class="container bg-white shadow p-4 mt-4">

        <h4 class="text-center">Contact Us</h4>
        <form action="{{route('contact-us.store')}}" id="contact-us" onsubmit="return submitForm()" method="POST">
            @csrf
        <label for="name">Name</label>
        <br>
        <span class="text-danger" id="nameError"></span>
        <input type="text" name="name" id="name" class="form-control mb-2" placeholder="Enter your name">

        <label for="email">Email</label>
        <br>
        <span class="text-danger" id="emailError"></span>
        <input type="text" name="email" id="email" class="form-control mb-2" placeholder="Enter your email">

        <label for="message">Message</label>
        <br>
        <span class="text-danger" id="messageError"></span>
        <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message....."></textarea>
        <div class="text-center py-3">
        <button class="btn  btn-success" type="submit">Submit</button></div>
    </form>
    </div>


    <script>
       function submitForm() {
        var nameInput = document.getElementById('name');
        var emailInput = document.getElementById('email');
        var messageInput = document.getElementById('message');
        var nameError = document.getElementById('nameError');
        var emailError = document.getElementById('emailError');
        var messageError = document.getElementById('messageError');
        var isValid = true;

        // Clear previous error messages
        nameError.innerText = '';
        emailError.innerText = '';
        messageError.innerText = '';

        // Validate name input
        if (nameInput.value.trim() === '') {
            nameError.innerText = 'Please enter your name.';
            isValid = false;
        }

        // Validate email input
        if (emailInput.value.trim() === '') {
            emailError.innerText = 'Please enter your email.';
            isValid = false;
        }

        // Validate message input
        if (messageInput.value.trim() === '') {
            messageError.innerText = 'Please enter your message.';
            isValid = false;
        }

        // Return false if any field is invalid
        if( isValid){
          
        const loader = document.querySelector('#loader');

            loader.style.display = 'block';
            return isValid;
        }else{

            return isValid;
        }
       
    
        }
    
    
    </script>
</body>
</html>