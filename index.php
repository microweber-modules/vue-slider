
<link href="<?php echo module_url();?>css/style.css" type="text/css" rel="stylesheet" >

<div style="padding-top:20px;padding-bottom:20px">

    <script>
        settings<?php echo md5($params['id']); ?> = <?php echo json_encode(getVueSliderData($params['id']), JSON_PRETTY_PRINT); ?>;
    </script>
    
    <script type="importmap">
      { "imports": {
          "vue":               "https://cdnjs.cloudflare.com/ajax/libs/vue/3.2.41/vue.esm-browser.prod.js",
          "vue-router":        "https://cdnjs.cloudflare.com/ajax/libs/vue-router/4.1.5/vue-router.esm-browser.min.js",
          "@vue/devtools-api": "https://unpkg.com/@vue/devtools-api@6.4.5/lib/esm/index.js"
      } }
    </script>

    <script type="module">
        import { createApp } from 'vue'
        createApp({
            mounted() {
                const settings = settings<?php echo md5($params['id']); ?>;
                this.images = settings.images;
                this.currentSlideImage = settings.images[0];
            },
            data() {
                return {
                    images: [],
                    currentSlideImage: ''
                }
            }
        }).mount('#<?php echo $params['id']; ?>')
    </script>

    <div id="<?php echo $params['id']; ?>">
       <div class="container">
           <div class="vue-slider">
               <div class="vue-slider-item" :style="{ backgroundImage: 'url(' + currentSlideImage + ')' }"></div>
           </div>
           <div class="btn btn-group">
               <button type="button" class="btn btn-primary">Previous Slide</button>
               <button type="button" class="btn btn-primary">Next Slide</button>
           </div>
       </div>
    </div>
</div>
