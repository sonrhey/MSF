const spinner = () => {
  const showSpinner = (parent) => {
    parent.find('button').prop('disabled', true);
    parent.find('button > .button-text').addClass('d-none');
    parent.find('button > .spinner').removeClass('d-none');
  }

  const hideSpinner = (parent) => {
    parent.find('button').prop('disabled', false);
    parent.find('button > .button-text').removeClass('d-none');
    parent.find('button > .spinner').addClass('d-none');
  }

  return { showSpinner, hideSpinner }
}