<template>
    <div>
        <input
            class="h-10 px-3 border-gray-200 text-gray-700 placeholder-gray-300 border-2 focus:outline-none focus:border-yellow-500 shadow-inner"
            v-bind="$attrs"
            @input="$emit('input', $event.target.value)"
        />

        <error-message v-if="error">{{ error }}</error-message>
    </div>
</template>

<script>
import ErrorMessage from './ErrorMessage';

export default {
    props: ['error'],
    components: { ErrorMessage },
};
</script>
