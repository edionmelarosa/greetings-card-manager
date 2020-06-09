<template>
    <div class="container">
        <div class="row justify-content-center">
            <notifications group="app" />
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
export default {
   name: 'App',
}
</script>