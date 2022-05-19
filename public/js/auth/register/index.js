const { showSpinner, hideSpinner } = spinner();
const { setUserAndToken, getUserAndToken } = commonService();
$form = $('#registerForm');

$form.on('submit', function(e) {
  e.preventDefault();

  const request = {
    "name" : $('[name="name"]').val(),
    "email" : $('[name="email"]').val(),
    "password" : $('[name="password"]').val()
  }

  showSpinner($form);
  registerRequest(request);
});

const registerRequest = async (request) => {
  try {
    const register = await axios.post(`${APP_URL}/api/register/store`, request);
    const response = register.data;
    if (response.status_code === 0) {
      hideSpinner($form);
      $('.error-login').removeClass('d-none');
      return;
    }
    setUserAndToken(response.data.user, response.data.token);
    window.location = '/login';
  } catch (error) {
    $('.error-login').removeClass('d-none');
    hideSpinner($form);
    console.error(error);
  }
}