const { getHeaders } = commonService();

const logout = async () => {
  try {
    const logout = await axios.post(`${APP_URL}/api/login/logout`, [], getHeaders());
    const response = logout.data;
    localStorage.clear();
    window.location = '/login';
  } catch (error) {
    console.error(error);
  }
}