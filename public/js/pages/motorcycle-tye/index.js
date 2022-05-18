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