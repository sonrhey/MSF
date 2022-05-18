const commonService = () => {
  const setUserAndToken = (user, token) => {
    localStorage.setItem('user', JSON.stringify(user));
    localStorage.setItem('token', token);
  }
  const getUserAndToken = (option) => {
    return localStorage.getItem(option);
  }
  const getHeaders = () => {
    const headers = {
      'Authorization': `Bearer ${getUserAndToken('token')}`
    }
    return headers;
  }

  return { setUserAndToken, getUserAndToken, getHeaders }
}