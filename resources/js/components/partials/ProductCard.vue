<template>
    <div style="min-height: 20rem;">
        <h5>{{ product.name }}</h5>
        <p v-if="product.price_gross < product.price_gross_original">
            <s>{{ product.price_gross_original }} {{ cart.currency?.code }}</s><br />
            <span style="color: mediumseagreen;">
                {{ product.price_gross }} {{ cart.currency?.code }} (- {{ product.discount?.value }} {{ product.discount?.unit }})
            </span>
        </p>
        <p v-else>
            {{ product.price_gross }} {{ cart.currency?.code }}
        </p>
        <a href="#" @click.prevent="cart.increaseQuantity(product.id, 1)" class="button button-outline">
            [ ADD TO CART ]
        </a>
    </div>
</template>

<script setup>
import { useCartStore } from '../services/store'

let props = defineProps({
    product: Object,
})

let cart = useCartStore()
</script>
