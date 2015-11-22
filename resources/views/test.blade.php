{!! Html::script('js/vue.js') !!}

<div id="example-2">
  <p v-if="greeting">Hello!</p>
</div>

<script type="text/javascript">
var exampleVM2 = new Vue({
  el: '#example-2',
  data: {
    greeting: true
  }
})
</script>

