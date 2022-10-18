<div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Address</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                <div class="address-container">
                    <div>
                        <input type="text" name="contact_name" placeholder="Full Name">
                    </div>
                    <div>
                        <input type="text" name="phone_number" placeholder="Phone Number">
                    </div>
                    <div>
                        <input type="text" name="address" placeholder="Street">
                    </div>
                    <div>
                        <input type="text" name="unit" placeholder="Apartments, Units, Etc">
                    </div>
                    <div>
                        <select name="country" class="edit_country">
                            @foreach(array_column($json,'name') as $key => $value)
                            <option id="{{ $key }}" value="{{ $json[$key]['name'] }}">{{ ($json[$key]['name']) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <span class="spr">
                            <span class="spr">
                                 <select name="spr" class="spr-select">
                                @foreach($json[0]['states'] as $key => $value)
                                    <option id="{{ $key }}" value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                                </select>
                            </span>
                        </span>
                    </div>
                    <div>
                        <input type="text" name="city" placeholder="City">
                    </div>
                    <div>
                        <input type="text" name="zipcode" placeholder="Zip code">
                    </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="bg-red-500 rounded px-10 py-2 text-white text-sm" data-bs-dismiss="modal">Close</button>
        <button type="button" class="main-bg-c rounded px-10 py-2 text-white text-sm save_change">Save Change</button>
      </div>
    </div>
  </div>
</div>