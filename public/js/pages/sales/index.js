const loadSales = (async () => {
  const { getHeaders } = commonService();
  try {
    const sales = await axios.get(`${APP_URL}/api/sales/get-sales`, [], getHeaders());
    const response = sales.data;
    salesList = response.data;
    $('#sales-list').empty();
    for(let a = 0; a < salesList.length; a++) {
      $('#sales-list').append(`
          <tr>
            <td>${salesList[a].products.motorcycle.store.store_name}</td>
            <td>${salesList[a].products.motorcycle.motorcycle_name}</td>
            <td>${salesList[a].products.motorcycle.store.store_name}</td>
            <td>${salesList[a].old_stock}</td>
            <td>${salesList[a].new_stock}</td>
            <td>&#8369; ${salesList[a].old_price}</td>
            <td>&#8369; ${salesList[a].new_price}</td>
          </tr>
      `);
    }
  } catch(error) {
    console.error(error);
  }
})();

function ExportToExcel(type, fn, dl) {
  var elt = document.getElementById('sales');
  var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
  return dl ?
    XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
    XLSX.writeFile(wb, fn || ('Sales Report.' + (type || 'xlsx')));
}