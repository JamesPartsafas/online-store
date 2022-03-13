@extends('layouts.layout')

@section('content')
<div class="container mt-5 mb-5">
    <div class="contacts-container">       
        <h1>CONTACT US</h1>
        <br />
        <p>Thank your for getting in touch with us. <br />We will get back to you as soon as we can.</p>
        <br />
        <form method="" action="">
            <label for="fname">Name</label><br/>
            <input type="text" id="name" name="name" placeholder="Your name..." style="width:75%" required>
            <br/><br/>
            <label for="email">E-Mail</label><br/>
            <input type="text" id="email" name="email" placeholder="Your e-mail address..." style="width:75%" required>
            <br/><br/>
            <label for="subject">Subject</label><br/>   
            <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px; width:75%;" required></textarea>
            <br/>
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal">Submit</button>
        </form>
    </div>
</div> 

<div id="modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Contact us.</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Thank you for getting in touch with us. <br/> We will get back to you within 24-48 business hours.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.href='{{ route('home') }}';">Return to Home</button>
        </div>
      </div>
  
    </div>
  </div>
@endsection