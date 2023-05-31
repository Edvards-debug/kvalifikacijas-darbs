
let cart = JSON.parse(localStorage.getItem('cart')) || [];
let cartTotal = document.querySelector('#cart-total');
let stripe = Stripe('pk_test_51NDQjkGNH2Xh41tJXhpyyJkQACnGcju9xsfZGxnjDhSGdckiKwIdXmLjUBMkSbmWMqNQQXKcbRnAlODlE6GOxAnm00VTWq6fgl');


function addToCart(event) {
 
  var button = event.target;

  var name = button.getAttribute('data-name');
  var price = button.getAttribute('data-price');
  var quantity = document.querySelector('#quantity').value;
  var image = button.getAttribute('data-image');
  var color = document.querySelector('#color').value;
  var size = document.querySelector('#size').value;

  if(color && size && quantity) {
    var existingItem = cart.find(item => item.name === name && item.color === color && item.size === size);
    
    if (existingItem) {
    
      existingItem.quantity += parseInt(quantity);
    } else {
      
      var item = {
        id: Date.now().toString(),
        name: name,
        price: price,
        color: color,
        size: size,
        quantity: parseInt(quantity),
        image: image
      };
      cart.push(item);
    }

    localStorage.setItem('cart', JSON.stringify(cart));
   
    updateCartUI();

  } else {
    alert("Please select color, size and quantity");
  }
}

function removeFromCart(event) {
  var button = event.target;


  var id = button.getAttribute('data-id');

 
  cart = cart.filter(item => item.id !== id);


  localStorage.setItem('cart', JSON.stringify(cart));


  updateCartUI();
}

function updateCartUI() {
  var cartProducts = document.querySelector('#cart-products');
  var cartTotal = document.querySelector('#cart-total');
  
  cartProducts.innerHTML = '';
  cartTotal.innerHTML = '';

  var total = 0;

  cart.forEach(item => {
    var itemElement = document.createElement('div');
    itemElement.innerHTML = `
      <div id="prodcont" style="display:flex; flex-direction:row;">
        <img src="${item.image}" alt="Product image" style="object-fit:cover; width:40%; display:flex; justify-content:center; margin:10px;">
        <div id="prodstat" style="display:flex; flex-direction: column; margin: 30px; font-size: 1vw">
          <div style="margin:10px">${item.name}</div>
          <div style="margin:10px">Color: ${item.color}</div>
          <div style="margin:10px">Size: ${item.size}</div>
          <div style="margin:10px">Quantity: ${item.quantity}</div>
          <div style="margin:10px">Price: ${item.price}</div>
        </div>
      </div>
      <button class="delete-button" data-id="${item.id}">Delete</button>
    `;
    cartProducts.appendChild(itemElement);
    
    total += Number(item.price.replace('€', '')) * item.quantity;
  });

 
  cartTotal.innerHTML = `Total Price: &euro;${total.toFixed(2)}`;

  if (cart.length == 0) {
    let checkoutButton = document.querySelector('.checkout-button');
    if (checkoutButton) checkoutButton.remove();

    let spaceElement = document.querySelector('.space-element');
    if (spaceElement) spaceElement.remove();
  }

  else if (cart.length && !document.querySelector('.checkout-button')) {
    let checkoutButton = document.createElement('button');
    checkoutButton.classList.add('checkout-button');
    checkoutButton.innerText = "Checkout";
    checkoutButton.style.marginBottom = '20px';
    checkoutButton.addEventListener('click', handleCheckout);

    if (!document.querySelector('.space-element')) {
      let spaceElement = document.createElement('div');
      spaceElement.classList.add('space-element');
      spaceElement.style.height = '100px';
      checkoutButton.insertAdjacentElement('afterend', spaceElement);
    }
  }
}

document.addEventListener('click', function(event) {
  if (event.target.matches('.add-to-cart-button')) {
    addToCart(event);
  }

  if (event.target.matches('.delete-button')) {
    removeFromCart(event);
  }
});

updateCartUI();

function handleCheckout(event) {
  event.preventDefault();

  fetch('/create-checkout-session', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      cart: cart,
    }),
  })
  .then(function(response) {
    return response.json();
  })
  .then(function(session) {
    return stripe.redirectToCheckout({ sessionId: session.id });
  })
  .then(function(result) {

    if (result.error) {
      alert(result.error.message);
    }
  })
  .catch(function(error) {
    console.error('Error:', error);
  });
}
