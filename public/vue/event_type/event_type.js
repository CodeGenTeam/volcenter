    Vue.component('module-window',Vue.extend({
        props: {
            m_title:'',
            m_input_show: false,
            m_body:'',
            m_id:'',
            m_value:'',
            b_name_yes:'',
            b_name_no:''
        },
        template: '#collection',
        methods: {
            save: function () {
                this.$dispatch('save',this.m_value,this.m_id);
            },
            close: function () {
            }
        }
    }));
    var vm = new Vue({
        http: {
            root: '/root',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
            }
        },
        el: '#el_event_type',
        data: {
            event_type: [{}],
            current_id:'',
            current_text:'',
            m_id:'',
            event:null
        },
        methods: {
            click_button: function(event) {
                vm.$root.$children[0].m_value = '';
                vm.$root.$children[1].m_value = this.current_text;
                vm.$root.$children[2].m_value = this.current_text;
            },
            click: function(event) {
                this.$els.click_button.dispatchEvent(this.event);
            },
            fetchTypeEvent: function () {
                this.$http.get('/api/event_type').then(function (response) {
                    this.$set('event_type', response.data);
                });
            },
            updateEvent : function (id,val) {
                var newrecord = { id: id, name: val}
                this.$http.patch('/api/event_type/' + id, newrecord).then(function (response) {
                    //console.log(response.data)
                });
                this.fetchTypeEvent();
            },
            removeEvent: function (id) {
                this.$http.delete('/api/event_type/' + id);
                this.fetchTypeEvent();
            },
            addEvent: function(val){
                var newrecord = { name: val};
                this.$http.post('/api/event_type/', newrecord);
                self = this;
                this.success = true;
                setTimeout(function () {
                    self.success = false;
                }, 5000);
                this.fetchTypeEvent()
            }
        },
        events: {
            'save': function (msg, id) {
                if(id=="m_del")
                {
                    this.removeEvent(this.current_id);
                }else if(id=="m_edit")
                {
                    this.updateEvent(this.current_id,msg);
                }else if(id=="m_add")
                {
                    this.addEvent(msg);
                }
            }
        },
        ready: function () {
            this.fetchTypeEvent()
            this.event = document.createEvent("HTMLEvents");
            this.event.initEvent("click_button", true, true);
            this.$els.click_button.addEventListener('click', this.click_button);
        }
    });