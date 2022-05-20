const { showSpinner, hideSpinner } = spinner();
let productList = null;
let productId = 0;
$form = $('#productForm');
let create = true;
let update = false;

$form.on('submit', function(e) {
  e.preventDefault(); 
  const productIn = {
    "motorcycle_type_id" : $('[name="motorcycle_type_id"]').val(),
    "product_name" : $('[name="product_name"]').val(),
    "product_price" : $('[name="product_price"]').val(),
    "product_stock" : $('[name="product_stock"]').val()
  }

  if (create) {
    productRequest(productIn);
  } else if(update) {
    productIn.id = productId;
    updateProductRequest(productIn)
  }
});

const updateProductRequest = async (productIn) => {
  const { getHeaders } = commonService();
  try {
    showSpinner($form);
    const product = await axios.post(`${APP_URL}/api/product-area/update-my-products`, productIn, getHeaders());
    const response = product.data;
    hideSpinner($form);
    if (response.status_code === 1) {
      location.reload();
      $('.updated').removeClass('d-none');
      $('.error').addClass('d-none');
      return;
    }
    $('.updated').addClass('d-none');
    $('.error').removeClass('d-none');
  } catch (error) {
    $('.updated').addClass('d-none');
    $('.error').removeClass('d-none');
    hideSpinner($form);
    console.error(error);
  }
}

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
    productList = response.data;
    $('#product-list').empty();
    for(let a = 0; a < productList.length; a++) {
      $('#product-list').append(`
          <tr>
            <td>${productList[a].id}</td>
            <td>${productList[a].product_name}</td>
            <td>&#8369; ${productList[a].product_price}</td>
            <td>${productList[a].product_stock}</td>
            <td>${productList[a].motorcycle.motorcycle_name}</td>
            <td>
            <button class="btn btn-danger edit" data-id="${productList[a].id}">Edit</button>
            </td>
          </tr>
      `);
    }
  } catch(error) {
    console.error(error);
  }
})();

$(document).on('click', '.edit', function() {
  const productId_ = $(this).attr('data-id');
  productId = productId_
  const prodList = productList.find(q => q.id == productId_);
  $('[name="motorcycle_type_id"]').val(prodList.motorcycle_type_id);
  $('[name="product_name"]').val(prodList.product_name);
  $('[name="product_price"]').val(prodList.product_price);
  $('[name="product_stock"]').val(prodList.product_stock);
  update = true;
  create = false;
});