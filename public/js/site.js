//REDUX Giỏ hàng//////


//Khai bao initstate
const initialState = JSON.parse(localStorage.getItem('cart_list')) || []

const countCart = document.querySelector('.action__box.cart .action__box--cart-icon .count--item-cart span')
countCart.textContent = initialState.length

//reducer
const cartReducer = (state = initialState, action) => {
    switch (action.type) {
        case 'ADD_CART':{
            const cartIndex = state.findIndex(item => action.payload.id == item.id)
            const newState = [...state]
            if(cartIndex >= 0) {
                newState[cartIndex].quantity += action.payload.quantity
                newState[cartIndex].total = newState[cartIndex].quantity * newState[cartIndex].price
                return newState
            }else{
                newState.push({...action.payload, total: action.payload.price * action.payload.quantity})
                return newState
            }
        }
        case 'REMOVE_CART' :{
            const newState = state.filter(item => item.id != action.payload)
            return newState
        }
        case 'DECREMENT_CART': {
            const itemId = state.findIndex(item => item.id == action.payload)
            const newState = [...state]
            if(newState[itemId].quantity > 1){
                newState[itemId].quantity -=1
                newState[itemId].total = newState[itemId].quantity * newState[itemId].price
            }
            else{
                newState[itemId].quantity =1
                newState[itemId].total =newState[itemId].price
            }
            return newState
        }
        case 'INCREMENT_CART': {
            const itemId = state.findIndex(item => item.id == action.payload)
            const newState = [...state]
            newState[itemId].quantity +=1
            newState[itemId].total = newState[itemId].quantity * newState[itemId].price
            return newState
        }

        case 'CLEAR_CART': {
            return action.payload
        }

        default:
            break;
    }
}

//Thêm reducer vào store

const store = Redux.createStore(cartReducer)

//======================================

//Render redux cart trong site home
const renderCartHomeSite = (cartList) => {

    if(!Array.isArray(cartList)) return
    const ulElement = document.querySelector('.action__box--listcart')
    ulElement.innerHTML = ''
    if(cartList.length == 0){
        const liElement = document.createElement('li')
        liElement.classList.add('action__box--itemscart-emty')
        liElement.textContent = "Giỏ hàng trống"

        ulElement.appendChild(liElement)
    }
    else{
        
        for (const [index, cart] of cartList.entries()) {
            const liElement = document.createElement('li')
            liElement.classList.add('action__box--itemscart')
            liElement.innerHTML = `<div class="row no-gutters">
                                        <div class="col l-4">
                                            <div class="action__box--itemscart-img">
                                                <img src="${cart.img}" alt="">
                                            </div>
                                        </div>
                                        <div class="col l-6">
                                            <div class="action__box--itemscart-infor">
                                                <h4 class="action__box--itemscart-name">${cart.name}</h4>
                                                <span class="action__box--itemscart-price">${new Intl.NumberFormat('en-US').format(cart.total)}đ</span>
                                                <div class="action__box--itemscart-quantity">
                                                    <button class="action__box--itemscart-btn minus" onclick="decrementQuantityCartItems(${cart.id})"><i class="fas fa-minus"></i></button>
                                                    <input type="text" disabled value="${cart.quantity}" class="action__box--itemscart-value" name="" id="">
                                                    <button class="action__box--itemscart-btn plus" onclick="incrementQuantityCartItems(${cart.id})"><i class="fas fa-plus"></i></button>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col l-2" style="height: auto">
                                            <div class="action__box--itemscart-remove">
                                                <button onclick = "removeCartItems(${cart.id})"><i class="fas fa-times-circle"></i></button>
                                                <input class="action__box--itemscart-removeId" type="hidden" value="${cart.id}" />
                                            </div>
                                        </div>
                                    </div>`
            ulElement.appendChild(liElement)
            if(index > 3) break
        }
        const quantityCartLeft = document.querySelector('.action__box--goto-cart-text')
        quantityCartLeft.textContent = cartList.length > 5 ? `Xem thêm ${cartList.length - 5} sản phẩm khác!` : 'Đi tới giỏ hàng!'
    }

}

const renderCartPage = (cartList) => {

    if(!Array.isArray(cartList)) return
    const divElement = document.querySelector('.cart__left--main')
    const sumPrice = document.querySelector('.cart__sum--title .cart__sum--value')
    updateSumPriceCart(cartList, sumPrice)
    if(divElement){
        divElement.innerHTML = ''
    }
    if(cartList.length == 0){
        const pElement = document.createElement('p')
        pElement.classList.add('action__box--itemscart-emty')
        pElement.textContent = "Giỏ hàng trống"
        if(divElement) divElement.appendChild(pElement)
    }
    else{
        
        for (const [index, cart] of cartList.entries()) {
            const div = document.createElement('div')
            div.classList.add('cart__left--items')
            div.innerHTML = `<div class="row">
                                <div class="col l-1">
                                    <div class="cart__items--trash">
                                        <span class="cart__trash--icon" onclick="removeCartItems(${cart.id})"><i class="fas fa-trash-alt"></i></span>
                                    </div>
                                </div>
                                <div class="col l-2">
                                    <div class="cart__items--img">
                                        <img src="${cart.img}" alt="">
                                    </div>
                                </div>
                                <div class="col l-4">
                                    <div class="cart__items--infor">
                                        <h4 class="cart__items--name">${cart.name}</h4>
                                        <h4 class="cart__items--price">${new Intl.NumberFormat('en-US').format(cart.price)}</h4>
                                    </div>
                                </div>
                                <div class="col l-2">
                                    <div class="cart__items--quantity">
                                        <button class="cart__quantity--btn minus" onclick="decrementQuantityCartItems(${cart.id})"><i class="fas fa-minus"></i></button>
                                        <input class="cart__quantity--value" type="text" value="${cart.quantity}" disabled />
                                        <button class="cart__quantity--btn plus" onclick="incrementQuantityCartItems(${cart.id})"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="col l-3">
                                    <div class="cart__items--total">
                                        <h4 class="cart__items--total-price">${new Intl.NumberFormat('en-US').format(cart.total)}</h4>
                                    </div>
                                </div>
                            </div>`
           if(divElement) divElement.appendChild(div)
        }
        
    }
}

function renderCartListInPaymentPage(cartList) {
    if(!Array.isArray(cartList)) return
    const sumPrice = document.querySelector('.payment__right--calc-text.value')
    updateSumPriceCart(cartList, sumPrice)
    totalFinallyPayment(cartList)
    const divElement = document.querySelector('.payment__right--listcart')
    if(divElement) divElement.innerHTML = ''
    if(cartList.length == 0){
        const pElement = document.createElement('p')
        pElement.classList.add('action__box--itemscart-emty')
        pElement.textContent = "Giỏ hàng trống"

        if(divElement) divElement.appendChild(pElement)
    }
    else{
        
        for (const cart of cartList) {
            const div = document.createElement('div')
            div.classList.add('payment__right--itemscart')
            div.innerHTML = `<div class="row no-gutters">
                                <div class="col l-2">
                                    <div class="payment__right--itemscart-img">
                                        <img src="${cart.img}" alt="">
                                        <span class="quantity">${cart.quantity}</span>
                                    </div>
                                </div>
                                <div class="col l-7">
                                    <div class="payment__right--itemscart-name">
                                        <p>${cart.name}</p>
                                    </div>
                                </div>
                                <div class="col l-3">
                                    <div class="payment__right--itemscart-price">
                                        <span>${new Intl.NumberFormat('en-US').format(cart.total)}đ</span>
                                    </div>
                                </div>
                            </div>`
            if(divElement) divElement.appendChild(div)
        }
    }
}

//render initialList cart
renderCartHomeSite(initialState)
renderCartPage(initialState)
renderCartListInPaymentPage(initialState)



// -----------------------Tạm tính---------------------------

function updateSumPriceCart(cartList, element) {
    const sum = cartList.reduce((acc, item) => acc + item.total, 0)
    if(element) element.textContent = cartList.length == 0 ? 0+"đ" : new Intl.NumberFormat('en-US').format(sum) + 'đ'
}


//============tính tổn tiền cuối cùng

function totalFinallyPayment(cartList) {
    const finallyPayment = document.querySelector('.payment__right--total-value')
    const sum = cartList.reduce((acc, item) => acc + item.total, 0)
    if(finallyPayment) finallyPayment.textContent = cartList.length == 0 ? 0 +"đ" : new Intl.NumberFormat('en-US').format(sum+40000) + "đ"
}

//========================lấy dữ liệu từ sản phẩm


function addToCart(id, element) {
    const img = element.querySelector('.product__image').style.backgroundImage
    const newImg = img.substring(5, img.length - 2)
    const name = element.querySelector('.product__name h4').textContent
    const price = element.querySelector('.product__price .get__price-to-cart').value

    const action = {
        type: 'ADD_CART',
        payload: {
            id: +id,
            name: name, 
            img: newImg,
            price: +price,
            quantity: 1,
        }
    }
    store.dispatch(action)
    
    showBoxCart()
}
store.subscribe(() => {
    const newCartList = store.getState()
    renderCartHomeSite(newCartList);
    renderCartPage(newCartList)
    renderCartListInPaymentPage(newCartList)
    countCart.textContent = newCartList.length
    
    localStorage.setItem('cart_list', JSON.stringify(newCartList))
    
})

function showBoxCart() {
    const showCartModel = document.querySelector('.action__box--listcart-mode')
    showCartModel.classList.add('active')
    
    setTimeout(() => {
        showCartModel.classList.remove('active')
    }, 4000)
}


function removeCartItems(id) {
    const action = {
        type: 'REMOVE_CART',
        payload: id
    }
    store.dispatch(action)
}

function decrementQuantityCartItems(id) {
    const action = {
        type: 'DECREMENT_CART',
        payload: id
    }
    store.dispatch(action)
}

function incrementQuantityCartItems(id) {
    const action = {
        type: 'INCREMENT_CART',
        payload: id
    }
    store.dispatch(action)
}


// ----------------------------------xử lý giỏ hàng trong trang chi tiết sản phẩm------------------------

function addToCartDetailPage(id, element, url) {
    const parentNodePage = element.parentElement.parentElement.parentElement
    const img = parentNodePage.querySelector('.product__page--img').style.backgroundImage
    const newImg = img.substring(5, img.length - 2)
    const name = parentNodePage.querySelector('.product__detail--title').textContent
    const price = parentNodePage.querySelector('.product__page--price--value').value
    const quantity = parentNodePage.querySelector('.payment-quantity-number').value
    
    const action = {
        type: 'ADD_CART',
        payload: {
            id: +id,
            name: name, 
            img: newImg,
            price: +price,
            quantity: +quantity
        }
    }
    store.dispatch(action)
    window.location.href = url
}

function handleClearCart() {
    const action = {
        type: 'CLEAR_CART',
        payload: []
    }
    store.dispatch(action)
}




// --------------xử lý thanh toán----------------

function redirectPageCart(oldUrl, newUrl) {
    const checkItemsCart = JSON.parse(localStorage.getItem('cart_list'))
        if(checkItemsCart.length <= 0){
            window.location.href = oldUrl
        }else{
            window.location.href = newUrl
        }
}


// ----------------------- Xử lý Địa chỉ-----------------------

const boxAddressProvince = document.querySelector('.payment__center--input-dropdown-list.province')
const boxAddressDistrict = document.querySelector('.payment__center--input-dropdown-list.district')
const boxAddressWards = document.querySelector('.payment__center--input-dropdown-list.wards')

const provinceList = document.querySelector('.payment__adresslist.province')
const districtList = document.querySelector('.payment__adresslist.districts')
const wardsList = document.querySelector('.payment__adresslist.wards')

const provinceInput = document.querySelector('.payment__center--text.province')
const districtInput = document.querySelector('.payment__center--text.district')
const wardsInput = document.querySelector('.payment__center--text.wards')

const districtBtn = document.querySelector('.icon__dropdown--payment.district')
const wardsBtn = document.querySelector('.icon__dropdown--payment.wards')
const fullAddressValue = document.getElementById('payment__center--fulladdress')



function showBoxAddresProvince() {
    boxAddressProvince.classList.add('active')
}

function showBoxAddresDistrict() {
    boxAddressDistrict.classList.add('active')
}

function showBoxAddresWards() {
    boxAddressWards.classList.add('active')
}

fetch('https://provinces.open-api.vn/api/?depth=3')
  .then(response => response.json())
  .then(data => {
    //Xử lý tỉnh thành
    const htmls1 = data.map(item => {
        return `<li class="payment__adressitems province">${item.name}</li>`
    })

   if(provinceList) provinceList.innerHTML = htmls1.join('')

    const provinceItems = document.querySelectorAll('.payment__adressitems.province')
    provinceItems.forEach(item => {
        item.onclick = () => {

            fullAddressValue.value = ''
            const arraysAddress = []

            provinceInput.value = item.textContent
            boxAddressProvince.classList.remove('active')
            arraysAddress.push(item.textContent)
            fullAddressValue.value = arraysAddress.join('')

            
            // Xử lý Quận huyện
            if(provinceInput.value != '' || provinceInput.value){
             const districts = data.filter(item => item.name == provinceInput.value)
           const htmls2 = districts[0].districts.map(item => {
                return `<li class="payment__adressitems district">${item.name}</li>`
           })
           districtList.innerHTML = htmls2.join('')
           const districtItems = document.querySelectorAll('.payment__adressitems.district')
           districtBtn.addEventListener('click', showBoxAddresDistrict)
           districtItems.forEach(item => {
               item.onclick = () => {
                districtInput.value = item.textContent
                boxAddressDistrict.classList.remove('active')
                arraysAddress.push(item.textContent)
                fullAddressValue.value = arraysAddress.reverse().join(', ')



                //Xử lý Phường xã
                if(districtInput.value != '' || districtInput.value ){
                    const listDistrict = [...districts[0].districts]
                    const wards = listDistrict.filter(item => item.name == districtInput.value)
                    const htmls3 = wards[0].wards.map(item => {
                        return `<li class="payment__adressitems wards">${item.name}</li>`
                    })
                    wardsList.innerHTML = htmls3.join('')
                    const wardstItems = document.querySelectorAll('.payment__adressitems.wards')
                    wardsBtn.addEventListener('click', showBoxAddresWards)
                    wardstItems.forEach(item => {
                        item.onclick = () => {
                            wardsInput.value = item.textContent
                            boxAddressWards.classList.remove('active')
                            arraysAddress.reverse()
                            arraysAddress.push(item.textContent)
                            fullAddressValue.value = arraysAddress.reverse().join(', ')
                        }
                    })
                }
               }
           })
            }
        }
    })
  });

