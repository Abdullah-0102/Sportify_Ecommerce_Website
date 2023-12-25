@extends('layouts.boiler_plate')
@section('content')
<!-- Form Section -->
<div class="form-container">
        <form method="post" action="{{ route('insertClientQuery') }}" class="m-3 p-3" style="width: 40%;">
            @csrf
            <fieldset>
                <legend>
                    <h3>DROP US A LINE</h3>
                </legend>
                <div class="form-group">
                    <label for="name">Your Name &lpar;required&rpar;</label>
                    <input name = 'name' type="text" id="name" class="form-control" aria-describedby="YourName"
                        placeholder="Enter your Full Name" required>
                </div>
                <div class="form-group">
                    <label for="email">Your Email &lpar;required&rpar;</label>
                    <input name = 'email' type="email" id="email" class="form-control" aria-describedby="YourEmail"
                        placeholder="Enter your email here" required>
                </div>
                <div class="form-group">
                    <label for="phone">Your Phone Number &lpar;required&rpar;</label>
                    <input name = 'phone' type="tel" id="phone" class="form-control" pattern="[0-9]{4}-[0-9]{7}"
                        aria-describedby="YourPhone" placeholder="03xx-xxxxxxx" required>
                </div>
                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea name = 'message' id="message" rows="3" class="form-control"></textarea>
                </div>
            </fieldset>
            <button type="submit" class="btn btn-outline-dark btn-block">Send</button>
        </form>
    </div>
@endsection