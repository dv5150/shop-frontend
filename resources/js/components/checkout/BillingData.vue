<template>
    <div style="margin-bottom: 7rem;">
        <table>
            <thead>
                <tr>
                    <th>
                        Billing Address
                        <button @click.prevent="copyShippingData" class="button button-clear">
                            [ COPY SHIPPING DATA ]
                        </button>
                    </th>
                </tr>
            </thead>
        </table>
        <fieldset>
            <label for="name">Name</label>
            <input type="text" id="name" placeholder="Jack Bauer" v-model="checkout.billingData.name">
            <input-error :field-name="'billingData.name'"></input-error>

            <label for="zipCode">Zip Code</label>
            <input type="text" id="zipCode" placeholder="1000" v-model="checkout.billingData.zipCode">
            <input-error :field-name="'billingData.zipCode'"></input-error>

            <label for="city">City</label>
            <input type="text" id="city" placeholder="Budapest" v-model="checkout.billingData.city">
            <input-error :field-name="'billingData.city'"></input-error>

            <label for="address">Street</label>
            <input type="text" id="address" placeholder="Main road 72" v-model="checkout.billingData.street">
            <input-error :field-name="'billingData.street'"></input-error>

            <label for="taxNumber">Tax Number</label>
            <input type="text" id="taxNumber" placeholder="123456789" v-model="checkout.billingData.taxNumber">
            <input-error :field-name="'billingData.taxNumber'"></input-error>
        </fieldset>
    </div>
</template>

<script setup>
import { useCheckoutStore } from '../services/store'
import InputError from "../partials/InputError"

let checkout = useCheckoutStore()

let copyShippingData = () => {
    checkout.$patch({
        billingData: {
            ...checkout.shippingData,
            taxNumber: checkout.billingData.taxNumber
        }
    })
}
</script>

<style lang="scss" scoped></style>
