<div class = "container">
    <div class = "row align-items-center">
        <div class = "col-xs-12 mx-auto text-center my-5">
            <h1 class = "display-4">Your account has been verified.</h1>
            <a href ="<?= base_url() ?>register/successEp" class = "btn btn-primary mt-4">Go back to login page</a>
            <center>
                <br><br>
                <div class="alert alert-info col-6">
                    <h4>You must pay first before you can login as an Event Planner.</h4>
                    <button  class="btn btn-success" data-toggle="modal" data-target="#payment" title = "Payment">
                        <i class="fa fa-money"></i> Payment
                    </button>  
                </div>
            </center>
        </div>
    </div>
</div>

<!--Payment-->
<div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info border-0 text-white">
                <h5 class="modal-title text-white">  <i class="fa fa-money"></i>  Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>BPI over-the-counter (OTC)</p>
                <p>This service allows client to pay their reservation and other fees over-the-counter in any of over 500 branches of BPI nationwide. Just proceed to the teller's counter and pay your tuition and other fees.</p>
                <p>STEPS:</p>
                <ol type="1">
                    <li>Fill out a deposit slip (available at any BPI Branch nationwide) with the following information:</li>
                    <ol type="a">
                        <li>Account Number - 002298-0032-52</li>
                        <li>Account Name - Creative Solutions</li>
                        <li>Reference No. - your username</li>
                        <li>Policy/Planholder's Name - your name</li>
                        <li>Amount</li>
                    </ol>
                    <li>Only CASH payment will be accepted by BPI branches.</li>
                </ol>

            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>