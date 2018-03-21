<div id="note-boxer" style="display:none;" class="prf-boxer col-12 col-md-4  pb-5 border-left bg-white">

  <div id="message-box" style="" class="chat mx-0 px-0">

    <div class="chat-contact-details p-2 mx-0 bg-white">
      <div class="row p-0 m-0">
        <div class="col-6 col-md-8 pl-2 pr-0 py-0 m-0">
          <h5 id="note-title"></h5>
        </div>
      </div>
      <h4>Notification Message:</h4>
      <p id="note-message" class="mt-0 pt-0"></p>
    </div>
  </div>
</div>


<div id="chat-boxer" style="display:none;" class="prf-boxer col-12 col-md-4  pb-5 border-left bg-white">

  <div id="message-box" style="" class="chat mx-0 px-0">

    <div class="chat-contact-details p-2 mx-0 bg-white">
      <div class="row p-0 m-0">
        <div class="col-6 col-md-4 p-0 m-0">
          <img src="/img/profile-pic.svg"  class="img-responsive img-fluid bg-light p-4 m-0 border links" width="100%;">
        </div>
        <div class="col-6 col-md-8 pl-2 pr-0 py-0 m-0">
          <h5 id="message-name">Nedy Udpmbat, <span class="fa-l-d"><em id="message-gender">sex</em></span></h5>
          <i id="message-location" class="fa fa-map-marker-alt fa-l mb-2">&nbsp; Address</i>
          <i id="message-phone" class="fa fa-phone fa-l" >&nbsp; phone number</i>
        </div>
      </div>
      <h5  class="fa-l-dd mt-2 mb-0 pb-0">Farm produce</h5>
      <p id="message-farmproduce" class="mt-0 pt-0">Rice; Cassava; Millet;</p>
    </div>

    <div class="chat-space bg-light">
      <!--Chat header-->
      <!-- <div class="chat-space-header">
          User name
          <h5 class="text-left user-name">Nedy Udombat</h5>
          <i class="fa fa-angle-down acc-icon"></i>
      </div> -->
      <!-- <hr style="margin: 10px 0"> -->
      <div class="chat-box pt-0">
          <!--Area where all the messages will be. Has a max-height. Can be altered-->
          <div id="c-message-list" class="messages-area mt-0">
              <!--sent message from the user-
              <div class="sent-message text-left">
                  <p class="message sent">
                      hey Bosun we can win yea?
                  </p>
              </div>
              <!--Message received-
              <div class="received-message text-left">
                  <p class="message received">
                      Yea sure!
                  </p>
              </div>-->
              No Message between you and this user.
          </div>
          <!--Form to add new messages-->
          <div class="message-input-area">
              <label for="user-message"></label>
              <!--Input area for message-->
              <input type="text" class="message-input" name="user-message" id="user-message"
                     placeholder="Write a message">
              <!--Submit button-->
              <button id="message-send" class="btn" type="submit">
                  <i class="fa fa-paper-plane message-submit"></i>
              </button>
          </div>

      </div>
      <button id="close-chat" type="button" class="btn btn-primary btn-sm-xs" name="button">Close Chat</button>
  </div>
  </div>
</div>
<div style="display:none;" id="profile-boxer" class="prf-boxer col-12 col-md-4 bg-success   profile-div pb-5 border-left bg-light">
  <div class="" style="">
    <div class="d-flex">
        <h4 class="text-center mr-auto">EDIT MY PROFILE</h4>
        <span class="text-right btn bg-transparent btn-close"  style="cursor: pointer;">X</span>
      </div>

      <div class="signupcontent mt-5">
         <div class="profile-img border text-center py-3">
        @if(Auth::user()->picture)
            <img id="prv-image card-img-top" src="/img/users/{{ Auth::user()->picture }}" alt="profile pics" srcset="">
        @else
            <img id="prv-image" src="/img/profile-pic.svg" alt="profile pics" srcset="">
        @endif
     </div>
       <form enctype="multipart/form-data" action="{{ route('update-profile', Auth::user()->id) }}" method="post" class="form">
           @csrf
         <div class="form-group  mb-3">
           <input required value="{{ Auth::user()->name }}" type="text" class="form-control profile-form  border-top-0 border-left-0 border-right-0 rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
         </div>
         <!--<div class="form-group  mb-3">
           <input required type="text" class="form-control  border-top-0 border-left-0 border-right-0 rounded-0" id="exampleInputPassword1" placeholder="Middle Name">
         </div>

         <div class="form-group   mb-3">
           <input required type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" id="exampleInputPassword1" placeholder="Last Name">
       </div>-->

         <select id="pr-gender" required selected="{{ Auth::user()->gender }}" name="gender" class="custom-select border-top-0 border-left-0 border-right-0 rounded-0 mb-3 profile-form ">
           <option value="">-- Gender --</option>
           <option value="Male">Male</option>
           <option value="Female">Female</option>

         </select>

         <div class="form-group mb-3">
           <input name="location" required value="{{ Auth::user()->location }}" type="text" class="form-control  border-top-0 border-left-0 border-right-0 rounded-0 profile-form " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Address /Location">
         </div>


         <select id="pr-state" required selected="{{ Auth::user()->state }}" class="custom-select  border-top-0 border-left-0 border-right-0 rounded-0mb-3 profile-form  " name="state" id="state">
             <option value="">State</option>
             <option value="Abuja FCT">Abuja FCT</option>
             <option value="Abia">Abia</option>
             <option value="Adamawa">Adamawa</option>
             <option value="Akwa Ibom">Akwa Ibom</option>
             <option value="Anambra">Anambra</option>
             <option value="Bauchi">Bauchi</option>
             <option value="Bayelsa">Bayelsa</option>
             <option value="Benue">Benue</option>
             <option value="Borno">Borno</option>
             <option value="Cross River">Cross River</option>
             <option value="Delta">Delta</option>
             <option value="Ebonyi">Ebonyi</option>
             <option value="Edo">Edo</option>
             <option value="Ekiti">Ekiti</option>
             <option value="Enugu">Enugu</option>
             <option value="Gombe">Gombe</option>
             <option value="Imo">Imo</option>
             <option value="Jigawa">Jigawa</option>
             <option value="Kaduna">Kaduna</option>
             <option value="Kano">Kano</option>
             <option value="Katsina">Katsina</option>
             <option value="Kebbi">Kebbi</option>
             <option value="Kogi">Kogi</option>
             <option value="Kwara">Kwara</option>
             <option value="Lagos">Lagos</option>
             <option value="Nassarawa">Nassarawa</option>
             <option value="Niger">Niger</option>
             <option value="Ogun">Ogun</option>
             <option value="Ondo">Ondo</option>
             <option value="Osun">Osun</option>
             <option value="Oyo">Oyo</option>
             <option value="Plateau">Plateau</option>
             <option value="Rivers">Rivers</option>
             <option value="Sokoto">Sokoto</option>
             <option value="Taraba">Taraba</option>
             <option value="Yobe">Yobe</option>
             <option value="Zamfara">Zamfara</option>
             <option value="Outside Nigeria">Outside Nigeria</option>
           </select>
        <div class="form-group mb-3 mt-2">
           <input value="{{ Auth::user()->phone }}" name="phone" type="number" class="form-control  border-top-0 border-left-0 border-right-0 rounded-0 profile-form" id="exampleInputPassword1" placeholder="Phone number">
         </div>

         <div class="form-group mb-3">
           <input value="{{ Auth::user()->farmproducts }}" name="farmproducts" type="text" class="form-control  border-top-0 border-left-0 border-right-0 rounded-0 profile-form" id="exampleInputPassword1" placeholder="Farm produce">
         </div>

         <div class="form-group mb-3">
           <input style="display:none;" name="picture" type="file" class="form-control profile-form " id="picture" placeholder="Phone">
         </div>

         <div class="d-flex justify-content-center mt-5">
          <button class="btn btn-primary rounded-0" style="width: 100%"> Save</button>
         </div>
      </form>

  </div>

</div>
