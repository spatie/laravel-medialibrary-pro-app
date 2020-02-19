<template>
    <div>
        <p>test</p>
        <medialibrary>
            <div slot-scope="props">--- {{ props }} ---</div>
        </medialibrary>
    </div>
</template>

<script>
import Medialibrary from "@spatie/medialibrary-pro-vue";

export default {
    components: { Medialibrary }
};
</script>
