
    // var emailRE = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    

    var collection = Vue.extend({
        props: {
            current_text:'',
            current_id:''
        },
        template:
        '<tr>'+
        '<td>{{current_id}}</td>'+
        '<td>{{current_text}}</td>'+
        '<td>'+
        '<span class="glyphicon glyphicon-pencil" aria-hidden="true" rel="tooltip" title="Изменить" data-toggle="modal" data-target="#m_edit"></span>'+
        '<span class="glyphicon glyphicon-remove" aria-hidden="true" rel="tooltip" title="Удалить" data-toggle="modal" data-target="#m_del"></span>'+
        '</td>'+
        '</tr>'
    });

    var widget = Vue.extend({
        data: function () {
            return {
                m_value:''
            }
        },
        props: {
            m_title:'',
            m_input_show: false,
            m_body:'',
            m_id:''
        },
        template:
        '<div class="modal fade" id="{{m_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'+
        '<div class="modal-dialog">'+
        '<div class="modal-content">'+
        '<div class="modal-header">'+
        '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
        '<h4 class="modal-title" id="myModalLabel">{{m_title}}</h4>' +
        '</div>' +
        '<div class="modal-body">' +
        '{{m_body}}<br />'+
        '<input type="text" v-if="m_input_show" v-model="m_value" placeholder="{{current_text}}">'+
        '</div>'+
        '<div class="modal-footer">'+
        '<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>'+
        '<button type="button" class="btn btn-primary" onclick="{{m_function}}">Сохранить изменения</button>'+
        '</div>'+
        '</div>'+
        '</div>'+
        '</div>'
    });
    var vm = new Vue({
        http: {
            root: '/root',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
            }
        },
        el: '#el_event_type',
        data: {
            event_type: [{}]
            /*
             success: false,
             edit: false
            * */
        },
        methods: {
            fetchTypeEvent: function () {
                this.$http.get('/api/event_type').then(function (response) {
                    this.$set('event_type', response.data);
                });
            }
            /*
            RemoveUser: function (id) {
             var ConfirmBox = confirm("Are you sure, you want to delete this User?")

             if(ConfirmBox) this.$http.delete('/api/users/' + id)

             this.fetchUser()
             },

             EditUser: function (id) {
             var user = this.newUser

             this.newUser = { id: '', name: '', email: '', address: ''}

             this.$http.patch('/api/users/' + id, user, function (data) {
             console.log(data)
             })

             this.fetchUser()

             this.edit = false

             },

             ShowUser: function (id) {
             this.edit = true

             this.$http.get('/api/users/' + id, function (data) {
             this.newUser.id = data.id
             this.newUser.name = data.name
             this.newUser.email = data.email
             this.newUser.address = data.address
             })
             },

             AddNewUser: function () {
             // User input
             var user = this.newUser

             // Clear form input
             this.newUser = { name:'', email:'', address:'' }

             // Send post request
             this.$http.post('/api/users/', user)

             // Show success message
             self = this
             this.success = true
             setTimeout(function () {
             self.success = false
             }, 5000)

             // Reload page
             this.fetchUser()

             }
            */
        },
        ready: function () {
            this.fetchTypeEvent();
        },
        components: {
            'module-window': widget,
            'collection': collection
        },
        /*
         computed: {
         validation: function () {
         return {
         name: !!this.newUser.name.trim(),
         email: emailRE.test(this.newUser.email),
         address: !!this.newUser.address.trim()
         }
         },

         isValid: function () {
         var validation = this.validation
         return Object.keys(validation).every(function (key) {
         return validation[key]
         })
         }
         },
        * */
    });