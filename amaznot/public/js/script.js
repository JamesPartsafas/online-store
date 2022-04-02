/*NAVBAR*/
const languages = ["EN", "FR"];
const currencies = ["CAD", "USD"];

$(document).ready(function () {
  $(".change-dropdown").click(function () {
    if (languages.includes($(this).html())) {
      $(".lang").html($(this).text());
    } else if (currencies.includes($(this).html())) {
      $(".currency").html($(this).text());
    }
  });
  $(".category-item-title").hover(function () {
    const categories = JSON.parse($('.headerData').val());
    const subcategories = categories.filter(cat => cat.category === $(this).html().trim()).map(cat => cat.subcategory);
    let htmlElements = subcategories.map(sub => {
      const url = `https://${window.location.host}/products/${encodeURI($(this).html().trim())}?subcategory=${encodeURI(sub)}`;
      return `<a class="category-item-link" href=${url}>${sub}</a>`
    });
    htmlElements = htmlElements.join("")
    $(".category-links").html(`<h5 class="category-item-header">Choose a Subcategory</h5>${htmlElements}`);
  })
})
/*END NAVBAR*/

/*TABBED SECTIONS*/
// Show all columns
filterSelection("Description") 
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column-bestsellers");
  if (c == "all") c = "";
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
/*END TABBED SECTIONS*/

/*CART SECTION*/
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

//Remove item from cart
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

//Decrement quantity
const decrement = (id) => {
  let value = document.getElementById(id).value

  if (value <= 0)
    return

  value--
  document.getElementById(id).value = value
};

//Increment quantity
const increment = (id) => {
  let value = document.getElementById(id).value

  value++
  document.getElementById(id).value = value
};

/*END CART SECTION*/

/*ORDERS SECTION*/
// Logic for order history table - IE6 Friendly
// Sort items according to header
function sort(th) {

  if (this.asc === undefined)
    this.asc = true;

  var table = th.parentElement;

  while (table.tagName.toUpperCase() != 'TABLE') {
      table = table.parentElement;
      if (!table)
          return false;
  }

  Array.prototype.slice.call(table.lastElementChild.querySelectorAll('tr'))
      .sort(comparer(Array.prototype.slice.call(th.parentNode.children).indexOf(th), this.asc = !this.asc))
      .forEach(function (tr) { table.lastElementChild.appendChild(tr) });

  if (this.asc)
      th.textContent = th.textContent.replace('↑', '↓');
  else
      th.textContent = th.textContent.replace('↓', '↑');
}

// Retieve item data
function getCellValue (tr, index) { 
  return tr.children[index].innerText || tr.children[index].textContent; 
}

// Compares two items
function comparer (index, asc) {
  return function (a, b) {
      return function (value1, value2) {
          return (value1 !== '' && value2 !== '' && !isNaN(value1) && !isNaN(value2))
              ? value1 - value2
              : value1.toString().localeCompare(value2);
      }(getCellValue(asc ? a : b, index), getCellValue(asc ? b : a, index));
  }
};

/*END ORDERS SECTION*/