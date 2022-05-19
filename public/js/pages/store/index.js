function initMap() {
  const options = { componentRestrictions: { country: 'ph' } };
  const input = document.getElementById('store_address');
  const autocomplete = new google.maps.places.Autocomplete(input, options);

  google.maps.event.addListener(autocomplete, 'place_changed', function () {
      const place = autocomplete.getPlace();
      placeName= place.name;
      placeOrigin = place.geometry.location.lat();
      placeDestination = place.geometry.location.lng();
  });
}

let placeName, placeOrigin, placeDestination;
$form = $('#storeFormSubmit');

$form.on('submit', function(e) {
  e.preventDefault();

  const storeIn = {
    "store_name" : $('[name="store_name"]').val(),
    "store_address" : placeName,
    "store_origin_coords" : placeOrigin,
    "store_destination_coords" : placeDestination,
    "store_owner" : $('[name="store_owner"]').val(),
    "store_hours_from" : $('[name="store_hours_from"]').val(),
    "store_hours_to" : $('[name="store_hours_to"]').val()
  }

  storeRequest(storeIn);
});

const storeRequest = async (storeIn) => {
  const { showSpinner, hideSpinner } = spinner();
  const { getHeaders } = commonService();

  showSpinner($form);
  try {
    const store = await axios.post(`${APP_URL}/api/store-registration/store`, storeIn, getHeaders());
    const response = store.data;
    hideSpinner($form);
    if (response.status_code === 1) {
      location.reload();
      $('.success').removeClass('d-none');
      $('.error').addClass('d-none');
      return;
    }
    $('.success').addClass('d-none');
    $('.error').removeClass('d-none');
  } catch (error) {
    $('.success').addClass('d-none');
    $('.error').removeClass('d-none');
    console.error(error);
    hideSpinner($form);
  }
}

const loadStores = (async () => {
  try {
    const { getHeaders } = commonService();
    const stores = await axios.get(`${APP_URL}/api/store-registration/get-all-stores`, getHeaders());
    const response = await stores.data;
    const storeList = response.data;
    $('#store-list').empty();
    for(let a = 0; a < storeList.length; a++) {
      $('#store-list').append(`
          <tr>
            <td>${storeList[a].id}</td>
            <td>${storeList[a].store_name}</td>
            <td>${storeList[a].store_address}</td>
            <td>${storeList[a].store_hours_from} - ${storeList[a].store_hours_to}</td>
            <td>${storeList[a].store_owner}</td>
          </tr>
      `);
    }
  } catch (error) {
    console.error(error);
  }
})()