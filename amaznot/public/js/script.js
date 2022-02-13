//Here goes all our JavaScript scripts

//TABBED PORTFOLIO
filterSelection("Description") // Execute the function and show all columns
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column-bestsellers");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn-bestsellers");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

//Common logic for cart

const addToCart = (id, productName, price, image, screenUpdateCallback) => {
  const value = document.getElementById(id).value
  let cart = JSON.parse(localStorage.getItem('cart'))
  if (cart == null)
    cart = []
  
  let cartItem = {
    id: id, 
    amount: value,
    name: productName,
    price: price,
    image: image
  }
  let index = cart.findIndex(element => element.id == id)
  
  if (index == -1)
    cart.push(cartItem)
  else {
    cart[index] = cartItem
  }

  localStorage.setItem('cart', JSON.stringify(cart))
  
  screenUpdateCallback(id)
};

const removeFromCart = (id, screenUpdateCallback) => {
  const cart = JSON.parse(localStorage.getItem('cart'))
  if (cart == null)
    return

  const filteredCart = cart.filter((element) => {
    if (element.id !== id)
      return element
  })

  localStorage.setItem('cart', JSON.stringify(filteredCart))

  screenUpdateCallback(id)
};

const decrement = (id) => {
  let value = document.getElementById(id).value

  if (value <= 0)
    return

  value--
  document.getElementById(id).value = value
};

const increment = (id) => {
  let value = document.getElementById(id).value

  value++
  document.getElementById(id).value = value
};

//End cart logic
