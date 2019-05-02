<template>
    <div class="free-trial-app">
        <component :is="currentPanel" @form-submit="verifyIsNotCustomer"></component>
    </div>
</template>

<script>
import FormPanel from './FormPanel'
import ExistingCustomerPanel from './ExistingUserPanel'
import axios from 'axios'

export default {
    name: "FreeTrialApp",
    components: {
        FormPanel,
        ExistingCustomerPanel
    },
    computed: {
        currentPanel () {
            return this.isExistingCustomer ? 'ExistingCustomerPanel' : 'FormPanel'
        }
    },
    data () {
        return {
            isExistingCustomer: false
        }
    },
    methods: {
        verifyIsNotCustomer (data) {
            console.log('hit', data)
            axios.post('/free-trial-submit', data)
                .then(({ data }) => {

                }).catch(error => {
                    console.log('ERROR', error)
                })
        }
    }
}
</script>

<style lang="scss" scoped>
.free-trial-app {
    max-width: 400px;
    margin: auto;
    box-shadow: -2px -2px 10px #777;
    border-radius: 5px;
    padding: 3rem;
}
</style>
