<template>
    <div class="relative w-32 h-32 cursor-pointer overflow-hidden" @click="$refs.fileInputRef.click()">
        <input type="file" class="hidden" ref="fileInputRef" @change="$emit('replace', $event.target.files[0])" />

        <!-- TODO: dropzone -->
        <img v-bind="getImgProps()" class="h-full w-full object-cover" />
        <div class="absolute inset-0 opacity-0 hover:opacity-50 hover:bg-red-500 duration-150">
            <p class="text-center m-auto text-white">Click here or drag a file to add media…</p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        getImgProps: { required: true, type: Function },
    },
};
</script>
