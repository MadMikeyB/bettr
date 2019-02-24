@extends('layouts.master')
@push('styles-before')
<title>Privacy Policy - Bettr.</title>
@endpush
@section('content')
@hero(['title' => 'Privacy Policy'])
@endhero

<div class="website">
    <div class="website__flex-container--small">
        <div class="box">
            <div class="box__content">

                <p><strong>What information is being collected?</strong></p>
                <p>mytrackr (The application) collect your email address, IP address (through our web server), and a password which is stored and hashed in our database.</p>
                
                <p>The application also collects any information you submit through the application, including but not limited to; goals, targets, friends, trophies.</p>
                
                <p><strong>Who is collecting it?</strong></p>
                <p>Michael Burton, 4-17 Barton Street, Beeston, Nottingham. Contact me on me[at]mikeylicio.us</p>
                
                <p><strong>How is it collected?</strong></p>
                <p>Data is collected by the application. All data collected is via user submission.</p>
                
                <p><strong>Why is it being collected?</strong></p>
                <p>The data we collect is required for the application to operate. Without the data you submit, there is no application.</p>
                
                <p><strong>How will it be used?</strong></p>
                <p>The data is used to power the application only.</p>

                <p><strong>Who will it be shared with?</strong></p>
                <p>The data you submit is not shared with anyone. Your privacy is our primary concern.</p>
            </div>
        </div>
    </div>
</div>
@endsection
