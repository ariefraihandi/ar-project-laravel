@extends('layouts/boss')

@push('css-addon')
@endpush

@section('content')
    <!-- Pricing -->
    <div id="pricing" class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="above-heading">Redirect</div>
                    <h2 class="h2-heading">Waiting For The File</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Waiting</div>
                            <div class="price" id="countdown"><span class="value">20</span><span class="currency"> Sec</span></div>
                           
                            <div class="divider"></div>
                            
                            <div class="button-wrapper">
                                <button class="btn-solid-reg page-scroll" id="downloadButton" disabled>Download</button>
                            </div>
                        </div>
                    </div><!-- end of card -->
                    <!-- end of card -->

                 
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
    <!-- end of pricing -->


   

@endsection

@push('footer-script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let countdownValue = 20;

        let countdownInterval = setInterval(function () {
            countdownValue--;

            document.getElementById('countdown').innerHTML = '<span class="value">' + countdownValue + '</span><span class="currency"> Sec</span>';

            if (countdownValue <= 0) {
                clearInterval(countdownInterval);
                document.getElementById('downloadButton').disabled = false;
                document.getElementById('statusText').innerHTML = 'File is Ready'; // Change the status text
            }
        }, 1000);

        // Get the subtitle value from the Blade template
        let subtitle = "{!! $subtitle !!}";

        // Add an event listener to the download button
        document.getElementById('downloadButton').addEventListener('click', function () {
            // Redirect to the specified URL
            window.location.href = subtitle;
        });
    });
</script>
@endpush