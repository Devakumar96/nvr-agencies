
//addToCart function added
let cart = JSON.parse(localStorage.getItem("cart")) || [];
function addToCart(name, price) {
  cart.push({ name, price });
  localStorage.setItem("cart", JSON.stringify(cart));
  alert("Added to cart");
}

function saveCart() {
  localStorage.setItem("cart", JSON.stringify(cart));
}

function addToCart(name, price) {
  let existing = cart.find(item => item.name === name);

  if (existing) {
    existing.qty++;
  } else {
    cart.push({ name, price, qty: 1 });
  }

  saveCart();
  alert("Added to cart");
}

function changeQty(index, change) {
  cart[index].qty += change;

  if (cart[index].qty <= 0) {
    cart.splice(index, 1);
  }

  saveCart();
  location.reload();
}

function removeItem(index) {
  cart.splice(index, 1);
  saveCart();
  location.reload();
}