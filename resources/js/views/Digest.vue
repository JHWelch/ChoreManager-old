<template>
  <div>
    <h1>Digest</h1>
    <h2>{{view}}</h2>
  </div>
</template>

<script>
export default {
  props: {
    view: {
      type: String,
      default: 'Day'
    }
  }
}
</script>

<style>

</style>