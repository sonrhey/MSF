const { showSpinner, hideSpinner } = spinner();
const { setUserAndToken, getUserAndToken } = commonService();
$form = $('#logInForm');

$('#logInForm').on('submit', function(e) {
  e.preventDefault();

  const request = {
    "email" : $('[name="email"]').val(),
    "password" : $('[name="password"]').val()
  }

  showSpinner($form);
  loginRequest(request);
});

const loginRequest = async (request) => {
  try {
    const login = await axios.post(`${APP_URL}/api/login/store`, request);
    const response = login.data;
    if (response.status_code === 0) {
      hideSpinner($form);
      $('.error-login').removeClass('d-none');
      return;
    }
    setUserAndToken(response.data.user, response.data.token);
    window.location = '/dashboard';
  } catch (error) {
    $('.error-login').removeClass('d-none');
    hideSpinner($form);
    console.error(error);
  }
}