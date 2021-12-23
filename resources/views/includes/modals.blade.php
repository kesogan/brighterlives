
<!--Donate Modal for home-->
<div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="donateModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="donateModalCenterTitle">Donation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="#">
        <div class="form-group">
            <label for="payer_name">Your Name</label>	
            <input type="text" id="payer_name" class="form-control input-sm" placeholder="e.g John Doe" required>
        </div>
        <div class="form-group">
            <label for="donor_email">Your Email</label>	
            <input type="email" id="payer_email" class="form-control input-sm" placeholder="e.g martin.prince@example.com" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>	
            <input type="number" id="amount" class="form-control input-sm" placeholder="e.g 10000" required>
        </div>
        <div class="form-group">
            <label for="momo_number">MoMo Number</label>	
            <input type="text" id="momo_number" class="form-control input-sm" placeholder="MoMo Number" required>
        </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Donate</button>
        </form><!-- close form -->
      </div>
    </div>
  </div>
</div>

<!--Donate Modal individual association page-->
<div class="modal fade" id="mydonateModal" tabindex="-1" role="dialog" aria-labelledby="donateModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mydonateModalCenterTitle">Donation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="#">
        <div class="form-group">
            <label for="association_name">Association Name</label>	
            <input type="text" id="association_name" class="form-control input-sm" placeholder="MoM Association" value="MoM Association" required>
        </div>
        <div class="form-group">
            <label for="donor_name">Your Name</label>	
            <input type="text" id="donor_name" class="form-control input-sm" placeholder="e.g John Doe" required>
        </div>
        <div class="form-group">
            <label for="donor_email">Your Email</label>	
            <input type="email" id="payer_email" class="form-control input-sm" placeholder="e.g martin.prince@example.com" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>	
            <input type="number" id="amount" class="form-control input-sm" placeholder="e.g 10000" required>
        </div>
        <div class="form-group">
            <label for="momo_number">MoMo Number</label>	
            <input type="text" id="momo_number" class="form-control input-sm" placeholder="MoMo Number" required>
        </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Donate</button>
    </form>
      </div>
    </div>
  </div>
</div>


<!--Checkout Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="checkoutModalCenterTitle">Checkout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="#">
        <div class="form-group">
            <label for="association_name">Your name</label>	
            <input type="text" id="association_name" class="form-control input-sm" placeholder="e.g Martin Prince" value="" required>
        </div>
        <div class="form-group">
            <label for="donor_email">Your Email</label>	
            <input type="email" id="payer_email" class="form-control input-sm" placeholder="e.g martin.prince@example.com" required>
        </div>
        <div class="form-group">
            <label for="donor_name">Your Address</label>	
            <input type="text" id="payer_name" class="form-control input-sm" placeholder="e.g Rue Kotto, Deido, Douala" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>	
            <input type="number" id="amount" class="form-control input-sm" value="23500" required>
        </div>
        <div class="form-group">
            <label for="momo_number">MoMo Number</label>	
            <input type="number" id="momo_number" class="form-control input-sm" placeholder="MoMo Number" required>
        </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">make Payment</button>
    </form>
      </div>
    </div>
  </div>
</div>