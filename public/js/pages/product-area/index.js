const { showSpinner, hideSpinner } = spinner();
$form = $('#productForm');

$form.on('submit', function(e) {
  e.preventDefault(); 
  const productIn = {
    "motorcycle_type_id" : $('[name="motorcycle_type_id"]').val(),
    "product_name" : $('[name="product_name"]').val(),
    "product_price" : $('[name="product_price"]').val(),
    "product_stock" : $('[name="product_stock"]').val()
  }

  productRequest(productIn);
});

const productRequest = async (productIn) => {
  const { getHeaders } = commonService();
  try {
    showSpinner($form);
    const product = await axios.post(`${APP_URL}/api/product-area/store`, productIn, getHeaders());
    const response = product.data;
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


const loadProducts = ( async () => {
  const { getHeaders } = commonService();
  try {
    const products = await axios.get(`${APP_URL}/api/product-area/get-my-products`, [], getHeaders());
    const response = products.data;
    const productList = response.data;
    $('#product-list').empty();
    for(let a = 0; a < productList.length; a++) {
      $('#product-list').append(`
          <tr>
            <td>${productList[a].id}</td>
            <td>${productList[a].product_name}</td>
            <td>&#8369; ${productList[a].product_price}</td>
            <td>${productList[a].product_stock}</td>
            <td>${productList[a].motorcycle.motorcycle_name}</td>
          </tr>
      `);
    }
  } catch(error) {
    console.error(error);
  }
})();