<template>
    <div class="form-panel" dusk="FormPanel">
        <h2>Get <strong>3 free downloads</strong> when you start your free trial today.</h2>
        <ul class="benefits">
            <li>Get access to our full Pro catalog</li>
            <li>Cancel anytime, risk free</li>
            <li>7 days free</li>
        </ul>
        <input
            type="email"
            name="email"
            class="form-control"
            placeholder="Enter your Email Address"
            v-model="emailValue"
            :class="{ error: error }"
        >
        <p class="error-msg" v-if="error">There was an error with your submission. Please verify that you typed in your email address correctly.</p>
        <button class="btn" @click="sendVerificationRequest">Start Your Free Trial</button>
        <p class="disclaimer">The free trial is for new members only. All assets downloaded during the free trial period are covered by a basic license.</p>
    </div>
</template>

<script>

export default {
    name: 'FormPanel',
    data () {
        return {
            emailValue: ''
        }
    },
    methods: {
        sendVerificationRequest () {
            const { emailValue: email } = this
            this.$emit('form-submit', { email })
        }
    },
    props: {
        'error': {
            type: Boolean,
            default: false
        }
    }
}
</script>

<style lang="scss" scoped>
.form-panel {
    color: hsl(210, 6.7%, 23.5%);
    
    h2 {
        font-size: 1.25rem;
    }

    .benefits {
        list-style: none;
        text-align: left;
        padding-left: 1.5rem;
        margin: 1.5rem 0;

        li {
            display: flex;
            align-items: center;
            margin: 0.5rem 0;
            font-size: 1rem;
            
            &::before {
                content: url('/img/checkmark-lined.svg');
                margin-right: 0.5rem;
            }
        }
    }

    input[type="email"] {
        padding: 1.5rem 0.75rem;
        
        &.error {
            border: 1px solid hsl(0, 50%, 50%);
            box-shadow: 0px 0px 5px hsl(0, 50%, 50%);
        }
    }

    .btn {
        width: 100%;
        text-transform: uppercase;
        font-weight: bold;
        padding: 0.75rem 0.75rem;
        margin-top: 1rem;
        cursor: pointer;
    }

    .error-msg {
        font-size: 0.6rem;
        color: hsl(0, 50%, 50%);
        text-align: left;
        margin-top: 0.5rem;
        margin-bottom: 0;
        padding-left: 0.5rem;
    }

    .disclaimer {
        font-size: 0.6rem;
        margin-top: 1rem;
        margin-bottom: 0;
    }
}
</style>
