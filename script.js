// Menu items and prices (assuming these are fetched from the page menu)
const menuItems = [
    { name: 'Item 1', price: 10 },
    { name: 'Item 2', price: 15 },
    { name: 'Item 3', price: 20 }
  ];
  
  // Display the menu items and prices
  const orderList = document.getElementById('orderList');
  const totalPriceElement = document.getElementById('totalPrice');
  
  menuItems.forEach(item => {
    const li = document.createElement('li');
    li.textContent = `${item.name}: $${item.price}`;
    orderList.appendChild(li);
  });
  
  // Calculate total price
  const totalPrice = menuItems.reduce((acc, curr) => acc + curr.price, 0);
  totalPriceElement.textContent = totalPrice;
  
  // Payment method selection
  const paymentButtons = document.querySelectorAll('.payment-button');
  
  paymentButtons.forEach(button => {
    button.addEventListener('click', () => {
      // Clear selection from other buttons
      paymentButtons.forEach(btn => {
        btn.classList.remove('selected');
      });
  
      // Select the clicked button
      button.classList.add('selected');
    });
  });
  