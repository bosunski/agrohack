<div class="modal fade" id="newContactModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h1>Add User to Contact</h1>
        <p style="text-align:center;">Input email and click Add.</p>
        <form role="form" method="post" action="{{ route('addcontact') }}">
          <input type="hidden" id="mail-budget-id" name="budget_id" value="">
          {{ csrf_field() }}
          <input placeholder="Email" type="email" name="email" class="form-control" required><br/>
          
          <div class="form-group">
                  <button id="add-item-button" class="btn  btn-flat btn-primary btn-lg btn-block">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
