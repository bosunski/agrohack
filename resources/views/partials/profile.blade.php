<div class="col-12 col-md-4 profile-div px-3 pb-5 pt-2 border-left">

<div class="d-flex">
  <h4 class="text-center mr-auto">EDIT MY PROFILE</h4>
  <span class="text-right btn bg-transparent btn-close"  style="cursor: pointer;">X</span>
</div>

  <div class="signupcontent mt-5">
     <div class="profile-img border text-center py-3">
    @if(Auth::user()->picture)
        <img id="prv-image" src="/img/users/{{ Auth::user()->picture }}" alt="profile pics" srcset="">
    @else
        <img id="prv-image" src="/img/profile-pic.svg" alt="profile pics" srcset="">
    @endif
 </div>
 <form enctype="multipart/form-data" action="{{ route('update-profile', Auth::user()->id) }}" method="post" class="form">
     @csrf
   <div class="form-group  mb-3">
     <input required value="{{ Auth::user()->name }}" type="text" class="form-control  border-top-0 border-left-0 border-right-0 rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
   </div>
   <!--<div class="form-group  mb-3">
     <input required type="text" class="form-control  border-top-0 border-left-0 border-right-0 rounded-0" id="exampleInputPassword1" placeholder="Middle Name">
   </div>

   <div class="form-group   mb-3">
     <input required type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" id="exampleInputPassword1" placeholder="Last Name">
 </div>-->

   <select id="pr-gender" required selected="{{ Auth::user()->gender }}" name="gender" class="custom-select border-top-0 border-left-0 border-right-0 rounded-0 mb-3">
     <option value="">-- Gender --</option>
     <option value="Male">Male</option>
     <option value="Female">Female</option>

   </select>

   <div class="form-group mb-3">
     <input required value="{{ Auth::user()->location }}" type="text" class="form-control  border-top-0 border-left-0 border-right-0 rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Address /Location">
   </div>

   <select id="pr-state" required selected="{{ Auth::user()->state }}" class="custom-select  border-top-0 border-left-0 border-right-0 rounded-0mb-3" name="state" id="state">
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

      <div class="form-group mb-3">
     <input value="{{ Auth::user()->phone }}" name="phone" type="number" class="form-control  border-top-0 border-left-0 border-right-0 rounded-0" id="exampleInputPassword1" placeholder="Phone number">
   </div>

   <div class="form-group mb-3">
     <input value="{{ Auth::user()->farmproducts }}" name="farmproducts" type="text" class="form-control  border-top-0 border-left-0 border-right-0 rounded-0 " id="exampleInputPassword1" placeholder="Farm produce">
   </div>

   <div class="form-group mb-3">
     <input style="display:none;" name="picture" type="file" class="form-control" id="picture" placeholder="Phone">
   </div>

   <div class="d-flex justify-content-center">
       <button class="btn btn-primary"> Save</button>
   </div>
</form>
</div>
