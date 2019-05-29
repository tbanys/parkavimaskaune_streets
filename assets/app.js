( function() {

  Vue.component('v-select', VueSelect.VueSelect)

  new Vue({
    el: document.querySelector('#search-street'),
    data: {
      streets: [],
      selected: null
    },
    methods: {
      fetchStreets() {
        var self = this;
        fetch('https://parkavimaskaune.lt/wp-json/parkavimas/streets')
        .then(function(response) {
          return response.json();
        })
        .then(function(myJson) {
          self.streets = myJson;
        });
      },
      setSelected(val) {
        this.selected = val;
      }
    },
    mounted: function(){
      this.fetchStreets();
      console.log(location.protocol);
    }
  });
 })();