@extends('layouts.layout')

@section('content')
<div class="container mt-5 mb-5">
    <div class="contacts-container">       
        <h1>CONTACT US</h1>
        <br />
        <p>Thank your for getting in touch with us. <br />We will get back to you as soon as we can.</p>
        <p>Please enter the information below to pull up your order.</p>
        <br />
        <form method="POST" action="">
            <label for="fname">Name</label><br/>
            <input type="text" id="name" name="name" placeholder="Your name..." style="width:75%" required>
            <br/><br/>
            <label for="email">E-Mail</label><br/>
            <input type="text" id="email" name="email" placeholder="Your e-mail address..." style="width:75%" required>
            <br/><br/>
            <label for="subject">Subject</label><br/>   
            <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px; width:75%;" required></textarea>
            <br/>
            <input id="submit" type="submit" value="Submit">
        </form>
    </div>
</div> 
@endsection