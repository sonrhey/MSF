const { showSpinner, hideSpinner } = spinner();
$form = $('#motorcycleForm');

$form.on('submit', function(e) {
  e.preventDefault(); 
  const motorcycleIn = {
    "store_id" : $('[name="store_id"]').val(),
    "motorcycle_name" : $('[name="motorcycle_name"]').val()
  }

  motorcycleRequest(motorcycleIn);
});

const motorcycleRequest = async (motorcycleIn) => {
  const { getHeaders } = commonService();
  try {
    showSpinner($form);
    const motorcycle = await axios.post(`${APP_URL}/api/motorcycle-type/store`, motorcycleIn, getHeaders());
    const response = motorcycle.data;
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
    hideSpinner($form);
    console.error(error);
  }
}

const loadMotoTypes = ( async () => {
  const { getHeaders } = commonService();
  try {
    const moto = await axios.get(`${APP_URL}/api/motorcycle-type/get-motorcycles`, [], getHeaders());
    const response = moto.data;
    const motoList = response.data;
    $('#moto-list').empty();
    for(let a = 0; a < motoList.length; a++) {
      $('#moto-list').append(`
          <tr>
            <td>${motoList[a].id}</td>
            <td>${motoList[a].motorcycle_name}</td>
            <td>${motoList[a].store.store_name}</td>
          </tr>
      `);
    }
  } catch(error) {
    console.error(error);
  }
})();