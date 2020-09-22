<template>
    <main>
        <header id="header-nav">
            <nav
                class="navbar navbar-expand-md navbar-light bg-white shadow-sm"
            >
                <div class="container flex">
                    <div class="navbar-brand">ExampleProject 0.1</div>
                    <div class="ml-auto">
                        <inertia-link class="ml-2" href="/">Home</inertia-link>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container">
            <slot />
        </div>
    </main>
</template>

<script>
export default {};
</script>

<style>
#header-nav {
    color: #000;
}
</style>
