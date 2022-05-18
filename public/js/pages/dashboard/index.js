const { getUserAndToken } = commonService();

const authUser = (() => {
  const user = JSON.parse(getUserAndToken('user'));
  console.log(user);
  $('.auth-name').html(user.name);
  $('.auth-email').html(user.email).css({
    'width':'5rem',
    'white-space' : 'nowrap',
    'overflow' : 'hidden'
  });
})()