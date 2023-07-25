    ```js
require('./bootstrap')

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import { useCartStore, useCheckoutStore } from './components/shop/services/store'
import CartDrawer from './components/shop/cart/CartDrawer'
import CartWidget from './components/shop/cart/CartWidget'
import Checkout from './components/shop/Checkout'
import Coupon from './components/shop/checkout/Coupon'
import ProductList from './components/shop/ProductList'

const app = createApp({})

app.use(createPinia())

app.component('cart-drawer', CartDrawer)
app.component('cart-widget', CartWidget)
app.component('checkout', Checkout)
app.component('coupon', Coupon)
app.component('product-list', ProductList)

app.mount('#app')

let cart = useCartStore()
cart.init()

let checkout = useCheckoutStore()
```
5. Run the compiler:
    - `$ npm run dev`
---