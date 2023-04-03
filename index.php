
<link href="<?php echo module_url();?>css/style.css" type="text/css" rel="stylesheet" >
<link href="//cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" type="text/css" rel="stylesheet"/>

<div>
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
            methods: {
                nextSlide() {
                    const currentSlideIndex = this.slides.indexOf(this.currentSlide);
                    if (currentSlideIndex === this.slides.length - 1) {
                        this.currentSlide = this.slides[0];
                    } else {
                        this.currentSlide = this.slides[currentSlideIndex + 1];
                    }
                },
                previousSlide() {
                    const currentSlideIndex = this.slides.indexOf(this.currentSlide);
                    if (currentSlideIndex === 0) {
                        this.currentSlide = this.slides[this.slides.length - 1];
                    } else {
                        this.currentSlide = this.slides[currentSlideIndex - 1];
                    }
                }
            },
            mounted() {
                const settings = settings<?php echo md5($params['id']); ?>;
                this.slides = settings.slides;

                this.nextSlide();
                let inst = this;
                setInterval(function () {
                    inst.nextSlide();
                }, 5000);
            },
            data() {
                return {
                    slides: [],
                    currentSlide: false
                }
            }
        }).mount('#<?php echo $params['id']; ?>')
    </script>

    <div id="<?php echo $params['id']; ?>">
       <div>
           <div class="vue-slider">

               <div class="vue-slider-item" :style="{ backgroundImage: 'url(' + currentSlide + ')' }"></div>

               <div class="vue-slider-buttons">
                   <button type="button" v-on:click="previousSlide" class="vue-slider-button-prev">
                       Previous Slide
                   </button>
                   <button type="button" v-on:click="nextSlide" class="vue-slider-button-next">
                       Next Slide
                   </button>
               </div>
           </div>
       </div>
    </div>
</div>
