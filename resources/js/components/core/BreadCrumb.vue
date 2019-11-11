<template>
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="icon-gradient bg-happy-itmeo" :class="['as', nameIcon]">
                    </i>
                </div>
                <div>{{title}}
                    <div class="page-title-subheading">{{subTitle}}
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <slot name="action">
                </slot>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: "BreadCrumbComponent",
    props: {
      title: String,
      subTitle: String,
      nameIcon: String,
    }
  }
</script>

<style scoped>

</style>
