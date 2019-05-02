<template>
    <div class="free-trial-app">
        <component
            :error="error"
            :is="currentPanel"
            @form-submit="verifyIsNotCustomer"
        ></component>
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
            isExistingCustomer: false,
            apiEndpoint: '/api/free-trial-submit',
            error: false,
            signupUrl: 'https://pro.creativemarket.com/sign-up'
        }
    },
    methods: {
        verifyIsNotCustomer (data) {
            const {
                apiEndpoint: api,
                signupUrl: signup
            } = this
            
            axios.post(api, data)
                .then(({ data: { response } }) => {
                    this.error = false
                
                    if (!response) {
                        window.location.href = signup
                    } else {
                        this.isExistingCustomer = true
                    }
                }).catch(error => {
                    if (error.response) {
                        this.error = true
                    }
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
