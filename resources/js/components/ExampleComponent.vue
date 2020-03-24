<template>
    <div class="container">
        <div class="places-sweet-alerts">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-content text-center">
                        <h5>A warning message, with a function attached to the "Confirm" Button...</h5>
                        <button class="btn btn-rose btn-fill" onclick="demo.showSwal('warning-message-and-confirmation')">Try me!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
